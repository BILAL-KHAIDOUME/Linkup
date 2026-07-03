<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit() {

         

      return View('profile.edit');
    }

    public function update(EditProfileRequest $request, User $user){
        $validated = $request->validated();

        User::find(auth()->user()->id)->update($validated);

        return redirect()->route('feed');

        
    }
}





