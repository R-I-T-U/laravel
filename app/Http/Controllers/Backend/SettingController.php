<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('backend.setting.edit', compact('setting'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'website_name' => 'required',
            'slogan' => 'required',
            'rank' => 'required|integer',
            'logo' => 'nullable|file|mimes:jpg,jpeg,bmp,png|max:10000',
            'favicon'=> 'nullable|file|mimes:jpg,jpeg,bmp,png|max:10000',
            'header_logo'=> 'nullable|file|mimes:jpg,jpeg,bmp,png|max:10000',
            'footer_logo'=> 'nullable|file|mimes:jpg,jpeg,bmp,png|max:10000',
            'address'=> 'required',
            'facebook_link' => ['nullable', 'url', 'regex:/^https:\/\/www\.facebook\.com\/[A-Za-z0-9\.\_\/\-]+$/'],
            'insta_link' => ['nullable', 'url', 'regex:/^https:\/\/www\.instagram\.com\/[A-Za-z0-9\.\_\/\-]+$/'],
            'twitter_link' => ['nullable', 'url', 'regex:/^https:\/\/twitter\.com\/[A-Za-z0-9\.\_\/\-]+$/'],
            'about_website' => 'required'

          
        ]);

        $settings = Setting::findOrFail($id);
        if ($settings->update($request->all())) {
            request()->session()->flash('success', 'Updated successfully');
        } else {
            request()->session()->flash('error', 'Update failed');
        }
        return redirect()->route('backend.setting.index');
    }
}
