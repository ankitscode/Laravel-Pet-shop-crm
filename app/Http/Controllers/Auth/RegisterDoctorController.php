<?php

namespace App\Http\Controllers\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisterDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.doctor-register');
    }

    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'unique:'.Doctor::class],
            'degree'=>['required','string'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $Doctor = Doctor::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'degree'=>$request->degree,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($Doctor));
        Auth::login($Doctor);
        // dd(auth()->check()); 
        return redirect()->route('doctor.index');
    }
}
