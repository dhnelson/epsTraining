<!DOCTYPE HTML>
<html lang="eng">
    <head>
        @include('layouts._head')
    </head>    

        @include('layouts._js')

<body>
        @include('layouts.analyticstracking')
        
        @include('flash')

        @include('layouts._navigation')

        @include('errors.error')

    <div class="container-fluid">

        @include('layouts._a2a')

        @yield('content')
        
    </div> 

        @include('layouts._footer')

</body>
</html>

