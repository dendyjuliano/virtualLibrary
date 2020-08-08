<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
	</div>

	<a href="<?= base_url('admin/user') ?>" class="btn btn-primary"><i class="fas fa-backspace"></i> Back</a>

	<div class="card shadow mb-4 mt-3 col-md-8">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
		</div>
		<!-- Card Body -->
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<img src="<?= base_url() . 'uploads/img/profile/' . $user_id['image'] ?>" alt="" class="img-fluid" width="300">
				</div>
				<div class="col-md-6">
					<?= form_open_multipart('admin/update_user'); ?>
					<div class="form-group">
						<label for="author">Name</label>
						<input type="text" class="form-control" name="nama" id="author" value="<?= $user_id['nama'] ?>">
						<input type="hidden" class="form-control" name="id" value="<?= $user_id['id'] ?>">
					</div>
					<div class="form-group">
						<label for="author">Username</label>
						<input type="text" class="form-control" name="username" id="author" value="<?= $user_id['username'] ?>">
					</div>
					<div class="form-group">
						<label for="author">Password</label>
						<input type="password" class="form-control" name="password" id="author" value="<?= $user_id['password'] ?>">
					</div>

					<div class="form-group">
						<label for="category">Role</label>
						<select class="form-control" name="role" id="role">
							<option disabled selected hidden>--Select Role--</option>
							<?php foreach ($role as $row) : ?>
								<?php if ($row['id'] == $user_id['role_id']) : ?>
									<option selected value="<?= $row['id'] ?>"><?= $row['role'] ?></option>
								<?php else : ?>
									<option value="<?= $row['id'] ?>"><?= $row['role'] ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<label for="inputState">Image Profile</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="gambar">
							<label class="custom-file-label" for="inputGroupFile04">Chose File</label>
						</div>
					</div>
					<button type="submit" class="btn btn-primary float-right">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
