<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
	</div>

	<a href="<?= base_url('admin/book') ?>" class="btn btn-primary"><i class="fas fa-backspace"></i> Back</a>

	<div class="card shadow mb-4 mt-3">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
		</div>
		<!-- Card Body -->
		<div class="card-body">
			<div class="row">
				<div class="col-md-3">
					<img src="<?= base_url() . 'uploads/img/image_book/' . $book_id['cover'] ?>" alt="" class="img-fluid" width="250">
				</div>
				<div class="col-md-9">
					<?= form_open_multipart('admin/update_book'); ?>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="category">Category</label>
							<select class="form-control" name="kategori" id="category">
								<option disabled selected hidden>--Select Category--</option>
								<?php foreach ($category as $row) : ?>
									<?php if ($row['id'] == $book_id['id_kategori']) : ?>
										<option selected value="<?= $row['id'] ?>"><?= $row['nama_kategori'] ?></option>
									<?php else : ?>
										<option value="<?= $row['id'] ?>"><?= $row['nama_kategori'] ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="title">Title Book</label>
							<input type="text" class="form-control" name="judul" id="title" value="<?= $book_id['judul'] ?>">
							<input type="hidden" class="form-control" name="id" id="title" value="<?= $book_id['id'] ?>">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="author">Author</label>
							<input type="text" class="form-control" name="penulis" id="author" value="<?= $book_id['penulis'] ?>">
						</div>

						<div class=" form-group col-md-6">
							<label for="harga">Price</label>
							<input type="text" class="form-control" id="harga" name="harga" value="<?= $book_id['harga'] ?>">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputState">Cover Book</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="gambar">
								<label class="custom-file-label" for="inputGroupFile04">Chose File</label>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="harga">Qty</label>
							<input type="number" class="form-control" id="stok" value="<?= $book_id['stok'] ?>" name="stok">
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
