<?php

class Home extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Virtual Library";
		$data['kategori'] = $this->M_home->get_category();
		$data['buku'] = $this->M_home->get_book();

		$this->load->view('home/templates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('home/templates/footer', $data);
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', [
			'required' => 'Username cannot be empty'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required', [
			'required' => 'Password cannot be empty'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('home/login');
		} else {
			$this->login_url();
		}
	}

	private function login_url()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_user', ['username' => $username])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'id' => $user['id'],
					'nama' => $user['nama'],
					'username' => $user['username'],
					'role_id' => $user['role_id'],
					'image' => $user['image'],
					'status' => true
				];

				$this->session->set_userdata($data);
				if ($user['role_id'] == 2) {
					redirect('home/index');
				} elseif ($user['role_id'] == 1) {
					redirect('admin/dashboard');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            		Filed Login</div>');
					redirect('home/login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            	Wrong Password</div>');
				redirect('home/login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Username not Registered</div>');
			redirect('home/login');
		}
	}

	public function register()
	{
		$this->load->view('home/register');
	}

	public function register_url()
	{
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Name cannot be empty'
		]);
		$this->form_validation->set_rules('username', 'Username', 'required', [
			'required' => 'Username cannot be empty'
		]);

		if ($this->form_validation->run() == false) {
			redirect('home/register');
		} else {
			$this->M_home->register_user();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Succes register please login</div>');
			redirect('home/login');
		}
	}

	public function detail_book($id)
	{
		$data['title'] = "Virtual Library";
		$data['kategori'] = $this->M_home->get_category();
		$data['buku_id'] = $this->M_home->get_book_id($id);

		$this->load->view('home/templates/header', $data);
		$this->load->view('home/detail_book', $data);
		$this->load->view('home/templates/footer', $data);
	}

	public function detail_cart()
	{
		$data['title'] = "Virtual Library";
		$data['kategori'] = $this->M_home->get_category();
		$this->load->view('home/templates/header', $data);
		$this->load->view('home/detail_cart', $data);
		$this->load->view('home/templates/footer', $data);
	}

	public function delete_cart()
	{
		$this->cart->destroy();
		redirect('home');
	}

	public function add_cart($id)
	{
		if ($this->session->userdata('status') != true) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Please Login</div>');
			redirect('home/login');
		} else {
			$buku = $this->M_home->find($id);
			$data = array(
				'id'      => $buku['id'],
				'qty'     => 1,
				'price'   => $buku['harga'],
				'name'    => $buku['judul'],
			);

			$this->cart->insert($data);
			redirect('home');
		}
	}

	public function payment()
	{
		$data['title'] = "Virtual Library";
		$data['kategori'] = $this->M_home->get_category();
		$data['no_transaksi'] = $this->M_home->uniqe_code();
		$this->load->view('home/templates/header', $data);
		$this->load->view('home/payment', $data);
		$this->load->view('home/templates/footer', $data);
	}

	public function payment_proses()
	{
		$is_prosesed = $this->M_home->proses_payment();
		if ($is_prosesed) {
			$this->cart->destroy();
			$this->session->set_flashdata('flash2', 'Succesfull');
			redirect('home/index');
		} else {
			echo "Gagal Memesan";
		}
	}

	public function book_category($id)
	{
		$query = "SELECT `tb_kategori`.*,`tb_buku`.* FROM `tb_kategori` JOIN `tb_buku` ON `tb_kategori`.`id` = `tb_buku`.`id_kategori` WHERE `tb_buku`.`id_kategori` = '$id'";

		$data['title'] = "Virtual Library";
		$data['kategori'] = $this->M_home->get_category();
		$data['judul'] = $this->db->get_where('tb_kategori', ['id' => $id])->row_array();
		$data['buku_kategori'] = $this->db->query($query)->result_array();
		$this->load->view('home/templates/header', $data);
		$this->load->view('home/index_kategori', $data);
		$this->load->view('home/templates/footer', $data);
	}

	public function profile()
	{
		$id = $this->session->userdata('id');
		$data['title'] = "Profile";
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id])->row_array();


		$this->load->view('admin/template/header', $data);
		$this->load->view('home/templates/profile_sidebar');
		$this->load->view('home/templates/profile_navbar', $data);
		$this->load->view('home/profile', $data);
		$this->load->view('admin/template/footer');
	}

	public function edit_profile()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '2548';
			$config['upload_path'] = 'uploads/img/profile';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$new_image = $this->upload->data('file_name');
				$this->db->set('image', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$this->db->set('nama', $nama);
		$this->db->set('username', $username);
		$this->db->where('id', $id);
		$this->db->update('tb_user');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Success Update Profile</div>');
		redirect('home/profile');
	}

	public function history()
	{
		$data['title'] = "History";

		$id = $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id])->row_array();
		$data['histori'] = $this->M_home->get_history($id);

		$this->load->view('admin/template/header', $data);
		$this->load->view('home/templates/profile_sidebar', $data);
		$this->load->view('home/templates/profile_navbar', $data);
		$this->load->view('home/history', $data);
		$this->load->view('admin/template/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('status');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Success Logout</div>');
		redirect('home/index');
	}
}
