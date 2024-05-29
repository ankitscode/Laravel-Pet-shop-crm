@extends('layout.layout')
@section('content')
<style>
    #add{
        margin-right: 10%;
    }
</style>
<div class="row mt-3">
    <div id="layout-wrapper">
        <div class="col-xxl-12">
            <div class="card ">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Your Pets details here</h4>
                    <div class="flex-shrink">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Add Pet
                        </button>
                    </div>
                </div> 
                <!-- end card header -->
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-centered align-middle table-custom-effect table-nowrap mb-0" style="width:100%;margin-top: 0px !important;" id="Table">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 40%;">{{ __('Name') }}</th>
                                    <th style="width:40%;">{{ __('Breed') }}</th>
                                    <th style="width:20%;">{{  __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
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
                            <h5 class="modal-title" id="exampleModalLabel">Add Pet</h5>
                            <button id="add" type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('Addpet') }}" method="Post">
                                @csrf
                                <input type="hidden" name="id" value="">
                                <div class="py-3">
                                    <label for="" class="from-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                        value="{{ old('name') }}" required>
                                    <span class="text-danger">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </span>
                                </div>
                                <div class="py-3">
                                    <label for="" class="form-label">breed</label>
                                    <input type="text" class="form-control @error('degree') is-invalid @enderror" id="degree" name="breed"
                                        value="{{ old('breed') }}" required>
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
    $(document).ready( function () {
        $('#Table').DataTable({
            'paging': true,
            'lengthChange': true,
            'lengthMenu':  [ [10, 25, 50, 100], [10, 25, 50, 100] ],
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{!! route('datatable.index') !!}",
                "type": "GET",
                "data": function(d) {
                    d.filterSearchKey = $("#filter_search_key").val();
                }
            },
            "columns": [
                {
                    "data": "name",
                    "render": function(data, type, row) {
                        return data;
                    },
                },
                {
                    "data": "breed",
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
            'columnDefs': [
                {"targets": 0, 'searchable': true, 'orderable': true, 'width': '30%'},
                {"targets": 1, 'searchable': true, 'orderable': true, 'width': '30%'},
                { "targets": 2, 'searchable': true, 'orderable': true, 'width': '30%' }
            ],
            "order": [[ 2, 'asc' ]]
        });
    } );
</script> 

@endsection
