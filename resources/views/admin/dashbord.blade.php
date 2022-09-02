@extends("layout.admin")

@section("content")
<div class="row row--grid">
						<div class="col-6 col-sm-4 col-lg-3">
							<div class="product">
								<h3 class="product__title"><a href="{{route("admin")}}">Total Users</a></h3>
								<span class="product__price">00</span>
							</div>
						</div>
						<div class="col-6 col-sm-4 col-lg-3">
							<div class="product">
								<h3 class="product__title"><a href="{{route("admin.songs")}}">Total Songs</a></h3>
								<span class="product__price">{{ $totalSongs }}</span>
							</div>
						</div>
						<div class="col-6 col-sm-4 col-lg-3">
							<div class="product">
								<h3 class="product__title"><a href="{{route("admin.albums")}}">Total Albums</a></h3>
								<span class="product__price">{{ $totalAlbums }}</span>
							</div>
						</div>
						<div class="col-6 col-sm-4 col-lg-3">
							<div class="product">
								<h3 class="product__title"><a href="{{route("admin.artists")}}">Total Artists</a></h3>
								<span class="product__price">{{ $totalArtists }}</span>
							</div>
						</div>

					</div>

@endsection