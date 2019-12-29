<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userSettings()
    {
        return view('settings.user');
    }

    public function patchUserSettings(Request $request)
    {
        $validatedData = $request->validate([
            'name'  => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email,'.auth()->user()->id],
        ]);

        if ($validatedData['email'] != auth()->user()->email) {
            auth()->user()->update(['email_verified_at' => null]);
        }

        auth()->user()->update($validatedData);

        return redirect(route('user-settings'))->with('status', 'User Settings Updated Successfully');
    }

    public function patchUserPassword(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => [
                'required', 'string', 'min:8',
                function ($attribute, $value, $fail) {
                    if (!\Hash::check($value, auth()->user()->password)) {
                        return $fail(__('The current password is incorrect.'));
                    }
                },
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        auth()->user()->update(['password' => bcrypt($validatedData['password'])]);

        return redirect(route('user-settings'))->with('status', 'Password Updated Successfully');
    }

    public function appSettings()
    {
        return view('settings.application');
    }

    public function postAppSettings(Request $request)
    {
        $validatedData = $request->validate([
            'sitename'    => 'required',
            'description' => 'required',
            'company'     => 'required',
            'siteurl'     => 'required',
        ]);

        Setting::updateOrCreate(
            ['key' => 'sitename'],
            [
                'value' => $validatedData['sitename'],
            ]
        );

        Setting::updateOrCreate(
            ['key' => 'description'],
            [
                'value' => $validatedData['description'],
            ]
        );

        Setting::updateOrCreate(
            ['key' => 'company'],
            [
                'value' => $validatedData['company'],
            ]
        );

        Setting::updateOrCreate(
            ['key' => 'siteurl'],
            [
                'value' => $validatedData['siteurl'],
            ]
        );

        return back()->with('status', 'Application Settings Updated Successfully');
    }

    public function logoSettings()
    {
        return view('settings.logo');
    }

    public function postLogoSettings(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        File::delete(
            [
                public_path('logo.png'),
                public_path('apple-touch-icon.png'),
                public_path('favicon-48x48.png'),
                public_path('favicon-32x32.png'),
                public_path('favicon-16x16.png'),
            ]
        );

        $logo = request()->file('logo');

        $this->cropAndStoreImage($logo, 'logo.png', 250);

        $this->cropAndStoreImage($logo, 'apple-touch-icon.png', 180);

        $this->cropAndStoreImage($logo, 'favicon-48x48.png', 48);

        $this->cropAndStoreImage($logo, 'favicon-32x32.png', 32);

        $this->cropAndStoreImage($logo, 'favicon-16x16.png', 16);

        return back()->with('status', 'Site Logo and Favicons Updated Successfully');
    }
}
