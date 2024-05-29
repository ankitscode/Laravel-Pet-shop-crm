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

        .cb {
            margin-bottom: 0px !important;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-container h4 {
            margin-left: 5%;
            margin-bottom: 0;
        }

        .header-container .btn {
            margin-right: 13%;
        }
    </style>
   <div class="col-xxl-12">
    <div class="card card-height-80">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Your pet details here</h4>
        </div>
        <!-- end card header -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-nowrap align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 30%">Pet Owner Name</th>
                            <th scope="col" style="width: 30%">Pet Name</th>
                            <th scope="col" style="width: 20%">Breed</th>
                        </tr>
                    </thead>
                        <tbody>
                                <tr>
                                    <td>{{ $Pet->user->name }}</td>
                                    <td>{{ $Pet->name }}</td>
                                    <td>{{ $Pet->breed }}</td>
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
                    <h4 class="card-title mb-0 flex-grow-1">Pet Owner details here</h4>
                </div>
                <!-- end card header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-nowrap align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 35%">Proile</th>
                                    <th scope="col" style="width: 35%">Name</th>
                                    <th scope="col" style="width: 30%">Email</th>
                                </tr>
                            </thead>
                            {{-- @php
                            dd($Pet);    
                            @endphp --}}
                            @if (isset($Pet->user) && !empty($Pet->user))
                            {{-- @php
                            dd($Pet);    
                            @endphp                            --}}
                                <tbody>
                                    {{-- @foreach ($Pet->user as $User) --}}
                                        <tr>
                                        <td> <img
                                                    src="{{ url('storage/images/' . $Pet->user->image)}}"
                                                    width="50px" height="50px" /></td>
                                            <td>{{ $Pet->user->name }}</td>
                                            <td>{{ $Pet->user->email }}</td>                                     
                                        </tr>
                                    {{-- @endforeach --}}
                                </tbody> 
                            @else
                                <tbody>
                                    <tr>
                                        <td colspan="4">
                                            <h2 class="text-center">No data</h2>
                                        </td>
                                    </tr>
                                </tbody>
                            @endif
                        </table>
                        <!-- end table -->
                    </div>
                    <!-- end table responsive -->
                </div>
                <!-- end card body -->
            </div>
@endsection