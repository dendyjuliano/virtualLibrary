<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
		<a href="" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addUser">
			Add <?= $title ?>
		</a>
	</div>

	<div class="card shadow mb-4">

		<!-- Card Body -->
		<div class="card-body">
			<table id="tabel" class="table data" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="th-sm">No
						</th>
						<th class="th-sm">Name
						</th>
						<th class="th-sm">Username
						</th>
						<th class="th-sm">Password
						</th>
						<th class="th-sm">Action
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($user as $row) :  ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $row['nama'] ?></td>
							<td><?= $row['username'] ?></td>
							<td><?= $row['password'] ?></td>
							<td>
								<a href="<?= base_url('admin/edit_user/') ?><?= $row['id'] ?>" class="btn btn-primary"><i class="fas fa-fw fa-edit"></i></a>
								<a href="<?= base_url('admin/delete_user/') ?><?= $row['id'] ?>" class="btn btn-danger tombol-hapus"><i class="fas fa-fw fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/add_user') ?>" method="post">
				<div class="modal-body">
					<div class="modal-body">
						<div class="form-group">
							<label for="harga">Name</label>
							<input type="text" class="form-control" autocomplete="off" id="nama" name="nama">
						</div>
						<div class="form-group">
							<label for="harga">Username</label>
							<input type="text" class="form-control" autocomplete="off" id="username" name="username">
						</div>
						<div class="form-group">
							<label for="harga">Password</label>
							<input type="password" class="form-control" id="password" name="password">
						</div>
						<div class="form-group">
							<label for="category">User Role</label>
							<select class="form-control" name="role" id="role">
								<option disabled selected hidden>--Select Role--</option>
								<?php foreach ($role as $row) : ?>
									<option value="<?= $row['id'] ?>"><?= $row['role'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
