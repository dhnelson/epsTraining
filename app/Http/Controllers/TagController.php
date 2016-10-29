<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagFormRequest;
use App\Tag;


class TagController extends Controller
{   
    /*
    |--------------------------------------------------------------------------
    | Blog Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles displaying, saving, editing, and deleting tags.
    |
    */
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('name', 'asc')->paginate(10);

        return view('tags.index')->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagFormRequest $request)
    {
        $tag = new Tag;

        $tag->name = $request->name;

        $tag->save();

        flash()->overlay('Thanks!', 'Your New Tag Was Created Successfully');

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);

        return view('tags.show')->with('tag', $tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('tags.edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagFormRequest $request, $id)
    {
        $tag = Tag::find($id);

        $tag->name = $request->name;

        $tag->save();

        flash()->overlay('Thanks!', 'Your Tag Was Updated Successfully');

        return redirect()->route('tags.show', $tag ->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

        $tag->posts()->detach();

        $tag->delete();

        flash()->success('Thanks!', 'Your Tag Was Deleted Successfully');

        return redirect()->route('tags.index');
    }
}
