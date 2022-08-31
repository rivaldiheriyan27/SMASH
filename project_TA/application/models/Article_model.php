<?php 

class Article_model extends CI_Model
{

	function get($artikel_id = NULL)
	{
		if($artikel_id == NULL)
		{
			if($_SESSION['user']['user_role'] == 'admin')
			{
				$query = $this->db->get('artikel')->result_array();
			}
			else
			{
				$query = $this->db->get_where('artikel', ['dibuat_oleh' => $_SESSION['user']['user_id']])->result_array();
			}
		}
		else
		{
			$query = $this->db->get_where('artikel', ['artikel_id' => $artikel_id])->row_array();
		}

		return $query;
	}

	function tambah()
	{
		$post = $this->input->post();

		$data = [
			'judul_artikel'		=> $post['judul_artikel'],
			'konten_artikel'	=> $post['artikel'],
			'dibuat_tanggal'	=> date('Y-m-d'),
			'dibuat_oleh'		=> $_SESSION['user']['user_id']
		];

		if($this->db->insert('artikel', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function edit($artikel_id)
	{
		$post = $this->input->post();

		$data = [
			'judul_artikel'		=> $post['judul_artikel'],
			'konten_artikel'	=> $post['artikel'],
			'dibuat_tanggal'	=> date('Y-m-d'),
		];

		$this->db->where('artikel_id', $artikel_id);
		if($this->db->update('artikel', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function hapus($artikel_id)
	{
		$this->db->where('artikel_id', $artikel_id);
		if($this->db->delete('artikel'))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}