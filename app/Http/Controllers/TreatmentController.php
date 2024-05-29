<?php

namespace App\Http\Controllers;
use App\Models\Treatment;
use App\Models\Pet;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( )
    {
        // $Treatments = Treatment::with('pets')->get();
        return view('Treatment.treatment');
    }

//for datatable 

    public function loaddata(Request $request){

        if ($request->ajax()) {
            $Treatment = Treatment::with('pets')->get();
            return DataTables::of($Treatment)
            ->addColumn('Action', function ($Treatment) {
                $link = '<a href="' . route('edittreatment', $Treatment->id) . '" class="btn btn-primary btn-sm">Edit</a> ' .
                        '<a href="' . route('viewtreatment', $Treatment->id) . '"class="btn btn-secondary btn-sm">View</a>'.
                        '<a href="' . route('deletetreatment', $Treatment->id) . '"class="btn btn-danger btn-sm">Delete</a>';
                return $link;
            })
            ->addColumn('name', function ($Treatment) {
                return $Treatment->pets->name;
            })
            ->addColumn('breed', function ($Treatment) {
                return $Treatment->pets->breed;
            })
                ->rawColumns(['Action'])
                ->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Pets=Pet::get();
        $Doctors=Doctor::get();
        return view('Treatment.createtreatment',compact('Pets','Doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
       $request->validate([
        'doc_id'=>'required',
        'pet_id'=>'required',
        'treatment'=>'required',
        'note'=>'required',
       ]); 
       $Treatment=new Treatment();
       $Treatment->doc_id=$request->doc_id;
       $Treatment->pet_id=$request->pet_id;
       $Treatment->treatment=$request->treatment;
       $Treatment->note=$request->note;
    //    dd($Treatment);
       $Treatment->save();
       return redirect()->route('treatment');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Treatment=Treatment::find($id);
        return view('Treatment.treatmentview',compact('Treatment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Treatment=Treatment::find($id);
        //  dd($Treatment);
        return view('Treatment.updatetreatment',compact('Treatment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'doc_id'=>'required',
            'pet_id'=>'required',
            'treatment'=>'required',
            'note'=>'required',

        ]);
        $Treatment=Treatment::find($id);
        $Treatment->doc_id=$request->doc_id;
        $Treatment->pet_id=$request->pet_id;
        $Treatment->treatment=$request->treatment;
        $Treatment->note=$request->note;
        // dd($Treatment);
        $Treatment->save();
        return redirect()->route('treatment');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Treatment=Treatment::find($id)->delete();
        return redirect()->route('treatment');
    }
}
