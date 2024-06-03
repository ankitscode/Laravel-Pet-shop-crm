@extends('layout.layout')
@section('content')
    <style>
        .cb {
            margin-bottom: 0px !important;
            margin: 0%;
        }

        .wrapping {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 90vh;    
        }

        .card {
            width: 100%;
            max-width: 500px;
        }
        .add-btn{
          border-radius: 10px;
        }
        
    </style>
     <div class="wrapping">
        <div class="col-6">
            <div class="card cb ">
                <div class="card body cb">
                    <div class="container cb">
                        <div class="d-flex justify-content-between align-item-center my-3 ">
                            <div class="h2"> Add User</div>
                            <a href="{{ route('userprofile.index') }}" class="btn btn-primary btn-sml" >Back</a>
                        </div>
                        <div>
                            <form action="{{ route('createuser') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="py-3">
                                    <label for="image" class="form-label">Profile</label>
                                    <div class="d-flex align-items-center">
                                        <input type="file" class="form-control" name="image" accept="image/*" required>
                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="py-3">
                                    <label for="" class="from-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"  required>
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="py-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="py-3">
                                    <label for="" class="from-label">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                    <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2 add-btn">Add</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
     </div>
    </div>
@endsection
