<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function login()
	{
		clear_cookies();
		$this->load->view('login');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('user_m');
			$query = $this->user_m->login($post);
			if ($query->num_rows() > 0) {
				$admin = $this->user_m->get($query->row()->id_admin);
				$row = $admin->row();
				if ($row->status == 0) {
					$this->session->set_flashdata('warning', "Akun Belum Diaktivasi !");
					echo "<script>
						window.location='" . site_url('auth/login') . "';
						</script>";
				} else {
					$this->user_m->is_online($row->id_admin, 1);
					$params = array(
						'userid' => $row->id_admin,
						'level' => $row->level,
						'id_ranting' => $row->id_ranting,
						'ranting' => $row->nama_ranting
					);
					$this->session->set_userdata($params);
					set_login();
					$this->session->set_flashdata('welcome', " Selamat datang di aplikasi siwakaf, Yth." . $row->nama_admin);
					redirect('dashboard');
				}
			} else {
				$this->session->set_flashdata('error', "Username / Password Salah !");
				redirect('auth/login');
			}
		}
	}

	public function logout()
	{
		set_logout();
		$this->load->model('user_m');
		$this->user_m->is_online($this->session->userdata('userid'), 0);

		$params = array('userid', 'level');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}

	public function register()
	{
		$data = array(
			'page' => 'register'
		);
		$this->load->view('register', $data);
	}

	public function register_proses()
	{
		$post = $this->input->post(null, TRUE);
		$model = array('ranting_m', 'user_m');
		$this->load->model($model);
		$query = $this->ranting_m->get_kode($post['ranting']);
		if ($query->num_rows() == 0) {
			$this->session->set_flashdata('error', "Kode Instansi Tidak Terdaftar !");
			redirect('auth/register');
		} else if ($post['pass'] != $post['re_pass']) {
			$this->session->set_flashdata('error', "Pengulangan Password Tidak Sama !");
			redirect('auth/register');
		} else if (strlen($post['pass']) < 8) {
			$this->session->set_flashdata('error', "Panjang Password Minimal 8 Huruf/Karakter !");
			redirect('auth/register');
		} else {
			$params = array(
				'username' => $post['user'],
				'password' => sha1($post['pass']),
				'id_ranting' => $query->row()->id_ranting,
				'nama_admin' => $post['user'],
				'level' => '2',
				'alamat' => $query->row()->alamat_ranting,
				'telp' => $query->row()->telp_ranting
			);
			$this->user_m->add_register($params);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes', "Data berhasil Ditambahkan, Silahkan Tunggu Akun akan Di Verifikasi");
				redirect('auth/register');
			} else {
				$this->session->set_flashdata('error', "Data Gagal Didaftarkan");
				redirect('auth/register');
			}
		}
	}
}
