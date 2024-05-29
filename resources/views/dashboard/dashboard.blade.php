@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-md-12 grid margin">
            @if (session('message'))
                <h4 class="alert alert-success">{{ session('message') }}</h4>
            @endif
            <div class="me-md-3 me-xl-5">
                <h2>Dashboard</h2>
                <p class="mb-md-o">Your analytics dashboard template</p>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total no of users</label>
                    <h4>{{ $count }}</h4>
                    <a href="{{url('admin/dashboard')}}" class="text-white"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body bg-primary text-white mb-4">
                    <label>Total no of Pets</label>                   
                    <h4>{{ $countPets }}</h4>
                    <a href="{{url('admin/dashboard')}}" class="text-white"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body bg-primary text-white mb-4">
                    <label>Total no of Doctors</label>
                    <h4>{{ $countDoctors }}</h4>
                    <a href="{{url('admin/dashboard')}}" class="text-white"></a>
                </div>
            </div>
        </div>
        
        

    </div>
    
    </div>
@endsection
