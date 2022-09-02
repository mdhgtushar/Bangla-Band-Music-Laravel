@extends("layout.admin")

@section("content")
<div class="col-12">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="{{route("admin")}}">Dashboard</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Albums</li>
					</ul>
				</div>
				<div class="col-12">
					<div class="main__title main__title--page">
						<h1>	{{isset($_GET["q"]) ? "Showing Albums for : ". $_GET["q"] : "Albums" }}</h1>
					</div>
				</div>
				<div class="row row--grid">
				<div class="col-12">
				    <div class="hero__btns">
								<a href="{{ route("admin.albums.create") }}" class="hero__btn hero__btn--green" style="font-family: Inter, Bangla524, sans-serif;">Create Album</a>
								<a href="#" class="hero__btn" style="font-family: Inter, Bangla524, sans-serif;">Learn How To Create Album</a>
							</div>
					<div class="main__filter">
						<form action="" method="get" class="main__filter-search">
							<input type="text" name="q" placeholder="Search...">
							<button type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"></path></svg></button>
						</form>

						<div class="main__filter-wrap">
							
							<a href="{{route("admin.albums")}}">
							    <span class="select2 select2-container select2-container--default"style="width: 99px;">
							    <span class="selection">
							        <span class="select2-selection select2-selection--single">
							            <span class="select2-selection__rendered">All Albums</span>
							            </span></span></span>
							</a>
						</div></div>

					<div class="row row--grid">
					    @foreach ($albums as $album)
						<div class="col-6 col-sm-4 col-lg-2">
							<div class="album">
								<div class="album__cover">
									<img src="{{ asset("images/$album->image") }}" alt="">
									<a href="{{ route("admin.albums.show", $album->id) }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z"></path></svg></a>
									<span class="album__stat">
										<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3.71,16.29a1,1,0,0,0-.33-.21,1,1,0,0,0-.76,0,1,1,0,0,0-.33.21,1,1,0,0,0-.21.33,1,1,0,0,0,.21,1.09,1.15,1.15,0,0,0,.33.21.94.94,0,0,0,.76,0,1.15,1.15,0,0,0,.33-.21,1,1,0,0,0,.21-1.09A1,1,0,0,0,3.71,16.29ZM7,8H21a1,1,0,0,0,0-2H7A1,1,0,0,0,7,8ZM3.71,11.29a1,1,0,0,0-1.09-.21,1.15,1.15,0,0,0-.33.21,1,1,0,0,0-.21.33.94.94,0,0,0,0,.76,1.15,1.15,0,0,0,.21.33,1.15,1.15,0,0,0,.33.21.94.94,0,0,0,.76,0,1.15,1.15,0,0,0,.33-.21,1.15,1.15,0,0,0,.21-.33.94.94,0,0,0,0-.76A1,1,0,0,0,3.71,11.29ZM21,11H7a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2ZM3.71,6.29a1,1,0,0,0-.33-.21,1,1,0,0,0-1.09.21,1.15,1.15,0,0,0-.21.33.94.94,0,0,0,0,.76,1.15,1.15,0,0,0,.21.33,1.15,1.15,0,0,0,.33.21,1,1,0,0,0,1.09-.21,1.15,1.15,0,0,0,.21-.33.94.94,0,0,0,0-.76A1.15,1.15,0,0,0,3.71,6.29ZM21,16H7a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z"></path></svg> {{ $album->songs->count() }}</span>
									
										</span>
								</div>
								<div class="album__title">
									<h3><a href="{{ route("admin.albums.show", $album->id) }}">{{ $album->name }}</a></h3>
									<span><a href="{{ route("admin.artists.show", isset($album->artist->id) ? $album->artist->id : 0) }}">{{ isset($album->artist->name) ? $album->artist->name : "unknown" }}</a></span>
								</div>
							</div>
						</div>

@endforeach
					</div>

				</div>
			</div>
@endsection