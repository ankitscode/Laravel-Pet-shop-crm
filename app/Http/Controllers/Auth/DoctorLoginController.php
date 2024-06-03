<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;

class DoctorLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.doctor-login');


    }
    public function authDoctor(Request $request)
    {
      
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('doctors')->attempt(['phone' => $request->phone, 'password' => $request->password])) {
            // Authentication successful
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    
        // Authentication failed
        return redirect()->back()->withInput($request->only('phone'))->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('doctors')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

