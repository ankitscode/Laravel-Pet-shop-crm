@extends('layout.layout')
@section('content')
    <style>
        .cb {
            margin-bottom: 0px !important;
        }

        .rowwidth {
            padding-top: 5%;
            margin-left: 10%;
            width: 80%;
            margin-right: 10%;
        }
    </style>
    </style>
    <div class="row rowwidth">
        <div class="col-12">
            <div class="card cb">
                <div class="card body cb">
                    <div class="container cb">
                        <div class="d-flex justify-content-between align-item-center my-5 ">
                            <div class="h2"> Add Treatment</div>
                        </div>
                        <form action="{{ route('createtreatment') }}" method="POST">
                            @csrf
                            <label for="doc_id">Select Doc</label>
                            <select id="doc_id" name="doc_id">
                                @foreach ($Doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->id }} - {{ $doctor->name }}</option>
                                @endforeach
                            </select>

                            <label for="pet_id">Select Pet</label>
                            <select id="pet_id" name="pet_id">
                                @foreach ($Pets as $pet)
                                    <option value="{{ $pet->id }}">{{ $pet->id }} - {{ $pet->name }}</option>
                                @endforeach
                            </select>

                            <div class="py-3">
                                <label for="" class="form-label">Treatment details</label>
                                <input type="text" class="form-control" name="treatment" value="">
                                <span class="text-danger">
                                    @error('treatment')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="py-3">
                                <label for="" class="from-label">Treatment Note</label>
                                <input type="text" class="form-control" name="note">
                                <span class="text-danger">
                                    @error('note')
                                        {{ $message }}
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
