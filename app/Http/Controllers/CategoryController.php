<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = Category::all();

        return view('admin.category.index', [ 'cat' => $cat ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'cat_name' => 'required|max:100',
            'status' => 'required'
        ]);

        $cat = new Category;
        $cat->cat_name = $request->cat_name;
        $cat->status = $request->status;
        $cat->save();

        session()->flash('success', 'Category addedd successfully');

        return redirect()->route('admin.category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cat = Category::find($id);

        return view('admin.category.edit', [ 'cat' => $cat ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'cat_name' => 'required|max:100',
            'status' => 'required'
        ]);

        $cat = Category::find($id);
        $cat->cat_name = $request->cat_name;
        $cat->status = $request->status;
        $cat->save();

        session()->flash('success', 'Category updated successfully');

        return redirect()->route('admin.category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cat = Category::find($id);

        $post = POST::where('cat_id', $cat->id)->delete();

        $cat->delete();

        session()->flash('success', 'Category deleted successfully');

        return redirect()->route('admin.category');
    }
}