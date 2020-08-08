<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
	</div>

	<a href="<?= base_url('admin/role') ?>" class="btn btn-primary"><i class="fas fa-backspace"></i> Back</a>

	<div class="card shadow mb-4 mt-3 col-md-6">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
		</div>
		<!-- Card Body -->
		<div class="card-body">
			<?= form_open_multipart('admin/update_role'); ?>
			<div class="form-group">
				<label for="author">Role Name</label>
				<input type="text" class="form-control" name="nama" value="<?= $role_id['role'] ?>">
				<input type="hidden" class="form-control" name="id" value="<?= $role_id['id'] ?>">
			</div>
			<button type="submit" class="btn btn-primary float-right">Submit</button>
			</form>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
