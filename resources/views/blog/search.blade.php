@extends('layouts.layout')

@section('title', "Search Results")

@section('content') 

<hr>
<div class="row">
  <div class="col-md-6 col-md-offset-1">
	<h3>{{ $posts->count() }} {{ $posts->count() == 1 ? 'Result':'Results' }} Found For: <b><u>{{ $search }}</u></b></h3>
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
                <th>Posted On</th>
		      	<th>Title</th>
		      	<th>Category</th>
		      	<th>Tags</th>
		      	<th>Body</th>	
            </thead>
            
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</td>
		            <td><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></td>
		            <td><a href="{{ route('blog.category', $post->category->id) }}">{{ $post->category->name }}</a></td>
		            <td>@foreach ($post->tags as $tag)
		              		<h4 id="heading"><span class="label label-warning"><a href="{{ route('blog.tag', $tag->id) }}">{{ $tag->name }}</a></span></h4>
		              	@endforeach
		            </td>
		            <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}
		            </td>
                </tr>
                @endforeach
            </tbody>
      </table>
  </div>
</div>
<hr>

@stop