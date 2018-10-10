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
            <section class="fullwidth-split">
                <div class="container-fluid">
                    <div class="row no-gutters height-100 justify-content-center">
                        <div class="col-12 col-lg-6 fullwidth-split-image bg-dark d-flex justify-content-center align-items-center">
                            <img alt="Image" src="{{ asset('img/photo-man-diary.jpg') }}" class="bg-image position-absolute opacity-30" />
                            <div class="col-12 col-sm-8 col-lg-9 text-center pt-5 pb-5">
                                <img alt="Image" src="{{ asset('img/logo-white.svg') }}" class="mb-4 logo-lg" />
                                <span class="h3 mb-5">Start creating and organizing all your contacts!</span>

                                <div class="card text-left">
                                    <div class="card-body">
                                        <div class="media">
                                            <img alt="Image" src="{{ asset('img/avatar-female-2.jpg') }}"  class="avatar" />
                                            <div class="media-body">
                                                <p class="mb-1">
                                                    “Its easier now to store and access my contacts from anywhere in this world”
                                                </p>
                                                <small>Lucille Freebody, Product Designer</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--end of col-->
                        </div>
                        <!--end of col-->
                        <div class="col-12 col-sm-8 col-lg-6 fullwidth-split-text">
                            <div class="col-12 col-lg-8 align-self-center">
                                <div class="text-center mb-5">
                                    <h1 class="h2 mb-2">Get started</h1>
                                    <span>Start creating and organizing all your contacts</span>
                                </div>
                               <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                    @csrf
                                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                                <div class="text-center">
                                    <span class="text-small">Already have an account? <a href="{{ route('login') }}">Log in here</a>
                                    </span>
                                </div>
                            </div>
                            <!--end of col-->
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

