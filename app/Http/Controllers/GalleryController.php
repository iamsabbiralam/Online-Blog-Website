<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gal = Gallery::all();

        return view('admin.gallery.index', [ 'gal' => $gal ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.gallery.create');
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
            'image' => 'required|mimes:jpg,png,jpeg',
            'title' => 'required'
        ]);

        $gal = new Gallery;

        if($request->image) {

            $image = time().'-'.$request->image->getClientOriginalName();
            $destination_path = 'public/images/post/';
            $path = $request->image->storeAs($destination_path, $image);
            $gal->image = $image;
        }

        $gal->title = $request->title;
        $gal->save();

        session()->flash('success', 'Photo addedd successfully');

        return redirect()->route('admin.gallery');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $gal = Gallery::find($id);

        return view('admin.gallery.edit', [ 'gal' => $gal ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'image' => 'nullable|mimes:jpg,png,jpeg',
            'title' => 'required'
        ]);

        $gal = Gallery::find($id);

        if($request->image) {

            $image = time().'-'.$request->image->getClientOriginalName();
            $destination_path = 'public/images/post/';
            $path = $request->image->storeAs($destination_path, $image);
            if($gal->image) {
                UNLINK('storage/app/public/images/post/'.$gal->image);
            }
            $gal->image = $image;
        }

        $gal->title = $request->title;
        $gal->save();

        session()->flash('success', 'Photo updated successfully');

        return redirect()->route('admin.gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $gal = Gallery::find($id);

        if($gal->image) {
            UNLINK('storage/images/post/'.$gal->image);
        }

        $gal->delete();

        session()->flash('success', 'Photo deleted successfully');

        return redirect()->route('admin.gallery');
    }
}
