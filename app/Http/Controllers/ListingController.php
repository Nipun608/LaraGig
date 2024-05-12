<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listings;
use App\Http\Controllers\Rule;

class ListingController extends Controller
{

    //
    public function index()
    {


        return view('listings.index', [
            'listings' => Listings::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }




    //show single listing
    public function show(Listings $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }


    //create listing
    public function create()
    {
        return view('listings.create');
    }


    //store data
    public function store(Request $request)
    {
        // dd($request->all());

        $formFeilds = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);


        if ($request->hasFile('logo')) {
            $formFeilds['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFeilds['user_id'] = auth()->id();


        Listings::create($formFeilds);





        return redirect('/')->with('message', 'Listing Created Successfully!');
    }


    //show edit from
    public function edit(Listings $listing)
    {
        // dd($listing);
        return view('listings.edit', ['listing' => $listing]);
    }


    //update listng
    public function update(Request $request , Listings $listing)
    {
        // dd($request->all());

        $formFeilds = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);


        if ($request->hasFile('logo')) {
            $formFeilds['logo'] = $request->file('logo')->store('logos', 'public');
        }


        $listing->update($formFeilds);





        return back()->with('message', 'Listing updated Successfully!');
    }

    //delete listing
    public function delete(Listings $listing){
        $listing->delete();

        return redirect('/')->with('message','listing deleted successfully');
    }
}
