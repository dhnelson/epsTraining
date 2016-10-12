@extends('layouts.layout')

@section('title', 'All Tags')

@section('content') 

<div class="row">
	<div class="col-md-7 col-md-offset-1">
		<h1>Tags:</h1>

    	<table class="table table-bordered table-hover">
      	<thead>
	      	<th>Name</th>
          <th>Created On</th>
          <th>Show Tag | Edit Tag</th>
      	</thead>

      	<tbody>
      	
	    @foreach ($tags as $tag)
		    <tr>
          	<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
            <td>{{ date('M j, Y h:ia', strtotime($tag->created_at)) }}</td>
            <td>
                <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-default btn-sm">Show</a>
                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-default btn-sm">Edit</a>
            </td>
        </tr>
	    @endforeach

      	</tbody>

    	</table>
	</div>

  <div class="col-md-3 form-spacing-top">
  	<div class="well">
  		{!! Form::open (array('action' => 'TagController@store', 'data-parsley-validate' => '',)) !!} 

      	<div class="form-group">
          {{ Form::label('Name:') }}
          {{ Form::text('name', null, 
              array('required' => '', 'class'=>'form-control', 'placeholder'=>'Tag Name')) }}
  		  </div>

  		  <div class="form-group">
              {{ Form::submit('Create New Tag', array('class'=>'btn btn-primary btn-block btn-lg')) }}
        </div>

      {!! Form::close() !!}    
  	</div>
  </div>
</div>

@stop