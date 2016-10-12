@extends('layouts.layout')

@section('title', 'New Blog Post')

@include('js._posts')

@section('content') 

<div class="row">
  <div class="col-sm-8 col-md-offset-2">
  	<h2 class="text-center">Create A New Blog Post!</h2>
  	 <hr>
      {!! Form::open (array('action' => 'PostController@store', 'data-parsley-validate' => '', 'files' => true)) !!} 

          <div class="form-group">
              {{ Form::label('Author:') }}
              {{ Form::text('author', null, array('required' => '', 'class'=>'form-control', 'placeholder'=>'Blog Post\'s Author')) }}
          </div>

          <div class="form-group">
              {{ Form::label('Title:') }}
              {{ Form::text('title', null, array('required' => '', 'class'=>'form-control', 'placeholder'=>'Blog Post\'s Title')) }}
          </div>

          <div class="form-group">
              {{ Form::label('Slug:') }}
              {{ Form::text('slug', null, array('required' => '', 'class'=>'form-control', 'placeholder'=>'Blog Post\'s Slug')) }}
          </div>

          <div class="form-group">
              {{ Form::label('category', 'Category:') }}
              {{ Form::select('category', $categories, null, array('required' => '', 'class' => 'form-control', 'placeholder'=>'Select')) }}
          </div>

          <div class="form-group">
              {{ Form::label('tags', 'Tags:') }}
              {{ Form::select('tags[]', $tags, null, array('class' => 'form-control select2-multi', 'multiple' => 'multiple', 'style' => 'width: 100%;')) }}
          </div>

          <div class="form-group">
              {{ Form::label('featured_image', 'Upload Image:') }}
              {{ Form::file('featured_image') }}
          </div>

          <div class="form-group">
              {{ Form::label('Body:') }}
              {{ Form::textarea('body', null, array('class'=>'form-control', 'placeholder'=>'Blog Post\'s Body')) }}
          </div>

          <div class="form-group">
              {{ Form::submit('Create Post', array('class'=>'btn btn-success btn-block btn-lg')) }}
          </div>

          <div class="form-group">
            {{ Html::linkRoute('posts.index', 'Cancel', [], array('class' => 'btn btn-danger btn-block btn-lg')) }} 
         </div>
         
      {!! Form::close() !!}    
    <hr>                   
  </div>
</div>

<script type="text/javascript">
  $('.select2-multi').select2();
</script>

@stop