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
            <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="btn btn-link" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="btn btn-link" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-link" href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
        </div>
          <body>

        <div class="nav-container">
        </div>
        <div class="main-container">
            <section class="space-sm">
                <div class="container">
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="height-80 flush-with-above">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-12 col-md-6 mb-4">
                            <img alt="Image" src="{{ asset('img/graphic-woman-writing.svg') }}" class="w-100" />
                        </div>
                        <!--end of col-->
                        <div class="col-12 col-md-7 col-lg-5 mb-4 text-center text-md-left">
                            <h1 class="display-3">Contacts</h1>
                            <h2 class="lead">Save and Organize Your Contacts!</h2>
                            <div>
                                @auth
                                    <a href="{{ url('/home') }}" class="btn btn-link">Go To Home</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-link">Login</a>
                                @endauth

                            </div>
                        </div>
                        <!--end of col-->
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <!--end of section-->
            <section class="space-sm flush-with-above">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <span class="text-muted text-small"> &copy 2018</span>
                        </div>
                        <!--end of col-->
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
        </div>

        <div class="modal fade" id="video-modal" tabindex="-1" aria-labelledby="video-modal-label" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-center-viewport">
                <div class="modal-content">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" data-src=_global.iframeSrc allowfullscreen></iframe>
                    </div>
                </div>
            </div>
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
