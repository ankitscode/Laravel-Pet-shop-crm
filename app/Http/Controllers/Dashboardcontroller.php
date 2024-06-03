<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pet;
use App\Models\Doctor;
use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $data = User::all();
        $count = $data->count();

        $pets = Pet::all();
        $countPets = $pets->count();

        $doctors = Doctor::all();
        $countDoctors = $doctors->count();

        $latestUsers = User::latest()->take(5)->get();

        return view('dashboard.dashboard', compact('count', 'countPets', 'countDoctors','latestUsers'));
    }

    public function refresh()
    {
        $data = User::all();
        $count = $data->count();

        $pets = Pet::all();
        $countPets = $pets->count();

        $doctors = Doctor::all();
        $countDoctors = $doctors->count();


        return response()->json([
            'count' => $count,
            'countPets' => $countPets,
            'countDoctors' => $countDoctors,
        ]);
    }
    /**
     * Show the no. of pets.
     */
    public function create()
    {
    }

    // /**
    //  * Show the no. of doctors.
    //  */
    public function store()
    {
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
