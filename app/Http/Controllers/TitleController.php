<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = Title::all();

        return view('admin.title.index', [ 'title' => $title ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.title.create');
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
            'title' => 'required|max:200',
            'status' => 'required'
        ]);

        $title = new Title;
        $title->title = $request->title;
        $title->status = $request->status;
        $title->save();

        session()->flash('success', 'Title added successfully');

        return redirect()->route('admin.title');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function show(Title $title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $title, $id)
    {
        //
        $title = Title::find($id);

        return view('admin.title.edit', [ 'title' => $title ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required|max:200',
            'status' => 'required'
        ]);

        $title = Title::find($id);
        $title->title = $request->title;
        $title->status = $request->status;
        $title->save();

        session()->flash('success', 'Title updated successfully');

        return redirect()->route('admin.title');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $title = Title::find($id)->delete();

        session()->flash('success', 'Title deleted successfully');

        return redirect()->route('admin.title');
    }
}
