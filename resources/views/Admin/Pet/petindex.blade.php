@extends('layout.layout')
@section('content')
    <style>
        #add {
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
                            <button type="button" id="modalButton" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Add Pet
                            </button>
                        </div>
                    </div>
                    <!-- end card header -->
                    @php
                        $columns = [
                            ['name' => 'Name', 'width' => '20%'],
                            ['name' => 'Breed', 'width' => '20%'],
                            ['name' => 'Created_at', 'width' => '20%'],
                            ['name' => 'Updated_at', 'width' => '20%'],
                            ['name' => 'Action', 'width' => '20%'],
                        ];
                    @endphp

                    <x-datatabel id="Table" :columns="$columns" />

                    <!-- end card body -->
                </div>
                <!-- end card -->

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pets</h5>
                                <button id="add" type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    @csrf
                                    <input type="hidden" name="id" value="">
                                    <div class="py-3">
                                        <label for="" class="from-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" required>
                                        <span class="text-danger">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="py-3">
                                        <label for="" class="form-label">breed</label>
                                        <input type="text" class="form-control @error('degree') is-invalid @enderror"
                                            id="breed" name="breed" required>
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
{{-- add kya function kahan h  --}}
@section('script')
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        $('#Table').DataTable({
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
                "url": "{!! route('datatable.index') !!}",
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
                    "data": "breed",
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
                    'width': '30%'
                },
                {
                    "targets": 1,
                    'searchable': true,
                    'orderable': true,
                    'width': '30%'
                },
                {
                    "targets": 2,
                    'searchable': true,
                    'orderable': true,
                    'width': '30%'
                }
            ],
            "order": [
                [2, 'desc']
            ]
        });

        $('#deleteButton').click(function() {
            deletePet(petId);
        });

        $('#modalButton').click(function (e) { 
            $('#name').val('');
            $('#breed').val('');            
        });


        $("#formsubmit").on("click", function(e) {
            e.preventDefault();
            const functionToRun = $(this).html();
            if (functionToRun == "Add") {
                addPet();
            } else {
                const id = $(this).attr("data-id");
                updatePet(id);
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function addPet() {
            var Name = $('#name').val();
            var Breed = $('#breed').val();
            $.ajax({
                type: "POST",
                url: '{{ route('Addpet') }}',
                data: {
                    'Name': Name,
                    'Breed': Breed,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#exampleModal').modal('hide');
                    $('#breed').val('');
                    $('#name').val('');
                    $('#Table').DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {

                }

            });
        }


        function deletePet(id) {
            if (confirm('Are you sure you want to delete this pet?')) {
                $.ajax({
                    url: '{{ route('droppet', ':id') }}'.replace(':id', id),
                    method: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#Table').DataTable().ajax.reload();
                    }
                });
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function editPet(id) {
            $.ajax({
                url: '{{ route('changepet', ':id') }}'.replace(':id', id),
                method: 'GET',
                success: function(data) {
                    $('#name').val(data.name);
                    $('#breed').val(data.breed);
                    $('#exampleModal').modal('show');
                    $("#formsubmit").html("Update");
                    $("#formsubmit").attr("data-id", id);
                }
            });
        }

        function updatePet(id) {
            var Name = $('#name').val();
            var Breed = $('#breed').val();
            $.ajax({
                type: "POST",
                url: '{{ route('upgradepet', '') }}/' + id,
                data: {
                    'Name': Name,
                    'Breed': Breed,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#exampleModal').modal('hide');
                    $('#Table').DataTable().ajax.reload();
                    $('#name').val('');
                    $('#breed').val('');


                },
                error: function(xhr, status, error) {}
            });
        }
    </script>
@endsection
