<?php

namespace App\Http\Controllers;

use App\Models\Newsvideo;
use Illuminate\Http\Request;

class NewsvideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $video = Newsvideo::all();

        return view('admin.newsvideo.index', [ 'video' => $video ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.newsvideo.create');
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
            'link' => 'required',
            'title' => 'required|max:100'
        ]);

        $newsvideo = new Newsvideo;

        $newsvideo->title = $request->title;
        $newsvideo->link = $request->link;
        $newsvideo->save();

        session()->flash('success', 'News video added successfully');

        return redirect()->route('admin.newsvideo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsvideo  $newsvideo
     * @return \Illuminate\Http\Response
     */
    public function show(Newsvideo $newsvideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsvideo  $newsvideo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $video = Newsvideo::find($id);

        return view('admin.newsvideo.edit', [ 'video' => $video ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsvideo  $newsvideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'link' => 'nullable',
            'title' => 'required|max:100'
        ]);

        $newsvideo = Newsvideo::find($id);

        $newsvideo->title = $request->title;
        $newsvideo->link = $request->link;
        $newsvideo->save();

        session()->flash('success', 'News video updated successfully');

        return redirect()->route('admin.newsvideo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsvideo  $newsvideo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $newsvideo = Newsvideo::find($id);

        $newsvideo->delete();

        session()->flash('success', 'News video deleted successfully');

        return redirect()->route('admin.newsvideo');
    }
}
