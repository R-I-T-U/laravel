@extends('layouts.backend_master')
@section('title','List reviews')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Customer Review Management</h1>
    <div  class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                   Review
                </div>
              
                <div class="card-body">
                @include('includes.flash_message')
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Job Position</th>
                            <th>Rank</th>
                            <th>Rating</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        </tr>
                        @foreach($reviews as $key=> $review)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$review->name}}</td>
                                <td>{{$review->description}}</td>
                                <td> {{$review->job_position}}</td>
                                <td> {{$review->rank}}</td>
                                <td> {{$review->rating}}</td>
                                <td> <img src="{{ asset('assets/customer_images/' . $review->image) }}" alt="{{ $review->name }}" height="50px"></td>
                               
                                

                                <td>
                                    
                                    <a href="{{route('backend.review.edit',$review->id)}}" class="btn btn-warning">Edit</a>
                                    
                                    <form style="display: inline-block" method="post" action="{{route('backend.review.destroy',$review->id)}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE"/>
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection