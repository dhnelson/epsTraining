<!DOCTYPE HTML>
<html lang="eng">
    <head>
        <title>EPS | Home</title>
        @include('layouts._head')
    </head>    

<body style="background-color:#14191C;">

    @include('layouts.analyticstracking')

 	@include('layouts._navigation')

    @include('flash')

    @include('errors.error')

    @include('layouts._subscribePopup')

    <div class="container-fluid bgpic">
    	<div class="col-sm-5 col-sm-offset-1 text-center">
    		<div class="well well-spacing">
    			<h1><b>Welcome to EPS Training!</b></h1>
    			<h3 class="text-center">Best Personal Training in Jersey</h3>
    		</div>
    		<a href="{{ route('king') }}" class="btn btn-primary btn-lg btn-margin" role="button">Learn About Ray Padilla</a>
    		<a href="{{ route('services') }}" class="btn btn-success btn-lg btn-margin" role="button">Training Options &amp; Prices</a>
    	</div>
    </div> 

        @include('layouts._footer')

</body>
</html>