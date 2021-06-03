<?php
include '../db/connection.php';


session_start();
if(!isset($_SESSION['user'])){
  header("Location: ../auth/login.php");

}
if(!isset($_GET['id'])){
	header("Location: ../user/index.php");
	}

	$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$user = mysqli_fetch_array($query);
  
    if(isset($_POST['submit'])){
      $nama = $_POST['nama'];
      $alamat = $_POST['alamat'];
      $email = $_POST['email'];
      $photo = $_FILES['photo']['name'];
      
      if($photo !=""){
        $extension_accepted = ['png','jpg','svg'];
        $x = explode('.', $photo);
        $extension = strtolower(end($x));
        $file_tmp = $_FILES['photo']['tmp_name'];
        $rand = rand(1,999);
        $new_name = $rand . '-' . $photo;
  
        if(in_array($extension,$extension_accepted)){
          move_uploaded_file($file_tmp,'../public/public-thumbnail/' . $new_name);
          $query = "UPDATE users SET nama='$nama',alamat='$alamat',email='$email',photo='$new_name' WHERE id=$id 
          ";
          $result = mysqli_query($conn, $query);
          if(!$result){
            die("The query failed  : " . mysqli_errno($conn) .
              " - " . mysqli_error($conn));
          }else{
            echo "<script>alert('Successfully changed data.');window.location='../auth/login.php';</script>";
          }
        }
        else{
          echo "<script>alert('Extensions aren't allowed.');window.location='./edit-user.php';</script>";
        }
      }
      else{
        $query = "UPDATE users SET nama='$nama',alamat='$alamat',email='$email' WHERE id=$id
        ";
        $result = mysqli_query($conn,$query);
        if(!$result){
          die("The query failed : " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
        }else{
          echo "<script>alert('Successfully changed data.');window.location='../auth/login.php';</script>";
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
		<title>Edit Account|Spark Motor</title>
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
							<a class="dropdown-item" href="index.php"> <i class="bi bi-person-circle mx-lg-2"></i> My Profile </a>
						</li>
						<li>
							<a class="dropdown-item" href="./edit-user.php?id=<?=$user['id']?>"><i class="bi bi-gear mx-lg-2"></i> Account </a>
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
			<h2 class="fs-1 display-5 p-3 mt-5 text-center text-light"> Edit Profil</h2>
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-8 col-md-8 col-sm-12">
					<div class="card  shadow rounded-3 border-0">
						<h5 class="card-header border-0">
							<span>General</span>
						</h5>
						<div class="card-body">
            <form method="POST" enctype="multipart/form-data">
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Name</label>
									<input type="text" value="<?= $_SESSION['user']['nama'] ?>" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Name Product" />
								</div>
								<div class="mb-3">
									<label for="exampleInputEmail1" class="form-label">Address</label>
									<input type="text" value="<?= $_SESSION['user']['alamat'] ?>" class="form-control" name="alamat"/>
								</div>
								<div class="mb-3">
									<label for="exampleInputEmail1" class="form-label">Email</label>
									<input type="text" value="<?= $_SESSION['user']['email'] ?>" class="form-control" name="email" />
								</div>
								<div class="mb-3">
									<label for="formFile" class="form-label">Photo</label>
									<input class="form-control" type="file" id="formFile" name="photo" />
								</div>
								<button name="submit" type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>

		<!-- end of main -->

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	</body>
</html>
