@extends('layouts.layout')

@section('title', 'Blog')

@section('content') 

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <h1>Welcome to My Blog!</h1>
  </div>
</div>   
<!-- end of header .row -->

  
@foreach ($posts as $post)
<div class="row">
  <div class="col-md-10 col-md-offset-1">
      <hr>
        
      @if (isset($post->image)) 
        <div class="row">
          <div class="col-md-1">
            <img class="img-rounded" src="{{ asset('images/uploads/' . $post->image) }}" alt="blog photo" height="100" width="150" /> 
          </div>

          <div class="col-md-9 post-title-spacing">        
            <h2>{{ $post->title }}</h2>
              <p><h5><span class="fa fa-calendar" aria-hidden="true"></span> {{ date('M j, Y', strtotime($post->created_at)) }} &nbsp; | &nbsp;  <span class="glyphicon glyphicon-pencil"></span> {{ $post->author }}</h5></p>
          </div>
        </div>
      @else 
        <h2>{{ $post->title }}</h2>
        <p><h5><span class="fa fa-calendar" aria-hidden="true"></span> {{ date('M j, Y', strtotime($post->created_at)) }} | <span class="glyphicon glyphicon-pencil"></span> {{ $post->author }} </h5></p>
      @endif

        <p class="text-justify post-body-padding">{{ substr(strip_tags($post->body), 0, 350) }}{{ strlen(strip_tags($post->body)) > 350 ? "..." : "" }}</p>
        <div><span class="fa fa-folder-open" aria-hidden="true"></span> {{ $post->category->name }} &nbsp; | &nbsp; <span class="fa fa-tags" aria-hidden="true"></span>
           @foreach ($post->tags as $tag)
             <h5 id="heading"><span class="label label-success"> {{ $tag->name }}</span></h5>
           @endforeach
        </div>
        <br><a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>      
    </div>  
</div>
@endforeach   

<div class="row">
  <div class="col-md-10 col-md-offset-1"><hr>
    {!! $posts->links(); !!} 
  </div>
</div>

@stop