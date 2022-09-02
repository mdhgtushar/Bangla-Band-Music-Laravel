<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\artists;
use App\Models\Song;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::orderby("id", "desc")->paginate(50);

        return view("admin.songs.index", [
            "songs" => $songs
        ]);
    }
    //client songs page view
    public function clientIndex()
    {
        $songs = Song::orderby("id", "desc")->paginate(50);
        return view("songs", [
            "songs" => $songs
        ]);
    }

    public function uploadSong($id)
    {
        $artist = artists::findOrFail($id);
        return view("admin.songs.create1", [
            "artist" => $artist
        ]);
    }
    public function uploadSongAlbum($id)
    {
        $album = Album::findOrFail($id);
        return view("admin.songs.create2", [
            "album" => $album
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
        $albums = Album::all();
        return view("admin.songs.create", [
            "artists" => $artists,
            "albums" => $albums
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
        // dd($request->all());

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'audio' => 'required|file|mimes:audio/mpeg,mpga,mp3,wav,aac'
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('simages'), $imageName);


        $file = $request->file("audio");
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('audios'), $filename);


        $song = new Song();
        $song->title = $request->input('title');
        $song->image = $imageName;
        $song->audio = $filename;
        $song->lyric = $request->input('lyric');
        $song->artist_id = $request->input('artist_id');
        $song->album_id = $request->input('album_id');
        $song->save();
        return redirect(route("admin.songs"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = Song::findOrFail($id);
        $artists = artists::all();
        $albums = Album::all();
        return view("admin.songs.edit", [
            "artists" => $artists,
            "albums" => $albums,
            "song" => $song
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Song::find($id);
        if (file_exists(public_path("simages/$song->image"))) {
            @unlink(public_path("simages/$song->image"));
            @unlink(public_path("audios/$song->audio"));
        }
        $song->delete();
        return redirect(url()->previous());
    }
}
