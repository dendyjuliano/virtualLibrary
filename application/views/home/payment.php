<div class="container-fluid mt-5">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="btn btn-sm btn-success">
				<?php
				$grand_total = 0;
				if ($keranjang = $this->cart->contents()) {
					foreach ($keranjang as $item) {
						$grand_total = $grand_total + $item['subtotal'];
					}
					echo "<h5>Total Belanja Anda : Rp. " . number_format($grand_total, 0, ',', '.');


				?>
					<br>
			</div>
			<BR></BR>
			<h3>Input alamat pengiriman dan pembayaran</h3>
			<form action="<?= base_url('home/payment_proses/') ?>" method="POST">
				<div class="form-group">
					<label>Full Name</label>
					<input type="text" class="form-control" name="nama">
					<input type="hidden" class="form-control" name="no_transaksi" value="<?= $no_transaksi ?>">
					<input type="hidden" class="form-control" name="id_customer" value="<?= $this->session->userdata('id') ?>">
				</div>
				<div class="form-group">
					<label>Your Email</label>
					<input type="text" class="form-control" name="email">
				</div>
				<div class="form-group">
					<label>Address</label>
					<input type="text" class="form-control" name="alamat">
				</div>
				<div class="form-group">
					<label>Delivery service</label>
					<select name="jasa" id="" class="form-control">
						<option disabled selected>--Delivery Service--</option>
						<option value="JNE">JNE</option>
						<option value="TIKI">TIKI</option>
						<option value="POS Indonesia">POS Indonesia</option>
						<option value="GOJEK">GOJEK</option>
						<option value="GRAB">GRAB</option>
					</select>
				</div>
				<div class="form-group">
					<label>Select Bank</label>
					<select name="bank" id="" class="form-control">
						<option disabled selected>--Select Bank--</option>
						<option value="BCA">BCA - xxxxxxxxx</option>
						<option value="BNI">BNI - xxxxxxxxx</option>
						<option value="BRI">BRI - xxxxxxxxx</option>
						<option value="MANDIRI">MANDIRI - xxxxxxxxx</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary text-white">Buy</button>
				<a class="btn btn-danger text-white">Back</a>
			</form>
		<?php
				} else {
					echo "<h5>keranjang masih kosong";
				}
		?>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
