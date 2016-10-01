@extends('layouts.layout')

<?php $categoryName = htmlspecialchars($category->name); ?>
@section('title', "Posts With $categoryName Category")

@section('content') 

<hr>
<div class="row">
  <div class="col-md-6 col-md-offset-1">
	<h3>Category: {{ $category->name }} <small>{{ $category->posts->count() }} {{ $category->posts->count() == 1 ? 'Post':'Posts' }}</small></h3>
  </div>
  
  <div class="col-md-4 btn-h1-spacing">
    {{ Html::linkRoute('blog.index', '<< Back To Blog', [], array('class' => 'btn btn-default btn-block')) }}
  </div> 
</div>
<br>
<div class="row">
  <div class="col-sm-10 col-md-offset-1">
      <table class="table table-bordered table-hover">
	      <thead>
	      	<th>{{ $category->posts->count() == 1 ? 'Category':'Categories' }}</th>
	      	<th>{{ $category->posts->count() == 1 ? 'Related Post':'Related Posts' }}</th>
	      	<th>Created On</th>
	      </thead>

	      <tbody>
	      	
	      @foreach ($category->posts as $post)
		      <tr>
	              <td>{{ $category->name }}</td>
	              <td><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></td>
            	  <td>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</td>
           	  </tr>
	      @endforeach

	      </tbody>
      </table>
  </div>
</div>
<hr>

@stop