<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\Tag;
use App\Subscribe;
use App\Http\Requests\SubscribeFormRequest;
use Purifier;
use Illuminate\Support\Collection;
use Mail;

class BlogController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Blog Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles all aspects of the blog icluding the list of all 
    | published posts, the full page of a single post, the list of all categories 
    | and tags, and a search bar.
    |
    */

    public function index() 
    {

        /* retrieves and returns a sampling of each blog post */
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::all();
        $tags = Tag::all();

        return view('blog.index')->with(['posts'=>$posts, 'categories'=>$categories, 'tags'=>$tags]);
    } 

    public function single($slug) 
    {
        /* returns request to see a blog post with comments */
        $post = Post::where('slug', '=', $slug)->first();

    	return view('blog.single')->with(['post'=>$post, 'comments'=>$post->getThreadedComments()]);
    }

    public function category($id) 
    {
        /* returns a category with all related posts */
        $category = Category::find($id);

        return view('blog.category')->with('category', $category);
    }

    public function tag($id) 
    {
        /* returns a tag with all related posts */
        $tag = Tag::find($id);

        return view('blog.tag')->with('tag', $tag);
    }

    public function search() 
    {
        /* searches all post bodies for entered keyword and displays all related information */
        Purifier::clean($search = \Request::get('keyword')); 
 
        $posts = Post::where('body','like','%'.$search.'%')->orderBy('title')->paginate(20);
     
        return view('blog.search')->with(['posts'=>$posts, 'search'=>$search]);
    }
}
