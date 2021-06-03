<?php
include_once('../db/connection.php');

$users = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
		<!-- Customs CSS -->
		<link rel="stylesheet" href="style.css" />

		<!-- google font -->
		<link rel="preconnect" href="https://fonts.gstatic.com" />
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

		<title>Login | Spark Motor</title>
		<link rel="icon" href="../public/assets/img/logo.png" type="image/png" />
	</head>
	<body>
		<div class="container-fluid d-flex justify-content-center">
			<div class="row align-items-center min-vh-100">
				<div class="col">
				<?php
				if(isset($_GET['message'])){
					if($_GET['message'] == 1){
						echo "
						<div class='alert alert-danger' role='alert'>
						Your email or password is wrong!
						</div>
						";
					}
				}

				?>
					<div class="card border-0 shadow-sm d-flex justify-content-center">
						<div class="row g-0">
							<div class="col-lg-6 d-none d-lg-block">
								<img src="../public/assets/img/illustration3.svg" alt="..." class="img-fluid imgBox" />
							</div>
							<div class="col-lg-6 d-flex justify-content-center align-items-center">
								<div class="card-body">
									<h2 class="card-title text-center">Login</h2>
									<form action="./commands/login-user.php" method="POST" enctype="multipart/form-data">
										<div class="mb-2">
											<label for="exampleInputEmail1" class="form-label">Email address</label>
											<input required type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" />
										</div>
										<div class="mb-0">
											<label for="exampleInputPassword1" class="form-label">Password</label>
											<input required type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
										</div>
										<button name="login" type="submit" class="btn btn-primary mt-4  py-2 px-5  d-flex justify-content-center  mx-auto">Login</button>
										<span class="d-flex justify-content-center  mt-2">Don't have an account yet ?<a href="register.php" class="link btn-link text-decoration-none ms-1"> Sign Up</a></span>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Bootsrap js -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	</body>
</html>
