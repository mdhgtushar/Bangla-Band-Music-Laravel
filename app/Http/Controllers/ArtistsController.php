<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artists;
use Illuminate\Support\Facades\Storage;

class ArtistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artists::all();
        return view("admin.artists.index", [
            "artists" => $artists
        ]);
    }
    public function clientIndex()
    {
        $artists = Artists::limit(10)->get();
        return view("artists", [
            "artists" => $artists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.artists.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $path = $request->image->move(public_path('images'), $imageName);


        $artists = new Artists();
        $artists->name = $request->input("name");
        $artists->country = $request->input("country");
        $artists->bio = $request->input("bio");
        $artists->image = $imageName;
        $artists->save();
        return redirect(route("admin.artists"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd("aa");
        $artist = Artists::findOrFail($id);
        return view("admin.artists.view")->with('artist', $artist);
    }
    public function clientShow($id)
    {

        $artist = Artists::findOrFail($id);
        return view("profile")->with('artist', $artist);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist = Artists::find($id);
        return view("admin.artists.edit")->with('artist', $artist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artists = Artists::find($id);
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        if ($request->image != null) {
            $imageName = time() . '.' . $request->image->extension();
            $path = $request->image->move(public_path('images'), $imageName);
            if (file_exists(public_path("images/$artists->image"))) {
                @unlink(public_path("images/$artists->image"));
            }
            $artists->image = $imageName;
        }


        $artists->name = $request->input("name");
        $artists->country = $request->input("country");
        $artists->bio = $request->input("bio");
        $artists->update();
        return redirect(route("admin.artists"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artists::find($id);
        if (file_exists(public_path("images/$artist->image"))) {
            @unlink(public_path("images/$artist->image"));
        }
        $artist->delete();
        return redirect(url()->previous());
    }
}
