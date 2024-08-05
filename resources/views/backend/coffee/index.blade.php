@extends('layouts.backend_master')
@section('title','List menu')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Menu Management</h1>
    <div  class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    Menu
                </div>
         
                <div class="card-body">
                @include('includes.flash_message')
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Discount</th>
                           
                            <th>Action</th>
                        </tr>
                        </tr>
                        @foreach($coffees as $key=> $coffee)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$coffee->title}}</td>
                                <td>{{$coffee->description}}</td>
                                <td>Rs {{$coffee->price}}</td>
                                <td>Rs {{$coffee->discount}}</td>
                                

                                <td>
                                    <a href="{{route('backend.coffee.show',$coffee->id)}}" class="btn btn-primary">View</a>
                                    <a href="{{route('backend.coffee.edit',$coffee->id)}}" class="btn btn-warning">Edit</a>
                                    
                                    <form style="display: inline-block" method="post" action="{{route('backend.coffee.destroy',$coffee->id)}}">
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