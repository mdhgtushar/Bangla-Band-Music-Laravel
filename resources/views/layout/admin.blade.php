<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta
         name="viewport"
         content="width=device-width, initial-scale=1, shrink-to-fit=no"
         />
      <!-- CSS -->
      <link rel="stylesheet" href="{{ asset("css/bootstrap-reboot.min.css") }}" />
      <link rel="stylesheet" href="{{ asset("css/bootstrap-grid.min.css") }}" />
      <link rel="stylesheet" href="{{ asset("css/owl.carousel.min.css") }}" />
      <link rel="stylesheet" href="{{ asset("css/magnific-popup.css") }}" />
      <link rel="stylesheet" href="{{ asset("css/select2.min.css") }}" />
      <link rel="stylesheet" href="{{ asset("css/paymentfont.min.css") }}" />
      <link rel="stylesheet" href="{{ asset("css/slider-radio.css") }}" />
      <link rel="stylesheet" href="{{ asset("css/plyr.css") }}" />
      <link rel="stylesheet" href="{{ asset("css/main.css") }}" />
      <!-- Favicons -->
      <link
         rel="icon"
         type="image/png"
         href="icon/favicon-32x32.png"
         sizes="32x32"
         />
      <link rel="apple-touch-icon" href="icon/favicon-32x32.png" />
      <meta name="description" content="" />
      <meta name="keywords" content="" />
      <meta name="author" content="Dmitry Volkov" />
      <title>Music Player</title>
   </head>
   <body>
      <!-- header -->
      <header class="header">
         <div class="header__content">
            <div class="header__logo">
               <a href="{{route("admin")}}">
               <img src="{{ asset("site_images/logoadmin.png") }}" alt="" />
               </a>
            </div>
            <nav class="header__nav">
               <a href="{{ route("home") }}" target="blank">Visit Site</a>
            </nav>
            <form action="{{ route("admin.search") }}" method="GET" class="header__search">
               <input type="text" name="q" value="{{ isset($_GET['q']) ? $_GET['q'] : '' }}" placeholder="Artist, Music or Album" />
               <button type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                     <path
                        d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"
                        />
                  </svg>
               </button>
               <button type="button" class="close">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                     <path
                        d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"
                        />
                  </svg>
               </button>
            </form>
            <button class="header__btn" type="button">
            <span></span>
            <span></span>
            <span></span>
            </button>
            <div class="header__actions">
				<div class="header__action header__action--search">
					<button class="header__action-btn" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"></path></svg></button>
				</div>

		
<div class="header__action ">
	
					<a class="header__action-btn" href="">
					    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="pink" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
					</a>

				
				</div>
   @if (Auth::check())
				<div class="header__action header__action--signin" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
					<a class="header__action-btn" href="">
					 
	<span>Log Out</span>
						
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,12a1,1,0,0,0-1-1H11.41l2.3-2.29a1,1,0,1,0-1.42-1.42l-4,4a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l4,4a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L11.41,13H19A1,1,0,0,0,20,12ZM17,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V16a1,1,0,0,0-2,0v3a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V8a1,1,0,0,0,2,0V5A3,3,0,0,0,17,2Z"></path></svg>
					</a>
				</div>
				 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
@else
<div class="header__action header__action--signin">
					<a class="header__action-btn" href="{{route("login")}}">
					 
	<span>Sign In</span>
						
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,12a1,1,0,0,0-1-1H11.41l2.3-2.29a1,1,0,1,0-1.42-1.42l-4,4a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l4,4a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L11.41,13H19A1,1,0,0,0,20,12ZM17,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V16a1,1,0,0,0-2,0v3a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V8a1,1,0,0,0,2,0V5A3,3,0,0,0,17,2Z"></path></svg>
					</a>
				</div>
@endif
			</div>
         </div>
      </header>
      <!-- end header -->
      <!-- sidebar -->
      <div class="sidebar">
         <!-- sidebar logo -->
         <div class="sidebar__logo">
            <img src="{{ asset("site_images/logoadmin.png") }}" alt="" />
         </div>
         <!-- end sidebar logo -->
         <!-- sidebar nav -->
         <ul class="sidebar__nav">
            <li class="sidebar__nav-item">
               <a
                  href="{{ route("admin") }}"
                  class="sidebar__nav-link sidebar__nav-link{{ request()->routeIs('admin') ? '--active' : '' }}"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                     <path
                        d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z"
                        ></path>
                  </svg>
                  <span>Dashboard</span>
               </a
                  >
            </li>
               @if (Auth::check())
            <li class="sidebar__nav-item">
               <a href="{{ route("admin.artists") }}" class="sidebar__nav-link sidebar__nav-link{{ request()->routeIs('admin.artists', 'admin.artists.*') ? '--active' : '' }}"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                     <path
                        d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z"
                        />
                  </svg>
                  <span>Artists</span>
               </a
                  >
            </li>
            <li class="sidebar__nav-item">
               <a href="{{ route("admin.albums") }}" class="sidebar__nav-link sidebar__nav-link{{ request()->routeIs('admin.albums','admin.albums.*') ? '--active' : '' }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.65,2.24a1,1,0,0,0-.8-.23l-13,2A1,1,0,0,0,7,5V15.35A3.45,3.45,0,0,0,5.5,15,3.5,3.5,0,1,0,9,18.5V10.86L20,9.17v4.18A3.45,3.45,0,0,0,18.5,13,3.5,3.5,0,1,0,22,16.5V3A1,1,0,0,0,21.65,2.24ZM5.5,20A1.5,1.5,0,1,1,7,18.5,1.5,1.5,0,0,1,5.5,20Zm13-2A1.5,1.5,0,1,1,20,16.5,1.5,1.5,0,0,1,18.5,18ZM20,7.14,9,8.83v-3L20,4.17Z"></path></svg>
                   <span>Albums</span></a>
            </li>
            <li class="sidebar__nav-item">
               <a href="{{ route("admin.songs") }}" class="sidebar__nav-link sidebar__nav-link{{ request()->routeIs('admin.songs','admin.songs.*') ? '--active' : '' }}">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,13.18V11A8,8,0,0,0,4,11v2.18A3,3,0,0,0,2,16v2a3,3,0,0,0,3,3H8a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1H6V11a6,6,0,0,1,12,0v2H16a1,1,0,0,0-1,1v6a1,1,0,0,0,1,1h3a3,3,0,0,0,3-3V16A3,3,0,0,0,20,13.18ZM7,15v4H5a1,1,0,0,1-1-1V16a1,1,0,0,1,1-1Zm13,3a1,1,0,0,1-1,1H17V15h2a1,1,0,0,1,1,1Z"></path></svg>
                   <span>Songs</span></a>
            </li>
            @endif
         </ul>
         <!-- end sidebar nav -->
      </div>
      <!-- end sidebar -->
     
	<!-- player -->
	<div class="player" onclick="console.log(this)">
		<div class="player__cover">
			<img src="{{asset("site_images/logo.png")}}" alt="">
		</div>

		<div class="player__content">
		    
		    <div class="player__lyric">
		      
		    </div>
			<span class="player__track"><b class="player__title">...</b> – <span class="player__artist">...</span></span>
			<audio src="" id="audio" controls></audio>
		</div>
	</div>

	<button class="player__btn" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.65,2.24a1,1,0,0,0-.8-.23l-13,2A1,1,0,0,0,7,5V15.35A3.45,3.45,0,0,0,5.5,15,3.5,3.5,0,1,0,9,18.5V10.86L20,9.17v4.18A3.45,3.45,0,0,0,18.5,13,3.5,3.5,0,1,0,22,16.5V3A1,1,0,0,0,21.65,2.24ZM5.5,20A1.5,1.5,0,1,1,7,18.5,1.5,1.5,0,0,1,5.5,20Zm13-2A1.5,1.5,0,1,1,20,16.5,1.5,1.5,0,0,1,18.5,18ZM20,7.14,9,8.83v-3L20,4.17Z"/></svg> Player</button>
	<!-- end player -->




<style>
    .player--active{
        height:100%;
    }
   .player--active .player__content{
        position: absolute;
    padding: 50px 20px;
    bottom: 0;
        background:#16151a;
    }
    .player__lyric{
        color: white;
        text-align:center;
    }
    .player__cover{
        max-width: 90%;
    opacity: 0.5;
    border-radius: 50%;
    }    
    .player__cover img {
        border-radius: 50%;
    }
</style>


<style>


.file-upload {
  background-color: #222227;
  padding: 20px;
  width: 100%;
  border-radius: 12px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #25a56a;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}
.file-upload-content img{
 height:100px;
}
.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}


.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #1FB264;
  position: relative;
  height: 100px;
  color: #fff;
}
.audio-up{
      margin-top: 20px;
  border: 4px dashed #1FB264;
  position: relative;
  height: 100px;
  color: #fff;
}
.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding:
</style>
      <!-- main content -->
      <main class="main">
         <div class="container-fluid">
         

<script>
    const player = document.querySelector("#audio");
    const lyrics = document.querySelector(".player__lyric");
    const lines = lyrics.textContent.trim().split("\n");

    lyrics.removeAttribute("style");
    lyrics.innerText = "";

    let syncData = [];

    lines.map((line, index) => {
        const [time, text] = line.trim().split("|");
        syncData.push({ start: time.trim(), text: text.trim() });
    });

    player.addEventListener("timeupdate", () => {
        syncData.forEach((item) => {
            console.log(item);
            if (player.currentTime >= item.start) lyrics.innerText = item.text;
        });
    });
</script>
            @yield("content")
         </div>
      </main>
      <!-- end main content -->
      <!-- JS -->
      <script src="{{ asset("js/jquery-3.5.1.min.js") }}"></script>
      <script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
      <script src="{{ asset("js/owl.carousel.min.js") }}"></script>
      <script src="{{ asset("js/jquery.magnific-popup.min.js") }}"></script>
      <script src="{{ asset("js/smooth-scrollbar.js") }}"></script>
      <script src="{{ asset("js/select2.min.js") }}"></script>
      <script src="{{ asset("js/slider-radio.js") }}"></script>
      <script src="{{ asset("js/jquery.inputmask.min.js") }}"></script>
      <script src="{{ asset("js/plyr.min.js") }}"></script>
      <script src="{{ asset("js/main.js") }}"></script>
      <script>
          function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});
      </script>
   </body>
</html>