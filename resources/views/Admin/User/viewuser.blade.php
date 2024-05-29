@extends('layout.layout')
@section('name')
@endsection
@section('content')
    <style>
        .img-icon-size {
            width: 50%;
            height: 0%;
            font-size: 5px;
            object-fit: cover;
        }

        .me-3 {
            margin-right: 1.25rem;
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
            margin-right: 18%;
        }

        .equal-height {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }

        .equal-height>.col-sm-6 {
            display: flex;
        }

        .card {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .card-body {
            flex: 1;
        }
        .imgcard img {
      width: 50%;
      height: 50%;
    }
    .sec2{
        width: auto%;
    }
    .mcb{
        width: 100%;
    }
    </style>
    <div class="container">
        <div class="row g-0 equal-height">
            <div class="col-sm-6">
                <div class="card mcb">
                    <div class="card-body imgcard">
                        <div class="py-2">
                            <label for="image" class="form-label">Profile</label>
                            <div class="">
                                <img src="{{ asset('storage/images/' . $Users->image) }}" id="image" alt="Profile Image"
                                    class="img-thumbnail img-icon-size me-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card mcb">
                    <div class="card-body">
                        <div class="py-1">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $Users->name }}" readonly>
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="py-1">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ $Users->email }}" readonly>
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-2 sec2">
        <div id="layout-wrapper">
            <div class="col-xxl-12">
                <div class="card card-height-80">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Your pet details here</h4>
                        <div class="flex-shrink">
                            <button type="button" class="btn btn-primary btn"  style="border-radius: 15px;" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Add Pet
                            </button>
                        </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-nowrap align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 30%">Owner Name</th>
                                        <th scope="col" style="width: 30%">Pet Name</th>
                                        <th scope="col" style="width: 20%">Breed</th>
                                        <th scope="col" style="width: 20%">Action</th>
                                    </tr>
                                </thead>
                                @if (isset($Users->Pet) && count($Users->Pet) > 0)
                                    <tbody>
                                        @foreach ($Users->pet as $Pet)
                                            <tr>
                                                <td>{{ $Pet->user->name }}</td>
                                                <td>{{ $Pet->name }}</td>
                                                <td>{{ $Pet->breed }}</td>
                                                <td>
                                                    <a href="{{ route('editpet', $Pet->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ route('showpet', $Pet->id) }}"
                                                        class="btn btn-secondary btn-sm">View</a>
                                                    <a href="{{ route('deletepet', $Pet->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete this?')"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
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
                <!-- end card -->

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Pet</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="form-submit">
                                    @csrf
                                    <input type="hidden" id="user_id" name="user_id" value="{{ $Users->id }}">
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
    <!-- end col-xxl-12 -->
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("#formsubmit").on("click", function(event) {
                // alert('i am there');
                event.preventDefault();
                Addpet();
            });
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function Addpet() {
            var Name = $('#Name').val();
            var Breed = $('#Breed').val();
            var user_id = $('#user_id').val();
            console.log("Name", Name);
            console.log("Breed", Breed);
            console.log("user_id", user_id);
            if (Name != '' & Breed != '') {
                // const url = '{{ route('create.pet') }}';
                // console.log("url",url);
                $.ajax({
                    type: "POST",
                    url: '{{ route('create.pet') }}',
                    data: {
                        'Name': Name,
                        'Breed': Breed,
                        'user_id': user_id,
                    },
                    success: function(response) {
                        location.reload(true);
                        console.log("response151", response);
                        if (response) {
                            getdata();
                        }
                    }
                });
                $('#exampleModal').modal('toggle');
            } else {
                $('.error-message').append('\
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                                        <strong>Hey!</strong> Please enter all fileds.\
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                            <span aria-hidden="true">&times;</span>\
                                        </button>\
                                    </div>\
                                ');
            }
        }
    </script>
@endsection
