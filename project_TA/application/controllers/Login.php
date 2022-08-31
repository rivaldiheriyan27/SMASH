<?php 

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		// load model login_model
		$this->load->model('Login_model');
	}


	// function bikin akun admin
	public function createManualAdmin()
	{
		// set data tablenya
		$data_user = [
			'user_name'			=> 'Rivaldy',
			'user_username'		=> 'rival',
			'user_password'		=> password_hash("123456", PASSWORD_DEFAULT),
			'user_role'			=> 'admin'
		];

		// kondiisi cek berhasil atau tidaknya memasukan data
		if($this->db->insert('users', $data_user))
		{
			echo "Berhasil membuat akun Admin.";
		}
		else
		{
			echo "Gagal membuat akun Admin.";
		}
	}

	// function bikin user 1 dan user 2
	public function createManualUser()
	{
		$data_user = [

			[
				'user_name'			=> 'user1',
				'user_username'		=> 'user1',
				'user_password'		=> password_hash("user1", PASSWORD_DEFAULT),
				'user_role'			=> 'user'
			],
			[
				'user_name'			=> 'user2',
				'user_username'		=> 'user2',
				'user_password'		=> password_hash("user2", PASSWORD_DEFAULT),
				'user_role'			=> 'user'
			]
		];

		for($i=0; count($data_user) > $i; $i++)
		{
			$this->db->insert('users', $data_user[$i]);
		}

	}

	// function untuk autentikasi
	public function auth()
	{
		// definisi variable post value nya form data dari login page
		$post = $this->input->post();

		// definisiin data login
		$username = $post['username'];
		$password = $post['password'];

		$cek_user = $this->Login_model->verify_account($username, $password);

		// cek jika proses auth berhasil
		if($cek_user)
		{
			$_SESSION['user'] = [
				'user_id'		=> $cek_user['user_id'],
				'user_name'		=> $cek_user['user_name'],
				'user_role'		=> $cek_user['user_role'],
			];

			redirect('article');
		}
		else
		{
			$this->session->set_flashdata('message', 'Gagal Login');
			redirect('login');
		}	
	}

	public function logout()
	{
		session_destroy();
		redirect('login');
	}
}