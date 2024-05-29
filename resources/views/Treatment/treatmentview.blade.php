@extends('layout.layout')
@section('content')
<div class="row mt-3">

    <div id="layout-wrapper">
        <div class="col-xxl-12">
            <div class="card card-height-80">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Treatment details here</h4>
                </div>
                <!-- end card header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-nowrap align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 50%">Treatment</th>
                                    <th scope="col" style="width: 50%">Note</th>
                                </tr>
                            </thead>

                                <tbody>
                                        <tr>
                                            <td>{{ $Treatment->treatment }}</td>
                                            <td>{{ $Treatment->note }}</td>
                                        </tr>
                                </tbody>
                        </table>
                        <!-- end table -->
                    </div>
                    <!-- end table responsive -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
@endsection