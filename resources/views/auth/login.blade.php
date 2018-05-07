@extends('auth.layout.master')

@section('content')
    <!-- Login -->
    <div class="login__block toggled" id="l-login">
        <div class="login__block__header">
            <i class="zmdi zmdi-account-circle"></i>
            你好！请在这里登录

            <div class="actions login__block__actions">
                <div class="dropdown">
                    <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('register') }}">创建一个新账号</a></li>
                        <li><a href="{{ route('password.request') }}">忘记密码了?</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="login__block__body">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="form-group__inner">
                        <input type="text" class="form-control" placeholder="电邮" name="email" value="{{ old('email') }}" required autofocus>
                        <i class="form-group__bar"></i>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="form-group__inner">
                        <input type="password" class="form-control" placeholder="密码" name="password" required>
                        <i class="form-group__bar"></i>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="input-centered">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <i class="input-helper"></i>
                            记住我
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn--light btn--icon m-t-15"><i class="zmdi zmdi-long-arrow-right"></i></button>
            </form>
        </div>
    </div>
@endsection