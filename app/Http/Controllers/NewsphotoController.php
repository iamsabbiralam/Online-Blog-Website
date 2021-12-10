<?php

namespace App\Http\Controllers;

use App\Models\Newsphoto;
use Illuminate\Http\Request;

class NewsphotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $newsphoto = Newsphoto::all();

        return view('admin.newsphoto.index', [ 'newsphoto' => $newsphoto ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.newsphoto.create');
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
            'cat_id' => 'required',
            'sub_id' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'details' => 'required',
            'reporter' => 'required',
        ]);

        $post = new Newsphoto;

        if($request->image) {

            $image = time().'-'.$request->image->getClientOriginalName();
            $destination_path = 'public/images/post/';
            $path = $request->image->storeAs($destination_path, $image);
            $post->image = $image;
        }

        $post->cat_id = $request->cat_id;
        $post->sub_id = $request->sub_id;
        $post->title = $request->title;
        $post->sub_title = $request->sub_title;
        $post->details = $request->details;
        $post->reporter = $request->reporter;
        $post->save();

        session()->flash('success', 'News Photo addedd successfully');

        return redirect()->route('admin.newsphoto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsphoto  $newsphoto
     * @return \Illuminate\Http\Response
     */
    public function show(Newsphoto $newsphoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsphoto  $newsphoto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $newsphoto = Newsphoto::find($id);

        return view('admin.newsphoto.edit', [ 'newsphoto' => $newsphoto ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsphoto  $newsphoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'image' => 'nullable|mimes:jpg,png,jpeg',
            'cat_id' => 'required',
            'sub_id' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'details' => 'required',
            'reporter' => 'required',
        ]);

        $post = Newsphoto::find($id);

        if($request->image) {

            $image = time().'-'.$request->image->getClientOriginalName();
            $destination_path = 'public/images/post/';
            $path = $request->image->storeAs($destination_path, $image);
            if($post->image) {
                UNLINK('storage/app/public/images/post/'.$post->image);
            }
            $post->image = $image;
        }

        $post->cat_id = $request->cat_id;
        $post->sub_id = $request->sub_id;
        $post->title = $request->title;
        $post->sub_title = $request->sub_title;
        $post->details = $request->details;
        $post->reporter = $request->reporter;
        $post->save();

        session()->flash('success', 'News Photo updated successfully');

        return redirect()->route('admin.newsphoto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsphoto  $newsphoto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $news = Newsphoto::find($id);

        if($news->image) {
            UNLINK('storage/images/post/'.$news->image);
        }
        $news->delete();

        session()->flash('success', 'News Photo deleted successfully');

        return redirect()->route('admin.newsphoto');
    }
}
