@extends('layouts.mastermaterialize')

@section('content')
<div class="container" style="margin-top: 2% !important">
    <div class="row">
      <div class="col s12" style="">
        <div class="card grey lighten-3">
          <div class="card-content black-text">
            <div class="row center">
              <span class="card-title">Reset Password</span>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong style="color: red">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn green">
                            Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>

    </div>
</div>
@endsection
