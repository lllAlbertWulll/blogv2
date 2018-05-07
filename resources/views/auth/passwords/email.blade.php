@extends('auth.layout.master')

@section('content')
    <div class="login__block toggled" id="l-forget-password">
        <div class="login__block__header palette-Purple bg">
            <i class="zmdi zmdi-account-circle"></i>
            你好！忘记密码了吗?

            <div class="actions login__block__actions">
                <div class="dropdown">
                    <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('register') }}">创建一个新账号</a></li>
                        <li><a href="{{ route('login') }}">已有账号?</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="login__block__body">
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="form-group__inner">
                        <input type="text" class="form-control" placeholder="电邮" name="email"
                               value="{{ old('email') }}" required autofocus>
                        <i class="form-group__bar"></i>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <button class="btn btn--light btn--icon m-t-15"><i class="zmdi zmdi-check"></i></button>
            </form>
        </div>
    </div>
@endsection