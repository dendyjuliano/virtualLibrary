<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Detail <?= $title ?></h1>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Customer</h6>
			<div class="informasi ml-auto">
				<input type="text" class="form-control" readonly id="nomor_ujian" value="<?= $informasi['no_transaksi'] ?>">
			</div>
		</div>
		<div class="card-body">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="nama">Customer Name</label>
					<input type="text" class="form-control" readonly id="nama" value="<?= $informasi['nama_customer'] ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="noskema">Customer Email</label>
					<input type="text" class="form-control" readonly id="noskema" value="<?= $informasi['email_customer'] ?>">
				</div>
			</div>
		</div>
	</div>

	<div class="card shadow mb-4">

		<!-- Card Body -->
		<div class="card-body">
			<table class="table data" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Book</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Alamat</th>
						<th>Order</th>
						<th>Order Date</th>
						<th>Pay Limit</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($detail_invoice as $row) :  ?>
						<tr>
							<td><?= $row['nama_buku'] ?></td>
							<td><?= $row['jumlah'] ?></td>
							<td><?= $row['harga'] ?></td>
							<td><?= $row['alamat'] ?></td>
							<td><?= $row['jasa_pengiriman'] ?></td>
							<td><?= $row['tgl_pesan'] ?></td>
							<td><?= $row['batas_bayar'] ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
