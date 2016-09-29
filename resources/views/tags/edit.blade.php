@extends('layouts.layout')

<?php $titleTag = htmlspecialchars($tag->name); ?>
@section('title', "Edit Tag: $titleTag")

@section('content') 

<hr>
<div class="row">
{!!  Form::model($tag, ['route' => ['tags.update', $tag->id], 'data-parsley-validate' => '', 'method' => 'PATCH']) !!}
{{ csrf_field() }}
  <div class="col-md-6 col-md-offset-3">
    <div class="form-group">
        {{ Form::label('name', "Edit Tag Name:") }}
        {{ Form::text('name', null, array('required' => '', 'class'=>'form-control')) }}
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
    {{ Html::linkRoute('tags.index', 'Cancel', [], array('class' => 'btn btn-danger btn-block btn-h1-spacing')) }}
  </div>  
</div>
<hr>

@stop