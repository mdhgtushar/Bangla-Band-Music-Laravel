<!DOCTYPE html>
<html>
   <head>
      <title>ADMIN || Music System</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
   <link href="https://cdn.jsdelivr.net/npm/daisyui@2.15.4/dist/full.css" rel="stylesheet" type="text/css" />
   <script src="https://cdn.tailwindcss.com"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
   <body class="h-screen">
      <section>
         <div class="header" style="top:0">
            <div class="menu">
               <div class="flex items-center">
                  <div class="ml-10 flex items-baseline space-x-4">
                     <a class="text-gray-300 hover:text-gray-800 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="#">
                     Home
                     </a>
                    
                  </div>
               </div>
            </div>
               <div class="flex items-center justify-items-end w-full w-44 float-right h-full group">
                  <button class="btn gap-2 btn-sm " onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                     Logout
                   </button>
               </div>
          

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
         </div>
      </section>
      <section>
      <div class="sidebar">
         <div class="header-sub">
            <div class="flex justify-center logo">
               <img src="{{ asset('site_images/logoadmin.png') }}" style="filter: invert(1);" /> 
            </div>
         </div>
         <div class="p-6 bg-white dark:bg-gray-800 border-b-2" >
            <div class="flex flex-row items-start gap-4">
               <div class="h-auto w-full flex flex-col justify-between">
                  <div>
                     <p class="text-gray-800 dark:text-white text-xl font-medium">
                        {{ Auth::user()->name }}
                     </p>
                     <p class="text-gray-400 text-xs">
                        Supper Admin
                     </p>
                  </div>
               </div>
            </div>
            <div class="flex items-center justify-between gap-4 mt-6">
               <button type="button" class="w-1/2 px-4 py-2 text-base border rounded-lg text-grey-500 bg-white hover:bg-gray-200">
               Site Settings
               </button>
               <a type="button" href="/" target="blank" class="w-1/2 text-center px-4 py-2 text-base border rounded-lg text-white bg-indigo-500 hover:bg-indigo-700">
               View Site
               </a>
            </div>
         </div>
         <div class="bg-white dark:bg-gray-800">
            <nav class="mt-10 px-6">
               <a href="{{ route("admin") }}" class="w-full font-thin uppercase 
               text-{{ request()->routeIs('admin') ? 'blue' : 'black' }}-500 flex items-center p-4 my-2 
               transition-colors duration-200 justify-start bg-gradient-to-r 
               from-white to-{{ request()->routeIs('admin') ? 'blue' : 'gray' }}-100 border-r-4 border-{{ request()->routeIs('admin') ? 'blue' : 'gray' }}-500 dark:from-gray-700 
               dark:to-gray-800 border-r-4">
                  <span class="text-left">
                     <svg width="20" height="20" fill="currentColor" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z"></path>
                     </svg>
                  </span>
                  <span class="mx-4 text-sm font-normal">
                  Dashboard
                  </span>
               </a>
               <div>
                  <p class="text-gray-300 ml-2 w-full border-b-2 pb-2 border-gray-100 mb-4 text-md font-normal">
                     Modules
                  </p>
                  <a  href="{{ route("admin.artists") }}" 
                  class="hover:border-blue-500 hover:text-blue-500 hover:bg-blue-100 hover:to-blue-100 w-full
                   font-thin uppercase text-{{ request()->routeIs('admin.artists', 'admin.artists.*') ? 'blue' : 'black' }}-500 flex items-center p-3 my-2 transition-colors
                    duration-200 justify-start bg-gradient-to-r 
                    from-white to-{{ request()->routeIs('admin.artists', 'admin.artists.*') ? 'blue' : 'gray' }}-100 
                    border-r-3 border-{{ request()->routeIs('admin.artists', 'admin.artists.*') ? 'blue' : 'gray' }}-500 dark:from-gray-700 dark:to-gray-800 border-r-4 border-black-500">
                     <span class="text-left">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                           <path d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z"></path>
                        </svg>
                     </span>
                     <span class="mx-4 text-sm font-normal">
                     Artists </span>
                  </a>
                  <a  href="{{ route("admin.albums") }}" 
                  class="hover:border-blue-500 hover:text-blue-500 hover:bg-blue-100 hover:to-blue-100 w-full
                   font-thin uppercase text-{{ request()->routeIs('admin.albums', 'admin.albums.*') ? 'blue' : 'black' }}-500 flex items-center p-3 my-2 transition-colors
                    duration-200 justify-start bg-gradient-to-r 
                    from-white to-{{ request()->routeIs('admin.albums', 'admin.albums.*') ? 'blue' : 'gray' }}-100 
                    border-r-3 border-{{ request()->routeIs('admin.albums', 'admin.albums.*') ? 'blue' : 'gray' }}-500 dark:from-gray-700 dark:to-gray-800 border-r-4 border-black-500"> <span class="text-left">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                           <path d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z"></path>
                        </svg>
                     </span>
                     <span class="mx-4 text-sm font-normal">
                     Albums </span>
                  </a>
                  <a  href="{{ route("admin.songs") }}" 
                  class="hover:border-blue-500 hover:text-blue-500 hover:bg-blue-100 hover:to-blue-100 w-full
                   font-thin uppercase text-{{ request()->routeIs('admin.songs', 'admin.songs.*') ? 'blue' : 'black' }}-500 flex items-center p-3 my-2 transition-colors
                    duration-200 justify-start bg-gradient-to-r 
                    from-white to-{{ request()->routeIs('admin.songs', 'admin.songs.*') ? 'blue' : 'gray' }}-100 
                    border-r-3 border-{{ request()->routeIs('admin.songs', 'admin.songs.*') ? 'blue' : 'gray' }}-500 dark:from-gray-700 dark:to-gray-800 border-r-4 border-black-500"> <span class="text-left">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                           <path d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z"></path>
                        </svg>
                     </span>
                     <span class="mx-4 text-sm font-normal">
                     Songs </span>
                  </a>
               </div>
            </nav>
         </div>
         <div class="mt-10 px-6">
            <p>This Site is Developed By MD HG TUSHAR</p>
            <br />
         </div>
      </div>
      
      <section class="container_custom">
         @yield("content")
      </section>
      
   </body>
</html>