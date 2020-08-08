<!-- Footer -->
<footer class="page-footer font-small blue pt-4 warna warna-text mt-5">

	<!-- Footer Links -->
	<div class="container-fluid text-center text-md-left">

		<!-- Grid row -->
		<div class="row">

			<!-- Grid column -->
			<div class="col-md-6 mt-md-0 mt-3">

				<!-- Content -->
				<h5 class="text-uppercase">Virtual Library</h5>
				<p>You can buy book in virtual library.</p>

			</div>
			<!-- Grid column -->

			<hr class="clearfix w-100 d-md-none pb-3">

			<!-- Grid column -->
			<div class="col-md-3 mb-md-0 mb-3">

				<!-- Links -->
				<h5 class="text-uppercase">Genres</h5>

				<ul class="list-unstyled">
					<?php foreach ($kategori as $row) :  ?>
						<li>
							<a class="text-white ml-2" href="<?= base_url('home/book_category/') ?><?= $row['id'] ?>"><?= $row['nama_kategori'] ?></a>
						</li>
					<?php endforeach; ?>
				</ul>

			</div>
			<!-- Grid column -->

			<!-- Grid column -->
			<div class="col-md-3 mb-md-0 mb-3">

				<!-- Links -->
				<h5 class="text-uppercase">Social Media</h5>

				<ul class="list-unstyled">
					<li>
						<a class="text-white ml-2" href="#!">Facebook</a>
					</li>
					<li>
						<a class="text-white ml-2" href="#!">Instagram</a>
					</li>
					<li>
						<a class="text-white ml-2" href="#!">WhatsApp</a>
					</li>
					<li>
						<a class="text-white ml-2" href="#!">Twiter</a>
					</li>
				</ul>

			</div>
			<!-- Grid column -->

		</div>
		<!-- Grid row -->

	</div>
	<!-- Footer Links -->

	<!-- Copyright -->
	<div class="footer-copyright text-center py-3">
		© 2020 Copyright: Dendy
	</div> <!-- Copyright -->

</footer>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= base_url('home/logout') ?>">Logout</a>
			</div>
		</div>
	</div>
</div>
<!-- Footer -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/script.js'); ?>"></script>
</body>

</html>
