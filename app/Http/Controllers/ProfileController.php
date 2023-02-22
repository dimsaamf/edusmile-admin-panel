<?php

namespace App\Http\Controllers;
use Iluminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function EditProfilePicture()
    {
        $id = Auth::user()->id;
        $editPicture = User::find($id);
        return view('profile.picture', compact('editPicture'));
    }
}
