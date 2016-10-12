<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\Tag;
use Purifier;
use Illuminate\Support\Collection;

class BlogController extends Controller
{
    public function index() {

        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::all();
        $tags = Tag::all();

        return view('blog.index')->with('posts', $posts)->with('categories', $categories)->with('tags', $tags);
    } 

    public function single($slug) {

    	$post = Post::where('slug', '=', $slug)->first();

    	return view('blog.single')->with('post', $post)->with('comments', $post->getThreadedComments());
    }

    public function category($id) {

        $category = Category::find($id);

        return view('blog.category')->with('category', $category);
    }

    public function tag($id) {

        $tag = Tag::find($id);

        return view('blog.tag')->with('tag', $tag);
    }

    public function search() {

        Purifier::clean($search = \Request::get('keyword')); 
 
        $posts = Post::where('body','like','%'.$search.'%')->orderBy('title')->paginate(20);
     
        return view('blog.search', compact('posts'))->with('search', $search);
    }
}
