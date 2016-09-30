<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\Tag;

class BlogController extends Controller
{
    public function getIndex() {

        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::all();
        $tags = Tag::all();

        return view('blog.index')->with('posts', $posts)->with('categories', $categories)->with('tags', $tags);
    } 

    public function getSingle($slug) {

    	$post = Post::where('slug', '=', $slug)->first();

    	return view('blog.single')->with('post', $post);
    }
}
