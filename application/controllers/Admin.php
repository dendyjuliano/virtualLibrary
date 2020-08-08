<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== true) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Please Login</div>');
			redirect('home/login');
		}
	}
	public function dashboard()
	{
		$id_profile = $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id_profile])->row_array();

		$data['book'] = $this->M_admin->dataBookRows();
		$data['category'] = $this->M_admin->dataCategoryRows();
		$data['user'] = $this->M_admin->dataUserRows();
		$data['admin'] = $this->M_admin->dataAdminRows();

		$data['title'] = "Dashboard";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/navbar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/template/footer');
	}

	public function profile()
	{
		$id_profile = $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id_profile])->row_array();

		$data['title'] = "Profile";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/navbar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('admin/template/footer');
	}

	public function edit_profile()
	{
		$id_profile = $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id_profile])->row_array();

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

		$this->session->set_flashdata('flash', 'Updated');
		redirect('admin/dashboard');
	}

	public function book()
	{
		$id_profile = $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id_profile])->row_array();

		$data['title'] = "Book";
		$data['book'] = $this->M_admin->get_book();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/navbar', $data);
		$this->load->view('admin/book', $data);
		$this->load->view('admin/template/footer');
	}

	public function add_book()
	{
		$this->form_validation->set_rules('kategori', 'Category', 'required', [
			'required' => 'Category cannot be empty'
		]);
		$this->form_validation->set_rules('judul', 'Title', 'required', [
			'required' => 'Title cannot be empty'
		]);
		$this->form_validation->set_rules('penulis', 'Author', 'required', [
			'required' => 'Author cannot be empty'
		]);
		$this->form_validation->set_rules('harga', 'Price', 'required', [
			'required' => 'Price cannot be empty'
		]);

		if ($this->form_validation->run() == false) {
			$id_profile = $this->session->userdata('id');
			$data['profile'] = $this->db->get_where('tb_user', ['id' => $id_profile])->row_array();

			$data['title'] = "Book";
			$data['book'] = $this->M_admin->get_book();
			$data['category'] = $this->M_admin->get_category();

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/sidebar', $data);
			$this->load->view('admin/template/navbar', $data);
			$this->load->view('admin/add_book', $data);
			$this->load->view('admin/template/footer');
		} else {
			$this->M_admin->addBook();
			$this->session->set_flashdata('flash', 'Created');
			redirect('admin/book');
		}
	}

	public function delete_book($id)
	{
		$this->M_admin->deleteDataBook($id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/book');
	}

	public function edit_book($id)
	{
		$data['title'] = "Update Book";
		$data['book_id'] = $this->M_admin->get_book_id($id);
		$data['category'] = $this->M_admin->get_category();

		$id_profile = $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id_profile])->row_array();

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/navbar', $data);
		$this->load->view('admin/edit_book', $data);
		$this->load->view('admin/template/footer');
	}

	public function update_book()
	{
		$this->M_admin->updateDataBook();
		$this->session->set_flashdata('flash', 'Updated');
		redirect('admin/book');
	}

	public function category()
	{
		$data['title'] = "Category";
		$data['category'] = $this->M_admin->get_category();

		$id_profile = $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id_profile])->row_array();

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/navbar', $data);
		$this->load->view('admin/category', $data);
		$this->load->view('admin/template/footer');
	}

	public function add_category()
	{
		$this->M_admin->addCategory();
		$this->session->set_flashdata('flash', 'Created');
		redirect('admin/category');
	}

	public function edit_category($id)
	{
		$data['title'] = "Update Category";
		$data['category_id'] = $this->M_admin->get_category_id($id);

		$id_profile = $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id_profile])->row_array();

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/navbar', $data);
		$this->load->view('admin/edit_category', $data);
		$this->load->view('admin/template/footer');
	}

	public function delete_category($id)
	{
		$this->M_admin->deleteDataCategory($id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/category');
	}

	public function update_category()
	{
		$this->M_admin->updateDataCategory();
		$this->session->set_flashdata('flash', 'Updated');
		redirect('admin/category');
	}

	public function transaction()
	{
		$data['title'] = "Transaction";
		$data['transaction'] = $this->M_admin->get_transaction();

		$id_profile = $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id_profile])->row_array();

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/navbar', $data);
		$this->load->view('admin/transaction', $data);
		$this->load->view('admin/template/footer');
	}

	public function delete_transaction($id)
	{
		$this->M_admin->deleteDataTransaction($id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/transaction');
	}

	public function invoice()
	{
		$data['title'] = "Invoice";
		$data['invoice'] = $this->M_admin->get_invoice();

		$id_profile = $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id_profile])->row_array();

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/navbar', $data);
		$this->load->view('admin/invoice', $data);
		$this->load->view('admin/template/footer');
	}

	public function detail_invoice($id)
	{
		$data['title'] = "Invoice";
		$data['detail_invoice'] = $this->M_admin->get_detail_invoice($id);
		$data['informasi'] = $this->M_admin->get_invoice_id($id);

		$id_profile = $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id_profile])->row_array();

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/navbar', $data);
		$this->load->view('admin/detail_invoice', $data);
		$this->load->view('admin/template/footer');
	}

	public function delete_invoice($id)
	{
		$this->M_admin->deleteDataInvoice($id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/invoice');
	}

	public function user()
	{
		$data['title'] = "User";
		$data['user'] = $this->M_admin->get_user();
		$data['role'] = $this->M_admin->get_role();

		$id_profile = $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id_profile])->row_array();

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/navbar', $data);
		$this->load->view('admin/user', $data);
		$this->load->view('admin/template/footer');
	}

	public function add_user()
	{
		$this->M_admin->addUser();
		$this->session->set_flashdata('flash', 'Created');
		redirect('admin/user');
	}

	public function delete_user($id)
	{
		$this->M_admin->deleteDataUser($id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/user');
	}

	public function update_user()
	{
		$this->M_admin->updateDataUser();
		$this->session->set_flashdata('flash', 'Updated');
		redirect('admin/user');
	}

	public function edit_user($id)
	{
		$data['title'] = "Update User";
		$data['user_id'] = $this->M_admin->get_user_id($id);
		$data['role'] = $this->M_admin->get_role();

		$id_profile = $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id_profile])->row_array();

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/navbar', $data);
		$this->load->view('admin/edit_user', $data);
		$this->load->view('admin/template/footer');
	}

	public function role()
	{
		$data['title'] = "Role";
		$data['role'] = $this->M_admin->get_role();

		$id_profile = $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id_profile])->row_array();

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/navbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('admin/template/footer');
	}

	public function add_role()
	{
		$this->M_admin->addRole();
		$this->session->set_flashdata('flash', 'Created');
		redirect('admin/role');
	}

	public function delete_role($id)
	{
		$this->M_admin->deleteDataRole($id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/role');
	}

	public function edit_role($id)
	{
		$data['title'] = "Update Role";
		$data['role_id'] = $this->M_admin->get_role_id($id);

		$id_profile = $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('tb_user', ['id' => $id_profile])->row_array();

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/navbar', $data);
		$this->load->view('admin/edit_role', $data);
		$this->load->view('admin/template/footer');
	}

	public function update_role()
	{
		$this->M_admin->updateDataRole();
		$this->session->set_flashdata('flash', 'Updated');
		redirect('admin/role');
	}
}
