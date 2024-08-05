<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoffeeDrink; 
use Illuminate\Support\Facades\Auth;

class CoffeeDrinkController extends Controller
{
    public function create()
    {
        return view('backend.coffee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'rank' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'nullable|file|mimes:jpg,jpeg,bmp,png|max:10000', // Adjusted validation
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id(); // Ensure `created_by` is set to authenticated user ID

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/coffee'), $fileName);
            $data['image'] = $fileName;
        }

        if (CoffeeDrink::create($data)) {
            $request->session()->flash('success', 'Menu created successfully');
        } else {
            $request->session()->flash('error', 'Menu creation failed');
        }

        return redirect()->route('backend.coffee.index');
    }
    function index(){
        $coffees = CoffeeDrink::orderBy('title')->get();
        //send data from controller to view
        return view('backend.coffee.index',compact('coffees'));
    }
    function show($id){
        $coffee = CoffeeDrink::findOrFail($id);
        return view('backend.coffee.show',compact('coffee'));
    }
    function  destroy($id){
        $coffees = CoffeeDrink::findOrFail($id);
        $coffees->delete();
        return redirect()->route('backend.coffee.index');
    }
    function edit($id){
        $coffee = CoffeeDrink::findOrFail($id);
        return view('backend.coffee.edit',compact('coffee'));
    }

    function update(Request $request,$id){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'rank' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'nullable|file|mimes:jpg,jpeg,bmp,png|max:10000', 
        ]);
        $coffees = CoffeeDrink::findOrFail($id);
        if($coffees->update($request->all())){
            request()->session()->flash('success','Coffee updated successfully');
        } else {
            request()->session()->flash('error','Coffee update failed');
        }
        return redirect()->route('backend.coffee.index');
    }
}
