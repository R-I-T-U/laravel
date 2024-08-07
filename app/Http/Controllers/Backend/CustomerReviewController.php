<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerReview; 

class CustomerReviewController extends Controller
{
    //name	image	job_position	rank	description	rating
    public function create()
    {
        return view('backend.review.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'rank' => 'required|integer',
             'rating' => 'required|integer|between:1,5',
            'image' => 'nullable|file|mimes:jpg,jpeg,bmp,png|max:10000', // Adjusted validation
        ]);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/customer_images'), $fileName);
            $data['image'] = $fileName;
        }

        if (CustomerReview::create($data)) {
            $request->session()->flash('success', 'Review created successfully');
        } else {
            $request->session()->flash('error', 'Review creation failed');
        }

        return redirect()->route('backend.review.index');
    }
    function index(){
        $reviews = CustomerReview::orderBy('rank')->get();
        //send data from controller to view
        return view('backend.review.index',compact('reviews'));
    }
    
  
    function  destroy($id){
        $reviews = CustomerReview::findOrFail($id);
        $reviews->delete();
        return redirect()->route('backend.review.index');
    }
    
    function edit($id){
        $review = CustomerReview::findOrFail($id);
        return view('backend.review.edit',compact('review'));
    }

    function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'rank' => 'required|integer',
             'rating' => 'required|integer|between:1,5',
            'image' => 'nullable|file|mimes:jpg,jpeg,bmp,png|max:10000', 
        ]);
        $reviews = CustomerReview::findOrFail($id);
        if($reviews->update($request->all())){
            request()->session()->flash('success','Review updated successfully');
        } else {
            request()->session()->flash('error','Review update failed');
        }
        return redirect()->route('backend.review.index');
    }
    
}
