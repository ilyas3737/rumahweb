<div class="row">
	<div class="col-lg-5 m-auto p-3 mt-5 bg-white rounded shadow-sm">
	<!-- <form> -->
		<div class="mb-3">
			<h1>Registration</h1>
		</div>
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Name</label>
			<div class="row">
				<div class="col">
				<input type="text" class="form-control" placeholder="First name">
				</div>
				<div class="col">
				<input type="text" class="form-control" placeholder="Last name">
				</div>
			</div>
		</div>
		<div class="mb-3">
			<label for="tgl_lahir" class="form-label">Birthdate</label>
			<input type="date" class="form-control" id="tgl_lahir" aria-describedby="tglHelp" name="tgl_lahir">
			<div id="tglHelp" class="form-text"></div>
		</div>
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Email address</label>
			<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required placeholder="ex : ilyas@rumahweb.co.id">
			<div class="invalid-feedback">
			Email harus menggunakan @rumahweb.co.id
			</div>
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Password</label>
			<input type="password" class="form-control" id="password" name="password" min-length="12" required>
			<div class="invalid-feedback">
				Password minimal 12
			</div>
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Confirm Password</label>
			<input type="password" class="form-control" id="password2" name="password2"  min-length="12" required>
			<div class="invalid-feedback">
				Harus sama dengan password
			</div>
		</div>
		
		<button type="submit" class="btn btn-primary" id="submit">Submit</button>
		<a href="<?=base_url()?>login" class="btn btn-outline-primary">Login</a>
		<!-- </form> -->
	</div>
</div>
<script>
	$('#submit').click(function(){
		email = $('[name="email"]').val();
		p1 = $('[name="password"]').val();
		p2 = $('[name="password2"]').val();

		$('.is-invalid').removeClass('is-invalid');	

		result = email.substr(email.length  - 15);

		if (p1.length<12) {
			$('#password').addClass('is-invalid');
		}
		if (p2!=p1) {
			$('#password2').addClass('is-invalid');
		}
		if (result!='@rumahweb.co.id') {
			$('#email').addClass('is-invalid');
		}
		


	})
</script>
