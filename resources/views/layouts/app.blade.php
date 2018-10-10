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
            <div class="bg-dark navbar-dark" data-sticky="top">
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{ url('/') }}"><i class="ion-android-call"></i> {{ __('home.app') }}</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="icon-menu h4"></i>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{ url('/home') }}" class="nav-link">Home</a>
                                </li>
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </li>
                                 @else

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown">People</a>
                                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                                        <a class="dropdown-item" href="{{ url('/add-contact') }}">
                                            <span class="h6 mb-0">Add Contact</span>
                                            <p class="text-small text-muted">Add a new Contact</p>
                                        </a>

                                        <div class="dropdown-divider"></div>


                                        <a class="dropdown-item" href="{{ url('/') }}">
                                            <span class="h6 mb-0">My Friends</span>
                                            <p class="text-small text-muted">View Your Friends</p>
                                        </a>

                                        <div class="dropdown-divider"></div>


                                        <a class="dropdown-item" href="{{ url('/') }}">
                                            <span class="h6 mb-0">Groups</span>
                                            <p class="text-small text-muted">Oraganize contacts as groups</p>
                                        </a>


                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="componentsDropdown" role="button" data-toggle="dropdown">Contacts</a>
                                    <div class="dropdown-menu" aria-labelledby="componentsDropdown">

                                        {{-- <a class="dropdown-item" href="components-bootstrap.html">Bootstrap</a>

                                        <a class="dropdown-item" href="components-wingman.html">Wingman</a> --}}

                                    </div>
                                </li>
                            </ul>




                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle dropdown-toggle-no-arrow p-lg-0" href="http://example.com/" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img alt="Image" src="{{ asset('img/avatar-male-3.jpg') }}" class="avatar avatar-xs" /> {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" aria-labelledby="dropdown01">
                                         @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                                @endforeach
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Settings</a>

                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="ion-exit"></i> {{ __('Logout') }}
                                         </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             @csrf
                                        </form>

                                    </div>
                                </li>
                            </ul>
                            @endguest
                        </div>
                        <!--end nav collapse-->
                    </nav>
                </div>
                <!--end of container-->
            </div>
        </div>
        <div class="main-container">

            <nav aria-label="breadcrumb" role="navigation" class="bg-primary text-white">
                <div class="container">
                    <div class="row justify-content-center">
                        @guest
                            <h3> Welcome ! </h3>
                        @else
                             <div class="col-md-6">
                                    <a href="{{ url('/add-contact') }}" class="btn btn-primary"><i class="icon-add-user mr-1"></i> Add Contact</a>
                                </div>
                            <div class="col" style="padding: 5px;">

                                <div class="col-md-6">
                                    <form class="form-inline col p-0 pl-md-2 pr-md-3">
                                        <input class="form-control w-100" type="search" id="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        @endguest
                        <!--end of col-->
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </nav>

            <div id="app" class="container">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                    <main class="all-contacts">
                        @yield('content')
                    </main>
           </div>

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

        <script type="text/javascript">

            $('#search').on('keyup',function(){
                $value=$(this).val();

                $.ajax({
                type : 'get',
                url : '{{URL::to('search')}}',
                data:{'search':$value},
                success:function(data){
                    $('.all-contacts').html(data);
                }
                });
            })
        </script>

        <script type="text/javascript">

            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

        </script>

        <script>
            (function ($) {

                $(function () {

                    var addFormGroup = function (event) {
                        event.preventDefault();

                        var $formGroup = $(this).closest('.form-group');
                        var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
                        var $formGroupClone = $formGroup.clone();

                        $(this)
                            .toggleClass('btn-success btn-add btn-danger btn-remove')
                            .html('–');

                        $formGroupClone.find('input').val('');
                        $formGroupClone.insertAfter($formGroup);

                        var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                        if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                            $lastFormGroupLast.find('.btn-add').attr('disabled', true);
                        }
                    };

                    var removeFormGroup = function (event) {
                        event.preventDefault();

                        var $formGroup = $(this).closest('.form-group');
                        var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

                        var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                        if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                            $lastFormGroupLast.find('.btn-add').attr('disabled', false);
                        }

                        $formGroup.remove();
                    };

                    var countFormGroup = function ($form) {
                        return $form.find('.form-group').length;
                    };

                    $(document).on('click', '.btn-add', addFormGroup);
                    $(document).on('click', '.btn-remove', removeFormGroup);

                });
        })(jQuery);
    </script>

</body>
</html>