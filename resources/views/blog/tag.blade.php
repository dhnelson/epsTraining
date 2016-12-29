@extends('layouts.layout')

<?php $tagName = htmlspecialchars($tag->name); ?>
@section('title', "Posts With $tagName Tag")

@section('content') 

<hr>
<div class="row">
  	<div class="col-md-6 col-md-offset-1">
		<h3>Tag: {{ $tag->name }} <small>{{ $tag->posts->count() }} {{ $tag->posts->count() == 1 ? 'Post':'Posts' }}</small></h3>
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
		      	<th>Related Tags</th>
		      	<th>{{ $tag->posts->count() == 1 ? 'Related Category':'Related Categories' }}</th>
		      	<th>{{ $tag->posts->count() == 1 ? 'Related Post':'Related Posts' }}</th>
		      	<th>Created On</th>
	      	</thead>
		      	<tbody>
			      	@foreach ($tag->posts as $post)
				      	<tr>
				      	    <td>
				      	    	@foreach ($post->tags as $tag)
			              			<h4 id="heading"><span class="label label-default"> {{ $tag->name }}</span></h4>
			              	  	@endforeach
			              	</td>
			              	<td>{{ $post->category->name }}</td>
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