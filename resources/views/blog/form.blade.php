{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

    @if (isset($parentId))
        <input name="parent_id" type="hidden" value="{{ $parentId }}"></input>
    @endif
	
<div class="reply-spacing">
	<button type="button" class='Button'><small>Click to Reply</small></button>
		<div id="toggle" style="display: none;">
		    <div class="form-group">
		        {{ Form::textarea('comment', null, ['class'=>'form-control', 'rows'=>'3', 'placeholder'=>'Reply to this comment']) }}
		    </div>

		    <div class="form-group">
		        {{ Form::submit('Reply', ['class'=>'btn btn-success btn-block']) }}
		    </div>
		</div>
</div>
{!! Form::close() !!}


