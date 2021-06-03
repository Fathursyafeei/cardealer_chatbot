<?php
include '../db/connection.php';

if(!isset($_GET['id'])){
    header("Location:../index.php");
}
session_start();
if(!isset($_SESSION['user'])){
  header("Location: ../auth/login.php");

}
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
$product = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />
		<!-- Customs CSS -->
		<link rel="stylesheet" href="../auth/style.css" />
		<style>
			nav,
				.card {
					background: white;
					background: linear-gradient(to right bottom, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.3));
					backdrop-filter: blur(2rem);
				}
				.tombol {
					border-bottom-left-radius: 0;
					border-top-left-radius: 0;
					background-color: rgba(0, 100, 102, 0.4);
				}
			</style>

		<!-- google font -->
		<link rel="preconnect" href="https://fonts.gstatic.com" />
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

		<title>detail</title>
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
						<a class="nav-link" aria-current="page" href="./index.php"><i class="bi bi-house-fill text-light"></i></a>
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
							<a class="dropdown-item" href="../user/index.php"> <i class="bi bi-person-circle mx-lg-2"></i> My Profile </a>
						</li>
						<li>
							<a class="dropdown-item" href="../user/edit-user.php?id=<?=$user['id']?>"><i class="bi bi-gear mx-lg-2"></i> Account </a>
						</li>
						<li>
							<hr class="dropdown-divider" />
						</li>
						<li>
							<a class="dropdown-item" href="../user/logout.php"><i class="bi bi-power mx-lg-2"></i> Sign Out </a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- end of navbar -->
		<div class="container-fluid d-flex justify-content-center">
			<div class="row align-items-center min-vh-100">
				<div class="col">
					<div class="card border-0 shadow-sm d-flex justify-content-center">
						<div class="row g-0">
							<div class="col-lg-6">
								<img src="../public/public-thumbnail/<?= $product['thumbnail'] ?>" alt="..." class="img-fluid imgBox" />
							</div>
							<div class="col-lg-6 d-flex justify-content-center align-items-center text-lg-start text-center ">
								<div class="card-body">
									<h2 class="card-title"><?= $product['nama'] ?></h2>
									<p> Price: $ <?= $product['harga'] ?></p>
									<p> Color: <?= $product['warna'] ?></p>
									<p> Years: <?= $product['tahun'] ?></p>
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
