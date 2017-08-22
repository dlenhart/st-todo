<!-- nofind.blade.php -->
@extends('layouts.mastermaterialize')
@section('content')
<div class="container" style="margin-top: 2% !important">
  <div class="row">

    <div class="col s12" style="">
      <div class="card grey lighten-3">
        <div class="card-content black-text">
          <div class="row center">
            <span class="card-title">Error</span>
          </div>
          @if (\Session::get('nofind'))
              <div class="">
                  <p>{{ \Session::get('nofind') }}</p>
              </div>
          @endif
          @if (\Session::get('nouser'))
              <div class="">
                  <p>{{ \Session::get('nouser') }}</p>
              </div>
          @endif
        </div>

      </div>
    </div>

  </div>

</div>
@endsection
