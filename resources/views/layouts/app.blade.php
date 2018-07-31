<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Phonebook') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="{{ asset('js/jquery-1.11.1.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet">
   
</head>
<body>
        <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="{{ url('/') }}"><i class="ion-android-call"></i> PhoneBook</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="navbarNavDropdown" class="navbar-collapse collapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/home') }}"><i class="ion-home"></i> Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/add-contact') }}"><i class="ion-plus"></i> Add Contact</a>
                            </li>
                        </ul>
                        <ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>
                        <ul class="navbar-nav">
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                            @else
                            <form class="form-inline">
                                    @csrf
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ion-search"></i></span>
                                    </div>
                                    <input class="form-control mr-sm-2" type="text" id="search" name="search" placeholder="Search" aria-label="Search">
                                    
                            </form>
                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ion-person"></i> {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                         onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                                           <i class="ion-exit"></i> {{ __('Logout') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                     </form>
                                               
                                    </div>
                                </li>
                                @endguest
                        </ul>
                    </div>
                </nav>
            </div>
       

<!-- ------------------------------------------------------------------------------------------------------ -->
   
    <div id="app" class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <main>
            @yield('content')
        </main>
    </div>

<!-- ------------------------------------------------------------------------------------------------------ -->
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
 
</body>
</html>
