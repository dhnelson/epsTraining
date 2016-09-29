@extends('layouts.layout')

@section('title', 'Home')

@section('content') 

<div class="row">
  <div class="col-sm-8 col-md-offset-2">
  	<h1>DELETE THIS COMMENT</h1>
  	<p>
  		<strong>Comment: </strong><br>{!! $comment->comment !!}
  	</p>
  		{{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
  			{{ Form::submit('YES, DELETE THIS COMMENT', ['class' => 'btn btn-lg btn-block btn-danger']) }}
  		{{ Form::close() }}
  </div>
</div>
<br>
@stop