@extends('layouts.layout')

@section('title', 'Blog')

@section('content') 

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="col-md-9">
      <h1>Welcome to My Blog!</h1>
        @foreach ($posts as $post)
        <hr>
          @if (isset($post->image)) 
            <span class="blog-image-spacing">
            <img class="img-rounded" src="{{ asset('images/uploads/' . $post->image) }}" alt="blog photo" height="100" width="150" /> 
            </span>
          @endif
            <div class="blog-title-image-spacing">
              <h2 id="post-title-spacing">{{ $post->title }}</h2>
              <p><h5><span class="fa fa-calendar" aria-hidden="true"></span> {{ date('M j, Y', strtotime($post->created_at)) }} &nbsp; | &nbsp; <span class="glyphicon glyphicon-pencil"></span> {{ $post->author }} </h5></p>
            </div>

            <p class="text-justify post-body-padding">{{ substr(strip_tags($post->body), 0, 350) }}{{ strlen(strip_tags($post->body)) > 350 ? "..." : "" }}</p>
            <div><span class="fa fa-folder-open" aria-hidden="true"></span> {{ $post->category->name }} &nbsp; | &nbsp; <span class="fa fa-tags" aria-hidden="true"></span>
               @foreach ($post->tags as $tag)
                 <h5 id="heading"><span class="label label-success"> {{ $tag->name }}</span></h5>
               @endforeach
            </div>
            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary btn-h1-spacing">Read More</a>      
          @endforeach   
        <hr>
      {!! $posts->links(); !!} 
    </div>
      
    <div class="col-md-3 blog-index-sidebar">
      
        {!! Form::open(['method'=>'GET','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                  <span class="input-group-btn">
                    <button class="btn btn-primary btn-sm" type="submit">
                    <i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
        {!! Form::close() !!}

        <h3><u>Blog Posts</u></h3>
          @foreach ($posts as $post)
            <span><a>{{ $post->title }}</a></span>
          @endforeach 

        <h3><u>Categories</u></h3>
          @foreach ($categories as $category)
            <span><a>{{ $category->name }}</a></span>
          @endforeach 

        <h3><u>Tags</u></h3>
          @foreach ($tags as $tag)
            <span><a>{{ $tag->name }}</a></span>
          @endforeach    


          <p>
          Et pariatur autem tempore in et illum temporibus. Similique repudiandae dignissimos molestiae animi et. Laborum earum non et ullam est. Esse laboriosam facere et aliquam possimus. Officiis ut et aut accusantium qui. Recusandae quod reiciendis quis quidem sequi qui autem. Maiores unde odio reprehenderit. Fugit quibusdam et eum. Et dolorum consequuntur et autem est dolores adipisci. Ex et vitae sunt nisi accusantium dolores vero sit. Eligendi est vel occaecati quo id. Omnis praesentium itaque eaque sed voluptas fugit placeat voluptate. Similique magni est dolorem. Sint eum dolorem ea animi. Mollitia et vel qui. Necessitatibus neque labore dicta voluptatem dolores. Maxime hic eum ipsum nulla. Laborum ducimus et dolore. Aliquam aut fuga aut earum occaecati delectus. Blanditiis voluptatem provident qui sapiente repellendus impedit.  
          </p>            
    </div>

  </div>
</div>   

    

@stop