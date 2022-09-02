@extends("layout.admin")
@section("content")
<div class="col-12">
   <ul class="breadcrumb">
      <li class="breadcrumb__item"><a href="{{route("admin")}}">Dashboard</a></li>
      <li class="breadcrumb__item breadcrumb__item--active">Songs</li>
   </ul>
</div>
<div class="col-12">
    <div class="main__title main__title--page">
      <h1>	{{isset($_GET["q"]) ? "Showing Songs for : ". $_GET["q"] : "Songs List" }}</h1>
   </div>
   <div class="hero__btns">
      <a href="{{ route("admin.songs.create") }}" class="hero__btn hero__btn--green">Upload Song</a>
      <a href="#" class="hero__btn">Learn How To upload</a>
   </div>
   <div class="main__filter">
      <form action="" method="get" class="main__filter-search">
							<input type="text" name="q" placeholder="Search...">
							<button type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"></path></svg></button>
						</form>

      <div class="main__filter-wrap">
         
							<a href="{{route("admin.songs")}}">
							    <span class="select2 select2-container select2-container--default"style="width: 99px;">
							    <span class="selection">
							        <span class="select2-selection select2-selection--single">
							            <span class="select2-selection__rendered">All Songs</span>
							            </span></span></span>
							</a>
         <select style="    background: #16151a;
    border: none;
    color: #fff;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
            <option value="" data-select2-id="5">By Artists</option>
            @foreach($artists as $artist)
            <a href=""><option value="?artist={{$artist->id}}" {{isset($_GET["artist"]) && ($_GET["artist"] == $artist->id) ? "selected" : "" }}>{{$artist->name}}</option></a>
            @endforeach
         </select>
         <select   style="   background: #16151a;
    border: none;
    color: #fff;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
            <option value="All genres" data-select2-id="4">By Album</option>
            @foreach($albums as $album)
            <option  value="?album={{$album->id}}" {{isset($_GET["album"]) && ($_GET["album"] == $album->id) ? "selected" : "" }}>{{$album->name}}</option>
            @endforeach
         </select>
      </div>
      
   </div>
   <div class="release">
      <div class="release__list" data-scrollbar="true" tabindex="-1" style="overflow: hidden; outline: none;width:100%; height:100%">
         <ul class="main__list main__list--playlist main__list--dashbox">
            @foreach ($songs as $song)
            <li class="single-item">
               <a data-playlist="" data-title="{{ $song->title }}" data-artist="{{  isset( $song->artist->name) ? $song->artist->name : "unknown" }}" data-img="{{ asset("simages/$song->image") }}" href="{{ asset("audios/$song->audio") }}" class="single-item__cover">
               <img src="{{ asset("simages/$song->image") }}" alt="">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z"></path>
               </svg>
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M16,2a3,3,0,0,0-3,3V19a3,3,0,0,0,6,0V5A3,3,0,0,0,16,2Zm1,17a1,1,0,0,1-2,0V5a1,1,0,0,1,2,0ZM8,2A3,3,0,0,0,5,5V19a3,3,0,0,0,6,0V5A3,3,0,0,0,8,2ZM9,19a1,1,0,0,1-2,0V5A1,1,0,0,1,9,5Z"></path>
               </svg>
               </a>
               <div class="single-item__title">
                  <h4><a href="#">{{ $song->title }}</a></h4>
                  <span><a href="artist.html">{{  isset( $song->artist->name) ? $song->artist->name : "unknown" }}</a></span>
               </div>
               <a href="{{route("admin.songs")}}/{{ $song->id }}/edit" class="single-item__add">
               <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  viewBox="0 0 194.436 194.436" style="enable-background:new 0 0 194.436 194.436;" xml:space="preserve">
                  <g>
                     <path d="M192.238,34.545L159.894,2.197C158.487,0.79,156.579,0,154.59,0c-1.989,0-3.897,0.79-5.303,2.196l-32.35,32.35
                        c-0.004,0.004-0.008,0.01-0.013,0.014L54.876,96.608c-1.351,1.352-2.135,3.166-2.193,5.076l-1.015,33.361
                        c-0.063,2.067,0.731,4.068,2.193,5.531c1.409,1.408,3.317,2.196,5.303,2.196c0.076,0,0.153-0.001,0.229-0.004l33.36-1.018
                        c1.909-0.058,3.724-0.842,5.075-2.192l94.41-94.408C195.167,42.223,195.167,37.474,192.238,34.545z M154.587,61.587L132.847,39.85
                        l21.743-21.743l21.738,21.741L154.587,61.587z M89.324,126.85l-22.421,0.685l0.682-22.422l54.655-54.656l21.741,21.738
                        L89.324,126.85z"/>
                     <path d="M132.189,117.092c-4.142,0-7.5,3.357-7.5,7.5v54.844H15.001V69.748h54.844c4.142,0,7.5-3.357,7.5-7.5s-3.358-7.5-7.5-7.5
                        H7.501c-4.142,0-7.5,3.357-7.5,7.5v124.687c0,4.143,3.358,7.5,7.5,7.5h124.687c4.142,0,7.5-3.357,7.5-7.5v-62.344
                        C139.689,120.449,136.331,117.092,132.189,117.092z"/>
                  </g>
                  <g></g>
                  <g></g>
                  <g></g>
                  <g></g>
                  <g></g>
                  <g></g>
                  <g></g>
                  <g></g>
                  <g></g>
                  <g></g>
                  <g></g>
                  <g></g>
                  <g></g>
                  <g></g>
                  <g></g>
               </svg>
               </a>
          
               
               <form action="{{ route("admin.songs.delete", $song->id) }}" method="post" class="inline-block">
               @csrf
               @method("delete")
               <button type="submit" class="btn single-item__export" style="background-color: #5e0000"  onclick="return confirm('Are You Sure You Want To Delete')" >
                    <svg xmlns="http://www.w3.org/2000/svg" style="fill:#000" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="482.428px" height="482.429px" viewBox="0 0 482.428 482.429" style="enable-background:new 0 0 482.428 482.429;" xml:space="preserve">
                     <g>
                        <g>
                           <path d="M381.163,57.799h-75.094C302.323,25.316,274.686,0,241.214,0c-33.471,0-61.104,25.315-64.85,57.799h-75.098    c-30.39,0-55.111,24.728-55.111,55.117v2.828c0,23.223,14.46,43.1,34.83,51.199v260.369c0,30.39,24.724,55.117,55.112,55.117    h210.236c30.389,0,55.111-24.729,55.111-55.117V166.944c20.369-8.1,34.83-27.977,34.83-51.199v-2.828    C436.274,82.527,411.551,57.799,381.163,57.799z M241.214,26.139c19.037,0,34.927,13.645,38.443,31.66h-76.879    C206.293,39.783,222.184,26.139,241.214,26.139z M375.305,427.312c0,15.978-13,28.979-28.973,28.979H136.096    c-15.973,0-28.973-13.002-28.973-28.979V170.861h268.182V427.312z M410.135,115.744c0,15.978-13,28.979-28.973,28.979H101.266    c-15.973,0-28.973-13.001-28.973-28.979v-2.828c0-15.978,13-28.979,28.973-28.979h279.897c15.973,0,28.973,13.001,28.973,28.979    V115.744z"/>
                           <path d="M171.144,422.863c7.218,0,13.069-5.853,13.069-13.068V262.641c0-7.216-5.852-13.07-13.069-13.07    c-7.217,0-13.069,5.854-13.069,13.07v147.154C158.074,417.012,163.926,422.863,171.144,422.863z"/>
                           <path d="M241.214,422.863c7.218,0,13.07-5.853,13.07-13.068V262.641c0-7.216-5.854-13.07-13.07-13.07    c-7.217,0-13.069,5.854-13.069,13.07v147.154C228.145,417.012,233.996,422.863,241.214,422.863z"/>
                           <path d="M311.284,422.863c7.217,0,13.068-5.853,13.068-13.068V262.641c0-7.216-5.852-13.07-13.068-13.07    c-7.219,0-13.07,5.854-13.07,13.07v147.154C298.213,417.012,304.067,422.863,311.284,422.863z"/>
                        </g>
                     </g>
                     <g></g>
                     <g></g>
                     <g></g>
                     <g></g>
                     <g></g>
                     <g></g>
                     <g></g>
                     <g></g>
                     <g></g>
                     <g></g>
                     <g></g>
                     <g></g>
                     <g></g>
                     <g></g>
                     <g></g>
                  </svg>
                   </button>
               </form>
            </li>
            @endforeach
         </ul>
      </div>
   </div>
</div>
@endsection