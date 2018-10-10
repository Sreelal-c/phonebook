<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Phonebook') }}</title>

        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500" rel="stylesheet">
        <link href="{{ asset('css/socicon.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('css/entypo.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet" type="text/css" media="all" />
    </head>


    <body>

        <div class="nav-container">
        </div>
        <div class="main-container">
            <section class="space-sm">
                <div class="container align-self-start">
                    <div class="row mb-5">
                        <div class="col text-center">
                            <a href="#">
                                <img alt="Image" src="{{ asset('img/logo-gray.svg') }}" />
                            </a>
                        </div>
                        <!--end of col-->
                    </div>
                    <!--end of row-->
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 col-lg-7">
                            <div class="card card-lg text-center">
                                <div class="card-body">
                                    <div class="mb-5">
                                        <h1 class="h2 mb-2">Hello again</h1>
                                        <span>Sign in to your account to continue</span>
                                    </div>
                                    <div class="row no-gutters justify-content-center">
                                        <form class="text-left col-lg-8" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                            @csrf

                                            <div class="form-group">
                                                <label for="login-email">{{ __('E-Mail Address') }}</label>
                                                <input class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" id="login-email" value="{{ old('email') }}" placeholder="Email Address" required autofocus />
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="login-password">{{ __('Password') }}</label>
                                                <input class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" id="login-password" value="{{ old('password') }}" placeholder="Enter a password" required autofocus />

                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif

                                                <small> {{ __('Forgot Your Password?') }} <a href="{{ route('password.request') }}">Reset here</a>
                                                </small>
                                            </div>

                                            <div>


                                                <div class="custom-control custom-checkbox align-items-center">
                                                    <input type="checkbox" class="custom-control-input" ame="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label text-small" for="check-remember">{{ __('Remember Me') }}</label>
                                                </div>
                                            </div>
                                            <div class="text-center mt-3">
                                                <button type="submit" class="btn btn-lg btn-primary">{{ __('Login') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!--end of row-->
                                </div>
                            </div>
                            <div class="text-center">
                                <span class="text-small">Don't have an account yet? <a href="{{ route('register') }}">Create one</a>
                                </span>
                            </div>
                        </div>
                        <!--end of col-->
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <!--end of section-->
        </div>


        <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/ajax/libs/popper.js/1.13.0/umd/popper.min.js') }}" ></script>
        <script type="text/javascript" src="{{ asset('js/js/jquery.smartWizard.min.js') }}" ></script>
        <script type="text/javascript" src="{{ asset('js/ajax/libs/flickity/2.0.10/flickity.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/scrollMonitor.js ') }}""></script>
        <script type="text/javascript" src="{{ asset('js/ajax/libs/smooth-scroll/12.1.5/js/smooth-scroll.polyfills.min.js') }}" ></script>
        <script type="text/javascript" src="{{ asset('js/ajax/libs/prism/1.10.0/prism.min.js') }}" ></script>
        <script type="text/javascript" src="{{ asset('js/zoom.min.js') }}" ></script>
        <script type="text/javascript" src="{{ asset('js/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js') }}" ></script>
        <script type="text/javascript" src="{{ asset('js/assets/js/theme.js') }}" ></script>


    </body>
</html>

