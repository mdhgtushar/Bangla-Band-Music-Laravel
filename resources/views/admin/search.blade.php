@extends("layout.admin")

@section("content")
<div class="main__title">
    <h2>Showing Reasult For :  {{ $query }}</h2>
    
 </div>

<section class="row row--grid">
    <div class="col-12">
        <div class="main__title">
           <h2>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                 <path d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z"></path>
              </svg>
              <a href="{{ route("artists") }}">Bands </a>
           </h2>
              <a href="{{ route("artists") }}" class="main__link">See all <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"></path></svg></a>
  
           
        </div>
     </div>
    @if (count($artists) > 0)
    <!-- end title -->
 @foreach ($artists as $artist)
 <a href="{{ route("artists.profile", $artist->id) }}">
    <div class="col-6 col-sm-4 col-lg-2">
       <div class="album">
          <div class="album__cover">
             <img src="{{ asset("images/$artist->image") }}" alt="">
           </div>
          <div class="album__title">
             <h3><a href="{{ route("artists.profile", $artist->id) }}">{{ $artist->name }}</a></h3>
           </div>
       </div>
    </div>
 </a>
    @endforeach
    @else
    <div class="col-12 col-sm-12 col-lg-12"><div class="album"><p style="color: #fff;padding">NO Artist Found ON THIS QUERY</p></div></div>
    @endif
 </section>
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
             <a href="{{ route("albums") }}">Albums</a>
          </h2>
             <a href="{{ route("albums") }}" class="main__link">See all <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"></path></svg></a>
 
          
       </div>
    </div>
    @if (count($albums) > 0)
    <!-- end title -->
 @foreach ($albums as $album)
    
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
             <span><a href="{{ route("artists.profile", isset($album->artist->id) ? $album->artist->id : 0) }}">{{ isset($album->artist->name) ? $album->artist->name : "unknown" }}</a></span>
          </div>
       </div>
    </div>
 
    @endforeach
    @else
    <div class="col-12 col-sm-12 col-lg-12"><div class="album"><p style="color: #fff;padding">NO Album Found ON THIS QUERY</p></div></div>
    @endif
 </section>
 

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
                  <a href="" class="main__link">See all <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"></path></svg></a>
      
               
            </div>
         </div>
          <!-- end title -->
          <div class="col-12">
             <ul class="main__list main__list main__list--playlist main__list--dashbox">

<br>
@if (count($songs) > 0)
    
                @foreach ($songs as $song)
                <li class="single-item">
                  <span class="single-item__number">1</span>
                  <a data-playlist="home" data-title="{{ $song->title }}" data-artist="{{ isset($song->artist->name) ? $song->artist->name : "unknown" }}" data-img="{{ asset("simages/$song->image") }}" href="{{ asset("audios/$song->audio") }}" class="single-item__cover">
                     <img src="{{ asset("simages/$song->image") }}" alt="">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z"></path></svg>
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16,2a3,3,0,0,0-3,3V19a3,3,0,0,0,6,0V5A3,3,0,0,0,16,2Zm1,17a1,1,0,0,1-2,0V5a1,1,0,0,1,2,0ZM8,2A3,3,0,0,0,5,5V19a3,3,0,0,0,6,0V5A3,3,0,0,0,8,2ZM9,19a1,1,0,0,1-2,0V5A1,1,0,0,1,9,5Z"></path></svg>
                  </a>
                  <div class="single-item__title">
                     <h4><a data-playlist="home" data-title="{{ $song->title }}" data-artist="{{isset( $song->artist->name) ? $song->artist->name : "unknown" }}" data-img="{{ asset("simages/$song->image") }}" href="{{ asset("audios/$song->audio") }}">{{ $song->title }}</a></h4>
                     <span><a href="{{ route("artists.profile", isset( $song->artist->name) ? $song->artist->name : 0) }}">{{isset( $song->artist->name) ? $song->artist->name : "unknown" }}</a></span>
                  </div>
                  
                  {{-- <span class="single-item__time">2:58</span> --}}
               </li>

        
                @endforeach
                @else
                <li style="color: #fff">NO Song Found ON THIS QUERY</li>
                @endif
                
             </ul>
          </div>
       </div>
    </div>
 </section>

@endsection