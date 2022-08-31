<?php 

class Login_model extends CI_Model
{
	function verify_account($username, $password)
	{
		// cek user dengan username
		$data_user = $this->db->get_where('users', ['user_username' => $username])->row_array();

		// cek jika data tidak NULL / KOSONG
		if($data_user !== NULL)
		{
			//cek password
			if(password_verify($password, $data_user['user_password']))
			{
				return $data_user;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
}