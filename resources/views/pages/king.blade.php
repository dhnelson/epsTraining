@extends('layouts.layout')

@section('title', 'The King')

@section('content') 

<div class="row">
  	<div class="col-sm-5 col-sm-offset-1"><br>
  		<div class="well well-spacing">
		  	<h1 class="text-center">About The King</h1>
		    	<p class="text-justify indent">  
					Ray is an athlete who has turned his years of hard work on the playing field into a specialized career off. A Bigger Faster Stronger (BFS) certified Strength &amp; Conditioning coach, Level 1 Crossfit instructor, member of the National Strength &amp; Conditioning Association (NSCA), and former Director of Sports Performance at Velocity Sports Performance, Ray provides an elite level of athletic training.
				</p>
				<p class="text-justify indent"> 
					His clients range from professional athletes to the stay at home mom. As a two-sport athlete in college he twice lettered in track and field at Pace University, and was a member of the schools fastest 4x100 meter team.  While playing football he was not only team captain, but also a 4 year starter, an all-conference and all-american honoree, and set school records for interceptions and fumble recoveries. This led to a successful career playing 2 seasons of professional football in Europe, and 1 season in the U.S. Arena football league. A knee injury ended his football career, but not his athletic career.
				</p> 
				<p class="text-justify indent"> 
					Presently he competes in bodybuilding and powerlifting at the national level where he is the current USAPL NJ state powerlifting Champion and the NPC Tri-State Bodybuilding Champion. Ray has also coached football and track &amp; field at every level including collegiate. His knowledge, innovative training tactics, and passion for training can take anyone to the next level! 
				</p>
		</div>
	</div>
	<div class="col-sm-5"><br>
		<div class="well">
			<img src="{{ url('images/ray/pose3.jpeg') }}" class="img-responsive img-rounded center-block" alt="Gym pic" width="450" height="400">
		</div>
	</div>
</div>


@stop