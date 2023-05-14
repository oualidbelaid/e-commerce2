<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    // Users
    public function users()
    {
        $clients = User::whereNot('id', Auth::id())->orderBy('created_at', 'DESC')->paginate(8);
        return view("admin/contacts.users")->with(['clients' => $clients, 'nbr_c' => count(User::all()) / 8]);
    }
    public function removeUser($id)
    {
        $user = user::find($id);
        $user->delete($id);
        return redirect()->back();
    }
    // Admins
    public function admins()
    {
        $admins = User::where('is_admin', 1)->orderBy('created_at', 'DESC')->paginate(8);
        return view("admin/contacts.admins")->with(['admins' => $admins, 'nbr_c' => count(User::where('is_admin', 1)->get()) / 8]);
    }
    public function AddAdmin($id)
    {
        $user = User::where('user_id', $id)->first();
        $user->is_admin = 1;
        $user->save();

        return redirect()->back();
    }
    public function removeAdmin($id)
    {
        $user = user::find($id);
        $user->is_admin = 0;
        $user->save();
        return redirect()->back();
    }
    public function store(Request $request)
    {
        //
    }

    public function show($name)
    {
        $user = User::where("name", $name)->first();
        if ($user->profile == null) {
            $profile = Profile::create([
                "user_id" => $user->id,
                "surname" => "",
                "mobile_number" => 0,
                "address_line_1" => "",
                "address_line_2" => "",
                "post_code" => 0,
                "country" => "",
                "state" => "",
                "city" => "",
            ]);
        }
        return view("admin/profile.index")->with("profile", $user->profile);
    }
}
