<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;



class Pets2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Pets = Pet::paginate(3);
        return view('Admin.Pet.petindex');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Users = User::with('pet')->where('id', $request->user_id)->first();
        $request->validate(
            [
                'Name' => 'required',
                'Breed' => 'required'
            ]
        );
        $Pets = new Pet;
        $Pets->name = $request->name;
        $Pets->breed = $request->breed;
        $Pets->save();
        return redirect()->route('getpet');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Pet = Pet::find($id);
        return view('Admin.Pet.upgradepet', compact('Pet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'breed' => 'required',
            ]
        );
        $id = $request['id'];
        $Pets = Pet::find($id); { //ye hai
            $Pets->name = $request->name;
            $Pets->breed = $request->breed;
        }
        $Pets->save();
        return redirect()->route('getpet')->with('success', 'Pet updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pet::find($id)->delete();
        return redirect()->route('getpet');
    }
    public function delete($id)
    {
        $Pet = Pet::findOrFail($id);
        $Doctors = $Pet->doctors()->first();
        DB::table('treatments')->where('pet_id', $id)->delete();
        $Pet->delete();
        if ($Doctors) {
            return redirect()->route('showdoctor', ['id' => $Doctors->id])->with('success', 'Pet deleted successfully.');
        } else {
            // Handle the case where no doctor is associated with the pet
            return redirect()->back()->with('success', 'Pet deleted successfully, but no associated doctor found.');
        }
        return redirect()->route('showdoctor')->with('success', 'Pet deleted successfully.');
    }

    public function datatable()
    {
        return Datatables::of(Pet::query())
            ->addColumn('Action', function ($pet) {
                $link = '<a href="' . route('changepet', $pet->id) . '" class="btn btn-primary btn-sm">Edit</a> ' .
                    '<a href="' . route('droppet', $pet->id) . '"class="btn btn-danger btn-sm">Delete</a>';
                return $link;
            })
            ->rawColumns(['Action'])
            ->make(true);
    }
}
