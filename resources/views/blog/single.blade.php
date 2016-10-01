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
  <div class="col-md-6 form-group col-md-offset-2" id="comment-form">
    {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
    {{ csrf_field() }}

        <div class="form-group">
          {{ Form::label('comment', 'Comment:') }}
          {{ Form::textarea('comment', null, array('class'=>'form-control', 'rows'=>'8', 'placeholder'=>'Let Me Know What You Think')) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Submit Comment', array('class'=>'btn btn-success btn-block')) }}
        </div>
    {!! Form::close() !!}       
  </div>
</div>
@else
<div class="row">
  <div class="col-md-6 col-md-offset-2">
    <h3><a href="{{ url('/login') }}">Login</a> or <a href="{{ url('/register') }}">Register</a> to Leave a Comment</h3> 
  </div> 
</div>
@endif

<div class="row">
  <div class="col-md-6 col-md-offset-2">
    <h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>
      {{ $post->comments()->count() }} {{ $post->comments()->count() == 1 ? 'Comment':'Comments' }}
    </h3>

      @foreach($post->comments as $comment)
        <div class="comment">
          <div class="author-info">
            <img class="author-image" src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?d=identicon" }}" >
            <div class="author-name">
              <h4>{{ $comment->name }}     
                @if(Auth::check())         
                  @if (Auth::user()->email == $comment->email)
                  <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                  <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
                  @endif 
                @endif
              </h4>
              <p class="author-time">{{ date('F nS, Y - g:iA', strtotime($comment->created_at)) }}</p>
            </div>
          </div>

          <div class="comment-content text-justify">
            {!! $comment->comment !!}
          </div>

        </div>
      @endforeach
  </div>
</div>



@stop