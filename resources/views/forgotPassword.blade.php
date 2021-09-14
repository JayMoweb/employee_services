
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
		<div class="card" style="border: 1px solid black;height: 250px;
    width: 500px;">
		<form method="post" action="{{route('forgotPassword')}}" id="form" class="form-inline justify-content-center" style="margin: auto;">
			@csrf
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control">
						@error('email')
   						 <div class="alert alert-danger" id="error">{{ $message }}</div>
					@enderror
					@if(session()->has('error'))
						<div class="alert alert-danger">{{ session()->get('error') }}</div>
					@endif
				</div>
			</div>
		</div>
		<div style="width: 180px;margin-left: auto;margin-right: auto;margin-top: 10px;">
			<input type="submit" class="btn btn-success" name="submit" value="Reset Password Link"><br></br>
			<a href="{{url('login')}}" class="btn btn-success">Back</a>
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
				email : {
					required : true,
					email: true
				}
			},
			messages : {
				email : {
					required : 'Enter the email',
					email : 'Enter the valid email'
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