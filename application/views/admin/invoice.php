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
						<th>Customer</th>
						<th>Email</th>
						<th>Tanggal Pesan</th>
						<th>Batas Bayar</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($invoice as $row) :  ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $row['nama_customer'] ?></td>
							<td><?= $row['email_customer'] ?></td>
							<td><?= $row['tgl_pesan'] ?></td>
							<td><?= $row['batas_bayar'] ?></td>
							<td>
								<a href="<?= base_url('admin/detail_invoice/') ?><?= $row['id'] ?>" class="btn btn-primary"><i class="fas fa-fw fa-search-plus"></i></a>
								<a href="<?= base_url('admin/delete_invoice/') ?><?= $row['id'] ?>" class="btn btn-danger tombol-hapus"><i class="fas fa-fw fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
