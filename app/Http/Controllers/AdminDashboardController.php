<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditProfileRequest;

class AdminDashboardController extends Controller
{
    public function viewProfile(Request $request)
    {
        $user = User::with('blogpost')->where('name', $request->name)->get();

        // dd($user);

        return view('profile', compact('user'));
    }

    public function editProfile(Request $request)
    {
        return view('edit-profile');
    }

    public function updateProfile(EditProfileRequest $request)
    {
        $input = $request->all();
        if($request->profile_images) {
            $images = $this->base64ToImage($request->profile_images,'images/profile/', Str::snake($request->name));
            $input['profile_images'] = $images;
        } else {
            $input['profile_images'] = Auth::user()->profile_images;
        }

        $input['password'] = bcrypt($request->password);

        User::whereId($request->id)->first()->update($input);
    }
}
