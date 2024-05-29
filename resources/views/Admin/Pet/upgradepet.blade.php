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
            min-height: 60vh;    
        }

        .card {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
        }
        .updt-btn{
          border-radius: 10px;
        }
</style>
<div class="row wrapping">
    <div class="col-6">
        <div class="card cb">
            <div class="card body cb">
                <div class="container cb">
                    <div class="d-flex justify-content-between align-item-center my-3 ">
                        <div class="h2"> Update Pet Details</div>
                    </div>
                    <form action="{{ route('upgradepet',$Pet->id) }}"  method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="origin" value="showdoctor">
                        {{-- <div class="py-3">
                            <label for="" class="from-label">User Id</label> --}}
                            <input type="text" class="form-control" name="user_id" value="{{$Pet->user_id }}"  hidden>
                            {{-- <span class="text-danger">
                                @error('user_id')
                                {{$message}}
                                @enderror
                            </span>
                        </div>                         --}}
                        <div class="py-3">
                            <label for="" class="from-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$Pet->name}}">
                            <span class="text-danger">
                                @error('name')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="py-3">
                            <label for="" class="form-label">Breed</label>
                            <input type="text" class="form-control" name="breed" value="{{ $Pet->breed }}">
                            <span class="text-danger">
                                @error('breed')
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