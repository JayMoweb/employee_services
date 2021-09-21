
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
  <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Project</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('changePassword')}}">Change Password</a>
      </li>
        <li class="nav-item active">
        <a class="nav-link" href="{{url('index')}}">DropDown</a>
      </li>
    </ul>
    <a href="{{url('logout')}}" style="margin-left: 850px;">Logout</a>
  </div>
</nav>
</div>
</body>
</html>
<div class="container mt-4">
	<div class="card" style="width: 300px;height: 300px; border: 1px solid black">
		<h2 align="center">Profile</h2>
		<div class="p-2"><strong>First Name</strong>: {{$user->firstname}} </div>
		<div class="p-2"><strong>Last Name</strong>: {{$user->lastname}}</div>
		<div class="p-2"><strong>Email</strong>: {{$user->email}}</div>
		<div align="center" class="mt-4">
			{{--  <a href="{{url('editProfile/'.$user->id)}}" class="btn btn-info">Edit Profile</a>  --}}
          <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{!!$user->id!!}" id="exampleModal1">
            Update Profile 
          </a>
    </div>
	</div>
</div>
  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
           <div class="container mt-4">
    <!-- <h1 align="center">Registration</h1> -->
    <form method="post" id="form" class="form-inline justify-content-center" style="margin: auto;" >
      @csrf
      <input type="hidden" id="id" value="{{$user->id}}">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          @if(session()->has('error'))
            <div class="alert alert-danger">{{ session()->get('error') }}</div>
          @endif
          <label>First Name</label>
          <input type="text" name="firstname" class="form-control" id="firstname">
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
          <input type="text" name="lastname" class="form-control" id="lastname">
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
          <input type="email" name="email" class="form-control" id="email">
          @error('email')
               <div class="alert alert-danger" id="error">{{ $message }}</div>
          @enderror
          
        </div>
      </div>
    </div>
    

  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submit">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#exampleModal1').click(function(event){
       event.preventDefault();
        var id = $(this).data('id');
        $.ajax({
          type: 'GET',
          url : 'editProfile/'+id,
          data:{
              id : id,
              _token : '{{csrf_token()}}'
          },
          dataType : 'JSON',
          success:function(data){
            $('#firstname').val(data[0].editProfileId.firstname);
            $('#lastname').val(data[0].editProfileId.lastname);
            $('#email').val(data[0].editProfileId.email);
          }
        });
    });
    $('#submit').click(function(event){
      event.preventDefault();
      var id  = $('#id').val();
      var firstname = $('#firstname').val();
      var lastname = $('#lastname').val();
      var email = $('#email').val();

      $.ajax({
        type : 'POST',
        url  : 'profile/edit/'+id,
        data : {
          firstname : firstname,
          lastname : lastname,
          email : email,
           _token : '{{csrf_token()}}'
        },
        success:function(data){
          if(data.Success) {
            window.location.reload();
            $('#exampleModal').modal('hide');
          }
        }
      })
    });
  });
</script>