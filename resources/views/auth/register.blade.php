@extends('auth.layout.master')

@section('content')
    <!-- Register -->
    <div class="login__block toggled" id="l-register">
        <div class="login__block__header palette-Blue bg">
            <i class="zmdi zmdi-account-circle"></i>
            你好！请在这里创建一个新的账号

            <div class="actions login__block__actions">
                <div class="dropdown">
                    <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('login') }}">已经有账号?</a></li>
                        <li><a href="{{ route('password.request') }}">忘记密码了?</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="login__block__body">
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="form-group__inner">
                        <input type="text" class="form-control" placeholder="昵称" name="name"
                               value="{{ old('name') }}" required autofocus>
                        <i class="form-group__bar"></i>
                    </div>
                    @if ($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="form-group__inner">
                        <input type="email" class="form-control" placeholder="电邮" name="email"
                               value="{{ old('email') }}" required>
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

                <div class="form-group">
                    <div class="form-group__inner">
                        <input type="password" class="form-control" placeholder="确认密码"
                               name="password_confirmation" required>
                        <i class="form-group__bar"></i>
                    </div>
                </div>

                <button class="btn btn--light btn--icon m-t-15"><i class="zmdi zmdi-plus"></i></button>
            </form>
        </div>
    </div>
@endsection