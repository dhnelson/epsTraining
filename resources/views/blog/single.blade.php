@extends('layouts.layout')

<?php $titlePost = htmlspecialchars($post->title); ?>
@section('title', "$titlePost")

@include('js._comments')

@section('content') 

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    @if (isset($post->image)) 
    <br> 
    <img class="img-rounded" src="{{ asset('images/uploads/' . $post->image) }}" alt="blog photo" height="400" width="820" />
    @endif
    
    <h1>{{ $post->title }}</h1>

    <div class="single-post-body-padding">
    <p class="text-justify">{!! $post->body !!}</p>
    </div>

    <div>
      <span class="fa fa-calendar" aria-hidden="true"></span> {{ date('M j, Y', strtotime($post->created_at)) }} &nbsp; | &nbsp;  
      <span class="glyphicon glyphicon-pencil"></span> {{ $post->author }} 
      <br><span class="fa fa-folder-open" aria-hidden="true"></span> {{ $post->category->name }} &nbsp; | &nbsp; 
      <span class="fa fa-tags" aria-hidden="true"></span>
         @foreach ($post->tags as $tag)
           <h5 id="heading"><span class="label label-success"> {{ $tag->name }}</span></h5>
         @endforeach
    <hr>         
    </div>
  </div> 
</div>

@if(Auth::check())      
  <div class="row">
    <div class="col-md-8 form-group col-md-offset-2" id="comment-form">
      {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

        <div class="form-group">
          <h2>
            {{ Form::label('comment', 'Comment:') }}
            {{ Form::textarea('comment', null, ['class'=>'form-control', 'rows'=>'3', 'placeholder'=>'Let Me Know What You Think']) }}
          </h2>
        </div>

        <div class="form-group">
            {{ Form::submit('Submit Comment', ['class'=>'btn btn-success btn-block']) }}
        </div>
      {!! Form::close() !!}       
    </div>
  </div>
@else
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h3><a href="{{ url('/login') }}">Login</a> or <a href="{{ url('/register') }}">Register</a> to Leave a Comment</h3> 
    </div> 
  </div>
@endif

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>
      {{ $post->comments()->count() }} {{ $post->comments()->count() == 1 ? 'Comment':'Comments' }}
    </h3>
    
    @include ('blog.list', ['collection' => $comments['root']])
  
  <br><hr>
  </div>
</div>

@stop