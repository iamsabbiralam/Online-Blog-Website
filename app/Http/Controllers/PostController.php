<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subcategory;
use App\Models\Email;
use Mail;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::all();

        return view('admin.post.index', [ 'post' => $post ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.post.create');
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

        $post = new Post;

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

        $email = Email::all();

        foreach($email as $e) {

            $data = [
          'name' => $request->title,
          'text' => $request->details,
          'email' => $e->email
        ];

            Mail::send('front.email-template', $data, function($message) use ($data) {
              $message->to($data['email'])
              ->subject('News Of The Day');
            });
        }

        session()->flash('success', 'Post addedd successfully');

        return redirect()->route('admin.post');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);

        return view('admin.post.edit', [ 'post' => $post ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
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

        $post = Post::find($id);

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

        session()->flash('success', 'Post updated successfully');

        return redirect()->route('admin.post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        if($post->image) {
                UNLINK('storage/images/post/'.$post->image);
            }
        $post->delete();

        session()->flash('success', 'Post deleted successfully');

        return redirect()->route('admin.post');
    }

    // javascript
    public function getsubcat($id)
    {
        $subcat = Subcategory::where("cat_id",$id)->where("status","active")->pluck("name","id");
        return json_encode($subcat);
    }
}
