<?php 

class Article extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if(!isset($_SESSION['user']))
		{
			$this->session->set_flashdata('message', 'Anda harus login dahulu.');
			redirect('login');
		}

		$this->load->model('article_model');
	}

	// index article
	function index()
	{
		$data = [
			'judul_halaman'	=> 'Halaman Artikel',
			'data_artikel'	=> $this->article_model->get()
		];

		$this->load->view('template/header', $data);
		$this->load->view('article/index', $data);
		$this->load->view('template/footer');
	}

	function tambah()
	{
		$post = $this->input->post();

		if(!isset($post['judul_artikel']))
		{
			$data = [
				'judul_halaman'	=> 'Tambah Artikel',
			];

			$this->load->view('template/header', $data);
			$this->load->view('article/add', $data);
			$this->load->view('template/footer');
		}
		else
		{
			if($this->article_model->tambah())
			{
				$this->session->set_flashdata('message_arc', '<div class="alert alert-success"><span>Berhasil memasukan data artikel</span></div>');
				redirect('article');
			}
			else
			{
				$this->session->set_flashdata('message_arc', '<div class="alert alert-danger"><span>Gagal memasukan data artikel</span></div>');
				redirect('article');
			}
		}
	}

	function edit($artikel_id)
	{
		$post = $this->input->post();

		if(!isset($post['judul_artikel']))
		{
			$data = [
				'judul_halaman'	=> 'Edit Artikel',
				'data_artikel'	=> $this->article_model->get($artikel_id)
			];

			$this->load->view('template/header', $data);
			$this->load->view('article/edit', $data);
			$this->load->view('template/footer');
		}
		else
		{
			if($this->article_model->tambah())
			{
				$this->session->set_flashdata('message_arc', '<div class="alert alert-success"><span>Berhasil mengubah data artikel</span></div>');
				redirect('article');
			}
			else
			{
				$this->session->set_flashdata('message_arc', '<div class="alert alert-danger"><span>Gagal mengubah data artikel</span></div>');
				redirect('article');
			}
		}
	}

	function hapus($artikel_id)
	{
		if($this->article_model->hapus($artikel_id))
		{
			$this->session->set_flashdata('message_arc', '<div class="alert alert-success"><span>Berhasil menghapus data artikel</span></div>');
			redirect('article');
		}
		else
		{
			$this->session->set_flashdata('message_arc', '<div class="alert alert-danger"><span>Gagal menghapus data artikel</span></div>');
			redirect('article');
		}
	}
}