<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
	</div>

	<a href="<?= base_url('admin/category') ?>" class="btn btn-primary"><i class="fas fa-backspace"></i> Back</a>

	<div class="card shadow mb-4 mt-3 col-md-7">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
		</div>
		<!-- Card Body -->
		<div class="card-body">
			<div class="row">
				<div class="col-md-5">
					<img src="<?= base_url() . 'uploads/img/image_genre/' . $category_id['image'] ?>" alt="" class="img-fluid" width="250">
				</div>
				<div class="col-md-7">
					<?= form_open_multipart('admin/update_category'); ?>
					<div class="form-group">
						<label for="author">Name Category</label>
						<input type="text" class="form-control" name="nama_kategori" id="author" value="<?= $category_id['nama_kategori'] ?>">
						<input type="hidden" class="form-control" name="id" value="<?= $category_id['id'] ?>">
					</div>

					<div class="form-group">
						<label for="inputState">Cover Book</label>
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
