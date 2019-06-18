<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link type="text/css" rel="stylesheet" href="{{url('css/app.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css/Admin.min.css')}}">

  </head>
<body>


<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
     <b>Admin</b>  
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <!--   <p class="login-box-msg">Sign in to start your session</p> -->

    <form action="{{url('login')}}" method="post">{{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="email" placeholder="Email" value="RB40000401">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @if ($errors->has('email'))<label class="control-label" for="inputError" > {{ $errors->first('email') }}</label>  @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" value="1234">
         @if ($errors->has('password')) <label class="control-label" for="inputError">{{ $errors->first('password') }} </label> @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
       <!--  <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
         @if (Session::has('msg')) <label class="control-label" for="inputError">{{ Session::get('msg') }} </label>@endif
        <!-- /.col -->
      </div>
    </form>

   <!--  <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
 

    <!-- <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
 
</div>
   
  
  </body>
         
 