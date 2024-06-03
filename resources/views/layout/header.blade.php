<!-- App favicon -->
<link rel="shortcut icon" href="{{ url('assets/images/favicon.ico')}}">

<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />

<!-- Layout config Js -->
<script src="{{ url('assets/js/layout.js')}}"></script>
<!-- Bootstrap Css -->
{{-- <link href="{{ url('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" /> --}}
<!-- Icons Css -->
<link href="{{ url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ url('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{ url('assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
<!-- jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--Ajax-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@yield('css')