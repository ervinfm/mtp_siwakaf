<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_login();
		$this->load->model('user_m', 'user');
	}

	public function index()
	{
		check_not_login();
		$data = array(
			'page' => "Dashboard"
		);
		if ($this->fungsi->user_login()->level == 1) {
			$data['row'] = $this->user->get();
			$this->template->load('template', 'dashboard/dashboard', $data);
		} else {
			$this->template->load('template', 'dashboard/dashboard2', $data);
		}
	}

	public function LockScreen()
	{
		$this->load->model('user_m');
		$query = $this->user_m->get($this->fungsi->user_login()->id_admin);
		$data = array(
			'page' => 'register',
			'row' => $query->row()
		);
		$this->load->view('lock_screen', $data);
	}

	public function ls_proses()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['ls_login'])) {
			$this->load->model('user_m');
			$query = $this->user_m->login($post);
			if ($query->num_rows() > 0) {
				redirect('dashboard');
			} else {
				echo "<script>
						alert('Password Salah');
						window.location='" . site_url('dashboard/LockScreen') . "'
					</script>";
			}
		}
	}
}
