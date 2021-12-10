<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $team = Team::all();

        return view('admin.team.index', [ 'team' => $team ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.team.create');
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
            'name' => 'required|max:100',
            'position' => 'required|max:100',
            'email' => 'required|unique:teams|max:100',
            'phone' => 'required|max:11'
        ]);

        $team = new Team;

        if($request->image) {

            $image = time().'-'.$request->image->getClientOriginalName();
            $destination_path = 'public/images/team';
            $path = $request->image->storeAs($destination_path, $image);
            $team->image = $image;
        }

        $team->name = $request->name;
        $team->position = $request->position;
        $team->email = $request->email;
        $team->phone = $request->phone;
        $team->save();

        session()->flash('success', 'Member added succesfully');

        return redirect()->route('admin.team');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $team = Team::find($id);

        return view('admin.team.edit', [ 'team' => $team ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'image' => 'nullable|mimes:jpg,png,jpeg',
            'name' => 'required|max:100',
            'position' => 'required|max:100',
            'email' => 'required',
            'phone' => 'required|max:11'
        ]);

        $team = Team::find($id);

        if($request->image) {

            $image = time().'-'.$request->image->getClientOriginalName();
            $destination_path = 'public/images/team';
            $path = $request->image->storeAs($destination_path, $image);
            if($team->image) {
                UNLINK('storage/app/public/images/team/'.$team->image);
            }
            $team->image = $image;
        }

        $team->name = $request->name;
        $team->position = $request->position;
        $team->email = $request->email;
        $team->phone = $request->phone;
        $team->save();

        session()->flash('success', 'Member updated succesfully');

        return redirect()->route('admin.team');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $team = Team::find($id);
        UNLINK('storage/images/team/'.$team->image);
        $team->delete();

        session()->flash('success', 'Member deleted succesfully');

        return redirect()->route('admin.team');
    }
}
