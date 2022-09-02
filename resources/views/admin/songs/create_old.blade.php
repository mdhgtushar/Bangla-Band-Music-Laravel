@extends("layout.admin")

@section("content")

<a href="{{ route("admin.songs") }}" class="btn btn-wide m-6">Go Back</a>
    <form class="container max-w-2xl mx-auto shadow-md md:w-3/4" action="{{ route("admin.songs") }}" method="POST" enctype="multipart/form-data">
@csrf
@if($errors->any())
  {{ implode('', $errors->all('<div class="alert alert-danger">:message</div>')) }}
@endif
        <div class="space-y-6 bg-white">
                <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                    <h2 class="max-w-sm mx-auto md:w-1/3">
                        Song info
                    </h2>
                    
                    <div class="max-w-sm mx-auto md:w-2/3">
                        <div>
                            <div class=" relative ">
                                <div class="form-control">
                                    <label class="label">
                                      <span class="label-text">Song Title</span>
                                    </label>
                                    <label class="input-group">
                                      <span>Title</span>
                                      <input type="text" name="title" required placeholder="..." class="input input-bordered" />
                                      
                                    </label>
                                  </div>
                               
                            </div>
                            </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                            <h2 class="max-w-sm mx-auto md:w-1/3">
                                Image 
                            </h2>
                            <div class="max-w-sm mx-auto md:w-2/3">
                                <div class=" relative ">
                                    <div class="form-control">
                                        <label class="label">
                                          <span class="label-text">Image</span>
                                        </label>
                                        <label class="input-group">
                                          <span>Name</span>
                                          <input type="file" required name="image" placeholder="..." class="input input-bordered" accept="image/*" />
                                          
                                        </label>
                                      </div>
                                
                                </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                                <h2 class="max-w-sm mx-auto md:w-1/3">
                                    Song
                                </h2>
                                <div class="max-w-sm mx-auto md:w-2/3">
                                    <div class=" relative ">
                                        <div class="form-control">
                                            <label class="label">
                                              <span class="label-text">Song</span>
                                            </label>
                                            <label class="input-group">
                                              <span>Upload</span>
                                              <input type="file" required name="audio" placeholder="..." class="input input-bordered" accept="audio/*" />
                                              
                                            </label>
                                          </div>
                                    
                                    </div>
                                    </div>
                                </div>
                                <hr/>
                            <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                                <h2 class="max-w-sm mx-auto md:w-1/3">
                                    Lyric
                                </h2>
                                <div class="max-w-sm mx-auto md:w-2/3">
                                    <div class=" relative ">
                                       <textarea name="lyric" id="" cols="30" rows="10"></textarea>
                                    
                                    </div>
                                    </div>
                                </div>
                                <hr/>
            <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                <h2 class="max-w-sm mx-auto md:w-1/3">
                    Select Artist
                </h2>
                <div class="max-w-sm mx-auto md:w-2/3">
                    <div class=" relative ">

                        <select name="artist_id" required class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" >
                            <option value="" selected disabled>Select Artist </option>
                            @foreach ($artists as $artist)
                            <option value="{{ $artist->id }}" >{{ $artist->name }} </option>  
                            @endforeach
                        </select>
                    
                    </div>
                    </div>
                </div>
                <hr/>
                <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                    <h2 class="max-w-sm mx-auto md:w-1/3">
                        Select Album
                    </h2>
                    <div class="max-w-sm mx-auto md:w-2/3">
                        <div class=" relative ">
    
                            <select name="album_id" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" >
                                <option value="" selected disabled>Select Album </option>
                                @foreach ($albums as $album)
                                <option value="{{ $album->id }}" >{{ $album->name }} </option>  
                                @endforeach
                            </select>
                        
                        </div>
                        </div>
                    </div>
                    <hr/>
                
                            <div class="w-full px-4 pb-4 ml-auto text-gray-500 md:w-1/3">
                                <button type="submit" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
            <br><br>
@endsection