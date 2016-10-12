{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

    @if (isset($parentId))
        <input name="parent_id" type="hidden" value="{{ $parentId }}"></input>
    @endif

    <div class="form-group">
        {{ Form::textarea('comment', null, ['class'=>'form-control', 'id'=>'reply', 'rows'=>'4', 'placeholder'=>'Reply to this comment']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Reply', ['class'=>'btn btn-success', 'id'=>'reply']) }}
    </div>
{!! Form::close() !!}

