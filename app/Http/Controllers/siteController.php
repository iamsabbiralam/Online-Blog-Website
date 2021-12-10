<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\subcategory;
use App\Models\Post;
use App\Models\Majorpost;
use App\Models\Newsvideo;
use App\Models\Newsphoto;
use App\Models\Team;


class siteController extends Controller
{
    public function index () {

        return view('front.home');
    }

    public function singlenews ($id) {

        $post = Post::find($id);

        $cat = Category::find($post->cat_id);

        $sub = subcategory::find($post->sub_id);

        return view('front.post.single-post', ['post' => $post, 'cat' => $cat, 'sub' => $sub]);
    }

    public function singlemajornews ($id) {

        $post = Majorpost::find($id);

        $cat = Category::find($post->cat_id);

        $sub = subcategory::find($post->sub_id);

        return view('front.post.single-post', ['post' => $post, 'cat' => $cat, 'sub' => $sub]);
    }

    public function news_video () {

        $post = Newsvideo::paginate(12);

        return view('front.news-video', ['post' => $post]);
    }

    public function news_photo () {

        $post = Newsphoto::paginate(24);

        return view('front.news-photo', ['post' => $post]);
    }

    public function singlenewsphoto ($id) {

        $post = Newsphoto::find($id);

        $cat = Category::find($post->cat_id);

        $sub = subcategory::find($post->sub_id);

        return view('front.post.single-post', ['post' => $post, 'cat' => $cat, 'sub' => $sub]);
    }

    public function team () {

        $team = Team::paginate(24);

        return view('front.team.team', ['team' => $team]);
    }

    public function single_team ($id) {

        $team = Team::find($id);

        return view('front.team.single-team', ['team' => $team]);
    }

    public function news ($id) {

        $post1 = Post::where('cat_id', $id)->first();

        $post2 = Post::where('cat_id', $id)->where('id', '<>', $post1->id)->get();

        $cat = Category::find($id);

        return view('front.news', ['post1' => $post1, 'post2' => $post2, 'cat' => $cat, 'sub' => ""]);
    }

    public function subnews ($id) {

        $post1 = Post::where('sub_id', $id)->first();

        $post2 = Post::where('sub_id', $id)->where('id', '<>', $post1->id)->get();

        $sub = Subcategory::find($id);

        $cat = Category::where('id', $sub->cat_id)->first();

        return view('front.news', ['post1' => $post1, 'post2' => $post2, 'cat' => $cat, 'sub' => $sub]);
    }

    public function search(Request $request) {

        $post = Post::where('title', 'LIKE', '%'.$request->search.'%')->first();

        //dd($post);

        return view("front.search", ['post' => $post ]);
    }
}
