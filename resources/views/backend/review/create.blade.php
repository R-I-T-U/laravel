@extends('layouts.backend_master')
@section('name','Create Customer Review')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Customer Review Management</h1>
    <div  class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    Add review
                </div>
                <div class="card-body">
                <form enctype="multipart/form-data" action="{{route('backend.review.store')}}" method="post">
              
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Enter description">
                            @error('description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="job_position">Job Position</label>
                            <input type="text" name="job_position" class="form-control" placeholder="Enter job_position">
                            @error('job_position')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="number">Rank</label>
                            <input type="text" name="rank" class="form-control" placeholder="Enter rank">
                            @error('rank')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="text" name="rating" class="form-control" placeholder="Enter rating">
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
                            <button type="submit" class="btn btn-success">Add review</button>
                            <button type="reset" class="btn btn-danger">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection