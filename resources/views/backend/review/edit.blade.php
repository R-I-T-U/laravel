@extends('layouts.backend_master')
@section('name','Edit reviews')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Customer Review Management</h1>
    <div  class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    Edit Review
                </div>
                <div class="card-body">
                    <form action="{{route('backend.review.update',$review->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" value="{{$review->name}}" name="name" class="form-control" placeholder="Enter name">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" value="{{$review->description}}" name="description" class="form-control" placeholder="Enter description">
                            @error('description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="job_position">Job Position</label>
                            <input type="text" value="{{$review->job_position}}" name="job_position" class="form-control" placeholder="Enter job_position">
                            @error('job_position')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="rank">Rank</label>
                            <input type="text" value="{{$review->rank}}" name="rank" class="form-control" placeholder="Enter rank">
                            @error('rank')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="text" value="{{$review->rating}}" name="rating" class="form-control" placeholder="Enter rating">
                            @error('rating')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" name="image" class="form-control" >
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update review</button>
                            <button type="reset" class="btn btn-danger">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection