@extends('auth.layout.master')

@section('content')
    <div class="login__block toggled" id="l-forget-password">
        <div class="login__block__header palette-Purple bg">
            <i class="zmdi zmdi-account-circle"></i>
            Reset Password

            <div class="actions login__block__actions">
                <div class="dropdown">
                    <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('register') }}">Already have an account?</a></li>
                        <li><a href="{{ route('login') }}">Create an account</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="login__block__body">
            <p class="m-t-30">Lorem ipsum dolor fringilla enim feugiat commodo sed ac lacus.</p>

            <div class="form-group form-group--float form-group--centered">
                <input type="text" class="form-control">
                <label>Email Address</label>
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group form-group--float form-group--centered form-group--centered">
                <input type="password" class="form-control">
                <label>Password</label>
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group form-group--float form-group--centered form-group--centered">
                <input type="password" class="form-control">
                <label>Confirm Password</label>
                <i class="form-group__bar"></i>
            </div>

            <button class="btn btn--light btn--icon m-t-15"><i class="zmdi zmdi-check"></i></button>
        </div>
    </div>
@endsection