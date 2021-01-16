<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        @livewireStyles
    </head>
    <body>
        <!-- Global header -->
        <div id="header">
            <div class="d-flex h-100">
                <img src={{ asset('logo.png')}}>
                <h1 class="w-auto mr-3">Officers Academy</h1>

                @if(Session::has('code'))
                    <div id="session-code" class="d-flex flex-column align-items-center h-100 border-left border-right">
                        <div class="w-100 border-bottom pl-4 pr-4">Session code</div>
                        <div class="d-flex justify-content-center align-items-center flex-grow-1">
                                {{Session::get('code')}}
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Content -->
        <div class="container">
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        @livewireScripts
    </body>
</html>
