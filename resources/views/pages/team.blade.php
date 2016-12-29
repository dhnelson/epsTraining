@extends('layouts.layout')

@section('title', 'The Team')

@section('content') 

<div class="row">
  	<div class="col-sm-5 col-sm-offset-1"><br>
  		<div class="well well-spacing">
		  	<h1 class="text-center">Robbie Flores</h1>
		    	<p class="text-justify indent">  
					Robbie motivates his clients to push and focus as he teaches them how to better maximize each and every movement. He is incredibly motivating interjecting both tough love and humor into his sessions. Robbie believes that training has a therapeutic aspect as it centers the mind, the body, and the soul.
				</p>
		</div>
	</div>
	<div class="col-sm-5"><br>
		<div class="well">
			<img src="{{ url('images/robbie.jpg') }}" class="img-responsive img-rounded center-block" alt="Gym pic" width="500" height="500">
		</div>
	</div>
	<div class="col-sm-5 col-sm-offset-1"><br>
		<div class="well">
			<h2>More Trainers Coming Soon...</h2>
		</div>
	</div>
</div>

@stop