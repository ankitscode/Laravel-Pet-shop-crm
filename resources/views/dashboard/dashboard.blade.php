@extends('layout.layout')
@section('content')
    <style>
        .card.header {
            width: 98%;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            margin-bottom: 20px;
        }

        .card.header h4 {
            margin-bottom: 15px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .table thead {
            background-color: #343a40;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .img-thumbnail {
            border-radius: 50%;
        }
    </style>
@section('css')
@endsection

<div class="row">
    <div class="col-md-12 grid margin">
        @if (session('message'))
            <h4 class="alert alert-success">{{ session('message') }}</h4>
        @endif
        <div class="me-md-3 me-xl-5">
            <h2>Dashboard</h2>
            <p class="mb-md-o">Your analytics dashboard template</p>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body bg-primary text-white mb-3">
                <label>Total no of users</label>
                <h4 id="total_users">{{ $count }}</h4>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body bg-primary text-white mb-4">
                <label>Total no of Pets</label>
                <h4 id="total_pets">{{ $countPets }}</h4>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body bg-primary text-white mb-4">
                <label>Total no of Doctors</label>
                <h4 id="total_doctors">{{ $countDoctors }}</h4>
            </div>
        </div>
    </div>
</div>
<div class="card header">
    <h4>List of Latest Users</h4>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="width: 30%">Name</th>
                        <th scope="col" style="width: 30%">Profile</th>
                        <th scope="col" style="width: 20%">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latestUsers as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td><img src="{{ asset('storage/images/' . $user->image) }}" class="img-thumbnail"
                                    width="40px" height="40px" /></td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function refresh() {
        $.ajax({
            url: '{{ route('refreshdashboard') }}',
            method: "GET",
            success: function(data) {
                console.log(data);
                $('#total_users').text(data?.count);
                $('#total_pets').text(data?.countPets);
                $('#total_doctors').text(data?.countDoctors);
            },
            error: function(error) {
                console.log('Error fetching data:', error);
            }
        });
    }

    $(document).ready(function() {
        setInterval(function() {
            refresh();
        }, 5000);
    });
</script>
@endsection

