@extends("layout.client")

@section("content")
<div class="row row--grid">
   <!-- breadcrumb -->
   <div class="col-12">
      <ul class="breadcrumb">
         <li class="breadcrumb__item"><a href="{{ route("home") }}">Home</a></li>
         <li class="breadcrumb__item"><a href="{{ route("albums") }}">Albums</a></li>
         <li class="breadcrumb__item breadcrumb__item--active">{{ $album->name }}</li>
      </ul>
   </div>
   <!-- end breadcrumb -->

   <!-- title -->
   <div class="col-12">
      <div class="main__title main__title--page">
         <h1>{{ $album->name }}</h1>
      </div>
   </div>
   <!-- end title -->

   <div class="col-12">
      <div class="release">
         <div class="release__content">
            <div class="release__cover">
               <img src="{{ asset("images/$album->image") }}" alt="">
            </div>
            <div class="release__stat">
               <span>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,13.18V11A8,8,0,0,0,4,11v2.18A3,3,0,0,0,2,16v2a3,3,0,0,0,3,3H8a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1H6V11a6,6,0,0,1,12,0v2H16a1,1,0,0,0-1,1v6a1,1,0,0,0,1,1h3a3,3,0,0,0,3-3V16A3,3,0,0,0,20,13.18ZM7,15v4H5a1,1,0,0,1-1-1V16a1,1,0,0,1,1-1Zm13,3a1,1,0,0,1-1,1H17V15h2a1,1,0,0,1,1,1Z"></path></svg>
                  {{ $album->songs->count() }} songs</span>
            </div>
         </div>

         <div class="release__list" data-scrollbar="true" tabindex="-1" style="overflow: hidden; outline: none;"><div class="scroll-content" style="transform: translate3d(0px, 0px, 0px);">
            <ul class="main__list main__list--playlist main__list--dashbox">
               @foreach ($album->songs as $key => $song)
                  
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
      
   </div>

   <div class="col-12 col-lg-8">
      <div class="article">
         <!-- article content -->
         <div class="article__content">
            <h4>About new album</h4>
            <p> {{ $album->about }}</p>
         </div>
         <!-- end article content -->


      </div>
   </div>

   <div class="col-12 col-lg-4">
      <!-- releases -->
      <div class="row row--sidebar">
         <!-- title -->
         <div class="col-12">
            <div class="main__title main__title--sidebar">
               <h3>Latest Albums</h3>
            </div>
         </div>
         <!-- end title -->
@foreach ($albumsLasest as $album)
   
         <div class="col-6 col-sm-4 col-lg-6">
            <div class="album album--sidebar">
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
         
         
      </div>
      <!-- end releases -->
   </div>	
</div>
@endsection