<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function show($id)
    {
        if (Auth::user()->is_admin == 1) {
            $profile = Profile::find($id);
            return view("front/profile.index")->with("profile", $profile);
        } else {
            $profile = Profile::where(["user_id" => Auth::user()->id, "id" => $id])->first();
            if ($profile == null) {
                return view("errors.404");
            } else {
                return view("front/profile.index")->with("profile", $profile);
            }
        }

    }

    public function edit($id)
    {
        $user = Auth::user();
        if ($user->id == $id) {
            $profile = $user->profile;
            return view('front/profile.edit')->with("profile", $profile);
        } else {
            return view('errors.404');
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required",
            "country" => "required",
            "state" => "required",
        ]);
        $profile = Profile::find($id);
        $profile->user->name = $request->name;
        $profile->user->email = $request->email;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->country = $request->country;
        $profile->state = $request->state;
        $profile->user->save();
        $profile->save();
        return redirect()->route('fprofile', $id);
    }
}
