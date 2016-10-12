@extends('layouts.layout')

@section('title', 'All Categories')

@section('content') 

<div class="row">
	<div class="col-md-7 col-md-offset-1">
		<h1>Categories:</h1>

    	<table class="table table-bordered table-hover">
	      	<thead>
		      	<th>Name</th>
            <th>Created On</th>
            <th width="150px">Edit Category</th> 
	      	</thead>

      	<tbody>
      	
	    @foreach ($categories as $category)
	        <tr>
            	<td>{{ $category->name }}</td>
              <td>{{ date('M j, Y h:ia', strtotime($category->created_at)) }}</td>
              <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-default btn-block btn-sm">Edit</a></td>
         	</tr>
	    @endforeach

      	</tbody>

    	</table>
	</div>

	<div class="col-md-3 form-spacing-top">
		<div class="well">
			{!! Form::open (array('action' => 'CategoryController@store', 'data-parsley-validate' => '')) !!} 
          
      <div class="form-group">
          {{ Form::label('Name:') }}
          {{ Form::text('name', null, array('required' => '', 'class'=>'form-control', 'placeholder'=>'Category Name')) }}
			</div>

			<div class="form-group">
          {{ Form::submit('Create New Category', array('class'=>'btn btn-primary btn-block btn-lg')) }}
      </div>

      {!! Form::close() !!}    
		</div>
  </div>
</div>

@stop