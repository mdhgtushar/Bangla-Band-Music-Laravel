<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\artists;
use App\Models\Song;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    //home page view
    public function clientIndex()
    {
        $songs = Song::orderby("id", "desc")->paginate(10);
        $artists = artists::limit(10)->get();
        $albums = Album::limit(6)->get();
        return view("index", [
            "songs" => $songs,
            "artists" => $artists,
            "albums" => $albums,
        ]);
    }
    //search page view
    public function search()
    {
        $search_text = isset($_GET["q"]) ? $_GET["q"] : "--";
        $artists = artists::where('name', 'LIKE', '%' . $search_text . '%')->get();
        $albums = Album::where('name', 'LIKE', '%' . $search_text . '%')->get();
        $songs = Song::where('title', 'LIKE', '%' . $search_text . '%')->get();
        return view("search", [
            "query" => $search_text,
            "artists" => $artists,
            "albums" => $albums,
            "songs" => $songs
        ]);
    }
    //Admin search page view
    public function AdminSearch()
    {
        $search_text = isset($_GET["q"]) ? $_GET["q"] : "--";
        $artists = artists::where('name', 'LIKE', '%' . $search_text . '%')->get();
        $albums = Album::where('name', 'LIKE', '%' . $search_text . '%')->get();
        $songs = Song::where('title', 'LIKE', '%' . $search_text . '%')->get();
        return view("admin.search", [
            "query" => $search_text,
            "artists" => $artists,
            "albums" => $albums,
            "songs" => $songs
        ]);
    }
    //client loign page
    public function clientLogin()
    {
        return view("login");
    }

    //client register page
    public function clientRegister()
    {
        return view("register");
    }
    //client forgot page

    public function clientForgot()
    {
        return view("forgot");
    }
}
