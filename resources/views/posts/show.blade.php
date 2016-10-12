@extends('layouts.layout')

@section('title', 'Posts')

@section('content') 


<div class="row">
  <div class="col-md-6 col-md-offset-1">
  	@if (isset($post->image))  
  	<br><img src="{{ asset('images/uploads/' . $post->image) }}" alt="blog photo" height="400" width="610" />
  	@endif
  	
	<h1>{{ $post->title }}</h1>
	 
	 <p class="lead text-justify">{!! $post->body !!}</p>
  </div>
  
  <div class="col-md-4 edit-box-spacing">
  	<div class="well">
  		<dl class"dl-horizontal">
  			<dt>Url Slug:</dt>
  			<dd><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></dd>
  		</dl>

  		<dl class"dl-horizontal">
  			<dt>Category:</dt>
  			<dd>{{ $post->category->name }}</dd> 
  		</dl>

  		<dl class="tags">
  			<dt>Tags:</dt>
  			<dd>
			@foreach ($post->tags as $tag)
				<h4 id="heading"><span class="label label-success">{{ $tag->name }}</span></h4>
			@endforeach
			</dd>
		</dl>

  		<dl class"dl-horizontal">
  			<dt>Created On:</dt>
  			<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
  		</dl>

  		<dl class"dl-horizontal">
  			<dt>Last Updated:</dt>
  			<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
 		</dl>
  		<hr>
  		
			<div class="row">
				<div class="col-md-6">
					{{ Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) }}
				</div>

				<div class="col-md-6">  	
					{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!} 

					{{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block')) }}  

					{!! Form::close() !!}		
				</div>	

				<div class="col-md-12">
					{{ Html::linkRoute('posts.index', '<< See All Posts', [], array('class' => 'btn btn-default btn-block btn-h1-spacing')) }}
				</div>			
			</div>
  	</div>
  </div>
</div>

<div class="row">
	<div class="col-md-10 col-md-offset-1" id="backend-comments">
		<h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="250px">Name</th>
						<th width="250px">Email</th>
						<th>Comment</th>
						<th width="100px">Delete</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($post->comments as $comment)
					<tr>
						<td>{{ $comment->name }}</td>
						<td>{{ $comment->email  }}</td>
						<td class="text-justify">{!! $comment->comment !!}</td>
						<td><a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		<hr>
	</div>
</div>

@stop