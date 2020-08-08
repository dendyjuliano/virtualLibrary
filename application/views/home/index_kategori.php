<div class="bd-example">
	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="<?= base_url('assets/img/buku4.jpg') ?>" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>lots of ebooks. 100% free</h5>
					<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="<?= base_url('assets/img/bk2.jpg') ?>" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>free ultimate guide to free ebooks</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="<?= base_url('assets/img/bk3.jpg') ?>" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>free and discounted bestsellers</h5>
					<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

<div class="genre mt-4">
	<div class="container">
		<h4>Genres</h4>
		<hr>
		<div class="row">
			<?php foreach ($kategori as $row) :  ?>
				<div class="col-md-3">
					<div class="card bg-dark text-white  mt-4">
						<a href="<?= base_url('home/book_category/') ?><?= $row['id'] ?>">
							<img src="<?= base_url() . 'assets/img/genre/' . $row['image'] ?>" class="card-img" alt="...">
							<div class="card-img-overlay">
								<h5 class="card-title text-light"><?= $row['nama_kategori'] ?></h5>
							</div>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>


<div class="produk mt-4">
	<div class="container">
		<h4><?= $judul['nama_kategori'] ?></h4>
		<hr>
		<div class="row text-center">
			<?php foreach ($buku_kategori as $row) : ?>
				<div class="card ml-4 mt-3 mx-auto" style="width: 11rem;">
					<img src="<?= base_url() . '/uploads/img/image_book/' . $row['cover'] ?>" class="card-img-top" alt="...">
					<div class="card-body">
						<h6 class="card-title mb-1"><?= $row['judul'] ?></h6>
						<span class="badge badge-success mb-2 p-2">Rp. <?= number_format($row['harga'], 0, ',', '.') ?></span><br>
						<?= anchor('home/add_cart/' . $row['id'], '<div class="btn btn-primary btn-sm"><i class="fas fa-cart-plus"></i></div>') ?>
						<?= anchor('home/detail_book/' . $row['id'], '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>


	</div>
</div>
