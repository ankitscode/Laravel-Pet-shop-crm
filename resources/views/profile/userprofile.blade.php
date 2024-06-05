@extends('layout.layout')
@section('content')
    <style>
        /* Your CSS styles here */
    </style>
    <div class="wrapping">
        <div class="card cb">
            <div class="card body cb">
                <div class="container rounded mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                
                            </div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">User Profile</h4>
                                </div>
                                <form action="{{ route('showuser', ['id' => auth()->user()->id]) }}" method="GET">
                                    @csrf
                                    <div class="row mt-2">
                                        <label for="image" class="form-label">Profile</label>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/images/' . auth()->user()->image) }}" alt="Profile Image" class="img-thumbnail img-icon-size me-3">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label class="labels">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ auth()->user()->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label for="email" class="labels">Email</label>
                                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ auth()->user()->email }}" readonly>
                                        </div>
                                    </div>
                                    <!-- Add more fields as needed -->

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
