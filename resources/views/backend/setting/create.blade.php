@extends('layouts.backend_master')
@section('title','Create Setting')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Setting Management</h1>
    <div  class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    Create Setting
                </div>
                <div class="card-body">
                <form enctype="multipart/form-data" action="{{route('backend.coffee.store')}}" method="post">
              
              @csrf
              <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter title">
                  @error('title')
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
                  <label for="number">Rank</label>
                  <input type="text" name="rank" class="form-control" placeholder="Enter rank">
                  @error('rank')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" name="price" class="form-control" placeholder="Enter price">
                  @error('price')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="discount">Discount</label>
                  <input type="number" name="discount" class="form-control" placeholder="Enter discount">
                  @error('discount')
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
                  <button type="submit" class="btn btn-success">Add menu</button>
                  <button type="reset" class="btn btn-danger">Clear</button>
              </div>
          </form>
                </div>
            </div>
        </div>
    </div>
@endsection