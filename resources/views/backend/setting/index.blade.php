@extends('layouts.backend_master')
@section('title', 'Create Setting')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Setting Management</h1>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                Create Setting
            </div>
            <div class="card-body">
            <form enctype="multipart/form-data" action="{{ route('backend.settings.update') }}" method="post">
            @csrf
      
                    <div class="form-group">
                        <label for="website_name">Website Name</label>
                        <input type="text" id="website_name" name="website_name" class="form-control" placeholder="Enter website name" value="{{ old('website_name', $settings->website_name) }}">

                        @error('website_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="slogan">Slogan</label>
                        <input type="text" id="slogan" name="slogan" class="form-control" placeholder="Enter slogan" value="{{ $settings->slogan }}">
                        @error('slogan')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" id="logo" name="logo" class="form-control">
                        @error('logo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="favicon">Favicon</label>
                        <input type="file" id="favicon" name="favicon" class="form-control">
                        @error('favicon')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="feature_image">About Us Image</label>
                        <input type="file" id="feature_image" name="feature_image" class="form-control">
                        @error('feature_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" class="form-control" placeholder="Enter address">{{ $settings->address  }}</textarea>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Enter email" value="{{ $settings->email }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="phone1">Phone Number 1</label>
                        <input type="number" id="phone1" name="phone1" class="form-control" placeholder="Enter phone1" value="{{ $settings->phone1 }}">
                        @error('phone1')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone2">Phone Number 2</label>
                        <input type="number" id="phone2" name="phone2" class="form-control" placeholder="Enter phone2" value="{{ $settings->phone2}}">
                        @error('phone2')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="branch1">Branch 1</label>
                        <input type="text" id="branch1" name="branch1" class="form-control" placeholder="Enter branch1" value="{{ $settings->branch1 }}">
                        @error('branch1')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="branch2">Branch 2</label>
                        <input type="text" id="branch2" name="branch2" class="form-control" placeholder="Enter branch2" value="{{ $settings->branch2 }}">
                        @error('branch2')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="branch3">Branch 3</label>
                        <input type="text" id="branch3" name="branch3" class="form-control" placeholder="Enter branch3" value="{{ $settings->branch3 }}">
                        @error('branch3')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="facebook_link">Facebook Link</label>
                        <input type="url" id="facebook_link" name="facebook_link" class="form-control" placeholder="Enter Facebook URL" value="{{ $settings->facebook_link }}">
                        @error('facebook_link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="insta_link">Instagram Link</label>
                        <input type="url" id="insta_link" name="insta_link" class="form-control" placeholder="Enter Instagram URL" value="{{ $settings->insta_link }}">
                        @error('insta_link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="twitter_link">Twitter Link</label>
                        <input type="url" id="twitter_link" name="twitter_link" class="form-control" placeholder="Enter Twitter URL" value="{{$settings->twitter_link }}">
                        @error('twitter_link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="desc_heading">About Us heading</label>
                        <textarea id="desc_heading" name="desc_heading" class="form-control" placeholder="About the website">{{ $settings->desc_heading }}</textarea>
                        @error('desc_heading')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">About Us description</label>
                        <textarea id="description" name="description" class="form-control" placeholder="About the website">{{ $settings->description }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Hidden fields for audit data -->
                    <input type="hidden" name="updated_by" value="{{ auth()->id() }}">

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection