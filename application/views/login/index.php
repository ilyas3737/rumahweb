<div class="row">
	<div class="col-lg-5 m-auto p-3 mt-5 bg-white rounded shadow-sm">
	<!-- <form method="post" action="<?=base_url()?>login"> -->
		<div class="mb-3">
			<h1>Login</h1>
		</div>
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Email address</label>
			<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
			<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1" name="password">
		</div>
		<button type="submit" class="btn btn-primary" id="login">Login</button>
		<a href="<?=base_url()?>registration" class="btn btn-outline-primary">Registration</a>
		<!-- </form> -->
	</div>
</div>
<script>
	$('#login').click(function(){
		email = $('[name="email"]').val();
		password = $('[name="password"]').val();
		$.ajax({
			url:"https://reqres.in/api/login",
			type:"POST",
			data:{
				email,
				password
			},
			beforeSend: function() {
				$('#loadingModal').modal('show');
            },
			success: function(res){
				if(res.token!=''){
					window.location.href="<?=base_url()?>login?token="+res.token+"&email="+email;
				}
			}
		})
	})
</script>
