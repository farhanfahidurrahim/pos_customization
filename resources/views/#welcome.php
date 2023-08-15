<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'ultimatePOS') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
               }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .tagline{
                font-size:25px;
                font-weight: 300;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="news-feed">
                <div class="news-image" style="background-image: url(https://smtradingbd.com/wp-content/uploads/2021/08/20201125_102736-scaled.jpg);"></div>
            </div>
            
            <div class="top-right links">

                @if (Route::has('login'))
                    @if (Auth::check())
                        <a href="{{ action('HomeController@index') }}">@lang('home.home')</a>
                    @else
                        <a href="{{ action('Auth\LoginController@login') }}">@lang('lang_v1.login')</a>
                    @endif
                @endif

                @if(Route::has('pricing') && config('app.env') != 'demo')
                    <a href="{{ action('\Modules\Superadmin\Http\Controllers\PricingController@index') }}">@lang('superadmin::lang.pricing')</a>
                @endif
            </div>
            

            <div class="content">
                <div class="title m-b-md" style="font-weight: 600 !important">
                    {{ config('app.name', 'ultimatePOS') }}
                </div>
                <p class="tagline">
                    {{ env('APP_TITLE', '') }}
                </p>
            </div>
        </div>
    </body>
</html>
