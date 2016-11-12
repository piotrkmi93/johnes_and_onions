@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s8 offset-s2">
            <div class="card-panel">
                <h4>Register</h4>
                <div class="row">
                    <form class="col s12" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="input-field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input name="email" id="email" type="email" class="validate" required>
                            <label for="email">E-Mail Address</label>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-field col s12 {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input name="password" id="password" type="password" class="validate" required>
                            <label for="password">Password</label>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="input-field col s12 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input name="password_confirmation" id="password-confirm" type="password" class="validate" required>
                            <label for="password-confirm">Confirm Password</label>

                            @if ($errors->has('password-confirm'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password-confirm') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="input-field col s12">
                            <div class="col s12">
                                <button type="submit" class="waves-effect waves-light btn">
                                    Register
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
