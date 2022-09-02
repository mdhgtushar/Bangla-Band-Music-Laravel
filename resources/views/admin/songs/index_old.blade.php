@extends("layout.admin")

@section("content")

<a href="{{ route("admin.songs.create") }}" class="btn btn-wide m-6">Upload A new Song</a>
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
      @foreach ($songs as $song)
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
  
  {{ $songs->links() }}
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
