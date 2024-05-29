<?php

use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\Doctorcontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Petcontroller;
use App\Http\Controllers\Pets2Controller;
use App\Http\Controllers\TreatmentController;
use App\Models\Doctor;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//route for login
Route::get('/', function () {
    return redirect()->route('login');
})->name('WebRoot');
//route for signup
Route::get('/Signup', function () {
    return route('register');
})->name('Signup');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [dashboardcontroller::class, 'index'])->name('dashboard');

    Route::get('/admin/dashboard', [dashboardcontroller::class, 'countpets'])->name('dashboard.pets');

    Route::get('/dashboardoctors', [dashboardcontroller::class, 'countdoctors'])->name('dashboard.doctors');

    //routes for usermodule
    Route::group(["prefix" => "users"], function () {
        

        Route::get('/create', [Usercontroller::class, 'create'])->name('user');

        Route::post('create', [Usercontroller::class, 'store'])->name('createuser');

        Route::get('/user', [UserController::class, 'index'])->name('userprofile.index');

        Route::get('/getuser', [UserController::class, 'datatab'])->name('profile.index');//route for datatable

        Route::get('/edituser/{id}', [UserController::class, 'edit'])->name('edituser');

        Route::any('/updateuser/{id}', [UserController::class, 'update'])->name('updateuser');

        Route::get('/deleteuser/{id}', [Usercontroller::class, 'delete'])->name('deleteuser');

        Route::get('/viewuser/{id}', [usercontroller::class, 'show'])->name('viewuser');

    });
    //route for petpage
    Route::group(["prefix" => "/pet"], function () {

        Route::get('create', [Petcontroller::class, 'index'])->name('pet.index');

        Route::get('create', [Petcontroller::class, 'create'])->name('createpet');
                
        Route::post('/created', [Petcontroller::class, 'store'])->name('create.pet');

        Route::get('editpets/{id}', [Petcontroller::class, 'edit'])->name('editpet');

        Route::post('updatepets/{id}', [Petcontroller::class, 'update'])->name('Updatepet');

        Route::get('deletepets/{id}', [Petcontroller::class, 'destroy'])->name('deletepet'); 

        Route::get('showpets/{id}', [Petcontroller::class, 'show'])->name('showpet');
    });
    //route for doctorpage
    Route::group(["prefix" => "doctor"], function () {

        Route::get('/doctordetails', [Doctorcontroller::class, 'index'])->name('doctor.index');

        Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctor.create');

        Route::post('/Createdoctor', [Doctorcontroller::class, 'store'])->name('createdoctor');

        Route::get('/editdoctor/{id}',[Doctorcontroller::class,'edit'])->name('editdoctor');

        Route::post('/updatedoctor/{id}',[Doctorcontroller::class,'update'])->name('updatedoctor');

        Route::get('/deletedoctor/{id}',[Doctorcontroller::class,'destroy'])->name('deletedoctor');

        Route::get('/viewedoctor/{id}',[Doctorcontroller::class,'show'])->name('showdoctor');///

        Route::get('/doctor', [Doctorcontroller::class, 'datatable'])->name('table.index');//datatable route for doctor
    });

    Route::group(["prefix" => "Userprofile"], function () {

        Route::get('/viewuserprofile/{id}', [Profilecontroller::class, 'view'])->name('showuser');
    });
    //Route for Pets2Controller
    Route::get('/getpet', [Pets2Controller::class, 'index'])->name('getpet');

    Route::get('/pets', [Pets2Controller::class, 'datatable'])->name('datatable.index');//datatableroute

    Route::put('/pets/{id}', [Pets2Controller::class, 'update'])->name('updatepet');

    Route::get('deletepet/{id}', [Pets2controller::class, 'destroy'])->name('droppet'); // ok

    Route::post('Addpet', [Pets2controller::class, 'store'])->name('Addpet');

    Route::get('changepet/{id}', [Pets2controller::class, 'edit'])->name('changepet');

    Route::put('upgradepet/{id}', [Pets2controller::class, 'update'])->name('upgradepet');

    Route::get('deletepet/{id}', [Pets2controller::class, 'delete'])->name('droppet');

    //Route for Treatment

    Route::get('treatment',[TreatmentController::class,'index'])->name('treatment');

    Route::get('treatmentload',[TreatmentController::class,'loaddata'])->name('load.treatment');//route for datatabel

    Route::get('addtreatmentform',[TreatmentController::class,'create'])->name('showtreatmentform');

    Route::post('createtreatment',[TreatmentController::class,'store'])->name('createtreatment');

    Route::get('viewtreatment/{id}',[TreatmentController::class,'show'])->name('viewtreatment');

    Route::get('edittreatment/{id}',[TreatmentController::class,'edit'])->name('edittreatment');

    Route::post('Updatetreatment/{id}',[TreatmentController::class,'update'])->name('Updatetreatment');

    Route::get('deletetreatment/{id}',[TreatmentController::class,'destroy'])->name('deletetreatment');
});
require __DIR__ . '/auth.php';
