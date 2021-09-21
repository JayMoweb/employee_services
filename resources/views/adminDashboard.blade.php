
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
  <style>
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
  .toggle.ios .toggle-handle { border-radius: 20px; }
</style>
</head>
<body>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<link href="{{asset('css/bootstrap-toggle.min.css')}}" rel="stylesheet">

  <script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap-toggle.min.js')}}"></script>


<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<div class="container"> 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Project Admin Site</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="">Home</a>
      </li>
    </ul>
    <a href="{{url('logout')}}" style="margin-left: 850px;">Logout</a>
  </div>
</nav>
</div>
</body>
</html>
<div class="container mt-4">
	<table class="table table-border">
    <tr>
      <td>First Name</td>
      <td>Last Name</td>
      <td>Email</td>
      <td>Technology</td>
      <td>Created At</td>
      <td>Status</td>
    </tr>
    @foreach($allRecord as $value)
      @if($value->role == 'user')
      <tr>
        <td>{{$value->firstname}}</td>
        <td>{{$value->lastname}}</td>
        <td>{{$value->email}}</td>
        <td>
            {{ $value->technology_formatted }}
        </td>
        <td>
            {{\Carbon\Carbon::parse($value->created_at)->format('d-F-Y')}}
            
        </td>
        <td>
          <input type="checkbox" data-id="{{$value->id}}" class="status" data-toggle="toggle"  value="{{$value->status ? 0 : 1 }}" {{$value->status ? 'checked' : ''; }}>
        </td>
      </tr>
      @endif
    @endforeach
  </table>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('.status').change(function() {
        var status = $(this).prop('checked') == true ? 0 : 1;
        var id = $(this).data('id');
        
        $.ajax({
          type : 'GET',
          data : {'status': status,'id': id },
          url : '{{url('change_status')}}',
          dataType : 'JSON',
          success : function(data){
            console.log(data.success);
          }
        });
        
    });
  });
</script>