@extends('layouts.layout')

@section('title', 'Home')

@section('content') 

<div class="row">
    <div class="col-sm-8 col-md-offset-2">
  	    <h1>DELETE THIS COMMENT:</h1>
		  	<h5 class="delete-comment-spacing text-justify">{!! $comment->comment !!}</h5>
		
	  		{{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
	  		
	  		{{ Form::submit('YES, DELETE THIS COMMENT', ['class' => 'btn btn-lg btn-block btn-danger']) }}
	  		
	  		{{ Form::close() }}
  	</div>
</div>

<div class="row">  
    <div class="col-md-8 col-md-offset-2">
        {{ Html::linkRoute('blog.single', 'CANCEL', [$comment->post->slug], array('class' => 'btn btn-lg btn-warning btn-block btn-h1-spacing')) }}
    </div>  
</div>

@stop