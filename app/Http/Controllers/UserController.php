<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        $ideas=$user->ideas()->paginate(5);
        return view('user.show',compact('user','ideas'));

    }
    public function edit(User $user)
    {

        $editing = true;
        $ideas=$user->ideas()->paginate(5);
        return view('user.edit',compact('user','editing','ideas'));
    }
    public function profile(User $user)
    {
        return $this->show(auth()->user());
    }
    public function update(User $user)
    {

        $validated= request()->validate(
            [
                'name'=>'required|min:3|max:40',
                'bio'=>'nullable|min:3|max:255',
                'image'=>'nullable|image'
            ]
        );
if(request()->has('image')){
    $imagePath = request()->file('image')->store('profile','public');
    $validated['image']=$imagePath;
}
        $user->update($validated);
        return redirect()->route('profile');
    }

}
