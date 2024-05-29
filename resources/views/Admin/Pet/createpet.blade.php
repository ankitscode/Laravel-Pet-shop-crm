@extends('layout.layout')
@section('content')
<style>
    .cb {
        margin-bottom: 0px !important;
    }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card cb">
                <div class="card body cb">
                    <div class="container cb">
                        <div class="d-flex justify-content-between align-item-center my-5 ">
                            <div class="h2"> Add Pet</div>
                            <a href="{{ route('userprofile.index') }}" class="btn btn-primary btn-lg">Back</a>
                        </div>
                        <form action="{{route('create.pet')}}"  method="POST">
                            @csrf
                            <div class="py-3">
                                <label for="" class="from-label">User Id</label>
                                <select class="form-control" name="user_id">
                                @foreach ($users as $user )
                                    <option value="{{ $user->id }}">{{ $user->id }} </option>
                                @endforeach
                            </select>
                                {{-- <input type="text" > --}}
                                <span class="text-danger">
                                    @error('user_id')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>                            
                            <div class="py-3">
                                <label for="" class="from-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                <span class="text-danger">
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="py-3">
                                <label for="" class="form-label">Breed</label>
                                <input type="text" class="form-control" name="breed" value="{{ old('breed') }}">
                                <span class="text-danger">
                                    @error('breed')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
