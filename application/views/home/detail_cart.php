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


<div class="container-fluid mt-5">
	<h4>Cart</h4>
	<table class="table table-hover table-striped">
		<tr>
			<th>No</th>
			<th>Book Name</th>
			<th>Qty</th>
			<td align="right">Price</td>
			<td align="right">Grand Total</td>
		</tr>
		<?php
		$no = 1;
		foreach ($this->cart->contents() as $items) :
		?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $items['name'] ?></td>
				<td><?= $items['qty'] ?></td>
				<td align="right">Rp. <?= number_format($items['price'], 0, ',', '.') ?> </td>
				<td align="right">Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></td>
			</tr>

		<?php endforeach; ?>
		<tr>
			<td colspan="4"></td>
			<td align="right">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></td>
		</tr>
	</table>

	<div align="right">
		<a href="<?= base_url('home/index/') ?>">
			<div class="btn btn-sm btn-primary">Add Book</div>
		</a>
		<a href="<?= base_url('home/delete_cart/') ?>">
			<div class="btn btn-sm btn-danger">Delete Cart</div>
		</a>
		<a href="<?= base_url('home/payment/') ?>">
			<div class="btn btn-sm btn-success">Payment</div>
		</a>
	</div>
</div>
