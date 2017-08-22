<!-- edit.blade.php -->
@extends('layouts.mastermaterialize')
@section('content')
<div class="container" style="margin-top: 2% !important">

  @include('shared.errors')

  <div class="row">

    <div class="col s12" style="">
      <div class="card grey lighten-3">
        <div class="card-content black-text">
          <div class="row center">
            <span class="card-title">Edit {{$id}}</span>
          </div>
            <form method="post" action="{{action('todoController@update', $id)}}">
              <div class="row">
                {{csrf_field()}}
                 <input name="_method" type="hidden" value="PATCH">
                <label for="lgFormGroupInput" class="">Title</label>
                <div class="">
                  <input type="text" class="" id="lgFormGroupInput" placeholder="title" name="title" value="{{$todo->title}}">
                </div>
              </div>
              <div class="row">
                <label for="smFormGroupInput" class="">Body</label>
                <div class="">
                  <textarea name="body" rows="8" cols="80">{{$todo->body}}</textarea>
                </div>
              </div>
              <div class="row">
                <button type="submit" class="btn indigo lighten-2">Update</button>
              </div>
            </form>

        </div>

      </div>
    </div>

  </div>

</div>
@endsection
