@extends('layouts.backend_master')
@section('title','List Menu')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Menu Management</h1>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                Menu
                <a href="{{ route('backend.coffee.create') }}" class="btn btn-primary float-right">Create New Menu</a>
            </div>

            <div class="card-body">
                @include('includes.flash_message')

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="active-tab" data-toggle="tab" href="#active" role="tab" aria-controls="active" aria-selected="true">Active</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="deleted-tab" data-toggle="tab" href="#deleted" role="tab" aria-controls="deleted" aria-selected="false">Deleted</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <!-- Active Items Tab -->
                    <div class="tab-pane fade show active" id="active" role="tabpanel" aria-labelledby="active-tab">
                        <table class="table table-bordered table-responsive mt-3">
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th width='20%'>Action</th>
                            </tr>
                            @foreach($coffees as $key => $coffee)
                            @if(!$coffee->trashed()) <!-- Show only active items -->
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $coffee->title }}</td>
                                <td>{{ $coffee->description }}</td>
                                <td>Rs {{ $coffee->price }}</td>
                                <td>Rs {{ $coffee->discount }}</td>
                                <td>
                                    <a href="{{ route('backend.coffee.show', $coffee->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('backend.coffee.edit', $coffee->id) }}" class="btn btn-warning">Edit</a>

                                    <form style="display: inline-block" method="post" action="{{ route('backend.coffee.destroy', $coffee->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </table>
                    </div>

                    <!-- Deleted Items Tab -->
                    <div class="tab-pane fade" id="deleted" role="tabpanel" aria-labelledby="deleted-tab">
                        <table class="table table-bordered table-responsive mt-3">
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th width='30%'>Action</th>
                            </tr>
                            @foreach($coffees as $key => $coffee)
                            @if($coffee->trashed()) <!-- Show only deleted items -->
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $coffee->title }}</td>
                                <td>{{ $coffee->description }}</td>
                                <td>Rs {{ $coffee->price }}</td>
                                <td>Rs {{ $coffee->discount }}</td>
                                <td>
                                    <a href="{{ route('backend.coffee.show', $coffee->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('backend.coffee.restore', $coffee->id) }}" class="btn btn-success">Restore</a>
                                    <a href="{{ route('backend.coffee.forceDelete', $coffee->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to permanently delete this item?')">Delete Permanently</a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection