<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
		<a href="" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addRole">
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
						<th class="th-sm">Role
						</th>
						<th class="th-sm">Action
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($role as $row) :  ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $row['role'] ?></td>
							<td width="15%">
								<a href="<?= base_url('admin/edit_role/') ?><?= $row['id'] ?>" class="btn btn-primary"><i class="fas fa-fw fa-edit"></i></a>
								<a href="<?= base_url('admin/delete_role/') ?><?= $row['id'] ?>" class="btn btn-danger tombol-hapus"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add <?= $title ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/add_role') ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Name Role</label>
						<input type="text" class="form-control" name="role">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
