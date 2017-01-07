@extends('layouts.layout')

@section('title', 'Edit Posts')

@section('content') 

<div class="row">
	{!!  Form::model($post, ['route' => ['posts.update', $post->id], 'data-parsley-validate' => '', 'method' => 'PATCH', 'files' => true]) !!}
    <div class="col-md-6 col-md-offset-1">
        
        <div class="form-group">
            {{ Form::label('Edit Author:') }}
            {{ Form::text('author', null, array('required' => '', 'class'=>'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('Edit Title:') }}
            {{ Form::text('title', null, 
                array('required' => '', 'class'=>'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('Edit Slug:') }}
            {{ Form::text('slug', null, 
                array('required' => '', 'class'=>'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('category_id', 'Edit Category:') }}
            {{ Form::select('category_id', $categories, null, array('required' => '', 'class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('tags', 'Edit Tags:') }}
            {{ Form::select('tags[]', $tags, null, array('class' => 'form-control select2-multi', 'multiple' => 'multiple', 'style' => 'width: 100%;')) }}
        </div>

        <div class="form-group">
            {{ Form::label('featured_image', 'Update Image:') }}
            {{ Form::file('featured_image') }}
        </div>

        <div class="form-group">
            {{ Form::label('Edit Body:') }}
            {{ Form::textarea('body', null, array('class'=>'form-control')) }}
        </div>
    </div>

    <div class="col-md-4 edit-box-spacing">
    	<div class="well">
        <dl class"dl-horizontal">
          <dt>Url Slug:</dt>
          <dd><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></dd>
        </dl>

    		<dl class"dl-horizontal">
    			<dt>Created On:</dt>
    			<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
    		</dl>

    		<dl class"dl-horizontal">
    			<dt>Last Updated:</dt>
    			<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
   		  </dl>
    		<hr>
  	  			<div class="row">
        	     <div class="col-md-6">
        		      {{ Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) }}	
  	  		     </div>
  	  				   
            <div class="col-md-6">
  	  			    {{ Form::submit('Save Changes', array('class' => 'btn btn-success btn-block')) }}  		
  	  			</div>

            <div class="col-md-12">
                {{ Html::linkRoute('posts.index', '<< See All Posts', [], array('class' => 'btn btn-default btn-block btn-h1-spacing')) }}
            </div>  
      		</div>
      	</div>
      </div>
  {!! Form::close() !!}
</div>

@include('js._posts')

<script type="text/javascript">
  $(".select2-multi").select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
</script>

@stop