@extends('layouts.app')

@section('content')

<div class="w-full flex flex-row flex-wrap">

   <div class="w-full bg-indigo-100 h-screen flex flex-row flex-wrap justify-center ">

       <div
           class="bg-white shadow-lg border-t-4 border-indigo-500 absolute bottom-0 w-full md:w-0 md:hidden flex flex-row flex-wrap">
           <div class="w-full text-right"><button class="p-2 fa fa-bars text-4xl text-gray-600"></button></div>
       </div>

       <div class="w-0 md:w-1/4 lg:w-1/5 h-0 md:h-screen overflow-y-hidden bg-white shadow-lg">
           <div class="p-5 bg-white sticky top-0">
            @if (!Auth::user()->profile_images)
            <img class="border border-indigo-100 shadow-lg round rounded-full "
            src="http://lilithaengineering.co.za/wp-content/uploads/2017/08/person-placeholder.jpg"> 
            <div class="pt-2 border-t mt-5 w-full text-center text-xl text-gray-600">
            </div>
            @endif
            @if (Auth::user()->profile_images)
            <img class="border border-indigo-100 shadow-lg round rounded-full w-56 h-56" src="{{ asset('images/profile/'.Auth::user()->profile_images ) }}"> 
            <div class="pt-2 border-t mt-5 w-full text-center text-xl text-gray-600">
                {{ Auth::user()->name }}
            </div>
            @endif  
           </div>
           <div class="w-full h-screen antialiased flex flex-col hover:cursor-pointer">
               <a class="hover:bg-gray-200 bg-white border-t-2 p-3 w-full text-left text-gray-600 font-semibold"
                   href="/create-post"><i class="fas fa-plus text-gray-600 text-xl pr-1 pt-1 float-right"></i>Add Blog Post</a>
               <a class="hover:bg-gray-200 bg-white border-t-2 p-3 w-full text-left text-gray-600 font-semibold"
                   href="/edit-profile"><i class="fa fa-cog text-gray-600 text-xl pr-1 pt-1 float-right"></i>Edit Profile</a>
               <a class="hover:bg-gray-200 bg-white border-t-2 p-3 w-full text-left text-gray-600 font-semibold"
                   href=""><i class="fa fa-arrow-left text-gray-600 text-xl pr-1 pt-1 float-right"></i>Log out</a>
           </div>
       </div>

       <!-- End Navbar -->

       <div class="w-full md:w-3/4 lg:w-4/5 p-5 md:px-12 lg:24 h-full overflow-x-scroll antialiased">

         <div class="w-full max-w-2xl mx-auto border shadow rounded p-5 mt-10 bg-teal-300">
            <h1 class="text-3xl">
               Edit Blog Post
            </h1>
        </div>
        <edit-post :post="{{  json_encode($post) }}" :user="{{  json_encode(Auth::user()->name) }}"></edit-post>
       </div>
   </div>

</div>
   
@endsection

