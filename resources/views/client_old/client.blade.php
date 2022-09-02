<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Music system</title>
    <link
      href="https://cdn.jsdelivr.net/npm/daisyui@2.18.0/dist/full.css"
      rel="stylesheet"
      type="text/css"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
   <section class="container m-auto">
    <div class="mb-10 overflow-hidden">
        <div class="fixed z-20 t-0 container">

        <div class="navbar bg-base-100">
            <div class="flex-1">
              <a href="/" class="btn btn-ghost normal-case text-xl">Music</a>
            </div>
            <div class="flex-none gap-2">
              <a href="/artists">Artists</a>
              <div class="form-control">
                <input
                  type="text"
                  placeholder="Search"
                  class="input input-bordered"
                />
              </div>
            </div>
          </div>
        </div>
    </div>
      <hr />
  
      <div class="h-screen">
       
      @yield("content")
        </div>
   </section>
  </body>
</html>
