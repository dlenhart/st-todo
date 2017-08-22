<!-- index.blade.php -->
@extends('layouts.mastermaterialize')
@section('content')
  <div class="container">
    @if (\Session::get('success'))
        <div class="row" style="margin-top: 2% !important">
          <div class="card green lighten-3">
            <div class="card-content black-text">
              <span class="card-title">Success!</span>
                <p>{{ \Session::get('success') }}</p>
            </div>
          </div>
        </div>
    @endif
    @if (\Session::get('completed'))
        <div class="row" style="margin-top: 2% !important">
          <div class="card amber accent-1">
            <div class="card-content black-text">
              <span class="card-title">Success!</span>
                <p>{{ \Session::get('completed') }}</p>
            </div>
          </div>
        </div>
    @endif
    @if (\Session::get('deleted'))
        <div class="row" style="margin-top: 2% !important">
          <div class="card red darken-1">
            <div class="card-content white-text">
              <span class="card-title">Deleted!</span>
                <p>{{ \Session::get('deleted') }}</p>
            </div>
          </div>
        </div>
    @endif
    @if (\Session::get('updated'))
        <div class="row" style="margin-top: 2% !important">
          <div class="card blue lighten-2">
            <div class="card-content white-text">
              <span class="card-title">Updated!</span>
                <p>{{ \Session::get('updated') }}</p>
            </div>
          </div>
        </div>
    @endif
    @if (count($todos) <= 0)
        {{-- no todos --}}
        <div class="row" style="margin-top: 2% !important">
          <div class="card green lighten-4">
            <div class="card-content black-text">
              <span class="card-title">No Items!</span>
                <p>Click the plus button below to create new todos!</p>
            </div>
          </div>
        </div>
    @endif
      <div class="row" style="margin-top: 2% !important">
      @foreach($todos as $post)
      <div class="">
        <div class="col s6 m6">
          <div class="card indigo darken-4">
            <a href="{{action('todoController@edit', $post['id'])}}" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Edit me!" >
            <div class="card-content white-text">
              <span class="card-title">{{$post['title']}}</span>
              <p>{{$post['body']}}</p>
            </div>
          </a>
            <div class="card-action">
              <div class="row" style="margin-bottom: 0px !important">
              <div class="left">
                <form action="{{action('todoController@complete', $post['id'])}}" method="post">
                  {{csrf_field()}}
                  <input name="_method" type="hidden" value="POST">
                  <button class="btn green accent-1 black-text" type="submit"><i class="material-icons left">done</i>done</button>
                </form>
                <!--<a href="{{action('todoController@edit', $post['id'])}}" class="btn indigo accent-1"><i class="material-icons left">border_color</i>Edit</a>-->
              </div>
              <div class="right">
                <form action="{{action('todoController@destroy', $post['id'])}}" method="post">
                  {{csrf_field()}}
                  <input name="_method" type="hidden" value="DELETE">
                  <button class="btn red lighten-5 black-text tooltipped" data-position="top" data-delay="50" data-tooltip="Delete!" type="submit"><i class="material-icons">delete</i></button>
                </form>
            </div>
          </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  <a href="/todo/create" class="btn-floating btn-large waves-effect waves-light indigo darken-4 tooltipped" data-position="top" data-delay="50" data-tooltip="Add new TODO!"><i class="material-icons">add</i></a>
@endsection
