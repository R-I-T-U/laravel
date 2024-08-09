<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first(); // Retrieve the single setting
        return view('backend.setting.index', compact('settings'));
    }


    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'website_name' => 'required',
            'slogan' => 'required',
            'email' => 'required|email',
            'logo' => 'nullable|file|mimes:jpg,jpeg,bmp,png|max:10000',
            'favicon' => 'nullable|file|mimes:jpg,jpeg,bmp,png|max:10000',
            'feature_image' => 'nullable|file|mimes:jpg,jpeg,bmp,png|max:10000',
            'address' => 'required',
            'facebook_link' => 'nullable|url',
            'insta_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'desc_heading'=> 'required',
            'description'=> 'required',
            'phone1' => 'required|numeric',
            'phone2' => 'nullable|numeric',
            'branch1'=> 'required',
            'branch2'=> 'nullable',
            'branch3'=> 'nullable',
            

        ]);

        $settings = Setting::first();
        $data = $request->except(['logo', 'favicon', 'feature_image']);

        // Process each image field
        foreach (['logo', 'favicon', 'feature_image'] as $imageField) {
            if ($request->hasFile($imageField)) {
                // Delete the old image if it exists
                if ($settings->$imageField && file_exists(public_path('assets/setting/logos/' . $settings->$imageField))) {
                    unlink(public_path('assets/setting/logos/' . $settings->$imageField));
                }

                // Store the new image
                $file = $request->file($imageField);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/setting/logos'), $fileName);
                $data[$imageField] = $fileName;
            } else {
                // Preserve the old image filename if no new image is uploaded
                $data[$imageField] = $settings->$imageField;
            }
        }

        // Update the settings record
        $settings->update($data);

        $request->session()->flash('success', 'Settings updated successfully');
        return redirect()->route('backend.setting.index');
    }
}
