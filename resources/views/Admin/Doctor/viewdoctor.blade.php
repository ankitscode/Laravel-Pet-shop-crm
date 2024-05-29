@extends('layout.layout')
@section('content')
<div class="col-xxl-12">
    <div class="card card-height-80">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Your Doctors details here</h4>
        </div>
        <!-- end card header -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-nowrap align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 30%">Name</th>
                            <th scope="col" style="width: 20%">Degree</th>
                            <th scope="col" style="width: 20%">Contact No.</th>
                        </tr>
                    </thead>
                        <tbody>
                                <tr>
                                    <td>{{ $Doctors->name }}</td>
                                    <td>{{ $Doctors->degree }}</td>
                                    <td>{{ $Doctors->phone }}</td>
                                </tr>
                        </tbody>
                    <!-- end tbody -->
                </table>
                <!-- end table -->
            </div>
            <!-- end table responsive -->
        </div>
        <!-- end card body -->
    </div>
    <!-- end card -->
</div>
<div class="row mt-3">

    <div id="layout-wrapper">
        <div class="col-xxl-12">
            <div class="card card-height-80">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Your Pet Treatment Details Here</h4>
                </div>
                <!-- end card header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-nowrap align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 20%">Name</th>
                                    <th scope="col" style="width: 20%">Breed</th>
                                    <th scope="col" style="width: 20%">Treatment</th>
                                    <th scope="col" style="width: 20%">Note</th>
                                    <th scope="col" style="width: 20%">Action</th>
                                </tr>
                            </thead>

                                <tbody>
                                    @foreach ($Doctors->pets as $Pet)
                                        <tr>
                                            <td>{{ $Pet->name }}</td>
                                            <td>{{ $Pet->breed }}</td>
                                            <td>
                                                @foreach ($Pet->treatments as $Treatment)
                                                    {{ $Treatment->treatment }}<br>
                                                @endforeach
                                            </td>                                        
                                            <td>
                                                @foreach ($Pet->treatments as $Treatment)
                                                    {{ $Treatment->note }}<br>
                                                @endforeach
                                            </td>                                        
                                            <td>
                                                <a href="{{ route('changepet',$Pet->id)}}"
                                                    class="btn btn-info btn-sm">Edit</a>
                                                <a href="{{ route('showpet', $Pet->id) }}"
                                                    class="btn btn-secondary btn-sm">View</a>
                                                <a href="{{ route('droppet',$Pet->id) }}"
                                                    onclick="return confirm('Are you sure you want to delete this?')"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                             </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        <!-- end table -->
                    </div>
                    <!-- end table responsive -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Doctor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form-submit">
                                @csrf
                                <input type="hidden" id="user_id" name="user_id" value="">
                                <div class="py-3">
                                    <label for="" class="from-label">Name</label>
                                    <input type="text" class="form-control" id="Name" name="name"
                                        value="{{ old('name') }}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="py-3">
                                    <label for="" class="form-label">Breed</label>
                                    <input type="text" class="form-control" id="Breed" name="breed"
                                        value="{{ old('breed') }}">
                                    <span class="text-danger">
                                        @error('breed')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2" id="formsubmit">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->
        </div>
    </div>
</div>
@endsection