@extends("layout.client")

@section("content")
<section class="row row--grid">
    <div class="col-12">
       <div class="row row--grid">
          <!-- title -->
          
          <div class="col-12">
            <div class="main__title">
               <h2>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,13.18V11A8,8,0,0,0,4,11v2.18A3,3,0,0,0,2,16v2a3,3,0,0,0,3,3H8a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1H6V11a6,6,0,0,1,12,0v2H16a1,1,0,0,0-1,1v6a1,1,0,0,0,1,1h3a3,3,0,0,0,3-3V16A3,3,0,0,0,20,13.18ZM7,15v4H5a1,1,0,0,1-1-1V16a1,1,0,0,1,1-1Zm13,3a1,1,0,0,1-1,1H17V15h2a1,1,0,0,1,1,1Z"></path></svg>
                  <a href="#">Songs</a>
               </h2>
               
               
               
            </div>
         </div>
          <!-- end title -->
          <div class="col-12">
             <ul class="main__list main__list main__list--playlist main__list--dashbox">

<br>
                @foreach ($songs as $song)
             <li class="single-item">
                  <a data-playlist="" data-lyric='{{ nl2br($song->lyric) }}' data-title="{{ $song->title }}" data-artist="{{ isset($song->artist->name) ? $song->artist->name : "unknown" }}" data-img="{{ asset("simages/$song->image") }}" href="{{ asset("audios/$song->audio") }}" class="single-item__cover">
                     <img src="{{ asset("simages/$song->image") }}" alt="">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z"></path></svg>
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16,2a3,3,0,0,0-3,3V19a3,3,0,0,0,6,0V5A3,3,0,0,0,16,2Zm1,17a1,1,0,0,1-2,0V5a1,1,0,0,1,2,0ZM8,2A3,3,0,0,0,5,5V19a3,3,0,0,0,6,0V5A3,3,0,0,0,8,2ZM9,19a1,1,0,0,1-2,0V5A1,1,0,0,1,9,5Z"></path></svg>
                  </a>
                  <div class="single-item__title">
                     <h4><a data-playlist=""  data-lyric='{{ nl2br($song->lyric) }}' data-title="{{ $song->title }}" data-artist="{{isset( $song->artist->name) ? $song->artist->name : "unknown" }}" data-img="{{ asset("simages/$song->image") }}" href="{{ asset("audios/$song->audio") }}">{{ $song->title }}</a></h4>
                     <span><a href="{{ route("artists.profile", isset( $song->artist->id) ? $song->artist->id : 0) }}">{{isset( $song->artist->name) ? $song->artist->name : "unknown" }}</a></span>
                  </div>
                  
                  {{-- <span class="single-item__time">2:58</span> --}}
               </li>

                @endforeach
             </ul>
             {{ $songs->links('layout.paginate') }}
          </div>
       </div>
    </div>
 </section>

@endsection