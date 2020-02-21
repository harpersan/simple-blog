<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\EditBlogRequest;
use App\Http\Requests\PostBlogRequest;
use App\Post;


class PostController extends Controller
{
    
    public function viewPost(Request $request)
    {
        $view = Post::with(['comment', 'comment.user'])->findOrFail($request->id);
        return view('view-blog', compact('view'));
    }

    public function createPost(PostBlogRequest $request)
    {
        $images = $this->base64ToImage($request->images,'images/blogpost/', Str::snake($request->title));

        $input = $request->all();
        $input['images'] = $images;
        $input['user_id'] = Auth::id();
        Post::create($input);
    }

    public function editPost(Request $request)
    {
        $post = Post::whereId($request->id)->first();

        return view('post.edit', compact('post'));
    }

    public function updatePost(EditBlogRequest $request)
    {
        $input = $request->all();

        if($request->images){
            $images = $this->base64ToImage($request->images,'images/blogpost/', Str::snake($request->title));
            $input['images'] = $images;
        } else {

            $images = Post::find($request->id);
            $input['images'] = $images->images;
        }

        Post::whereId($request->id)->first()->update($input);
    }

    public function deletePost(Request $request)
    {
        Post::whereId($request->id)->delete();

        return redirect('/'.Auth::user()->name);
    }
}
