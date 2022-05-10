<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?=$config['title']?> - Muh Ilyas</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<style>
			.list-group-item{
				cursor: pointer;
				background:none;
				color:white;
			}.list-group-item:hover{
				background:white;
				color:black;
			}.list-group-item:active{
				background:none;
				color:white;
			}a{
				text-decoration:none;
				color:unset;
			}a:hover{
				text-decoration:none;
				color:unset;
			}
		</style>
		<!-- script  -->
		<script src="<?=base_url()?>components/jquery/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

		<!-- Font Awesome JS -->
		<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
		
		<!-- datatables -->
		<!-- <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->
		<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"/>
		
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
	</head>
	<body style="background:#f9f7f7;">
		<!-- Modal loading -->
		<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">z
				<div class="modal-dialog " role="document">
					<div class="modal-content">
						<div class="modal-body text-center">
							<img src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Loading_2.gif?20170503175831" style="width:100px;height:100px;">
							<h3>Loading . . .</h3>
						</div>
					</div>
				</div>
			</div>
		<?php
		if($template=='home'){
		?>
		
			
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Show User</h5>
						<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
						<!-- <span aria-hidden="true">&times;</span> -->
						<!-- </button> -->
					</div>
					<div class="modal-body">
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			</div>
			<div class="wrapper p-0">
				<div class="row h-100 w-100 m-0">
					<div class="col-lg-2 p-0">
						<div class="h-100 bg-dark text-white">
							<div class="row">
								<div class="col-lg-12 p-3">
									<h4 class="text-white text-center">Selamat Datang !</h4>
								</div>
							</div>	
							<div class="row">
								<div class="col-lg-12 p-3">
								<ul class="list-group">
									<a href="<?=base_url()?>home">
									<li class="list-group-item">
										<i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp;User
									</li>
									</a>
								</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-10 p-0">
						<div class="h-100 ">
						<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
							<a class="navbar-brand" href="#"></a>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>

							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ms-auto">
								<li class="nav-item dropdown mx-5">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-user"></i> <?=$_SESSION['email']?>
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="<?=base_url()?>login/logout"><i class="fa fa-sign-out"></i> Logout</a>
									</div>
								</li>
								</ul>
							</div>
							</nav>
							<div class="container">
								<?=$content?>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php
		}else{
		?>
			<div class="container">
				<?=$content?>
			</div>
		<?php
		}
		?>

		<!-- Bootstrap JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
	</body>
</html>
