<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
		<a href="<?= base_url('admin/add_book') ?>" class="btn btn-primary btn-sm">
			Add <?= $title ?>
		</a>
	</div>

	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

	<div class="card shadow mb-4">

		<!-- Card Body -->
		<div class="card-body">
			<table class="table data" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th-sm">No
						</th>
						<th class="th-sm">Kategory
						</th>
						<th class="th-sm">Title
						</th>
						<th class="th-sm">Writer
						</th>
						<th class="th-sm">Price
						</th>
						<th class="th-sm">Action
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($book as $row) :  ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $row['nama_kategori'] ?></td>
							<td><?= $row['judul'] ?></td>
							<td><?= $row['penulis'] ?></td>
							<td><?= $row['harga'] ?></td>
							<td>
								<a href="<?= base_url('admin/edit_book/') ?><?= $row['id'] ?>" class="btn btn-primary"><i class="fas fa-fw fa-edit"></i></a>
								<a href="<?= base_url('admin/delete_book/') ?><?= $row['id'] ?>" class="btn btn-danger tombol-hapus"><i class="fas fa-fw fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
