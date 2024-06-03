@extends('layout.layout')
@section('content')
    <div class="row mt-3">
        <div id="layout-wrapper">
            <div class="col-xxl-12">
                <div class="card card-height-80">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Treatment details here</h4>
                        <div class="flex-shrink">
                            <a href="{{ route('showtreatmentform') }}" type="button" class="btn btn-primary btn-md"  style="border-radius: 15px;">
                                Add Treatment
                            </a>
                        </div>
                    </div>
                    <!-- end card header -->
                     @php
                        $columns = [
                            ['name' => 'Treatment', 'width' => '10%'],
                            ['name' => 'Note', 'width' => '10%'],
                            ['name' => 'Pet Name', 'width' => '10%'],
                            ['name' => 'Note', 'width' => '10%'],
                            ['name' => 'Createdat at', 'width' => '15%'],
                            ['name' => 'updated at', 'width' => '15%'],
                            ['name' => 'Action', 'width' => '20%'],
                        ];
                    @endphp 
                     <x-datatabel id="mytable" :columns="$columns" />
                     
                    <!-- end card header -->
                    {{-- <x-datatabel id="mytable" >
                        <th style="width: 30%">{{ __('$Name') }}</th>
                        <th style="width: 30%">{{ __('$Degree') }}</th>
                        <th style="width: 30%">{{ __('Phone Number') }}</th>
                        <th style="width: 10%">{{ __('Action') }}</th>
                    </x-datatabel> --}}
                                </thead>
                                {{-- @if (isset($Treatments) && !empty($Treatments)) --}}
                                <tbody>
                                     {{-- @foreach ($Treatments as $treatment)  --}}
                                     {{-- @php
                                        dd($treatment) 
                                    @endphp --}}
                                     {{-- @foreach ($treatment->pets as $pet)  --}}
                                        {{-- <tr>
                                            <td>{{ $treatment->treatment }}</td> 
                                            <td>{{ $treatment->note }}</td>
                                            <td>{{ $treatment?->pets?->name }}</td> 
                                            <td>{{ $treatment->note }}</td> 
                                            <td>
                                                <a href="{{ route('edittreatment', $treatment->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                <a href="{{ route('viewtreatment', $treatment->id) }}" class="btn btn-secondary btn-sm">View</a>
                                                <a href="{{ route('deletetreatment', $treatment->id) }}" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr> --}}
                                    {{-- @endforeach  --}}
                               {{-- @endforeach --}}
                                </tbody>
                               
                                {{-- @else
                                <h2>
                                    "no data"
                                </h2>
                                @endif --}}
                            </table>
                            <!-- end table -->
                        </div>
                        <!-- end table responsive -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
</div 
@endsection
@section('script')
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        $(document).ready(function($request) {

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
                    "url": "{!! route('load.treatment') !!}",
                    "type": "GET",
                    "data": function(d) {
                        d.filterSearchKey = $("#filter_search_key").val();
                    }
                },
                "columns": [
                {
                    "data": "treatment",
                    "render": function(data, type, row) {
                        return data;
                    },
                },
                {
                    "data": "note",
                    "render": function(data, type, row) {
                        return data;
                    },
                },
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
                    },
                    {
                        "targets": 3,
                        'searchable': true,
                        'orderable': true,
                        'width': '10%'
                    },
                    {
                        "targets": 4,
                        'searchable': true,
                        'orderable': true,
                        'width': '10%'
                    },
                ],
                "order": [
                    [1, 'asc']
                ]
            });
        });
    </script>
@endsection
