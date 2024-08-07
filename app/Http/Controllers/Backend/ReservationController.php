<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;


class ReservationController extends Controller
{
    public function create()
    {
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required|string',
        ]);
        // dd($request->all());

        $data = $request->all();

        if (Reservation::create($data)) {
            return redirect()->back()->with('success', 'Reservation submitted successfully.');
        } else {
            return redirect()->back()->with('error', 'Reservation failed.');
        }        

    }
    function index()
    {
        $reserves = Reservation::all();
        //send data from controller to view
        return view('backend.reservation.index', compact('reserves'));
    }

    function  destroy($id)
    {
        $reserves = Reservation::findOrFail($id);
        $reserves->delete();
        return redirect()->route('backend.reservation.index');
    }
       
}
