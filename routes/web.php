<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SongsController;
use App\Models\artists;
use App\Models\Song;
use App\Models\Album;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/link", function(){
     Artisan::call('view:clear');
   
});

Route::get('/', [HomeController::class, "clientIndex"])->name('home');
Route::get('/login', [HomeController::class, "clientLogin"])->name('client.login');
Route::get('/register', [HomeController::class, "clientRegister"])->name('client.register');
Route::get('/forgot', [HomeController::class, "clientForgot"])->name('client.forgot');

Route::get('/songs', [SongsController::class, "clientIndex"])->name("songs");
Route::get('/artists', [ArtistsController::class, "clientIndex"])->name("artists");
Route::get('/artist/profile/{id}', [ArtistsController::class, "clientShow"])->name("artists.profile");
Route::get('/song/upload/{id}', [SongsController::class, "uploadSong"])->name("uploadSong");
Route::get('/song/album/upload/{id}', [SongsController::class, "uploadSongAlbum"])->name("uploadSongAlbum");
Route::get('/albums', [AlbumController::class, "clientIndex"])->name("albums");
Route::get('/albums/{id}', [AlbumController::class, "clientShow"])->name("albums.show");
Route::get("/search", [HomeController::class, "search"])->name("search");


Route::prefix('testing')->group(function () {
    Route::get("/search", [HomeController::class, "AdminSearch"])->name("admin.search");
    Route::get('/', function (Song $song, artists $artists, Album $albums) {
        $totalSongs = $song->all()->count();
        $totalArtists = $artists->all()->count();
        $totalAlbums = $albums->all()->count();
        return view('admin.dashbord', [
            "totalSongs" => $totalSongs,
            "totalArtists" => $totalArtists,
            "totalAlbums" => $totalAlbums,
        ]);
    })->middleware('auth')->name('admin');
    Route::resource('/artists', ArtistsController::class, [
        "names" => [
            "index" => "admin.artists",
            "create" => "admin.artists.create",
            "edit" => "admin.artists.edit",
            "destroy" => "admin.artists.delete",
            "show" => "admin.artists.show"
        ]
    ])->middleware('auth');
    Route::resource('/songs', SongsController::class, [
        "names" => [
            "index" => "admin.songs",
            "create" => "admin.songs.create",
            "destroy" => "admin.songs.delete",
            "show" => "admin.songs.show"
        ]
    ])->middleware('auth');
    Route::resource('/albums', AlbumController::class, [
        "names" => [
            "index" => "admin.albums",
            "create" => "admin.albums.create",
            "destroy" => "admin.albums.delete",
            "edit" => "admin.albums.edit",
            "show" => "admin.albums.show"
        ]
    ])->middleware('auth');
    Auth::routes();
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
