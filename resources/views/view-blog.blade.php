@extends('layouts.app')

@section('content')
   <div class="flex h-full bg-white rounded overflow-hidden shadow-lg pt-10 w-3/4 mx-auto pb-32">
      <a  class="flex flex-wrap no-underline hover:no-underline">
         <div class="w-full md:w-1/2 rounded-t">
            <img src="/images/blogpost/{{$view->images}}" class="h-full w-full shadow object-cover">
         </div>

         <div class="w-full md:w-1/2 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                  <p class="w-full text-gray-600 text-xs md:text-sm pt-6 px-6">GETTING STARTED</p>
                  <div class="w-full font-bold text-xl text-gray-900 px-6">{{$view->title}}</div>
                  <p class="text-gray-800 font-serif text-base px-6 mb-5">
                     {{$view->description}}
                  </p>
            </div>

            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                  <div class="flex items-center justify-between">
                        <img class="w-8 h-8 rounded-full mr-4 avatar" src="/images/profile/{{ $view->user->profile_images }}"
                        alt="Avatar of Author">
                     <p class="text-gray-600 text-xs md:text-sm">{{$view->created_at->diffForHumans()}}</p>
                  </div>
            </div>
         </div>

         <div class="pt-5 w-full flex justify-end">
            <form action="{{ route('comment') }}" method="POST"> 
               @csrf
               <h2 class="font-semibold pb-2">Comment</h2>
               <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3 flex mr-5">
                     <textarea name="comment" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  i cols="35" rows="3">
                     </textarea>
                  </div>
                  <input type="hidden" name="post_id" value="{{$view->id}}">
                  <div class="w-full flex ml-3 pt-3">
                     <button
                        class="bg-teal-500 shadow focus:shadow-outline focus:outline-none py-2 text-white font-bold px-4 rounded"
                        type="submit">
                        Submit
                     </button>
                  </div>
              </div>
            </form>
         </div>

         <div class="w-full flex justify-end pr-5">
            <div class="w-1/2 flex-col justify-end">
               <h2 class="font-semibold pb-5 text-lg">Comments</h2>
               @foreach ($view->comment as $comment)
               <div class="flex pb-2">
                     <img class="w-8 h-8 rounded-full mr-2" src="/images/profile/{{ $comment->user->profile_images }}" alt="">
                  <div >
                     <h2 class="font-semibold">{{ $comment->user->name }}</h2>
                     <p class="text-gray-700 text-sm">{{$comment->comment}}</p>
                  </div>
               </div>
               @endforeach
               
            </div>

         </div>

      </a>
   </div>

   <footer class="bg-gray-900 mt-16">
      <div class="container max-w-6xl mx-auto flex items-center px-2 py-8">
  
          <div class="w-full mx-auto flex flex-wrap items-center">
              <div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold">
                  <a class="text-gray-900 no-underline hover:text-gray-900 hover:no-underline" href="#">
                      👻 <span class="text-base text-gray-200">Simple-Blog</span>
                  </a>
              </div>
              <div class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end">
                  <ul class="list-reset flex justify-center flex-1 md:flex-none items-center">
                      <li>
                          <a class="inline-block py-2 px-3 text-white no-underline" href="#">Active</a>
                      </li>
                      <li>
                          <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline py-2 px-3"
                              href="#">link</a>
                      </li>
                      <li>
                          <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline py-2 px-3"
                              href="#">link</a>
                      </li>
                      <li>
                          <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline py-2 px-3"
                              href="#">link</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </footer>
  </div>   
@endsection

