<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\artists;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        return view("admin.albums.index", [
            "albums" => $albums
        ]);
    }

    public function clientIndex()
    {
        $albums = Album::all();
        return view("albums", [
            "albums" => $albums
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists = artists::all();
        return view("admin.albums.create", [
            "artists" => $artists
        ]);
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

        $albums = new Album();
        $albums->image = $imageName;
        $albums->name = $request->input("name");
        $albums->artist_id = $request->input("artist_id");
        $albums->about = $request->input("about");
        $albums->save();
        return redirect(route("admin.albums.create"))->withSuccess('Successfully Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::findOrFail($id);
        return view("admin.albums.view", [
            "album" => $album
        ]);
    }
    public function clientShow($id)
    {
        $album = Album::find($id);
        $albumsLasest = Album::limit(2)->where("id", "!=", $id)->get();
        return view("album", [
            "album" => $album,
            "albumsLasest" => $albumsLasest
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        $artists = artists::all();
        return view("admin.albums.edit", [
            "album" => $album,
            "artists" => $artists
        ]);
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
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);


        $album = Album::find($id);

        if ($request->image != null) {
            $imageName = time() . '.' . $request->image->extension();
            $path = $request->image->move(public_path('images'), $imageName);
            if (file_exists(public_path("images/$album->image"))) {
                @unlink(public_path("images/$album->image"));
            }
            $album->image = $imageName;
        }

        $album->name = $request->input("name");
        $album->artist_id = $request->input("artist_id");
        $album->update();
        return redirect(route("admin.albums.edit", $id))->withSuccess('Successfully Edited.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        if (file_exists(public_path("images/$album->image"))) {
            @unlink(public_path("images/$album->image"));
        }
        $album->delete();
        return redirect(url()->previous());
    }
}
