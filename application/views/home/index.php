<!-- alert -->
<div id="alertSuccess" class="alert alert-success shadow position-fixed px-5 m-5 d-none" role="alert" style="right:0;top:0;">
  Berhasil !
</div>
<div id="alertDanger" class="alert alert-danger shadow position-fixed px-5 m-5 d-none" role="alert" style="right:0;top:0;">
	Gagal !
</div>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog " role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" >Delete User</h5>
						<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
						<!-- <span aria-hidden="true">&times;</span> -->
						<!-- </button> -->
					</div>
					<div class="modal-body">
						<p>Anda yakin ingin menghapus user ini ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" id="hapus-user" data-id="">Hapus</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			</div>
<div class="row my-4 mx-3">
	<div class="col-12 rounded bg-white py-3 px-4">
		<h5>List User</h5>
		<hr>
		<div class="wrapper">
			<table id="example" class="display" style="width:100%">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Avatar</th>
						<th class="text-end">Action</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
				<tfoot>
					<tr>
						<th width="15%">First Name</th>
						<th width="15%">Last Name</th>
						<th width="30%">Email</th>
						<th width="10%">Avatar</th>
						<th width="30%" class="text-end">Action</th>
					</tr>
				</tfoot>
			</table>
		</div>

		
	</div>
</div>

<script>
	var tabel = "";
	$(document).ready(function (){
		LoadData();
		
		
	});
	function TampilAlert(a){
		$('#'+a).removeClass('d-none');
		setTimeout(function() {
			$('#'+a).addClass('d-none');
    	}, 3000);
	}
	function LoadData(page = 1){
		$.ajax({
			url: "https://reqres.in/api/users?page="+page,
			type: "GET",
			dataType: "JSON",
			success: function(res){
				for(i=0;i<res.data.length;i++){
					data = res.data[i];
					$('tbody').append(`<tr>
						<td>`+data.first_name+`</td>
						<td>`+data.last_name+`</td>
						<td>`+data.email+`</td>
						<td> <img src="`+data.avatar+`" class="rounded-circle" style="width:50px;height:50px;"></td>
						<td class="text-end">
							<button class="btn btn-sm btn-danger hapus" data-id="`+data.id+`"><i class="fa fa-trash"></i> Delete</button>
							<button class="btn btn-sm btn-success edit"  data-id="`+data.id+`"><i class="fa fa-edit"></i> Edit</button>
							<button class="btn btn-sm btn-info show" data-id="`+data.id+`"><i class="fa fa-desktop"></i> Show</button>
						</td>
					</tr>`);
					
				}
					
						$('#example').DataTable({
							"pagingType": "simple",
							"bDestroy": true
						});
					
				
					$('#example_next').on('click', function(e){
						e.preventDefault();
						
						a = page+1;
						console.log(a);
						if(a<=res.total_pages){
							$('#example').dataTable().fnClearTable();
							LoadData(a);
						}else{
							alert('This last page');
						}
					})
					$('#example_previous').on('click', function(e){
						e.preventDefault();
						
						a = page-1;
						console.log(a);
						if(a>0){
							$('#example').dataTable().fnClearTable();
							LoadData(a);
						}else{
							alert('This last page');
						}
					})
					$('#example_info').html('Total '+res.total);
			}
		})
	}
	$('#example').on('click', '.show', function(){
		id = $(this).attr('data-id');
		// alert(id);
		$.ajax({
			url: "https://reqres.in/api/users/"+id,
			type:"GET",
			dataType:"JSON",
			success: function(res){
				t = `<div class="row">
						<div class="col-2">
							<img src="`+res.data.avatar+`" style="width:100px;height:100px;" class="rounded-circle">
						</div>
						<div class="col-10">
							<h5>`+res.data.first_name+` `+res.data.last_name+`</h5>
							<small>`+res.data.email+`</small>
							<p>`+res.support.text+`</p>
							<a href="`+res.support.url+`" target="_blank">`+res.support.url+`</a>
						</div>
					</div>`;
					$('#exampleModal').find('.modal-body').html(t);
					$('#exampleModal').find('.modal-body').html(t);
					
			}
		})
		$('#exampleModal').modal('show');

	})
	$('#example').on('click', '.edit', function(){
		id = $(this).attr('data-id');
		// alert(id);
		$.ajax({
			url: "https://reqres.in/api/users/"+id,
			type:"GET",
			dataType:"JSON",
			success: function(res){
				t = `<div class="row">
						<div class="col-2">
							<img src="`+res.data.avatar+`" style="width:100px;height:100px;" class="rounded-circle">
						</div>
						<div class="col-10">
							<div class="mb-3">
								<label for="name" class="form-label">Name</label>
								<div class="row">
									<div class="col">
									<input type="text" class="form-control" placeholder="First name" name="n1" value="`+res.data.first_name+`">
									</div>
									<div class="col">
									<input type="text" class="form-control" placeholder="Last name" name='n2' value="`+res.data.last_name+`">
									</div>
								</div>
							</div>
							<div class="mb-3">
								<label for="job" class="form-label">Job</label>
								<input type="email" class="form-control" id="job" aria-describedby="jobHelp" name="job">
							</div>
							
							<button type="submit" class="btn btn-primary update"  data-id="`+id+`">Update</button>
	
						</div>
					</div>`;
					$('#exampleModal').find('.modal-body').html(t);
					$('#exampleModalLabel').html('Edit User');
					
			}
		})
		$('#exampleModal').modal('show');

	})
	$('#exampleModal').on('click', '.update', function(){
		id = $(this).attr('data-id');
		name = $('#exampleModal').find('[name="n1"]').val() +" "+ $('#exampleModal').find('[name="n2"]').val();
		job = $('#exampleModal').find('[name="job"]').val();
		
		$('#exampleModal').modal('hide');
		$('#loadingModal').modal('show');
		$.ajax({
			url: "https://reqres.in/api/users/"+id,
			type:"PUT",
			data:{
				name:name,
				job:job
			},
			dataType:"JSON",
			success: function(res, textStatus, xhr){
				setTimeout(function() {
					$('#loadingModal').modal('hide');
					if(xhr.status==200){
						TampilAlert('alertSuccess');
					}else{
						TampilAlert('alertDanger');
					}
        		}, 3000);
				
				
			}
		})
	})
	$('#example').on('click', '.hapus', function(){
		id = $(this).attr('data-id');
		
		$('#deleteModal').modal('show');
		$('#deleteModal').find('[data-id]').attr('data-id', id);

	})
	$('#hapus-user').click(function(){
		id = $(this).attr('data-id');
		$('#deleteModal').modal('hide');
		$('#loadingModal').modal('show');
		$.ajax({
			url: "https://reqres.in/api/users/"+id,
			type:"DELETE",
			dataType:"JSON",
			success: function(res, textStatus, xhr){
				setTimeout(function() {
					$('#loadingModal').modal('hide');
					if(xhr.status==204){
						TampilAlert('alertSuccess');
					}else{
						TampilAlert('alertDanger');
					}
        		}, 3000);
				
				
			}
		})
	})
	$('[data-dismiss="modal"]').click(function(){
		$('#exampleModal').modal('hide');
		$('#deleteModal').modal('hide');
	});
	
</script>
