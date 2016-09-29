@extends('layouts.layout')

<?php $titleTag = htmlspecialchars($tag->name); ?>
@section('title', "Tag: $titleTag ")

@section('content') 

<hr>
<div class="row">
  <div class="col-md-6 col-md-offset-1">
	<h1>Tag: {{ $tag->name }} <small>{{ $tag->posts()->count() }} Posts</small></h1>
  </div>

  <div class="col-md-2">
  	<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-block pull-right form-spacing-top">Edit Tag</a>
  </div>
  
  <div class="col-md-2 form-spacing-top">
	{!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!} 

	{{ Form::submit('Delete Tag', array('class' => 'btn btn-danger btn-block')) }}  

	{!! Form::close() !!}
  </div>
    
  <div class="col-md-4">
    {{ Html::linkRoute('tags.index', '<< See All Tags', [], array('class' => 'btn btn-default btn-block btn-h1-spacing')) }}
  </div> 
</div>
<br>
<div class="row">
  <div class="col-sm-10 col-md-offset-1">
      <table class="table table-bordered table-hover">
	      <thead>
	      	<th>Post Title</th>
	      	<th>Post Tags</th>
	      	<th>View Post | Edit Post</th>
	      </thead>

	      <tbody>
	      	
	      @foreach ($tag->posts as $post)
		      <tr>
	              <td>{{ $post->title }}</td>
	              <td>@foreach ($post->tags as $tag)
	              		<h4 id="heading"><span class="label label-default"> {{ $tag->name }}</span></h4>
	              	  @endforeach
	              </td>
	              <td><a href="{{ route('posts.show', $post->id ) }}" class="btn btn-default btn-sm">View</a> 
	              	  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>
	              </td>
           	  </tr>
	      @endforeach

	      </tbody>
      </table>
  </div>
</div>
<hr>

@stop