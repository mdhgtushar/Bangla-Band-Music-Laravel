@extends("layout.admin")

@section("content")

<nav class="flex p-6" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">
    <li class="inline-flex items-center">
      <a href="{{ route("admin") }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
        <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
        Dashboard
      </a>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <a href="{{ route("admin.artists") }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Artists</a>
      </div>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ $artist->name }}</span>
      </div>
    </li>
  </ol>
</nav>

<a href="{{ url()->previous() }}" class="btn btn-wide m-6">Go Back</a>
<a href="{{ route("uploadSong", $artist->id) }}" class="btn btn-wide m-6">Upload A new Song</a>
<a href="{{ route("admin.artists.create") }}?artist={{ $artist->id }}" class="btn btn-wide m-6">Create A new Album</a>
<a href="{{ route("admin.artists.edit", $artist->id) }}" class="btn btn-info btn-wide m-6">Edit This Artist</a>
<div class="bg-white flex flex-row flex-wrap p-3">
  <div class="mx-auto w-full">
<!-- Profile Card -->
<div class="rounded-lg shadow-lg bg-gray-600 w-full flex flex-row flex-wrap p-3 antialiased" style="
  background-image: url('https://images.unsplash.com/photo-1578836537282-3171d77f8632?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80');
  background-repeat: no-repat;
  background-size: cover;
  background-blend-mode: multiply;
">
  <div class="md:w-1/6 w-full">
    <img class="rounded-lg shadow-lg antialiased" src="{{ asset("images/$artist->image") }}">  
  </div>
  <div class="md:w-5/6 w-full px-3 flex flex-row flex-wrap">
    <div class="w-full text-right text-gray-700 font-semibold relative pt-3 md:pt-0">
      <div class="text-2xl text-white leading-tight">{{ $artist->name }}</div>
      <div class="text-normal text-gray-300 hover:text-gray-400 cursor-pointer"><span class="border-b border-dashed border-gray-500 pb-1">{{ $artist->country }}</span></div>
      <div class="text-sm text-gray-300 hover:text-gray-400 cursor-pointer md:absolute pt-3 md:pt-0 bottom-0 right-0">{{ $artist->bio }}</div>
    </div>
  </div>
</div>
<!-- End Profile Card -->
  </div>
</div>
<h3 class="px-6">Albums Form This Artist</h3>
<div class="overflow-x-auto w-full p-5">
  <table class="table w-full p-1">
    <!-- head -->
    <thead>
      <tr>
        <th>Album</th>
        <th>Total Song</th>
        <th>Upload</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      @foreach ($artist->albums as $album)
        
      <tr>
        <td>
          <div class="flex items-center space-x-3">
            <div class="avatar">
              <div class="mask mask-squircle w-12 h-12">
                <img src="{{ asset("images/$album->image") }}" alt="{{ $album->image }}" />
              </div>
            </div>
            <div>
              <div class="font-bold">{{ $album->name }}</div>
              <div class="text-sm opacity-50">{{ isset($album->artist->name) ? $album->artist->name : "unknown" }}</div>
            </div>
          </div>
        </td>
        <td><p class="text-gray-500">{{ $album->songs->count() }}</p></td>
        <td><a href="{{ route("uploadSongAlbum", $album->id) }}" class="btn btn-outline gap-2 btn-sm">
          <i class="fa fa-play" aria-hidden="true"></i>
          Upload Song 
        </a></td>
        <td>
          <a href="{{ route("admin.albums.show", $album->id) }}" class="btn btn-info btn-sm">View</a>
<a href="albums/{{ $album->id }}/edit" class="btn btn-success btn-sm">Edit</a>
<form action="{{ route("admin.albums.delete", $album->id) }}" method="post" class="inline-block">
@csrf
@method("delete")
<button type="submit" class="btn btn-error btn-sm" onclick="return confirm('Are You Sure? You Want To Delete')">Delete</button>
</form>
        </td>
      </tr>
      @endforeach
    </tbody>
    </tfoot>
    
  </table>
</div>
<h3 class="px-6">Songs Form This Artist</h3>
<div class="overflow-x-auto w-full p-5">
  <table class="table w-full p-1">
    <!-- head -->
    <thead>
      <tr>
        <th>Music</th>
        {{-- <th>Duration</th> --}}
        <th>Play</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($artist->songs as $song)
      <script>
        var url = `{{ $song->audio }}`;
        var id = `{{ $song->id }}`;
             var asset = `{{ asset("audios/") }}`;
             
       
         </script>
      <!-- row 1 -->
      <tr class="border-b-2 border-gray-100">
        <td>
          <div class="flex items-center space-x-3">
            <div class="avatar">
              <div class="mask mask-squircle w-12 h-12">
                <img
                  src="{{ asset("simages/$song->image") }}"
                  alt="Avatar Tailwind CSS Component"
                />
              </div>
            </div>
            <div>
              <div class="font-bold">{{ $song->title }}</div>
              <div class="text-sm opacity-50">{{  isset( $song->artist->name) ? $song->artist->name : "unknown" }}</div>
            </div>
          </div>
        </td>
        {{-- <td>
          <span class="badge badge-ghost badge-sm" id="length{{ $song->id }}">--:--</span>
        </td> --}}
        <td>
          <button class="btn btn-outline gap-2 btn-sm playbutton" data-id="1" data-url="{{ $song->audio }}">
            <i class="fa fa-play" aria-hidden="true"></i>
          </button>
        </td>
        <td>
          <a href="songs/{{ $song->id }}/edit" class="btn btn-success btn-sm">Edit</a>
          <form action="{{ route("admin.songs.delete", $song->id) }}" method="post" class="inline-block">
            @csrf
            @method("delete")
            <button type="submit" class="btn btn-error btn-sm" onclick="return confirm('Are You Sure You Want To Delete')" >Delete</button>
          </form>
        </td>
      </tr>

      @endforeach
    <audio src="" id="audioplayer"></audio>
</tbody>
  </table>
  <br />
  
</div>
<script>

      
  $(document).ready(function(){

    $(".playbutton").click(function () {
      var url = $(this).data("url");
      var asset = `{{ asset("audios/") }}`;
    var audioElement = document.getElementById("audioplayer");
    audioElement.setAttribute('src', `${asset}/${url}`);
    
    audioElement.addEventListener('ended', function() {
        this.play();
    }, false);
    
    audioElement.addEventListener("canplay",function(){
        $("#length").text("Duration:" + audioElement.duration + " seconds");
        $("#source").text("Source:" + audioElement.src);
        $("#status").text("Status: Ready to play").css("color","green");
        
          audioElement.play();
        
    });
    
    audioElement.addEventListener("timeupdate",function(){
        $("#currentTime").text("Current second:" + audioElement.currentTime);
    });
    })
  });

  </script>
@endsection