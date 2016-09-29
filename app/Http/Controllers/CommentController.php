<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CommentFormRequest;
use App\Comment;
use App\Post;
use Auth;
use Purifier;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->paginate(10);

        return view('comments.index')->with('comments', $comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentFormRequest $request, $post_id)
    {
        $post = Post::find($post_id);

        $comment = new Comment();

        $comment->name     = Auth::user()->name;
        $comment->email    = Auth::user()->email;
        $comment->comment  = Purifier::clean($request->comment);
        $comment->approved = true;
        $comment->post()->associate($post);

        $comment->save();

        flash()->success('Thanks!', 'Your Comment Was Submitted');

        return redirect()->route('blog.single', [$post->slug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('comments.edit')->with('comment', $comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentFormRequest $request, $id)
    {
        $comment = Comment::find($id);

        $comment->comment  = Purifier::clean($request->comment);
        $comment->save();

        flash()->success('Thanks!', 'Your Comment Was Updated');

        return redirect()->route('blog.single', $comment->post->slug);        
    }

    public function delete($id)
    {
        $comment = Comment::find($id);

        return view('comments.delete')->with('comment', $comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        $comment->delete();  

        flash()->success('Thanks!', 'Your Comment Was Deleted');

        return redirect()->route('blog.single', $comment->post->slug);   
    }
}
