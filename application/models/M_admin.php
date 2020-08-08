<?php

class M_admin extends CI_Model
{
	public function get_book()
	{
		$this->db->select('tb_kategori.*,tb_buku.*');
		$this->db->from('tb_kategori');
		$this->db->join('tb_buku', 'tb_buku.id_kategori = tb_kategori.id');
		return $this->db->get()->result_array();
	}

	public function get_category()
	{
		return $this->db->get('tb_kategori')->result_array();
	}

	public function get_pdf()
	{
		return $this->db->get('tb_pdf')->result_array();
	}

	public function get_role()
	{
		return $this->db->get('tb_user_role')->result_array();
	}

	public function get_user()
	{
		$query = "SELECT `tb_user_role`.*,`tb_user`.* FROM `tb_user_role` JOIN `tb_user` ON `tb_user`.`role_id` = `tb_user_role`.`id` WHERE `tb_user`.`role_id` = 2";
		return $this->db->query($query)->result_array();
	}

	public function get_transaction()
	{
		$query = "SELECT `tb_invoice`.*,`tb_transaksi`.* FROM `tb_invoice` JOIN `tb_transaksi` ON `tb_invoice`.`id` = `tb_transaksi`.`id_invoice`";
		return $this->db->query($query)->result_array();
	}

	public function get_detail_invoice($id)
	{
		$query = "SELECT `tb_invoice`.*,`tb_transaksi`.* FROM `tb_invoice` JOIN `tb_transaksi` ON `tb_invoice`.`id` = `tb_transaksi`.`id_invoice` WHERE `tb_invoice`.`id` = '$id'";
		return $this->db->query($query)->result_array();
	}

	public function get_invoice()
	{
		return $this->db->get('tb_invoice')->result_array();
	}


	//Get By ID
	public function get_book_id($id)
	{
		return $this->db->get_where('tb_buku', ['id' => $id])->row_array();
	}
	public function get_category_id($id)
	{
		return $this->db->get_where('tb_kategori', ['id' => $id])->row_array();
	}
	public function get_user_id($id)
	{
		return $this->db->get_where('tb_user', ['id' => $id])->row_array();
	}
	public function get_role_id($id)
	{
		return $this->db->get_where('tb_user_role', ['id' => $id])->row_array();
	}
	public function get_invoice_id($id)
	{
		$query = "SELECT `tb_invoice`.*,`tb_transaksi`.* FROM `tb_invoice` JOIN `tb_transaksi` ON `tb_invoice`.`id` = `tb_transaksi`.`id_invoice` WHERE `tb_invoice`.`id` = '$id'";
		return $this->db->query($query)->row_array();
	}

	//Add
	public function addBook()
	{
		$kategori = $this->input->post('kategori');
		$judul = $this->input->post('judul');
		$penulis = $this->input->post('penulis');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '2548';
			$config['upload_path'] = 'uploads/img/image_book';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$new_image = $this->upload->data('file_name');
				$this->db->set('cover', $new_image);
			} else {
				echo $this->upload->display_errors();
			}

			$this->db->set('id_kategori', $kategori);
			$this->db->set('judul', $judul);
			$this->db->set('penulis', $penulis);
			$this->db->set('harga', $harga);
			$this->db->set('stok', $stok);
			$this->db->insert('tb_buku');
		}
	}
	public function addCategory()
	{
		$kategori = $this->input->post('nama_kategori');
		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '2548';
			$config['upload_path'] = 'uploads/img/image_genre';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$new_image = $this->upload->data('file_name');
				$this->db->set('image', $new_image);
			} else {
				echo $this->upload->display_errors();
			}

			$this->db->set('nama_kategori', $kategori);
			$this->db->insert('tb_kategori');
		}
	}

	public function addUser()
	{
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role_id = $this->input->post('role');
		$image = 'default.png';

		$data = [
			'nama' => $nama,
			'username' => $username,
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'image' => $image,
			'role_id' => $role_id
		];

		$this->db->insert('tb_user', $data);
	}

	public function addRole()
	{
		$nama = $this->input->post('role');

		$data = ['role' => $nama];

		$this->db->insert('tb_user_role', $data);
	}


	//update
	public function updateDataBook()
	{
		$id_kategori = $this->input->post('kategori');
		$judul = $this->input->post('judul');
		$penulis = $this->input->post('penulis');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$id = $this->input->post('id');
		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image != null) {
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2548';
				$config['upload_path'] = 'uploads/img/image_book';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('cover', $new_image);
				} else {
					echo $this->upload->display_errors();
				}

				$this->db->set('id_kategori', $id_kategori);
				$this->db->set('judul', $judul);
				$this->db->set('penulis', $penulis);
				$this->db->set('harga', $harga);
				$this->db->set('stok', $stok);
				$this->db->where('id', $id);
				$this->db->update('tb_buku');
			}
		} else {
			$this->db->set('id_kategori', $id_kategori);
			$this->db->set('judul', $judul);
			$this->db->set('penulis', $penulis);
			$this->db->set('harga', $harga);
			$this->db->set('stok', $stok);
			$this->db->where('id', $id);
			$this->db->update('tb_buku');
		}
	}

	public function updateDataCategory()
	{
		$nama = $this->input->post('nama_kategori');
		$id = $this->input->post('id');
		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image != null) {
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2548';
				$config['upload_path'] = 'uploads/img/image_genre';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}

				$this->db->set('nama_kategori', $nama);
				$this->db->where('id', $id);
				$this->db->update('tb_kategori');
			}
		} else {
			$this->db->set('nama_kategori', $nama);
			$this->db->where('id', $id);
			$this->db->update('tb_kategori');
		}
	}

	public function updateDataUser()
	{
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role_id = $this->input->post('role');
		$id = $this->input->post('id');
		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image != null) {
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2548';
				$config['upload_path'] = 'uploads/img/image_book';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}

				$this->db->set('nama', $nama);
				$this->db->set('username', $username);
				$this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
				$this->db->set('role_id', $role_id);
				$this->db->where('id', $id);
				$this->db->update('tb_user');
			}
		} else {
			$this->db->set('nama', $nama);
			$this->db->set('username', $username);
			$this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
			$this->db->set('role_id', $role_id);
			$this->db->where('id', $id);
			$this->db->update('tb_user');
		}
	}

	public function updateDataRole()
	{
		$role = $this->input->post('nama');
		$id = $this->input->post('id');

		$this->db->set('role', $role);
		$this->db->where('id', $id);
		$this->db->update('tb_user_role');
	}


	//Delete
	public function deleteDataBook($id)
	{
		$this->db->delete('tb_buku', ['id' => $id]);
	}
	public function deleteDataCategory($id)
	{
		$this->db->delete('tb_kategori', ['id' => $id]);
	}
	public function deleteDataTransaction($id)
	{
		$this->db->delete('tb_transaksi', ['id' => $id]);
	}
	public function deleteDataUser($id)
	{
		$this->db->delete('tb_user', ['id' => $id]);
	}
	public function deleteDataRole($id)
	{
		$this->db->delete('tb_user_role', ['id' => $id]);
	}
	public function deleteDataInvoice($id)
	{
		$this->db->delete('tb_invoice', ['id' => $id]);
	}


	//Rows
	public function dataBookRows()
	{
		$query = $this->db->get('tb_buku');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function dataCategoryRows()
	{
		$query = $this->db->get('tb_kategori');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function dataUserRows()
	{
		$query = $this->db->get_where('tb_user', ['role_id' => 2]);
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function dataAdminRows()
	{
		$query = $this->db->get_where('tb_user', ['role_id' => 1]);
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
}
