@extends('layouts.layout')

@section('title', 'Posts')

@section('content') 

@if(Auth::check())         
	
		<div class="row">
			<div class="col-md-10 col-md-offset-1" id="backend-comments">
				<h3>Comments </h3>
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="100px">Blog Post</th>
								<th>Comment</th>
								<th width="100px">Created On</th>
								<th width="90px">Edit</th>
								<th width="90px">Delete</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($comments as $comment)
								@if (Auth::user()->email == $comment->email)
									<tr>
										<td>{{ $comment->post->title }}</td>
										<td class="text-justify">{!! $comment->comment !!}</td>
										<td>{{ date('M j, Y h:ia', strtotime($comment->created_at)) }}</td>
										<td>
											<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-default btn-md"><span class="glyphicon glyphicon-pencil"></span></a>
										</td>
										<td>	
											<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span></a>
										</td>
									</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				<hr>
			</div>
		</div>

@endif


@stop