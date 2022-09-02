@extends("layout.client")

@section("content")
<br>
<div class="bg-white flex flex-row flex-wrap p-3">
    <div class="mx-auto w-full">
  <!-- Profile Card -->
  <div class="rounded-lg shadow-lg bg-gray-600 w-full flex flex-row flex-wrap p-3 antialiased" style="
    background-image: url('https://images.unsplash.com/photo-1578836537282-3171d77f8632?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80');
    background-repeat: no-repat;
    background-size: cover;
    background-blend-mode: multiply;
  ">
    <div class="md:w-1/6 w-full">
      <img class="rounded-lg shadow-lg antialiased" src="{{ asset("images/$artist->image") }}">  
    </div>
    <div class="md:w-5/6 w-full px-3 flex flex-row flex-wrap">
      <div class="w-full text-right text-gray-700 font-semibold relative pt-3 md:pt-0">
        <div class="text-2xl text-white leading-tight">{{ $artist->name }}</div>
        <div class="text-normal text-gray-300 hover:text-gray-400 cursor-pointer"><span class="border-b border-dashed border-gray-500 pb-1">{{ $artist->country }}</span></div>
        <div class="text-sm text-gray-300 hover:text-gray-400 cursor-pointer md:absolute pt-3 md:pt-0 bottom-0 right-0">Last Upload: <b>2 days ago</b></div>
      </div>
    </div>
  </div>
  <!-- End Profile Card -->
    </div>
  </div>
  <div class="overflow-x-auto w-full p-1">
    <table class="table w-full">
      <!-- head -->
      <thead>
        <tr>
          <th>Music</th>
          <th>Details</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
       @foreach ($artist->songs as $song)
         
    <tr>
      <td>
        <div class="flex items-center space-x-3">
          <div class="avatar">
            <div class="mask mask-squircle w-12 h-12">
              <img
                src="{{ asset("simages/$song->image") }}"
                alt="Avatar Tailwind CSS Component"
              />
            </div>
          </div>
          <div>
            <div class="font-bold">{{ $song->title }}</div>
            <div class="text-sm opacity-50">{{ $artist->name }}</div>
          </div>
        </div>
      </td>
      <td>
        <span class="badge badge-ghost badge-sm">02:00</span>
      </td>
      <th>
        <button class="btn btn-outline gap-2 btn-sm">
          <i class="fa fa-play" aria-hidden="true"></i>
          Play
        </button>
      </th>
    </tr>
    @endforeach
  </tbody>
    </table>
    <br />
    {{-- <div class="flex place-content-center">
      <div class="btn-group">
        <button class="btn">«</button>
        <button class="btn">Page 22</button>
        <button class="btn">»</button>
      </div>
    </div> --}}
  </div> 
@endsection