
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
  <script src="{{asset('js/jquery.min.js')}}"></script>
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
			<a href="{{url('editProfile/'.$user->id)}}" class="btn btn-info">Edit Profile</a>
		</div>
	</div>
</div>
  