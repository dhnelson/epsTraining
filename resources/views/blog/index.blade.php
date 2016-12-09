@extends('layouts.layout')

@section('title', 'Blog')

@section('content') 

<div class="row">
    <div class="col-md-10 col-md-offset-1">
            <div class="col-md-9">
                <h1 class="well text-center">Welcome to the EPS Blog!</h1>
                    @foreach ($posts as $post)
                        <div class="well">
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
                                
                                <div>
                                    <span class="fa fa-folder-open" aria-hidden="true"></span> {{ $post->category->name }} &nbsp; | &nbsp; <span class="fa fa-tags" aria-hidden="true"></span>
                                        @foreach ($post->tags as $tag)
                                            <h5 id="heading"><span class="label label-success"> {{ $tag->name }}</span></h5>
                                        @endforeach
                                </div>
                            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary btn-h1-spacing">Read More</a> 
                        </div>     
                    @endforeach   
                {!! $posts->links(); !!} 
            </div>
        @include('blog.sidebar')
    </div>
</div>   

@stop
