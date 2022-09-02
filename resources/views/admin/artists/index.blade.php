@extends("layout.admin")

@section("content")
<div class="col-12">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="{{route("admin")}}">Dashboard</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Artists</li>
					</ul>
				</div>
				<div class="col-12">
					<div class="main__title main__title--page">
					<h1>	{{isset($_GET["q"]) ? "Showing Artist for : ". $_GET["q"] : "Artists" }}</h1>
					</div>
				</div>
				<div class="row row--grid">
				<div class="col-12">
				    <div class="hero__btns">
								<a href="{{ route("admin.artists.create") }}" class="hero__btn hero__btn--green" style="font-family: Inter, Bangla524, sans-serif;">Add Artist</a>
								<a href="#" class="hero__btn" style="font-family: Inter, Bangla524, sans-serif;">Learn How To Add Artist</a>
							</div>
					<div class="main__filter">
						<form action="" method="get" class="main__filter-search">
							<input type="text" name="q" placeholder="Search...">
							<button type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"></path></svg></button>
						</form>

						<div class="main__filter-wrap">
							
							<a href="{{route("admin.artists")}}">
							    <span class="select2 select2-container select2-container--default"style="width: 99px;">
							    <span class="selection">
							        <span class="select2-selection select2-selection--single">
							            <span class="select2-selection__rendered">All Artists</span>
							            </span></span></span>
							</a>
						</div>
						</div>

					<div class="row row--grid">
					     @foreach ($artists as $artist)
						<div class="col-6 col-sm-4 col-md-3 col-xl-2">
							<a href="{{ route("admin.artists.show", $artist->id) }}" class="artist">
								<div class="artist__cover">
									<img src="{{ asset("images/$artist->image") }}" alt="">
								</div>
								<h3 class="artist__title">{{ $artist->name }} | A({{ $artist->albums->count() }}) | S({{ $artist->songs->count() }})</h3>
							</a>
						</div>
                        @endforeach
					</div>

				</div>
			</div>
@endsection