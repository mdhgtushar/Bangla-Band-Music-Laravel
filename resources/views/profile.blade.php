@extends("layout.client")

@section("content")
<div class="row row--grid">
    <div class="col-12">
        <div class="article article--page">
            <!-- article content -->
            <div class="article__content">
                <div class="article__artist">
                    <img src="{{ asset("images/$artist->image") }}" alt="">
                    <div>
                        <h1 style="font-family: Inter, Bangla752, sans-serif;">{{ $artist->name }}</h1>
                        <span>{{ $artist->country }}</span>
                        <p>{{$artist->bio}}</p>
                    </div>
                </div>
            </div>
            <!-- end article content -->

        </div>
    </div>
</div>

<section class="row row--grid">
   <div class="col-12">
      <div class="main__title">
         <h2>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
               <path
                  d="M21.65,2.24a1,1,0,0,0-.8-.23l-13,2A1,1,0,0,0,7,5V15.35A3.45,3.45,0,0,0,5.5,15,3.5,3.5,0,1,0,9,18.5V10.86L20,9.17v4.18A3.45,3.45,0,0,0,18.5,13,3.5,3.5,0,1,0,22,16.5V3A1,1,0,0,0,21.65,2.24ZM5.5,20A1.5,1.5,0,1,1,7,18.5,1.5,1.5,0,0,1,5.5,20Zm13-2A1.5,1.5,0,1,1,20,16.5,1.5,1.5,0,0,1,18.5,18ZM20,7.14,9,8.83v-3L20,4.17Z"
                  />
            </svg
               >
            <a href="#">Hit Albums</a>
         </h2>
          
         
         
      </div>
   </div>
   
   <!-- end title -->
@foreach ($artist->albums as $album)
   
   <div class="col-6 col-sm-4 col-lg-2">
      <div class="album">
         <div class="album__cover">
            <img src="{{ asset("images/$album->image") }}" alt="">
            <a href="{{ route("albums.show", $album->id) }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z"></path></svg></a>
            <span class="album__stat">
               <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3.71,16.29a1,1,0,0,0-.33-.21,1,1,0,0,0-.76,0,1,1,0,0,0-.33.21,1,1,0,0,0-.21.33,1,1,0,0,0,.21,1.09,1.15,1.15,0,0,0,.33.21.94.94,0,0,0,.76,0,1.15,1.15,0,0,0,.33-.21,1,1,0,0,0,.21-1.09A1,1,0,0,0,3.71,16.29ZM7,8H21a1,1,0,0,0,0-2H7A1,1,0,0,0,7,8ZM3.71,11.29a1,1,0,0,0-1.09-.21,1.15,1.15,0,0,0-.33.21,1,1,0,0,0-.21.33.94.94,0,0,0,0,.76,1.15,1.15,0,0,0,.21.33,1.15,1.15,0,0,0,.33.21.94.94,0,0,0,.76,0,1.15,1.15,0,0,0,.33-.21,1.15,1.15,0,0,0,.21-.33.94.94,0,0,0,0-.76A1,1,0,0,0,3.71,11.29ZM21,11H7a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2ZM3.71,6.29a1,1,0,0,0-.33-.21,1,1,0,0,0-1.09.21,1.15,1.15,0,0,0-.21.33.94.94,0,0,0,0,.76,1.15,1.15,0,0,0,.21.33,1.15,1.15,0,0,0,.33.21,1,1,0,0,0,1.09-.21,1.15,1.15,0,0,0,.21-.33.94.94,0,0,0,0-.76A1.15,1.15,0,0,0,3.71,6.29ZM21,16H7a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z"></path></svg> {{ $album->songs->count() }}</span>
            </span>
         </div>
         <div class="album__title">
            <h3><a href="{{ route("albums.show", $album->id) }}">{{ $album->name }}</a></h3>
            <span><a href="{{ route("artists.profile", $album->artist->id) }}">{{ $album->artist->name }}</a></span>
         </div>
      </div>
   </div>

   @endforeach
</section>

 <!-- end articts -->
 <section class="row row--grid">
    <div class="col-12">
       <div class="row row--grid">
          <!-- title -->
          <div class="col-12">
             <div class="main__title">
                <h2>
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                      <path
                         d="M21.65,2.24a1,1,0,0,0-.8-.23l-13,2A1,1,0,0,0,7,5V15.35A3.45,3.45,0,0,0,5.5,15,3.5,3.5,0,1,0,9,18.5V10.86L20,9.17v4.18A3.45,3.45,0,0,0,18.5,13,3.5,3.5,0,1,0,22,16.5V3A1,1,0,0,0,21.65,2.24ZM5.5,20A1.5,1.5,0,1,1,7,18.5,1.5,1.5,0,0,1,5.5,20Zm13-2A1.5,1.5,0,1,1,20,16.5,1.5,1.5,0,0,1,18.5,18ZM20,7.14,9,8.83v-3L20,4.17Z"
                         />
                   </svg
                      >
                   <a href="#">Popular Songs</a>
                </h2>
             </div>
          </div>
          <!-- end title -->
          <div class="col-12">
             <ul class="main__list main__list--playlist main__list--dashbox">

                @foreach ($artist->songs as $key => $song)

              <li class="single-item">
<span class="single-item__number">{{ $key + 1 }}</span>
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
          </div>
       </div>
    </div>
 </section>
@endsection