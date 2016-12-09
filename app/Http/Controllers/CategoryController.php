<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Category Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles displaying, saving, and editing categories.
    |
    */
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories = Category::orderBy('name', 'asc')->paginate(10);

        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        $category = new Category;

        $category->name = $request->name;
       
        if (!$category->save()) {
            flash()->overlay('Error!', 'Action Unsuccessful', $level = 'error');
        }

        flash()->overlay('Thanks!', 'Your New Category Was Created Successfully');

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;

        if (!$category->save()) {
            flash()->overlay('Error!', 'Action Unsuccessful', $level = 'error');
        }

        flash()->overlay('Thanks!', 'Your Category Was Updated Successfully');

        return redirect()->route('categories.show', $category->id);
    }
}
