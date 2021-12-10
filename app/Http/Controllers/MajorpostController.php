<?php

namespace App\Http\Controllers;

use App\Models\Majorpost;
use Illuminate\Http\Request;

class MajorpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = Majorpost::all();

        return view('admin.major.index', [ 'news' => $news ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.major.create');
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

        $post = new Majorpost;

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

        session()->flash('success', 'Post addedd successfully');

        return redirect()->route('admin.major');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mojorpost  $mojorpost
     * @return \Illuminate\Http\Response
     */
    public function show(Mojorpost $mojorpost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mojorpost  $mojorpost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $news = Majorpost::find($id);

        return view('admin.major.edit', [ 'news' => $news ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mojorpost  $mojorpost
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

        $post = Majorpost::find($id);

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

        session()->flash('success', 'Major News updated successfully');

        return redirect()->route('admin.major');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mojorpost  $mojorpost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $news = Majorpost::find($id);

        if($news->image) {
            UNLINK('storage/images/post/'.$news->image);
        }
        $news->delete();

        session()->flash('success', 'Major News deleted successfully');

        return redirect()->route('admin.major');
    }
}
