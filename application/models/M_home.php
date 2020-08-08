<?php

class M_home extends CI_Model
{
	public function register_user()
	{
		$name = $this->input->post('name', true);
		$username = $this->input->post('username', true);
		$password = $this->input->post('password');

		$data = [
			'nama' => htmlspecialchars($name),
			'username' => htmlspecialchars($username),
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'role_id' => 2
		];

		$this->db->insert('tb_user', $data);
	}
	public function get_category()
	{
		return $this->db->get('tb_kategori')->result_array();
	}

	public function get_book()
	{
		return $this->db->get_where('tb_buku', ['stok >' => 0])->result_array();
	}

	public function get_book_id($id)
	{
		return $this->db->get_where('tb_buku', ['id' => $id])->row_array();
	}

	public function find($id)
	{
		$result = $this->db->get_where('tb_buku', ['id' => $id]);
		if ($result->num_rows() > 0) {
			return $result->row_array();
		} else {
			return array();
		}
	}

	public function get_history($id)
	{
		$query = "SELECT `tb_invoice`.*,`tb_transaksi`.* FROM `tb_invoice` JOIN `tb_transaksi` ON `tb_invoice`.`id` = `tb_transaksi`.`id_invoice` WHERE `tb_invoice`.`id_customer` = '$id'";
		return $this->db->query($query)->result_array();
	}

	public function proses_payment()
	{
		$no_transaksi = $this->input->post('no_transaksi');
		date_default_timezone_set('Asia/Jakarta');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$jasa = $this->input->post('jasa');
		$bank = $this->input->post('bank');
		$alamat = $this->input->post('alamat');
		$id = $this->input->post('id_customer');

		$invoice = array(
			'id_customer' => $id,
			'nama_customer' => $nama,
			'email_customer' => $email,
			'alamat' => $alamat,
			'jasa_pengiriman' => $jasa,
			'bank' => $bank,
			'tgl_pesan' => date('Y-m-d H:i:s'),
			'batas_bayar' => date('Y-m-d H:i:s', mktime(
				date('H'),
				date('i'),
				date('s'),
				date('m'),
				date('d') + 3,
				date('Y')
			))
		);

		$this->db->insert('tb_invoice', $invoice);
		$id_invoice = $this->db->insert_id();

		$i = 0;
		$order = array();

		foreach ($this->cart->contents() as $item) {
			$order[$i]['no_transaksi'] = $no_transaksi;
			$order[$i]['id_invoice'] = $id_invoice;
			$order[$i]['id_buku'] = $item['id'];
			$order[$i]['nama_buku'] = $item['name'];
			$order[$i]['jumlah'] = $item['qty'];
			$order[$i]['harga'] = $item['price'];
			$i++;
		}
		$this->db->insert_batch('tb_transaksi', $order);
		return true;
	}

	public function uniqe_code()
	{
		$this->db->select('RIGHT(tb_transaksi.no_transaksi,4) as kode', false);
		$this->db->order_by('no_transaksi', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tb_transaksi');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = date('Ym') . "-VL-" . $kodemax;
		return $kodejadi;
	}
}
