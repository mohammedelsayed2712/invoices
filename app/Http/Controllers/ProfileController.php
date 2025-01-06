<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = $request->user();

        $user->update(array_filter($request->validated()));
        // Alert::toast('تم تحديث البيانات بنجاح', 'success');

        Alert::toast('Profile updated successfully.', 'success');

        return redirect()->route('profile.index');
    }
}
