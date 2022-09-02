
@extends("layout.admin")

@section("content")
<nav class="flex p-6" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">
    <li class="inline-flex items-center">
      <a href="{{ route("admin") }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
        <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
        Dashboard
      </a>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Albums</span>
      </div>
    </li>
  </ol>
</nav>
<a href="{{ route("admin.albums.create") }}" class="btn btn-wide m-6">Create a new Album</a>
<div class="overflow-x-auto w-full p-5">
    <table class="table w-full p-1">
      <!-- head -->
      <thead>
        <tr>
          <th>Album</th>
          <th>Total Song</th>
          <th>Upload</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- row 1 -->
        @foreach ($albums as $album)
          
        <tr>
          <td>
            <div class="flex items-center space-x-3">
              <div class="avatar">
                <div class="mask mask-squircle w-12 h-12">
                  <img src="{{ asset("images/$album->image") }}" alt="{{ $album->image }}" />
                </div>
              </div>
              <div>
                <div class="font-bold">{{ $album->name }}</div>
                <div class="text-sm opacity-50">{{ isset($album->artist->name) ? $album->artist->name : "unknown" }}</div>
              </div>
            </div>
          </td>
          <td><p class="text-gray-500">{{ $album->songs->count() }}</p></td>
          <td><a href="{{ route("uploadSongAlbum", $album->id) }}" class="btn btn-outline gap-2 btn-sm">
            <i class="fa fa-play" aria-hidden="true"></i>
            Upload Song 
          </a></td>
          <td>
            <a href="{{ route("admin.albums.show", $album->id) }}" class="btn btn-info btn-sm">View</a>
<a href="albums/{{ $album->id }}/edit" class="btn btn-success btn-sm">Edit</a>
<form action="{{ route("admin.albums.delete", $album->id) }}" method="post" class="inline-block">
  @csrf
  @method("delete")
  <button type="submit" class="btn btn-error btn-sm" onclick="return confirm('Are You Sure? You Want To Delete')">Delete</button>
</form>
          </td>
        </tr>
        @endforeach
      </tbody>
      </tfoot>
      
    </table>
  </div>
@endsection