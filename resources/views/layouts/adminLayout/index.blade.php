<!DOCTYPE html>
<html lang="en">
<head>
<title>Laraecom Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('css/bcss/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('css/bcss/bootstrap-responsive.min.css') }}">
<link rel="stylesheet" href="{{asset('css/bcss/uniform.css') }}">
<link rel="stylesheet" href="{{asset('css/bcss/select2.css') }}">
<link rel="stylesheet" href="{{asset('css/bcss/fullcalendar.css') }}">
<link rel="stylesheet" href="{{asset('css/bcss/matrix-style.css') }}">
<link rel="stylesheet" href="{{asset('css/bcss/matrix-media.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<link href="{{asset('fonts/bfonts/css/font-awesome.css') }}"" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/bcss/jquery.gritter.css') }}">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>

<!--Header-part-->

<!--close-Header-part--> 

<!--top-Header-menu-->
 @include('layouts.adminLayout.header')
<!--close-top-Header-menu-->

<!--sidebar-menu-->
@include('layouts.adminLayout.sidebar')
<!--sidebar-menu-->

<!--main-container-part-->
@yield('content')
<!--end-main-container-part-->

<!--Footer-part-->
@include('layouts.adminLayout.footer')
<!--end-Footer-part-->



<script src="{{asset ('js/bjs/jquery.min.js') }}"></script> 
{{-- <script src="{{asset ('js/bjs/jquery.ui.custom.js') }}"></script>  --}}
<script src="{{asset ('js/bjs/bootstrap.min.js') }}"></script>  
<script src="{{asset ('js/bjs/jquery.uniform.js') }}"></script> 
<script src="{{asset ('js/bjs/select2.min.js') }}"></script>
<script src="{{asset ('js/bjs/jquery.dataTables.min.js') }}"></script>
<script src="{{asset ('js/bjs/jquery.validate.js') }}"></script>  
<script src="{{asset ('js/bjs/matrix.js') }}"></script> 
<script src="{{asset ('js/bjs/matrix.form_validation.js') }}"></script>
<script src="{{asset ('js/bjs/matrix.tables.js') }}"></script>
<script src="{{asset ('js/bjs/matrix.popover.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $(function() {
    $("#expiry_date" ).datepicker({
    	minDate:0,
    	dateFormat: 'yy-mm-dd'

       });
  });
  </script>
</body>
</html>
