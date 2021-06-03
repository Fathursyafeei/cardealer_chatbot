<?php
include_once('../db/connection.php');

$products = mysqli_query($conn, "SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Administrator</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />
		<link rel="stylesheet" href="../dashboard.css" />
	</head>

	<body>
		<!-- Header -->
		<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Spark Motor</a>
			<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" />
			<ul class="navbar-nav px-3">
				<li class="nav-item text-nowrap">
					<a class="nav-link" href="#">Sign out</a>
				</li>
			</ul>
		</header>
		<!-- End Of Header -->
		<div class="container-fluid">
			<div class="row">
				<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
					<div class="position-sticky pt-3">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="#">
									<span data-feather="home"></span>
									Dashboard
								</a>
							</li>
						</ul>

						<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
							<span>Saved reports</span>
							<a class="link-secondary" href="#" aria-label="Add a new report">
								<span data-feather="plus-circle"></span>
							</a>
						</h6>
						<ul class="nav flex-column mb-2">
							<li class="nav-item">
								<a class="nav-link" href="#">
									<span data-feather="file-text"></span>
									Current month
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									<span data-feather="file-text"></span>
									penjualan Harian
								</a>
							</li>
						</ul>
					</div>
				</nav>
				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">Dashboard</h1>
						<div class="btn-toolbar mb-2 mb-md-0">
							<div class="btn-group me-2"> </div>
						</div>
					</div>

					<h2>Create Mobil</h2>
					<div class="col-12">
						<form action="./commands/add-product.php" method="POST" enctype="multipart/form-data">
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Nama</label>
								<input type="text" class="form-control" name="nama" placeholder="Nama Mobil" />
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Harga</label>
								<input type="text" class="form-control" name="harga" placeholder="Harga Mobil" />
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Warna</label>
								<input type="text" class="form-control" name="warna" placeholder="Warna Mobil" />
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Tahun</label>
								<input type="text" class="form-control" name="tahun" placeholder="Tahun Pembuatan " />
							</div>
							<div class="mb-3">
								<label for="formFile" class="form-label">Thumbnail</label>
								<input class="form-control" type="file" id="formFile" name="thumbnail" />
							</div>
							<button name="submit" type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>

					<section class="list" id="list">
						<div class="col-12 mt-3">
							<h2>List Data Product</h2>
							<div class="table-responsive">
								<table class="table table-bordered text-center table-hover">
									<thead>
										<tr>
											<th scope="col">Name</th>
											<th scope="col">Price</th>
											<th scope="col">Color</th>
											<th scope="col">Year</th>
											<th scope="col">Thumbnail</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php while($product = mysqli_fetch_assoc($products)) : ?>
										<tr>
											<td><?= $product['nama'] ?></td>
											<td><?= $product['harga'] ?></td>
											<td><?= $product['warna'] ?></td>
											<td><?= $product['tahun'] ?></td>
											<td>
												<img src="../public/public-thumbnail/<?= $product['thumbnail'] ?>" class="rounded-circle img-fluid" width="50px" />
											</td>
											<td>
												<div class="d-flex justify-content-center">
												<a href="./commands/edit-product.php?id=<?= $product['id'] ?>"class="btn btn-outline-success btn-sm mx-3 px-3"><i class="bi bi-pencil"></i></a>
												<a href="./commands/delete-product.php?id=<?= $product['id'] ?>" class="btn btn-danger btn-sm px-3"><i class="bi bi-trash" style="list-style: none"></i></a>
												</div>
												
											</td>
										</tr>
										<?php endwhile; ?>
									</tbody>
								</table>
							</div>
						</div>
					</section>
					
				</main>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
		<script>
			feather.replace();
		</script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	</body>
</html>
