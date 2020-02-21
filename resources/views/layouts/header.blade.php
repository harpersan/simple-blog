<nav class="flex items-center justify-between flex-wrap bg-teal p-6">
   <a href="/">
      <div class="flex items-center flex-no-shrink text-teal-500 mr-6">
        <svg class="h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
        <span class="font-semibold text-xl tracking-tight">Simple Blog</span>
      </div>
    </a>
   <div class="block lg:hidden">
     <button class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
       <svg class="h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
     </button>
   </div>
   <div class="flex justify-between">
      <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        </div>
          <div class="flex items-center">
            @if (Auth::check())
              <a href="/{{Auth::user()->name}}">
                @if (Auth::user()->profile_images)
                <img class="h-10 w-10 rounded-full" src="{{ asset('images/profile/'.Auth::user()->profile_images ) }}" alt=""> 
                @else
                <img class="h-10 w-10 rounded-full" src="/images/person-placeholder.jpg" alt="">
                @endif
              </a> 
              <p class="mx-1">|</p>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
              </form>
            @else
              <a class="hover:text-teal-500" href="/register">Register</a>
              <p class="mx-1">|</p>
              <a class="hover:text-teal-500" href="/login">Login</a>
            @endif
          </div>
    </div> 
 </nav>