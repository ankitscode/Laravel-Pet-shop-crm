<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\pet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Petcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $users = user::with('pet')->get();
        return redirect('/viewuser', compact('users'));
    }
    //controller to redirect to creatpet page
    public function create()
    {
        $users = User::all();
        return view('Admin.Pet.createpet', compact('users'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Users = User::with('pet')->where('id',$request->user_id)->first();
        $request->validate(
            [
                'user_id' => 'required',
                'Name' => 'required',
                'Breed' => 'required'
            ]
        );
        $user = Auth::user();
        $pet = new pet;
        $pet->Name = $request->Name;
        $pet->user_id = $request->user_id;
        $pet->Breed = $request->Breed;
        $pet->save();
        return response()->json(['success' => 'Pet added successfully!']);        
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Pet = Pet::with('user')->find($id);
        // Example of fetching users correctly
        return view('Admin.Pet.viewpet', compact('Pet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Users = User::all();
        $Users = User::with('pet')->find('27');
        // dd($Users);
        $Pet = Pet::find($id);
        return view('Admin.pet.updatepet', compact('Pet', 'Users'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'breed' => 'required',
            ]
        );
        $Users = User::with('pet')->find($id);
        $id = $request['id'];
        $Pet = Pet::find($id); {
            $Pet->name = $request->name;
            $Pet->breed = $request->breed;
            // $id = auth()->user()->id;
            // $Users = User::with('pet')->find($id);
        }
        $Pet->save();
        return redirect(route('viewuser', ['id' => $Pet->id]));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Pet = Pet::find($id);
        if ($Pet) {
            $Pet->delete();
            
            $id = auth()->user()->id;
            $Users = User::with('pet')->find($id);
            return redirect()->back();
        } else {
            return "Cannot find pet with the given ID";
        }
    }
   
}
