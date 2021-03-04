<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateInfo;
use App\Http\Requests\ProfileUpdatePassword;
use App\Service\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private ProfileService $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }


    public function index()
    {
        $user = Auth::user();

        return view('pages.profile', [
            'user' => $user
        ]);
    }

    public function updateInfo(ProfileUpdateInfo $request)
    {
        $user = Auth::user();

        $this->profileService->updateInfo($user, $request->all());

        return redirect()
            ->back()
            ->with([
                'success' => 'Profile information successfully updated.'
            ]);
    }

    public function updatePassword(ProfileUpdatePassword $request)
    {
        $user = Auth::user();

        $this->profileService->updatePassword($user, $request->password);

        return redirect()
            ->back()
            ->with([
                'success' => 'Password successfully updated.'
            ]);
    }
}
