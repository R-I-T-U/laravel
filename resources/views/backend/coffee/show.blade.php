@extends('layouts.backend_master')
@section('title','Coffee Details')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Coffee Management</h1>
    <div  class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    Coffee Detail
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive">

                        <tr>
                            <th>ID</th>
                            <td>{{$coffee->id}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$coffee->title}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{$coffee->description}}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>Rs {{$coffee->price}}</td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td>Rs {{$coffee->discount}}</td>
                        </tr>
                        <tr>
                            <th>Rank</th>
                            <td>{{$coffee->rank}}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td> <img src="{{ asset('assets/images/coffee/' . $coffee->image) }}" alt="{{ $coffee->title }}" height="200px"></td>
                        </tr>
                     
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection