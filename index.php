<?php
include './db/connection.php';

$products = mysqli_query($conn,'SELECT * FROM products');
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
		<link href="public/assets/css/styles.css" rel="stylesheet" />

		<!-- google font -->
		<link rel="preconnect" href="https://fonts.gstatic.com" />
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
		<link rel="preconnect" href="https://fonts.gstatic.com" />
		<link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet" />

		<!-- Swipper -->
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

		<!-- fontAwesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<title>Landing Page|Spark Motor</title>
		<!-- ICON -->
		<link rel="icon" href="./public/assets/img/logo.png" type="image/png" />
		<!-- JQuery -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	</head>
	<body>
		<header class="header">
			<!-- Start of Navbar -->
			<nav class="navbar navbar-expand-lg navbar-dark bg-transpsrent">
				<div class="container-fluid mx-2">
					<!-- Navbarbrand -->
					<a class="navbar-brand" href="#">
						<img src="./public/assets/img/logo.png" alt="" width="64" height="70" />
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav mx-auto">
							<li class="nav-link"><a class="nav-item text-decoration-none nav-hover" aria-current="page" href="#">Home</a> </li>
							<li class="nav-link"><a class="nav-item text-decoration-none nav-hover" href="#">New Vehicle</a> </li>
							<li class="nav-link"><a class="nav-item text-decoration-none nav-hover" href="#">About Us</a> </li>
						</ul>
						<a href="auth/login.php" class="btn btn-outline-light">Get the Car</a>
					</div>
				</div>
			</nav>
			<!-- End of Navbar -->
			<div class="jumbotron">
				<div class="container-fluid">
					<div class="row g-5 justify-content-center align-items-center mx-auto">
						<div class="col">
							<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
								<div class="carousel-indicators">
									<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
									<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
									<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
								</div>
								<div class="carousel-inner">
									<div class="carousel-item active">
										<div class="text-carousel">
											<h5 class="header1">Lamborghini</h5>
										</div>
										<img src="public/assets/img/Lamborghini.png" class="mx-auto d-block img-fluid" alt="..." />
									</div>
									<div class="carousel-item">
										<div class="text-carousel">
											<h5 class="header2">PORSCE</h5>
										</div>
										<img src="public/assets/img/Porsche.png" class="mx-auto d-block img-fluid" alt="..." />
									</div>
									<div class="carousel-item">
										<div class="text-carousel">
											<h5 class="header3">BMW</h5>
										</div>
										<img src="public/assets/img/BMW.png" class="mx-auto d-block img-fluid" alt="..." />
									</div>

									<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</button>
									<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="wave">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,32L720,96L1440,32L1440,320L720,320L0,320Z"></path></svg>
				</div>
			</div>
		</header>

		<main class="contain">
			<div class="container-fluid afiliated pt-xl-4">
				<div class="row g-2 text-center">
					<div class="col-sm-12 col-md-12 col-lg-2">
						<img src="public/assets/img/affiliated/Lamborghini.png" class="img-fluid" width="150" />
					</div>
					<div class="col-sm-12 col-md-12 col-lg-2">
						<img src="public/assets/img/affiliated/bmw.png" alt="" class="img-fluid" width="150" />
					</div>
					<div class="col-sm-12 col-md-12 col-lg-2">
						<img src="public/assets/img/affiliated/mitsubishi.png" alt="" class="img-fluid" width="150" />
					</div>
					<div class="col-sm-12 col-md-12 col-lg-2">
						<img src="public/assets/img/affiliated/porsche.png" alt="" class="img-fluid" width="150" />
					</div>
					<div class="col-sm-12 col-md-12 col-lg-2">
						<img src="public/assets/img/affiliated/mercedes-benz.png" alt="" class="img-fluid" width="150" />
					</div>
					<div class="col-sm-12 col-md-12 col-lg-2">
						<img src="public/assets/img/affiliated/toyota.png" alt="" class="img-fluid" width="150" />
					</div>
				</div>
			</div>
			<div class="container mt-5">
				<div class="row">
					<div class="col">
						<div class="text-center mb-4 head-product">
							<h1 class="display-3 pt-5">Find Your Vehicle</h1>
						</div>
						<!-- Slider main container -->
						<div class="swiper-container">
							<!-- Additional required wrapper -->
							<div class="swiper-wrapper">
								<!-- Slides -->
								<?php while($product = mysqli_fetch_assoc($products)): ?>
									<div class="swiper-slide card shadow-sm">
										<div class="text-center">
											<img src="./public/public-thumbnail/<?= $product['thumbnail'] ?>" class="product-img img-fluid w-50" />
										</div>
										<div class="card-body text-center">
											<h5 class="card-title"><?= $product['nama']; ?></h5>
											<p class="card-text">Price: $ <?= $product['harga']; ?></p>
											<a href="./pages/detail-product.php?id=<?= $product['id'] ?> " class="btn btn-info text-white px-3">Detail</a>
										</div>
									</div>
								<?php endwhile;?>
							</div>
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="description pb-5">
				<div class="wave">
					<svg xmlns="http://www.w3.org/2000/svg" transform="rotate(180)" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,32L720,96L1440,32L1440,320L720,320L0,320Z"></path></svg>
				</div>
				<section class="container">
					<div class="row justify-content-center align-items-center">
						<div class="col-lg-6 col-md-6 col-sm-12 text-center text-light">
							<img src="public/assets/img/fg1.jpg" alt="" class="img-fluid img-clip w-75" />
							<h1>High Quality Cars</h1>
							<p class="fs-6 leading-relaxed">“It’s a never-ending battle of making your cars better and also trying to be better yourself.”<span>~ Dale Earnhardt </span></p>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 text-center text-light">
							<img src="public/assets/img/fg2.jpg" alt="" class="img-fluid img-clip w-75" />
							<h1>Online Financing</h1>
							<p class="fs-6 leading-relaxed">“Your car should drive itself. It's amazing to me that we let humans drive cars, It's a bug that cars were invented before computers.” <span>~ Eric Schmidt</span></p>
						</div>
					</div>
				</section>
			</div>
		</main>

		<footer>
			<div class="container-fluid">
				<div class="row text-center footer">
					<hr />
					<p>&copy; 2021 All Rights Reserved by <a href="#home">Spark Motor</a></p>
				</div>
			</div>
		</footer>
		<!-- ChatBot -->
		<div id="chatButton"></div>

		<script>
		$(function(){
			$("#chatButton").load("chatbot/chatbot.php");
		});
		</script>

		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
		<!-- Swipper JS -->
		<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
		<script>
			var swiper = new Swiper(".swiper-container", {
				slidesPerView: 2,
				slidesPerColumn: 1,
				spaceBetween: 30,
				pagination: {
					el: ".swiper-pagination",
					clickable: true,
				},
				breakpoints: {
					320: {
						slidesPerView: 1,
						spaceBetween: 20,
					},
					1024: {
						slidesPerView: 2,
						slidesPerColumn: 1,
					},
				},
			});
		</script>
		
	</body>
</html>
