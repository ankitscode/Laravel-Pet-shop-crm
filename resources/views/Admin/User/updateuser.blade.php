@extends('layout.layout')
@section('content')
<style>
    .img-icon-size {
        width: 100px;
        height: 80px;
        font-size: 10px;
        object-fit: cover;
    }

    .cb {
        margin-bottom: 0px !important;
    }
    .wrapping {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 80vh;    
        }

        .card {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
        }
        .updt-btn{
          border-radius: 10px;
        }
        .back-btn{
          border-radius: 10px;
        }
</style>
<div class="row wrapping">
    <div class="col-6">
        <div class="card cb">
            <div class="card body cb">
                <div class="container cb">
                    <div class="d-flex justify-content-between align-item-center my-2 ">
                        <div class="h2"> Update User details</div>
                        <a href="{{ route('userprofile.index') }}" class="btn btn-primary btn-sml back-btn">Back</a>
                    </div>
                    <form action="{{ route('updateuser',$User->id) }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="py-3">
                            <label for="image" class="form-label">Profile</label>
                            <div class="d-flex align-items-center">
                                <img src="{{ url('storage/images/' . $User->image)}}" alt="Profile Image" class="img-thumbnail img-icon-size me-3">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                        </div>
                        <div class="py-3">
                            <label for="" class="from-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $User->name }}" value="{{ old('name') }}">
                            <span class="text-danger">
                                @error('name')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="py-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $User->email }}" value="{{ old('email') }}">
                            <span class="text-danger">
                                @error('email')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mb-2 updt-btn">Update</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection