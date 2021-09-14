<!DOCTYPE html>
<head>
	<title></title>
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
	<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

	<style type="text/css">
		.container{
			border: 2px solid black;
		}
	</style>
</head>
<body>
<div class="container mt-3">
	<form method="post">
		@csrf
		<div class="row p-2">
			<div class="col-md-12">
				<label>Country</label>
				<select class="form-select form-control" id="country_id">
					<option>--Select Country--</option>
					@foreach($getCountry as $value)
						<option value="{{$value->id}}">{{$value->name}}</option>
					@endforeach;
				</select>
			</div>
			<div class="col-md-12">
				<label>state</label>
				<select class="form-select form-control" id="state_id">
				</select>
			</div>
			<div class="col-md-12">
				<label>city</label>
				<select class="form-select form-control" id="city_id">
				</select>
			</div>
		</div>
	</form>
</div>
</body>
</html>
	<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#country_id').on('change',function() {
			var id = $(this).val();
			$('#state_id').html('');
			$.ajax({
				type: 'POST',
				url : '{{url('state')}}',
				data: {
					id : id,
					_token: '{{csrf_token()}}'
				},
				dataType : 'JSON',
				success: function(res){
					if (res) {
						$('#state_id').html('<option>--select state--</option>');
						$.each(res,function(key,value){
							$('#state_id').append('<option value="' + value.id + '">'+ value.name +'</option>');
						});
					}	
				}
			});
		});
		$('#state_id').on('change',function(){
			var id = $(this).val();
			  $("#city_id").html('');
			$.ajax({
				type: 'POST',
				url: '{{url('city')}}',
				data: {
					id : id,
					_token: '{{csrf_token()}}'
				},
				dataType : 'JSON',
				success : function(res) {
					$('#city_id').html('<option>--select city--</option>');
					$.each(res,function(key,value){
						$('#city_id').append('<option value="' + value.id + '">'+ value.name +'</option>');
					});
				}
			});
		});
	});
</script>