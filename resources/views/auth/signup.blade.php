@extends('templates.default')

@section('content')

    <div class="row justify-content-center" style="margin-top: 50px">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Sign up</h4>
                </div>
                <div class="card-body">
                    <form role="form" method="post" action="{{ route('auth.signup') }}">
                        <div class="form-group is-invalid">
                            <label for="email" class="control-label">Your email address</label>
                            <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" value="{{ Request::old('email') ?: ''}}">
                            <span class="help-block invalid-feedback">{{ $errors->first('email') }}</span>

                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Choose a username</label>
                            <input type="text" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" value="{{ Request::old('username') ?: ''}}">
                            <span class="help-block invalid-feedback">{{ $errors->first('username') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Choose a password</label>
                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password">
                            <span class="help-block invalid-feedback">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                        </div>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>

        </div>
    </div>

@stop
