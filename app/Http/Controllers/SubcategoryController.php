<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sub = Subcategory::all();

        return view('admin.subcategory.index', [ 'sub' => $sub]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cat = Category::all();

        return view('admin.subcategory.create', [ 'cat' => $cat]);
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
            'name' => 'required|max:100',
            'cat_id' => 'required',
            'status' => 'required',
        ]);

        $sub = new Subcategory;
        $sub->name = $request->name;
        $sub->cat_id = $request->cat_id;
        $sub->status = $request->status;
        $sub->save();

        session()->flash('success', 'Subcategory addedd successfully');

        return redirect()->route('admin.subcategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cat = Category::all();

        $sub = Subcategory::find($id);

        return view('admin.subcategory.edit', [ 'sub' => $sub, 'cat' => $cat ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|max:100',
            'cat_id' => 'required',
            'status' => 'required'
        ]);

        $sub = Subcategory::find($id);
        $sub->name = $request->name;
        $sub->cat_id = $request->cat_id;
        $sub->status = $request->status;
        $sub->save();

        session()->flash('success', 'Subcategory updated successfully');

        return redirect()->route('admin.subcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sub = Subcategory::find($id)->delete();

        session()->flash('success', 'Subcategory deleted successfully');

        return redirect()->route('admin.subcategory');
    }
}
