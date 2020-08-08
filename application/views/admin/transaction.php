<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
	</div>

	<div class="card shadow mb-4">

		<!-- Card Body -->
		<div class="card-body">
			<table class="table data" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>No Transaction</th>
						<th>Customer</th>
						<th>Book Name</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($transaction as $row) :  ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $row['no_transaksi'] ?></td>
							<td><?= $row['nama_customer'] ?></td>
							<td><?= $row['nama_buku'] ?></td>
							<td><?= $row['jumlah'] ?></td>
							<td><?= $row['harga'] ?></td>
							<td>
								<a href="<?= base_url('admin/delete_transaction/') ?><?= $row['id'] ?>" class="btn btn-danger tombol-hapus"><i class="fas fa-fw fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
