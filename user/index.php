<?php
include '../db/connection.php';

session_start();
if(!isset($_SESSION['user']))
  header("Location: ../auth/login.php");

$users = mysqli_query($conn, "SELECT * FROM users");
$user = mysqli_fetch_assoc($users);



?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Profil | Spark Motor</title>
		<link rel="icon" href="../public/assets/img/logo.png" type="image/png" />

		<!-- bootstrap v5 -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />

		<!-- customs css -->
		<link rel="stylesheet" href="user.css">

		<!-- google font -->
		<link rel="preconnect" href="https://fonts.gstatic.com" />
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
	</head>
	<body>
		<!-- navbar  goes here-->
		<nav class="navbar navbar-expand-lg navbar-light  mb-3 shadow-sm fixed-top">
			<div class="container-fluid">
				<div class="input-group w-50">
					<input type="text" class="form-control" placeholder="Search" />
					<div class="input-group-append">
						<button class="btn btn-secondary tombol" type="button">
							<i class="bi bi-search"></i>
						</button>
					</div>
				</div>
				<ul class="navbar-nav d-flex flex-row ms-auto fs-5">
					<li class="nav-item me-2">
						<a class="nav-link" aria-current="page" href="../pages/index.php"><i class="bi bi-house-fill text-light"></i></a>
					</li>
					<li class="nav-item me-2">
						<a class="nav-link" href="#"><i class="bi bi-cart-fill text-light"></i></a>
					</li>
				</ul>
				<div class="nav-item dropdown me-2 fs-5">
					<a class="nav-item link-secondary" href="#" id="navbarDropdown" role="navigation" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-person-fill text-light"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
						<li>
							<a class="dropdown-item" href="../user"> <i class="bi bi-person-circle mx-lg-2"></i> My Profile </a>
						</li>
						<li>
							<a class="dropdown-item" href="./edit-user.php?id=<?= $user['id']?>"><i class="bi bi-gear mx-lg-2"></i> Account </a>
						</li>
						<li>
							<hr class="dropdown-divider" />
						</li>
						<li>
							<a class="dropdown-item" href="./logout.php"><i class="bi bi-power mx-lg-2"></i> Sign Out </a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- end of navbar -->
		<!-- main -->
		<main class="container mt-3 min-vh-100">
			<h1 class="fs-1 display-5 p-3 mt-5 text-center text-light">Profil</h1>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class="card mb-3 shadow border d-flex mx-auto" style="max-width: 320px">
						<div class="row g-0 justify-content-center align-content-center align-items-center">
							<div class="col-5">
								<img src="../public/public-thumbnail/<?= $_SESSION['user']['photo'] ?>" alt="..." class="d-flex mx-auto rounded-circle img-fluid" width="100px" />
							</div>
							<div class="col-7">
								<div class="card-body">
									<h5 class="card-title"><?= $_SESSION['user']['nama'] ?></h5>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12">
					<div class="card mx-auto shadow rounded-3 border-0">
						<h5 class="card-header border-0">
							<span>About</span> <a href="./edit-user.php?id=<?= $user['id']  ?>" class="btn btn-sm btn-secondary tombol rounded-circle float-end"><i class="bi bi-sliders"></i></a>
						</h5>
						<div class="card-body">
							<div class="mt-1">
								<h6 class="mb-0 fs-5">Adrress:</h6>
								<p><?= $_SESSION['user']['alamat'] ?></p>
							</div>
							<div class="mt-1">
								<h6 class="mb-0 fs-5">Email:</h6>
								<p><?= $_SESSION['user']['email'] ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

		<!-- end of main -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	</body>
</html>
