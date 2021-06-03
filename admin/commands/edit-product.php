<?php
include '../../db/connection.php';

if(!isset($_GET['id'])){
  header("Location:../index.php");
}
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
$product = mysqli_fetch_array($query);

  if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $warna= $_POST['warna'];
    $tahun = $_POST['tahun'];
    $thumbnail = $_FILES['thumbnail']['name'];
    
    if($thumbnail !=""){
      $extension_accepted = ['png','jpg','svg'];
      $x = explode('.', $thumbnail);
      $extension = strtolower(end($x));
      $file_tmp = $_FILES['thumbnail']['tmp_name'];
      $rand = rand(1,999);
      $new_name = $rand . '-' . $thumbnail;

      if(in_array($extension,$extension_accepted)){
        move_uploaded_file($file_tmp,'../../public/public-thumbnail/' . $new_name);
        $query = "UPDATE products SET nama='$nama',harga='$harga',warna='$warna',tahun='$tahun',thumbnail='$new_name' WHERE id=$id 
        ";
        $result = mysqli_query($conn, $query);
        if(!$result){
          die("The query failed  : " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
        }else{
          echo "<script>alert('Successfully changed data.');window.location='../index.php';</script>";
        }
      }
      else{
        echo "<script>alert('Extensions aren't allowed.');window.location='../index.php';</script>";
      }
    }
    else{
      $query = "UPDATE products SET nama='$nama',harga='$harga',warna='$warna',tahun='$tahun' WHERE id=$id
      ";
      $result = mysqli_query($conn,$query);
      if(!$result){
        die("The query failed : " . mysqli_errno($conn) .
          " - " . mysqli_error($conn));
      }else{
        echo "<script>alert('Successfully changed data.');window.location='../index.php';</script>";
      }
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Administrator</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />
		<link rel="stylesheet" href=".././dashboard.css" />
	</head>

	<body>
		<!-- Header -->
		<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Keikeucin</a>
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
								<a class="nav-link" href="#list">
									<span data-feather="file-text"></span>
									Penjualan Harian
								</a>
							</li>
						</ul>
					</div>
				</nav>
				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h2>Edit Data Product &mdash; <?= $product['nama'] ?></h2>
						<div class="btn-toolbar mb-2 mb-md-0">
							<div class="btn-group me-2"></div>
						</div>
					</div>

					
					<section class="product" id="product">
						<!-- Isi data dashboar disini -->
						<div class="card mt-5 p-2 shadow-sm rounded-3">
							<form method="POST" enctype="multipart/form-data">
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Nama </label>
									<input type="text" value="<?= $product['nama'] ?>" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Name Mobil" />
								</div>
								<div class="mb-3">
									<label for="exampleFormControlInput2" class="form-label">Harga</label>
									<input type="text" value="<?= $product['harga'] ?>" class="form-control" name="harga" placeholder="Harga Mobil" />
								</div>
								<div class="mb-3">
									<label for="exampleFormControlInput2" class="form-label">Warna</label>
									<input type="text" value="<?= $product['warna'] ?>" class="form-control" name="warna" placeholder="Warna Mobil" />
								</div>
								<div class="mb-3">
									<label for="exampleFormControlInput2" class="form-label">Tahun</label>
									<input type="text" value="<?= $product['tahun'] ?>" class="form-control" name="tahun" placeholder="Tahun Pembuatan" />
								</div>
								<div class="mb-3">
									<label for="formFile" class="form-label">Thumbnail</label>
									<input class="form-control" type="file" id="formFile" name="thumbnail" />
								</div>
								<button name="submit" type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</section>
				</main>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
		<script>
			feather.replace();
		</script>
		<script src="../../public/assets/js/bootstrap.min.js"></script>
	</body>
</html>