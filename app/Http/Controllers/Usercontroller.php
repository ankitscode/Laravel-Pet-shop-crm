<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewUserNotification;
use App\Events\NewUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\pet;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Mail\CreatedUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Users = User::with('pet')->get();
        return view('Admin.User.userindex');
    }

    public function datatab()
    {
        return Datatables::of(User::query())
            ->addColumn('Action', function ($user) {
                $link = '<a href="' . route('edituser', $user->id) . '" class="btn btn-primary btn-sm">Edit</a> ' .
                    '<a href="' . route('viewuser', $user->id) . '" class="btn btn-secondary btn-sm">View</a> ' .
                    '<a href="' . route('deleteuser', $user->id) . '"class="btn btn-danger btn-sm">Delete</a>';
                return $link;
            })
            ->editColumn('image', function ($user) {
                return asset('storage/images/' . $user->image); // Assuming 'image' contains the filename of the image
            })
            ->rawColumns(['Action'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.User.createuser');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate(
             [
                 'name' => 'required|string',
                 'email' => 'required|email',
                 'password' => 'required|max:10',
                 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072'
             ]
      );
        $User = new User;
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = Hash::make($request->password);;
        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = 'public/images';
                $store = $file->storeAs($path, $filename);
                $User->image = $filename;
            }
            // event(new NewUsers($User));//mail notification
            // $User->notify(new NewUserNotification($User));
            // dd('done');
             $User->save();
        //  Mail::to($User->email)->send(new CreatedUser($User));
            return redirect(route("userprofile.index"));
        } catch (\Exception $e) {
            Log::error('Error occurred while saving user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving user.');
        }
    }
    /**
     * 
     * Display the specified resource.
     */

    public function show($id)
    {
        $Users = User::with('pet')->find($id);
        // dd($Users,$id);
        return view('Admin.user.viewuser', compact('Users'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $User = User::with('pet')->find($id);
        return view('Admin.User.updateuser', compact('User'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]
        );
        $id = $request['id'];
        $User = User::with('pet')->find($id); {
            $User->name = $request->name;
            $User->email = $request->email;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->storeAs('public/images', $filename);
                $User->image = $filename;
            }
            $User->save();
            return redirect(route('userprofile.index'));
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        User::with('pet')->find($id)->delete();
        return redirect()->route('userprofile.index');
    }
}