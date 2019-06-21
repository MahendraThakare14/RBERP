<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link type="text/css" rel="stylesheet" href="{{url('css/app.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/Admin.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/_all-skins.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/style.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link href="{{url('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">



  </head>
  <body class="hold-transition skin-blue sidebar-mini">
       <div class="wrapper">
          @include('include.header')
          @include('include.sidebars')
          <div class="content-wrapper">
          @yield('content')
          </div>
          @include('include.footer')
          @include('include.script')
      </div>
     <script type="text/javascript"   src="{{url('js/adminlte.min.js')}}" async  ></script>
     <script type="text/javascript"  src="{{url('js/bootstrap.min.js')}}" async  ></script>
     <script type="text/javascript"  src="{{url('js/jquery.dataTables.min.js')}}" defer></script>
     <script type="text/javascript"  src="{{url('js/dataTables.bootstrap4.min.js')}}" defer></script>

  </body>

<!--   <script type="text/javascript">
function downloadJSAtOnload() {
var element = document.createElement("script");
element.src = "defer.js";
document.body.appendChild(element);
}
if (window.addEventListener)
window.addEventListener("load", downloadJSAtOnload, false);
else if (window.attachEvent)
window.attachEvent("onload", downloadJSAtOnload);
else window.onload = downloadJSAtOnload;
</script> -->


</html>
 