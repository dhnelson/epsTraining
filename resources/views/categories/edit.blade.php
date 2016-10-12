@extends('layouts.layout')

<?php $titleCategory = htmlspecialchars($category->name); ?>
@section('title', "Edit Category: $titleCategory")

@section('content') 

<hr>
<div class="row">
  {!!  Form::model($category, ['route' => ['categories.update', $category->id], 'data-parsley-validate' => '', 'method' => 'PATCH']) !!}
  <div class="col-md-6 col-md-offset-3">
      <div class="form-group">
          {{ Form::label('name', "Edit Category Name:") }}
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
    {{ Html::linkRoute('categories.index', 'Cancel', [], array('class' => 'btn btn-danger btn-block btn-h1-spacing')) }}
  </div>  
</div>
<hr>

@stop