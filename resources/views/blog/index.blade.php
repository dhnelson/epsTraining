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
        <div class="blog-index-sidebar-contact">
            <dl>
                <dt class="red"><span class="glyphicon glyphicon-earphone"></span> Call or Text Me:</dt>
                    <ul>
                        <li><dd><span>Cell: <a href="tel:1-646-717-3142">(646) 717-3142</a></span></dd></li>
                        <li><dd><span>Gym: <a href="tel:1-973-887-2496">(973) 887-2496</a></span></dd></li>
                    </ul>
            </dl>
            <dl>
                <dt class="red"><span class="glyphicon glyphicon-globe"></span> My Social Media:</dt>
                    <ul>
                        <li><dd><a href="https://www.facebook.com/Evolution-Performance-Systems-131558953564049/?fref=ts"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></dd></li>
                    <li><dd><a href="https://www.instagram.com/eps_training"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></dd></li>
                    </ul>
            </dl> 
        </div>  
      
        {!! Form::open(['method'=>'GET', 'route'=>'blog.search', 'role'=>'keyword', 'class'=>'navbar-form navbar-left'])  !!}
            <div class="form-group">
                {{ Form::text('keyword', null, array('class'=>'form-control search-input-padding', 'placeholder'=>'Search Posts...')) }}

                {{Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm form-control search-button-padding'])}}
            </div>
        {!! Form::close() !!}

        <div class="blog-index-sidebar-content">
          <h4><u>Blog Posts</u></h4><br>
            @foreach ($posts as $post)
              <span><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }} </a></span>
            @endforeach <br><br>

          <h4><u>Categories</u></h4><br>
            @foreach ($categories as $category)
              <span><a href="{{ route('blog.category', $category->id) }}">{{ $category->name }} </a></span>
            @endforeach <br><br>

          <h4><u>Tags</u></h4><br>
            @foreach ($tags as $tag)
              <span><a href="{{ route('blog.tag', $tag->id) }}">{{ $tag->name }} </a></span>
            @endforeach <br><br>   
        </div>
    </div>

  </div>
</div>   

    

@stop