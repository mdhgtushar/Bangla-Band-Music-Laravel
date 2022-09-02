@extends("layout.admin")

@section("content")

<div class="col-12">
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="{{route("admin")}}">Home</a></li>
						<li class="breadcrumb__item"><a href="{{route("admin.songs")}}">Songs</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">Edit Song</li>
					</ul>
				</div>
				<div class="col-12">
					<div class="main__title main__title--page">
						<h1>Edit Song</h1>
					</div>
				</div>
				<div class="row row--grid">
				<div class="col-12 col-lg-7 col-xl-8">
				    @if($errors->any())
                    				    <div class="alert alert-danger">
                      {{ implode('', $errors->all(':message')) }}
                      </div>
                    @endif
					<form  action="{{ route("admin.songs") }}/{{$song->id}}" method="POST" enctype="multipart/form-data" class="sign__form sign__form--contacts">
					    @csrf
					    @method('PUT')
					    @if(Session::get('success'))
<div class="p-6">
<div class="alert alert-success">
    {{session::get('success')}}
</div>
</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger m-6">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
						<div class="row">
							<div class="col-12">
								<div class="sign__group">
									<input type="text" required name="title" value="{{ $song->title }}"  class="sign__input" placeholder="Title">
								</div>
							</div>
							<div class="col-12 col-md-6">
							    
								<div class="sign__group">
									<div class="file-upload">
                                      <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                                    
                                      <div class="image-upload-wrap">
                                        <input class="file-upload-input" name="image" required type='file' onchange="readURL(this);" accept="image/*" />
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

							<div class="col-12 col-md-6">
								<div class="sign__group">
										<div class="file-upload">
                                      <button class="file-upload-btn" type="button" onclick="$('.audio-up').trigger( 'click' )">Add Song</button>
                                    <input class="audio-up" name="audio" type='file' required accept="audio/*" />
                                    
                                    </div>
								</div>
							</div>
                            <div class="col-12 col-md-6">
								<div class="sign__group">
									<select name="artist_id" required class="sign__input">
									    <option value="" selected disabled>Select Artist </option>
									    @foreach ($artists as $artist)
                            <option value="{{ $artist->id }}"  {{ $song->artist_id == $artist->id ? "selected" : ""  }} >{{ $artist->name }} </option>  
                            @endforeach
									    </select>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="sign__group">
									<select name="album_id" class="sign__input">
									     <option value="0" selected>Select Album </option>
                                @foreach ($albums as $album)
                                <option value="{{ $album->id }}"  {{ $song->album_id == $album->id ? "selected" : ""  }} >{{ $album->name }} </option>  
                                @endforeach
									    </select>
								</div>
							</div>
							<div class="col-12">
								<div class="sign__group">
									<textarea name="lyric" class="sign__textarea" placeholder="Song Lyric (optional)">{{$song->lyric}}</textarea>
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
						<li><p>Title: </p></li>
						<li>Image : </li>
						<li>Audio : </li>
					</ul>
				</div>
			</div>
@endsection