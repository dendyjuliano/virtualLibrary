<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?> Payment</h1>
	</div>

	<?= $this->session->flashdata('message') ?>

	<div class="card shadow mb-4 col-md-12">

		<!-- Card Body -->
		<div class="card-body">
			<div class="table">
				<table class="table data">
					<thead>
						<tr>
							<th>No</th>
							<th>No Transaction</th>
							<th>Book Name</th>
							<th>Order Date</th>
							<th>Qty</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($histori as $row) : ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $row['no_transaksi'] ?></td>
								<td><?= $row['nama_buku'] ?></td>
								<td><?= $row['tgl_pesan'] ?></td>
								<td><?= $row['jumlah'] ?></td>
								<td><?= $row['harga'] ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
