@extends("layout.client")


@section("content")

<div class="row row--grid">
    <!-- breadcrumb -->
    <div class="col-12">
        <ul class="breadcrumb">
            <li class="breadcrumb__item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb__item breadcrumb__item--active">Artists</li>
        </ul>
    </div>
    <!-- end breadcrumb -->

    <!-- title -->
    <div class="col-12">
        <div class="main__title main__title--page">
            <h1 style="font-family: Inter, Bangla322, sans-serif;">Artists</h1>
        </div>
    </div>
    <!-- end title -->
</div>
<div class="row row--grid">
    <div class="col-12">
        <div class="row row--grid">
            @foreach ($artists as $artist)
            <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                <a href="{{ route("artists.profile", $artist->id) }}" class="artist">
                    <div class="artist__cover">
                        <img src="{{ asset("images/$artist->image") }}" alt="">
                    </div>
                    <h3 class="artist__title" style="font-family: Inter, Bangla322, sans-serif;">{{ $artist->name }}</h3>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</div> 

@endsection