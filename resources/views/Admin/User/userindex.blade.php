@extends('layout.layout')
@section('css')
    <style>
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

        #addbtn {
            /* padding-right:15%; */
            margin-right: 10% !important;
        }
        .cb {
            margin-bottom: 0 !important;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
        }

        .header-container h4 {
            margin-bottom: 0;
        }

        .table-custom {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
        }

        .table-custom th, .table-custom td {
            text-align: left;
            padding: 8px;
        }

        @media (max-width: 576px) {
            .header-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-container .btn {
                margin-top: 10px;
                margin-right: 0;
                margin-bottom: 0;
            }
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card cb">
                <div class="card header cb">
                    <div class="header-container">
                        <h4> <strong>Create User</strong></h4>
                        <a href="{{ route('user') }}" class="btn btn-success btn-sml" id=addbtn  style="border-radius: 15px;">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-custom table-centered align-middle table-nowrap mb-0 " id="mytable">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 30%">{{ __('Profile') }}</th>
                                        <th style="width: 30%">{{ __('Name') }}</th>
                                        <th style="width: 30%">{{ __('Email') }}</th>
                                        <th style="width: 10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- fordatabel --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                    "url": "{!! route('profile.index') !!}",
                    "type": "GET",
                    "data": function(d) {
                        d.filterSearchKey = $("#filter_search_key").val();
                    }
                },
                "columns": [{
                        "data": "image",
                        "render": function(data, type, row) {
                            return '<img src="' + data +
                                '" alt="Profile Image" style="width:50px; height:50px;"/>';
                        },
                    },
                    {
                        "data": "name",
                        "render": function(data, type, row) {
                            return data;
                        },
                    },
                    {
                        "data": "email",
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
