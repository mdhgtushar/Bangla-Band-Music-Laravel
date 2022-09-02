@extends("layout.client")

@section("content")

<div class="h-96 overflow-hidden">
<div class="overflow-hidden">
  <div class="fixed z-0 container overflow-hidden">
    <img class="p-2  w-full" src="http://banglaband.me/img/bg-img/bg-1.jpg" alt="">
</div>

</div>
  </div>
      
  <div class="-mt-44 px-2">
    <div class="relative z-10 h-44 bg-gradient-to-t from-black via-black-500 w-full"></div>
</div>
<div class="relative z-10 bg-white overflow-hidden min-h-full">
        <h1 class="text-xl text-bold p-5">Popular</h1>
    <div class="overflow-x-auto w-full p-1">
      <table class="table w-full">
        <!-- head -->
        <thead>
          <tr>
            <th>Music</th>
            <th>Details</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <script>
              let play_song_id = null;
          </script>
         @foreach ($songs as $song)
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
                  <div class="text-sm opacity-50">{{$song->artist->name }}</div>
                </div>
              </div>
            </td>
            <td>
              {{-- <span class="badge badge-ghost badge-sm">Lirical</span> --}}
              <span class="badge badge-ghost badge-sm" id="duration1{{ "aplay$song->id" }}">00:00</span>
            </td>
            <th>
              <button class="btn btn-outline gap-2 btn-sm" onclick="showme{{ "aplay$song->id" }}()">
                <i class="fa fa-play" aria-hidden="true"></i>
                Play
              </button>
            </th>
          </tr>
          <audio id="audio{{ "aplay$song->id" }}" controls style="display: none">
            <source src="{{ asset("audios/$song->audio") }}" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
          
<div class="fixed w-full bottom-0 left-0 bg-gray-100 h-44 z-20 overflow-hidden" style="display: none" id="{{ "aplay$song->id" }}">
  <div class="absolute opacity-30 h-full w-full bg-cover bg-center" style="background-image: url('{{ asset("simages/$song->image") }}');filter: blur(20px);">
  
  </div>
        <div class="relative container m-auto  h-44">
  
          <div class="flex">
      <div class="w-1/6">
          <img class="w-full p-2" src="{{ asset("simages/$song->image") }}" alt="">
      </div>
      
      <div class="w-5/6">
        
        <div class="p-2 pt-6">
          <div class="font-bold" id="title">{{ $song->title }}</div>
          <div class="text-sm opacity-50" id="artist">Alvee</div>
        </div>
         <div class="grid justify-items-center">
          
          <div>
            <button class="btn btn-outline gap-2 btn-sm mt-4 mb-0" onclick="previous_song()" id="pre{{ "aplay$song->id" }}">
              <i class="fa fa-step-backward" aria-hidden="true"></i>
            </button>
            <button class="btn btn-outline gap-2 btn-sm mt-4 mb-0" onclick="justplay{{ "aplay$song->id" }}()" id="play{{ "aplay$song->id" }}">
              <i class="fa fa-play" aria-hidden="true"></i>
            </button>
            <button class="btn btn-outline gap-2 btn-sm mt-4 mb-0" onclick="next_song()" id="next{{ "aplay$song->id" }}">
              <i class="fa fa-step-forward" aria-hidden="true"></i>
            </button>
          </div>
         </div>
          <div>
            <span class="badge badge-ghost" id="currentTime{{ "aplay$song->id" }}">00:00</span>
            <span class="badge badge-ghost float-right" id="duration{{ "aplay$song->id" }}">00:00</span>
          </div>
          <progress class="progress progress-primary w-full" value="0" id="progress{{ "aplay$song->id" }}" max="100"></progress>
        
              </div>
            </div>
            <div id="currentnull"></div>
  </div>
  </div> 
  <script>
    var currentid = document.getElementById('currentnull');
    function showme{{ "aplay$song->id" }}(){
      let id = "{{ "aplay$song->id" }}";
      currentid.style.display = "none";
      let {{ "aplay$song->id" }} = document.getElementById(id);
      document.getElementById("bottom-space").style.display = "block";
      currentid = document.getElementById("{{ "aplay$song->id" }}");
      {{ "aplay$song->id" }}.style.display = "block";
    }
  </script>




<script>
  let play{{ "aplay$song->id" }} = document.getElementById("play{{ "aplay$song->id" }}");
  let progress{{ "aplay$song->id" }} = document.getElementById("progress{{ "aplay$song->id" }}");
  let track{{ "aplay$song->id" }} = document.getElementById("audio{{ "aplay$song->id" }}");
  let duration{{ "aplay$song->id" }} = document.getElementById("duration{{ "aplay$song->id" }}");
  let duration1{{ "aplay$song->id" }} = document.getElementById("duration1{{ "aplay$song->id" }}");
  let currentTime{{ "aplay$song->id" }} = document.getElementById("currentTime{{ "aplay$song->id" }}");

  let Playing_song{{ "aplay$song->id" }};
	Playing_song{{ "aplay$song->id" }} = false;
  // function load the track
  var convertTime = function(time)
{    
    var mins = Math.floor(time / 60);
    if (mins < 10) {
      mins = '0' + String(mins);
    }
    var secs = Math.floor(time % 60);
    if (secs < 10) {
      secs = '0' + String(secs);
    }

    return mins + ':' + secs;
}
function load_track{{ "aplay$song->id" }}(index_no) {
  
	setInterval(function () {
  duration1{{ "aplay$song->id" }}.innerHTML = convertTime(track{{ "aplay$song->id" }}.duration);
  duration{{ "aplay$song->id" }}.innerHTML = convertTime(track{{ "aplay$song->id" }}.duration);
    if(Playing_song{{ "aplay$song->id" }} == true){
      progress{{ "aplay$song->id" }}.value = track{{ "aplay$song->id" }}.currentTime;
      currentTime{{ "aplay$song->id" }}.innerHTML = convertTime(track{{ "aplay$song->id" }}.currentTime);
    }
  }, 1000);
}

load_track{{ "aplay$song->id" }}(0);
// play song
function playsong{{ "aplay$song->id" }}() {

  if(play_song_id != null){
    play_song_id.pause();
    console.log(play_song_id);
  }
  progress{{ "aplay$song->id" }}.max = track{{ "aplay$song->id" }}.duration;
	track{{ "aplay$song->id" }}.play();

	Playing_song{{ "aplay$song->id" }} = true;
	play{{ "aplay$song->id" }}.innerHTML = '<i class="fa fa-pause" aria-hidden="true"></i>';
}

//pause song
function pausesong{{ "aplay$song->id" }}() {
	track{{ "aplay$song->id" }}.pause();
	Playing_song{{ "aplay$song->id" }} = false;
	play{{ "aplay$song->id" }}.innerHTML = '<i class="fa fa-play" aria-hidden="true"></i>';
}
function justplay{{ "aplay$song->id" }}() {
  if (Playing_song{{ "aplay$song->id" }} == false) {
		playsong{{ "aplay$song->id" }}();
    play_song_id = track{{ "aplay$song->id" }};
	} else {
		pausesong{{ "aplay$song->id" }}();
	}
}
</script>
         @endforeach
    </tbody>

      </table>
      <br />
      {{-- <div class="flex place-content-center">
        <div class="btn-group">
          <button class="btn">«</button>
          <button class="btn">Page 22</button>
          <button class="btn">»</button>
        </div>
      </div> --}}
      {{ $songs->links() }}
    </div>
  <br>
  </div>


  {{-- space for bottom song play panel--}}

  <div class="h-44" id="bottom-space" style="display:none"></div>

@endsection