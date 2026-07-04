<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show() {

    
      return View('profile.profile');
    }

    public function edit()
    {
        return View('profile.edit');
    }



    public function update(EditProfileRequest $request, User $user){
        $user = $request->user();
        $validated = $request->validated();
        // dd('validated data:', $validated, 'user before update:', $user->toArray());

        if ($request->hasFile('profile_photo')) {
        $image = $request->file('profile_photo');
        $imagename = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imagename);
        // $validated['image_url'] = $imagename;
        $validated['image_url'] = asset('images/' . $imagename);
    }

        // User::find(auth()->user()->id)->update([$validated]);
        $user->update($validated);

        return redirect()->route('feed');

        
    }
}
