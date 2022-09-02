@extends("layout.admin")

@section("content")

<a href="{{ url()->previous() }}" class="btn btn-wide m-6">Go Back</a>
<section class="h-screen ">
    <form class="container max-w-2xl mx-auto shadow-md md:w-3/4" action="{{ route("admin.albums") }}/{{  $album->id }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

@if(Session::get('success'))
<div class="p-6">
<div class="alert alert-success">
    {{session::get('success')}}
</div>
</div>
@endif
        <div class="space-y-6 bg-white">
                <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                    <h2 class="max-w-sm mx-auto md:w-1/3">
                        Album Name
                    </h2>
                    
                    <div class="max-w-sm mx-auto md:w-2/3">
                            <div class=" relative ">
                                <div class="form-control">
                                    <label class="label">
                                      <span class="label-text">Album Name</span>
                                    </label>
                                    <label class="input-group">
                                      <span>Name</span>
                                      <input type="text" name="name" placeholder="..." value="{{ $album->name }}" class="input input-bordered" />
                                      
                                    </label>
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
                                          <span class="label-text">Artists Image</span>
                                        </label>
                                        <label class="input-group">
                                          <span>Upload</span>
                                          <input type="file" name="image" placeholder="..." class="input input-bordered" />
                                          
                                        </label>
                                      </div>
                                
                                </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                                <h2 class="max-w-sm mx-auto md:w-1/3">
                                    Artist
                                </h2>
                                <div class="max-w-sm mx-auto md:w-2/3">
                                    <div class=" relative ">
                
                                        <select name="artist_id" required class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" >
                                            <option value="" selected disabled>Select Artist </option>
                                            @foreach ($artists as $artist)
                                            <option value="{{ $artist->id }}" {{ $album->artist_id == $artist->id ? "selected" : "" }}>{{ $artist->name }} </option>  
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
                </section>

@endsection