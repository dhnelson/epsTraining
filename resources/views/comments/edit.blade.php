@extends('layouts.layout')

@section('title', "Edit Comment")

@include('js._comments')

@section('content') 

<hr>
<div class="row">
{!!  Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PATCH']) !!}
  <div class="col-md-6 col-md-offset-3">
  <h3>Edit Comment:</h3>
    <div class="form-group">
        {{ Form::textarea('comment', null, array('class'=>'form-control')) }}
    </div>
  </div>
</div>

<div class="row">    
  <div class="col-md-6 col-md-offset-3">
      {{ Form::submit('Save Changes', array('class' => 'btn btn-success btn-block')) }}     
  </div>
</div>
{!! Form::close() !!}
  
<div class="row">  
  <div class="col-md-6 col-md-offset-3">
    {{ Html::linkRoute('blog.single', 'Cancel', [$comment->post->slug], array('class' => 'btn btn-danger btn-block btn-h1-spacing')) }}
  </div>  
</div>
<hr>

@stop