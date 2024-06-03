@extends('layout.layout')
@section('content')
    <div class="row mt-3">
        <div id="layout-wrapper">
            <div class="col-xxl-12">
                <div class="card card-height-80">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Your Doctor details here</h4>
                        <div class="flex-shrink">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Add Doc
                            </button>
                        </div>
                    </div>
                    @php
                        $columns = [
                            ['name' => 'Name', 'width' => '20%'],
                            ['name' => 'Degree', 'width' => '20%'],
                            ['name' => 'Phone Number', 'width' => '20%'],
                            ['name' => 'Created at', 'width' => '20%'],
                            ['name' => 'Updated at', 'width' => '20%'],
                            ['name' => 'Action', 'width' => '20%'],
                        ];
                    @endphp
                    <!-- end card header -->
                    <x-datatabel id="mytable" :columns="$columns" /> <!--include component here-->

                    <tbody>

                    </tbody>

                    <!-- end table -->
                </div>
                <!-- end table responsive -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Doc</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('createdoctor') }}" method="Post">
                            @csrf
                            <input type="hidden" name="id" value="">
                            <div class="py-3">
                                <label for="" class="from-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" required>
                                <span class="text-danger">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                            <div class="py-3">
                                <label for="" class="form-label">Degree</label>
                                <input type="text" class="form-control @error('degree') is-invalid @enderror"
                                    id="degree" name="degree" value="{{ old('breed') }}" required>
                                <span class="text-danger">
                                    @error('breed')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                            <div class="py-3">
                                <label for="" class="form-label">Contact No.</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('breed') }}" required>
                                <span class="text-danger">
                                    @error('breed')
                                        <div class="invalid-feedback">{{ $message }}</div>
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
@section('script')
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable({
                'paging': true,
                'lengthChange': true,
                'lengthMenu': [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ],
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{!! route('table.index') !!}",
                    "type": "GET",
                    "data": function(d) {
                        d.filterSearchKey = $("#filter_search_key").val();
                    }
                },
                "columns": [{
                        "data": "name",
                        "render": function(data, type, row) {
                            return data;
                        },
                    },
                    {
                        "data": "degree",
                        "render": function(data, type, row) {
                            return data;
                        },
                    },
                    {
                        "data": "phone",
                        "render": function(data, type, row) {
                            return data;
                        },
                    },
                    {
                        "data": "created_at",
                        "render": function(data, type, row) {
                            return data;
                        },
                    },
                    {
                        "data": "updated_at",
                        "render": function(data, type, row) {
                            return data;
                        },
                    },
                    {
                        "data": "Action",
                        "render": function(data, type, row) {
                            return data;
                        },
                    },
                ],
                'columnDefs': [{
                        "targets": 0,
                        'searchable': true,
                        'orderable': true,
                        'width': '15%'
                    },
                    {
                        "targets": 1,
                        'searchable': true,
                        'orderable': true,
                        'width': '10%'
                    },
                    {
                        "targets": 2,
                        'searchable': true,
                        'orderable': true,
                        'width': '10%'
                    }
                ],
                "order": [
                    [1, 'asc']
                ]
            });
        });
    </script>
@endsection
