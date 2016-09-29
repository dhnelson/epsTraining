@extends('layouts.layout')

@section('title', 'Photos')

@section('content') 

<div class="row">
  <div class="col-sm-10 col-md-offset-1">
	 <br>
	  <div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	      <li data-target="#myCarousel" data-slide-to="2"></li>
	      <li data-target="#myCarousel" data-slide-to="3"></li>
	      <li data-target="#myCarousel" data-slide-to="4"></li>
	      <li data-target="#myCarousel" data-slide-to="5"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner" role="listbox">

	      <div class="item active">
	        <img src="images/ray/squat.jpeg" alt="Ray Pic" width="700" height="625">
	      </div>

	      <div class="item">
	        <img src="images/ray/pose1.jpeg" alt="Ray Pic" width="550" height="625">
	      </div>

	      <div class="item">
	        <img src="images/ray/pose2.jpeg" alt="Ray Pic" width="550" height="625">
	      </div>
	    
	      <div class="item">
	        <img src="images/ray/pose3.jpeg" alt="Ray Pic" width="375" height="625">
	      </div>

	      <div class="item">
	        <img src="images/ray/pose4.jpeg" alt="Ray Pic" width="700" height="625">
	      </div>

	      <div class="item">
	        <img src="images/ray/pose5.png" alt="Ray Pic" width="380" height="625">
	      </div>

	    </div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	      <span class="sr-only">Next</span>
	    </a>
	  </div>
	<br>
  </div>
</div>

@stop