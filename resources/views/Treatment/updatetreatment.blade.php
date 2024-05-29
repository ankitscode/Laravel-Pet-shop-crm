@extends('layout.layout')
@section('content')
<style>
    .cb {
        margin-bottom: 0px !important;
    }
    </style>
</style>
<div class="row justify-content-center">
<div class="col-6">
    <div class="card cb">
        <div class="card body cb">
            <div class="container cb">
                <div class="d-flex justify-content-between align-item-center my-5 ">
                    <div class="h2"> Update Treatment</div>
                </div>
                <form action="{{ route('Updatetreatment',$Treatment->id) }}"  method="POST">
                    @csrf
                    {{-- <div class="py-3">
                        <label for="" class="from-label">User Id</label> --}}
                        <input type="text" class="form-control" name="doc_id" value="{{$Treatment->doc_id }}"  hidden>

                        <input type="text" class="form-control" name="pet_id" value="{{$Treatment->pet_id }}"  hidden>
                        {{-- <span class="text-danger">
                            @error('user_id')
                            {{$message}}
                            @enderror
                        </span>
                    </div>                         --}}
                    <div class="py-3">
                        <label for="" class="from-label">Treatment Detail</label>
                        <input type="text" class="form-control" name="treatment" value="{{ $Treatment->treatment }}">
                        <span class="text-danger">
                            @error('treatment')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="py-3">
                        <label for="" class="form-label"> Treatment Note</label>
                        <input type="text" class="form-control" name="note" value="{{ $Treatment->note }}">
                        <span class="text-danger">
                            @error('note')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2 btn-md" style="border-radius: 13px;">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection