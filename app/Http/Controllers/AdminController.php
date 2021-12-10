<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard () {

        return view('admin.dashboard');
    }

    public function admin() {

        $admin = User::all();

        return view('admin.admin.index', [ 'admin' => $admin ]);
    }

    public function addadmin() {

        return view('admin.admin.create');
    }

    public function destroy($id) {

        $admin = User::find($id)->delete();

        session()->flash('success', 'Admin deleted successfully');

        return redirect()->route('admin.adminlist');
    }

    public function proadmin(Request $request) {

    $request->validate([
        'name'     =>  'required|max:100',
        'email' => 'nullable',
        'password' =>  'required'

      ]);
    
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();

    session()->flash('success', 'Admin added successfully');

    return redirect()->route('admin.adminlist');
   }

   public function search(Request $request) {

        $post = Post::where('title', 'LIKE', '%'.$request->search.'%')->get();

        return view("admin.post.index", ['post' => $post ]);
    }
}
