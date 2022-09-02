@extends("layout.client")

@section("content")
<div class="h-96 overflow-hidden">
  <div class="fixed z-0 container">
      <img class="p-2  h-96 w-full" src="https://s3.amazonaws.com/thumbnails.venngage.com/template/ab54f01f-0e5a-47f3-803c-09a250845623.png" alt="">
  </div>

  </div>
      
  <div class="-mt-44 px-2">
    <div class="relative z-10 h-44 bg-gradient-to-t from-black via-black-500 w-full"></div>
</div>
<div class="relative z-10 bg-white overflow-hidden p-2">

<div class="grid grid-cols-4 gap-4">
  @foreach ($artists as $artist)
    
  <div class="flex justify-center">
      
<div class="rounded-3xl overflow-hidden shadow-xl max-w-xs my-3 bg-blue-500">
  <br><br>
  <br><br>
  {{-- <img src="https://images.unsplash.com/photo-1578836537282-3171d77f8632?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80" class="w-full" /> --}}
<div class="flex justify-center -mt-8">
    <img src="{{ asset("images/$artist->image") }}" class="w-24 rounded-full border-solid border-white border-2 -mt-3">		
</div>
<div class="text-center px-3 pb-0 pt-2">
    <h3 class="text-white text-sm bold font-sans">{{ $artist->name }}</h3>
    <p class="mt-2 font-sans font-light text-white text-sm">{{ $artist->country }}</p>
</div>
  <a href="{{ route("profile", $artist->id) }}" class="btn btn-wide m-6">View Profile</a>
</div>
  </div>
  @endforeach
  
</div>





</div>

@endsection