@extends('layouts.mastermaterialize')

@section('content')
<div class="container" style="margin-top: 2% !important">
  <div class="col s12" style="">
    <div class="card grey lighten-3">
      <div class="card-content black-text">
        <div class="row center">
          <span class="card-title">Log In</span>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="">E-Mail Address</label>

                <div class="col s12">
                    <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong style="color: red">{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="">Password</label>

                <div class="col s12">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong style="color: red">{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="left">
                    <button type="submit" class="btn green">
                        Login
                    </button>
                </div>
                <div class="right">
                    <a class="" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </div>
        </form>

      </div>

    </div>
  </div>
</div>
@endsection
