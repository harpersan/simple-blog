@extends('layouts.app')

@section('content')
<div class="w-full flex flex-row flex-wrap">

    <div class="w-full bg-indigo-100 h-screen flex flex-row flex-wrap justify-center ">

        <div
            class="bg-white shadow-lg border-t-4 border-indigo-500 absolute bottom-0 w-full md:w-0 md:hidden flex flex-row flex-wrap">
            <div class="w-full text-right"><button class="p-2 fa fa-bars text-4xl text-gray-600"></button></div>
        </div>

        <div class="w-0 md:w-1/4 lg:w-1/5 h-0 md:h-screen overflow-y-hidden bg-white shadow-lg">
            @foreach ($user as $users)
            <div class="p-5 bg-white sticky top-0">

                @if (!$users->profile_images)
                <img class="border border-indigo-100 shadow-lg round rounded-full "
                src="http://lilithaengineering.co.za/wp-content/uploads/2017/08/person-placeholder.jpg"> 
                <div class="pt-2 border-t mt-5 w-full text-center text-xl text-gray-600">
                </div>
                @endif
                
                @if ($users->profile_images)
                <img class="border border-indigo-100 shadow-lg round rounded-full w-56 h-56" src="{{ asset('images/profile/'.$users->profile_images ) }}"> 
                <div class="pt-2 border-t mt-5 w-full text-center text-xl text-gray-600">
                    {{ $users->name }}
                </div>
                @endif
                
                
            </div>
            @endforeach
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

            <div class="text-gray-900 bg-gray-200">
                <div class="p-4 flex">
                    <h1 class="text-3xl">
                        Blog Post
                    </h1>
                </div>
                <div class="px-3 py-4 flex justify-center">
                    <table class="w-full text-md bg-white shadow-md rounded mb-4">
                        <tbody>
                            <tr class="border-b">
                                <th class="text-left p-3 px-5">Title</th>
                                <th class="text-left p-3 px-5">Date Created</th>
                                <th class="text-left p-3 px-5">Date Updated</th>
                                <th></th>
                            </tr>
                            @foreach ($user as $users)
                                @foreach ($users->blogpost as $item)
                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                
                                    <td class="p-3 px-5 w-1/3"><p class="bg-transparent">{{ $item->title }}</p> </td>
                                    <td class="p-3 px-5"><p class="bg-transparent">{{ $item->created_at->diffForHumans() }}</p> </td>
                                    <td class="p-3 px-5"><p class="bg-transparent">{{ $item->updated_at->diffForHumans() }}</p> </td>
                                
                                <td class="p-3 px-5 flex justify-end">
                                        <a href="/view/{{$item->id}}"
                                        class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded focus:outline-none focus:shadow-outline">view
                                        </a>
                                        <a href="/edit-post/{{ $item->id }}"
                                        class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded focus:outline-none focus:shadow-outline">edit
                                        </a>

                                        <form action="{{ route('deletepost', ['id'=> $item->id]) }}" method="POST"> 
                                            @csrf
                                            <button class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded focus:outline-none focus:shadow-outline" type="submit">Delete</button>
                                        </form>
                                </td>
                            </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
