<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
  <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <style type="text/css">
    .error{
      color: red;
    }
    .card {
      margin: 0 auto; /* Added */
      float: none; /* Added */
      margin-bottom: 10px; /* Added */

    }
  </style>
</head>
<body>
  <div class="container mt-4">
    <!-- <h1 align="center">Registration</h1> -->
    <div class="card" style="border: 1px solid black;height: 300px;
    width: 500px;">
    <form method="post" action="{{url('/profile/edit/'.$edit->id)}}" id="form" class="form-inline justify-content-center" style="margin: auto;">
      @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          @if(session()->has('error'))
            <div class="alert alert-danger">{{ session()->get('error') }}</div>
          @endif
          <label>First Name</label>
          <input type="text" name="firstname" class="form-control" value="{{$edit->firstname}}">
          @error('firstname')
               <div class="alert alert-danger" id="error">{{ $message }}</div>
          @enderror
          
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" name="lastname" class="form-control" value="{{$edit->lastname}}">
          @error('lastname')
               <div class="alert alert-danger" id="error">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="{{$edit->email}}">
          @error('email')
               <div class="alert alert-danger" id="error">{{ $message }}</div>
          @enderror
          
        </div>
      </div>
    </div>
    <div style="width: 100px;margin-left: auto;margin-right: auto;margin-top: 10px;">
      <input type="submit" class="btn btn-success" name="submit" value="Edit Profile">
    </div> 
    </form>
    </div>
  </div>
</body>
</html>

  <script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#form").validate({
      rules :{
        firstname : {
          required :true,
        },
        lastname :{
          required :true,
        },
        email : {
          required : true,
          email: true
        },
        password: {
          required : true,
          minlength : 8
        },
        confirmpassword : {
          required :true,
          equalTo : '#password'
        }
      },
      messages : {
        firstname : {
          required : 'Enter the firstname'
        },
        lastname : {
          required : 'Enter the lastname'
        },
        email : {
          required : 'Enter the email',
          email : 'Enter the valid email'
        },
        password : {
          required : 'Enter the password',
          minlength : 'Enter the 8 cherecter length'
        },
        confirmpassword : {
          required : 'Enter the confirmpassword',
          equalTo : 'password and confirmpassword not match'
        }
      },
      highlight:function(element){
        $(element).addClass('error');
      },
      unhighlight : function(element) {
        $(element).removeClass('error');
      },
      submitHandler() {
        form.submit();
      }
    });
  });
</script>