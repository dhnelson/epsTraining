@extends('layouts.layout')

@section('title', 'Ray\'s Blog')

@section('content') 

<div class="row">
  <div class="col-sm-6">
  	<h1>All Posts</h1>
  </div>
  <div class="col-sm-6">
  	<a href="{{ route('contact.emailSubscribers') }}" class="btn btn-success btn-lg pull-right email-subscribers-btn">Email Subscribers</a> 
  	<a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg pull-right">Creat New Post</a>
  </div>
</div>
<br>
<div class="row">
      <div class="col-sm-12">
	      <table class="table table-bordered table-hover table-responsive">
		      <thead>
		      	<th>Posted On</th>
		      	<th>Title</th>
		      	<th>Slug</th>
		      	<th>Category</th>
		      	<th>Tags</th>
		      	<th>Body</th>	
		      	<th>View | Edit</th>
		      </thead>

		      <tbody>
		      	
		      @foreach ($posts as $post)
			      <tr>
		              <td>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</td>
		              <td>{{ $post->title }}</td>
		              <td>{{ $post->slug }}</td>
		              <td>{{ $post->category->name }} </td>
		              <td>@foreach ($post->tags as $tag)
		              		<h4 id="heading"><span class="label label-default"> {{ $tag->name }}</span></h4>
		              	  @endforeach
		              </td>
		              <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
		              <td>
		              	  <a href="{{ route('posts.show', $post->id ) }}" class="btn btn-default btn-sm">View</a> 
		              	  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>
		              </td>
	           	  </tr>
		      @endforeach

		      </tbody>
	      </table>
	      
	      {!! $posts->links(); !!}
	      
      </div>
</div>

@stop