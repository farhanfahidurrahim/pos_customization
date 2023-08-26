@extends('layouts.auth')
@section('title', __('lang_v1.login'))

@section('content')


        <style>
            .login.login-with-news-feed {
                width: 100%;
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
            }
            .login.login-with-news-feed .news-feed {
                position: fixed;
                left: 0;
                right: 500px;
                top: 0;
                bottom: 0;
                overflow: hidden;
                -webkit-transform: translateZ(0);
                -moz-transform: translateZ(0);
                -ms-transform: translateZ(0);
                -o-transform: translateZ(0);
                transform: translateZ(0);
            }
            .login.login-with-news-feed .news-feed .news-image {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                top: 0;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
            .login.login-with-news-feed .right-content {
                min-height: 100%;
                background: #fff;
                width: 500px;
                margin-left: auto;
                padding: 60px;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
            }
            .login.login-with-news-feed .right-content .login-header {
                position: relative;
            }
            .login.login-with-news-feed .right-content .login-header .brand {
                padding: 0;
                font-size: 32px;
                color: #1a2229;
            }
            .login.login-with-news-feed .right-content .login-header .brand .logo {
                border: 14px solid transparent;
                border-color: transparent rgba(0,0,0,.15) rgba(0,0,0,.3);
                background-color: #3f51b5;
                width: 28px;
                height: 28px;
                position: relative;
                font-size: 0;
                margin-right: 10px;
                top: -11px;
                -webkit-border-radius: 6px;
                border-radius: 6px;
            }
            .login.login-with-news-feed .right-content .login-header .icon {
                position: absolute;
                right: 0;
                top: 0;
                bottom: 0;
                color: #d6e5ff;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
            }
            .login.login-with-news-feed .right-content .login-header .icon i {
                font-size: 56px;
            }
            .fa-sign-in:before {
                content: "\f090";
            }
            .login.login-with-news-feed .right-content .login-header+.login-content {
                padding-top: 30px;
            }
            .login.login-with-news-feed .right-content .login-content {
                width: auto;
            }
            .m-b-15 {
                margin-bottom: 15px!important;
            }
            .form-control-lg {
                height: calc(1.8em + 1rem + 2px);
                padding: 0.5rem 1.5rem;
                font-size: 1.875rem;
                line-height: 1.8;
                border-radius: 6px;
            }
            .form-control {
                display: block;
                width: 100%;
                font-weight: 400;
                line-height: 1.5;
                color: #2d353c;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #d5dbe0;
                border-radius: 4px;
                transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }
            .checkbox.checkbox-css {
                line-height: 16px;
                padding-top: 7px;
            }
            .m-b-30 {
                margin-bottom: 30px!important;
            }
            .checkbox.checkbox-css input {
                display: none;
            }
            input[type=checkbox], input[type=radio] {
                box-sizing: border-box;
                padding: 0;
            }
            .checkbox.checkbox-css label {
                padding-left: 24px;
                margin: 0;
                position: relative;
            }
            .checkbox.checkbox-css input:checked+label:before {
                background: #348fe2;
                border-color: #348fe2;
            }
            .checkbox.checkbox-css label:before {
                content: '';
                position: absolute;
                left: 0;
                top: 0;
                width: 16px;
                height: 16px;
                background: #d5dbe0;
                -webkit-border-radius: 4px;
                border-radius: 4px;
            }
            .checkbox.checkbox-css input:checked+label:after {
                content: '';
                background-image: url(data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3E%3Cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3E%3C/svg%3E);
                background-repeat: no-repeat;
                background-position: center center;
                background-size: 50% 50%;
                position: absolute;
                top: 0;
                left: 0;
                color: #fff;
                height: 16px;
                width: 16px;
                text-align: center;
            }
            .btn:not(:disabled):not(.disabled) {
                cursor: pointer;
            }
            .btn-success {
                color: #fff;
                background-color: #3f51b5;
                border-color: #3f51b5;
                -webkit-box-shadow: 0;
                box-shadow: 0;
            }
            .btn-success:hover {
                background-color: #ff9800;
                border-color: #ff9800;
            }
            .btn {
                font-weight: 600;
            }
            .btn-block {
                display: block;
                width: 100%;
            }
            .btn-group-lg>.btn, .btn-lg {
                line-height: 1.8;
                border-radius: 6px;
            }


            @media (max-width: 575.98px) {
            .login.login-with-news-feed .right-content {
                padding: 30px;
            }
            }
            @media (max-width: 767.98px){
            .login.login-with-news-feed .right-content {
                width: auto;
            }
            }
            @media (max-width: 1199.98px){
            .login.login-with-news-feed .right-content {
                padding: 45px;
            }

            }

            .page-header {
                display:none;
            }
        </style>
        <div class="login-page">
            <div class="login login-with-news-feed">
                <div class="news-feed">
                    <div class="news-image" style="background-image: url(https://ebusi.rdnetworkbd.com/images/banner/05.png);"></div>
                </div>

                <div class="right-content">
                    <div class="login-header">
                        <div class="brand"><span class="logo"></span> <b>Admin</b> Login</div>
                        <div class="icon">
                            <i class="fa fa-sign-in"></i>
                        </div>
                    </div>

                    <div class="login-content">
                        <form action="{{ route('login') }}" method="POST" class="margin-bottom-0">
                            {{ csrf_field() }}

                            <div class="form-group m-b-15 {{ $errors->has('username') ? ' has-error' : '' }}">
                                @php $username = old('username'); $password = null; if(config('app.env') == 'demo'){ $username = 'admin'; $password = '123456'; $demo_types = array( 'all_in_one' => 'admin', 'super_market' => 'admin',
                                'pharmacy' => 'admin-pharmacy', 'electronics' => 'admin-electronics', 'services' => 'admin-services', 'restaurant' => 'admin-restaurant', 'superadmin' => 'superadmin', 'woocommerce' => 'woocommerce_user',
                                'essentials' => 'admin-essentials' ); if( !empty($_GET['demo_type']) && array_key_exists($_GET['demo_type'], $demo_types) ){ $username = $demo_types[$_GET['demo_type']]; } } @endphp
                                <input id="username" type="text" class="form-control form-control-lg" name="username" value="{{ $username }}" placeholder="Username" required autofocus />
                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group m-b-15 {{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control form-control-lg" name="password" value="{{ $password }}" placeholder="Password" required />
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="checkbox checkbox-css m-b-30">
                                <input type="checkbox" id="remember_me_checkbox" value="" />
                                <label for="remember_me_checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('lang_v1.remember_me')
                                </label>
                                @if(config('app.env') != 'demo')
                                <a class="btn btn-link" href="{{ route('password.request') }}" style=" float: right; padding: 0; line-height: 1; ">
                                    @lang('lang_v1.forgot_your_password')
                                </a>
                                @endif

                            </div>

                            <div class="login-buttons">
                                <button type="submit" class="btn btn-success btn-block btn-lg">@lang('lang_v1.login')</button>
                            </div>
                            <p class="text-center text-grey-darker mb0"  style="margin-top:10px;">
                                Want to manage another Business? <a href="https://ebusi.rdnetworkbd.com/aipos/business/register">Register</a>
                            </p>
                            <hr />
                            <p class="text-center text-grey-darker">
                                <a href="https://ebusi.rdnetworkbd.com/" target="_blank">EBUSi-iPOS</a> a Product of RD Network BD.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>



</div>


@stop
@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        $('#change_lang').change( function(){
            window.location = "{{ route('login') }}?lang=" + $(this).val();
        });
    })
</script>
@endsection
