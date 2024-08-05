@extends('layouts.backend_master')
@section('title','Edit menu')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Menu Management</h1>
    <div  class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    Edit Menu
                </div>
                <div class="card-body">
                    <form action="{{route('backend.coffee.update',$coffee->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" value="{{$coffee->title}}" name="title" class="form-control" placeholder="Enter title">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" value="{{$coffee->description}}" name="description" class="form-control" placeholder="Enter description">
                            @error('description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="rank">Rank</label>
                            <input type="text" value="{{$coffee->rank}}" name="rank" class="form-control" placeholder="Enter rank">
                            @error('rank')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" value="{{$coffee->price}}" name="price" class="form-control" placeholder="Enter price">
                            @error('price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="text" value="{{$coffee->discount}}" name="discount" class="form-control" placeholder="Enter discount">
                            @error('discount')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update coffee</button>
                            <button type="reset" class="btn btn-danger">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection