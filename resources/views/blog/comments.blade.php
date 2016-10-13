<div class="comment">
  <div class="author-info">
    <img class="author-image" src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?d=identicon" }}" >
    <div class="author-name">
      <h4>{{ $comment->name }}     
        @if(Auth::check())         
          @if (Auth::user()->email == $comment->email)
          <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
          <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
          @endif 
        @endif
      </h4>
      <p class="author-time">{{ date('F nS, Y - g:iA', strtotime($comment->created_at)) }}</p>
    </div>
  </div>

  <div class="comment-content text-justify">
    {!! $comment->comment !!}
  </div>

  @if (Auth::check())
      @include ('blog.form', ['parentId' => $comment->id])
  @endif

  @if (isset($comments[$comment->id]))
    <button type="button" class='Button pull-right'><small>Show More</small></button>
      <div id="toggle" style="display: none;">
        <ul id="comment-children">
          @include ('blog.list', ['collection' => $comments[$comment->id]])
        </ul>
      </div>
  @endif

</div>
