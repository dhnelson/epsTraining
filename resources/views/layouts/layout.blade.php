<!DOCTYPE HTML>
<html lang="eng">
    <head>
        @include('layouts._head')
    </head>    

<body>

        @include('layouts._js')

        @include('flash')

        @include('layouts._navigation')

        @include('layouts._a2a')
    
    <div class="container-fluid">

        @include('errors.error')

        @yield('content')
        
    </div> 

        @include('layouts._footer')

</body>
</html>

