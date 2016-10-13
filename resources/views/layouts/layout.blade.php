<!DOCTYPE HTML>
<html lang="eng">
    <head>
        @include('layouts._head')
    </head>    

    @include('layouts._js')

<body>

        @include('flash')

        @include('layouts._navigation')

    <div class="container-fluid">

        @include('layouts._a2a')

        @include('errors.error')

        @yield('content')
        
    </div> 

        @include('layouts._footer')

</body>
</html>

