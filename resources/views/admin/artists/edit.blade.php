@extends("layout.admin")

@section("content")

<div class="col-12">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="{{route("admin")}}">Dashboard</a></li>
						<li class="breadcrumb__item"><a href="{{route("admin.artists")}}">Artists</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Add Artist</li>
					</ul>
				</div>
				<div class="row row--grid">
    <div class="col-12">
        <div class="main__title main__title--page">
						<h1>Edit {{ $artist->name }}'s Profile</h1>
					</div>
				    <div class="hero__btns">
								<a href="{{ route("admin.artists.edit", $artist->id) }}" class="hero__btn hero__btn--green" style="font-family: Inter, Bangla524, sans-serif;">Edit This Artist</a>
								
								<form action="{{ route("admin.artists.delete", $artist->id) }}" method="post" class="inline-block">
  @csrf
  @method("delete")
  <button type="submit" class="hero__btn hero__btn--danger" onclick="return confirm('Are You Sure? You Want To Delete')"  style="font-family: Inter, Bangla524, sans-serif;background:#5e0000">Delete This Artist</button>
</form>

							</div>
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
				
				<div class="row row--grid">
				<div class="col-12 col-lg-7 col-xl-8">
				    @if($errors->any())
				    <div class="alert alert-danger">
                      {{ implode('', $errors->all(':message')) }}
                      </div>
                    @endif
					<form  action="{{ route("admin.artists") }}/{{ $artist->id }}" method="POST" enctype="multipart/form-data" class="sign__form sign__form--contacts">
					    @csrf
					    @method('PUT')
						<div class="row">
							
							<div class="col-12 col-md-6">
								<div class="sign__group">
									<input type="text" name="name" value="{{ $artist->name }}" required class="sign__input" placeholder="Artist's Name">
								</div>
							</div>
							
							<div class="col-12 col-md-6">
								<div class="sign__group">
									<input type="text" name="country" value="{{ $artist->country }}" required class="sign__input" placeholder="Artist's Country">
								</div>
							</div>
							<div class="col-12">
							    
								<div class="sign__group">
									<div class="file-upload">
                                      <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                                    
                                      <div class="image-upload-wrap">
                                        <input class="file-upload-input" name="image" type='file' onchange="readURL(this);" accept="image/*" />
                                        <div class="drag-text">
                                          <h3>Drag and drop a file or select add Image</h3>
                                        </div>
                                      </div>
                                      <div class="file-upload-content">
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        <div class="image-title-wrap">
                                          <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                        </div>
                                      </div>
                                    </div>
								</div>
							</div>

							<div class="col-12">
								<div class="sign__group">
									<textarea name="bio" class="sign__textarea" placeholder="Artist's Bio">{{ $artist->bio }}</textarea>
								</div>
							</div>

							<div class="col-12 col-xl-3">
								<input type="submit" class="sign__btn">
							</div>
						</div>
					</form>	
				</div>

				<div class="col-12 col-md-6 col-lg-5 col-xl-4">
					<div class="main__title main__title--sidebar">
						<h2>Guide </h2>
						<p>Follow The staps</p>
					</div>
					<ul class="contacts__list" style="color:#fff">
						<li><p>Name: </p></li>
						<li>Image : </li>
						<li>Bio : </li>
					</ul>
				</div>
			</div>
@endsection