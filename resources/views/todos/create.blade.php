<!-- create.blade.php -->
@extends('layouts.mastermaterialize')
@section('content')
<div class="container" style="margin-top: 2% !important">

  @include('shared.errors')

  @if (\Session::get('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
      </div>
  @endif
  <div class="row">

    <div class="col s12" style="">
      <div class="card grey lighten-3">
        <div class="card-content black-text">
          <div class="row center">
            <span class="card-title">Create New</span>
          </div>
          <form method="post" action="{{url('todo')}}">
            <div class="row">
              {{csrf_field()}}
              <label for="title" class="">Title</label>
              <div class="">
                <input type="text" class="" id="title" placeholder="title" name="title">
              </div>
            </div>
            <input type="hidden" value="{{ Auth::user()->email }}" id="user" name="user">
            <div class="row">
              <label for="body" class="">Body</label>
              <div class="">
                <textarea name="body" rows="8" cols="80"></textarea>
              </div>
            </div>
            <div class="row">
              <div class=""></div>
              <input type="submit" class="btn green">
              <input type="reset" class="btn orange">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
