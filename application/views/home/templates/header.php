<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Montserrat&display=swap" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<title><?= $title ?></title>
</head>

<body>
	<!-- <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url(); ?>assets/Logo2.png" width="60" class="d-inline-block align-top" alt="">
                <a class="navbar-brand text-white" href="#" href="">Virtual Library</a>
            </a>
            <form class="form-inline ml-auto mr-5">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
            <a type="button" class="text-white" id="login" data-toggle="modal" id="login">
                Log in
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#login" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav> -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<img src="<?= base_url(); ?>assets/Logo2.png" width="70" class="d-inline-block align-top" alt="">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse ml-5" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							DISCOVER
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<h4 class="ml-3">Genres</h4>
							<?php foreach ($kategori as $row) :  ?>
								<a class="dropdown-item" href="<?= base_url('home/book_category/') ?><?= $row['id'] ?>"><?= $row['nama_kategori'] ?></a>
							<?php endforeach; ?>
							<a class="dropdown-item" href="<?= base_url('home/index/') ?>">All Book</a>
						</div>
					</li>
				</ul>

				<?php if ($this->session->userdata('status') == true) : ?>
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow ml-3">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-white"><?= $this->session->userdata('nama') ?></span>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="<?= base_url('home/profile') ?>">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profile
								</a>
								<a class="dropdown-item" href="<?= base_url('home/history') ?>">
									<i class="fas fa-history fa-sm fa-fw mr-2 text-gray-400"></i>
									History
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>
				<?php else : ?>
					<a class="text-white ml-auto" href="<?= base_url('home/login') ?>">
						Login
					</a>
					<p class="text-white mt-3 mr-2 ml-2"> | </p>
					<a class="text-white mr-4" href="<?= base_url('home/register') ?>">
						Register
					</a>
				<?php endif; ?>

				<?php
				$keranjang = '<p class="text-white mt-3">' . '<i class="fas fa-shopping-cart text-light ml-3"></i> ' . $this->cart->total_items() . ' Book</p>'
				?>

				<?= anchor('home/detail_cart/', $keranjang) ?>

			</div>
		</div>
	</nav>
