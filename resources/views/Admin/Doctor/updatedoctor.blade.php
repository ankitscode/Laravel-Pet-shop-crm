@extends('layout.layout')
@section('content')
<style>
    .wrapping {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 70vh;    
        }

        .card {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
        }
        .updt-btn{
          border-radius: 10px;
        }
</style>
</head>
<body>
<div class="container wrapping">
    <div class="col-6">
    <div class="card ">
        <div class="card-header">
           <strong>Update Doctor Details</strong> 
        </div>
        <div class="card-body">
            <form action="{{ route('updatedoctor',$Doctors->id) }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="">

                <div class="form-group py-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $Doctors->name }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group py-3">
                    <label for="degree" class="form-label">Degree</label>
                    <input type="text" class="form-control @error('degree') is-invalid @enderror" id="degree" name="degree" value="{{ $Doctors->degree }}" required>
                    @error('degree')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group py-3">
                    <label for="phone" class="form-label">Contact No.</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $Doctors->phone }}" required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mb-2 updt-btn" id="formsubmit">Add</button>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection