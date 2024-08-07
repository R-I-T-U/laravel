@extends('layouts.backend_master')
@section('title','List reservations')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Customer Reservations</h1>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                Reservations
            </div>

            <div class="card-body">
                @include('includes.flash_message')
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    </tr>
                    @foreach($reserves as $key=> $reserve)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$reserve->name}}</td>
                        <td>{{$reserve->email}}</td>
                        <td>{{$reserve->phone}}</td>
                        <td>{{$reserve->message}}</td>


                        <td>
                            <form style="display: inline-block" method="post" action="{{route('backend.reservation.destroy',$reserve->id)}}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
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