<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
		<a href="" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addcategory">
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
						<th class="th-sm">Name Kategory
						</th>
						<th class="th-sm">Image</th>
						<th class="th-sm">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($category as $row) :  ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $row['nama_kategori'] ?></td>
							<td><img src=" <?= base_url() . 'uploads/img/image_genre/' . $row['image'] ?>" width="100" alt="..."></td>
							<td>
								<a href="<?= base_url('admin/edit_category/') ?><?= $row['id'] ?>" class="btn btn-primary"><i class="fas fa-fw fa-edit"></i></a>
								<a href="<?= base_url('admin/delete_category/') ?><?= $row['id'] ?>" class="btn btn-danger tombol-hapus"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add <?= $title ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('admin/add_category'); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="harga">Name Category</label>
					<input type="text" class="form-control" id="harga" name="nama_kategori">
				</div>
				<div class="form-group">
					<label for="inputState">Cover Category</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="gambar">
						<label class="custom-file-label" for="inputGroupFile04">Choose file</label>
					</div>
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
