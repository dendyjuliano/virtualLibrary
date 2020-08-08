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

<div class="card">
	<div class="card-header">
		Book Detail
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-3">
				<img src="<?= base_url() . '/uploads/img/image_book/' . $buku_id['cover'] ?>" alt="" class="img-fluid" width="300">
			</div>
			<div class="col-md-9">
				<table class="table">
					<tr>
						<td>Book Name</td>
						<td><strong><?= $buku_id['judul'] ?></strong></td>
					</tr>
					<tr>
						<td>Author</td>
						<td><strong><?= $buku_id['penulis'] ?></strong></td>
					</tr>
					<tr>
						<td>Stock</td>
						<td><strong><?= $buku_id['stok'] ?></strong></td>
					</tr>
					<td>Price</td>
					<td><strong>
							<div class="btn btn-sm btn-success">Rp.<?= number_format($buku_id['harga'], 0, ',', '.')  ?></div>
						</strong></td>
					</tr>
				</table>
				<?= anchor('home/index/', '<div class="btn btn-danger btn-sm"><small>Kembali</small></div>') ?>
				<?= anchor('home/add_cart/' . $buku_id['id'], '<div class="btn btn-primary btn-sm"><small>Tambah Ke Keranjang</small></div>') ?>

			</div>
		</div>
	</div>
</div>
