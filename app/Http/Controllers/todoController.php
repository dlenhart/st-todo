<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Response;
use Redirect;
use Illuminate\Support\Facades\Input;
use App\todos;

/**
 * Class todoController
 * Description: CRUD methods for todo application
 * Author: Drew D. Lenhart
 */

class todoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource by logged in user
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->email;
        //only pull todos based on logged in user & status = 0
        $todos = todos::where('user', '=', $user)
          ->where('status', '=', 0)->get()->toArray();

        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array (
          'title' => 'required|max:50',
          'body' => 'required|max:150'
        );

        $validator = Validator::make ( Input::all (), $rules );

        if ($validator->fails ()){
          // get the error messages from the validator
          $messages = $validator->messages();

          // redirect user back to the form with errors
          return Redirect::to('todo/create')
              ->withErrors($validator);
        }
        else {

          $todo = new todos;
          $todo->title = $request->get('title');
          $todo->user = $request->get('user');
          $todo->body = $request->get('body');
          //default the status to 0 = open todo
          $todo->status = 0;
          $todo->save();

          return Redirect::to('todo')->with('success', 'You have just created a new TODO: ' . $request->get('title') . '!');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //not needed.
        echo "Show route: " . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //Edit page.
      if ($todo = todos::find($id)){
        //verify the person editing is the author!
        $author = \Auth::user()->email;
        
        $rc = json_decode($todo, true);
        $todoauthor = $rc['user'];

        if ($author != $todoauthor) {
          //not author
          return Redirect::to('error')->with('nofind', 'You are not the author of this TODO!');
        }

        return view('todos.edit', compact('todo','id'));

      } else {
        //not found";
        return Redirect::to('error')->with('nofind', 'Record not found!');
      }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      //Update todo
      $rules = array (
        'title' => 'required|max:50',
        'body' => 'required|max:150'
      );

      $validator = Validator::make ( Input::all (), $rules );

      if ($validator->fails ()){
        // get the error messages from the validator
        $messages = $validator->messages();
        $url = "todo/" . $id . "/edit";
        // redirect our user back to the form with the errors from the validator
        return Redirect::to($url)
            ->withErrors($validator);
      }
      else {
        $todo = todos::find($id);
        $todo->title = $request->get('title');
        $todo->body = $request->get('body');
        $todo->save();
        //return redirect('/todo');
        return Redirect::to('/todo')->with('updated', 'You have just updated a TODO!');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete todo
        $todo = todos::find($id);
        $todo->delete();

        return Redirect::to('/todo')->with('deleted', 'You have just created deleted a TODO!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function complete(Request $request, $id)
    {

        //updates the flag on each record to 1, means todo is complete. FIX
        $todo = todos::find($id);
        $todo->status = 1;
        $todo->save();
        //return redirect('/todo');
        return Redirect::to('/todo')->with('completed', 'You have just completed a TODO!');

    }

    /**
     * Show error page
     *
     * @return \Illuminate\Http\Response
     */
    public function error()
    {
        //
        return view('todos.nofind');
    }
}
