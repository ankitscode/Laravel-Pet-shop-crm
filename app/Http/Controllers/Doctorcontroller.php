<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Pet;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Doctorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Doctor.doctorindex');
    }

    public function datatable()
    {
        return Datatables::of(Doctor::query())
            ->addColumn('Action', function ($doctor) {
                $link = '<a href="' . route('editdoctor', $doctor->id) . '" class="btn btn-primary btn-sm">Edit</a> ' .
                    '<a href="' . route('showdoctor', $doctor->id) . '" class="btn btn-secondary btn-sm">View</a> ' .
                    '<a href="' . route('deletedoctor', $doctor->id) . '"class="btn btn-danger btn-sm">Delete</a>';
                return $link;
            })
            ->rawColumns(['Action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pets = Pet::all();
        return view('Admin.Doctor.doctorindex', compact('pets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Uncomment and update the validation rules to ensure data integrity
        $request->validate([
            'name' => 'required',
            'phone' => 'required|max:10',
            // 'degree' => 'required',
            // 'pet_ids' => 'array|required', // Ensure pet_ids is an array and required
            // 'pet_ids.*' => 'exists:pets,id', // Ensure each id in pet_ids exists in the pets table
        ]);
        // Create a new doctor
        $Doctors = new Doctor;
        $Doctors->name = $request->name;
        $Doctors->degree = $request->degree;
        $Doctors->phone = $request->phone;
        $Doctors->save();

        // // Attach pets to the newly created doctor
        // $Doctors->pets()->attach($request->pet_id);

        // Redirect to the doctor index page
        return redirect(route('doctor.index'));
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    { {
            $Doctor = Doctor::with('treatments')->find($id);
            //  dd($Treatments);
            $Doctors = Doctor::with(['pets'])->find($id);
            if (!$Doctors) {
                return redirect()->back()->with('error', 'Doctor not found');
            }
            // Check if the relation is loaded
            if ($Doctors->relationLoaded('pets')) {
                // dd($doctor->pets);
            }

            return view('Admin.Doctor.viewdoctor', compact('Doctors', 'Doctor'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Doctors = Doctor::find($id);

        return view('Admin.Doctor.updatedoctor', compact('Doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|max:10',
            'degree' => 'required',
        ]);
        $Doctors = Doctor::find($id);
        $Doctors->name = $request->name;
        $Doctors->degree = $request->degree;
        $Doctors->phone = $request->phone;
        $Doctors->save();
        return redirect(route('doctor.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            $doctor = Doctor::find($id);
        
            // Delete related treatments first
            $doctor->treatments()->delete();
        
            // Now delete the doctor
            $doctor->delete();
        
            return redirect()->route('doctor.index');
       }
        
}
