<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kode_arah_angin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->helper('form');
		$this->load->model('M_Kode_arah_angin', 'mod');
	}


	public function index()
	{
		$data['title']='Tabel kode cuaca';
		$data['result']=$this->mod->tampil_kode_arah_angin()['result'];
		$data['total_data']=$this->mod->tampil_kode_arah_angin()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('kode_arah_angin/kode_arah_angin_tampil', $data);
	}

	public function tambah()
	{
		$this->load->model('M_Kode_arah_angin');
		$data['title']='Tambah kode_arah_angin';
		$data['kodeunik'] = $this->mod->buat_kode();
		$this->parser->parse('kode_arah_angin/kode_arah_angin_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_kode_arah_angin"	=> $this->input->post('id_kode_arah_angin'),
			"nama_kategori"	=> $this->input->post('nama_kategori'),
		];
		//print_r($_POST);
		$this->mod->tambah_kode_arah_angin($data);
		redirect(site_url('kode_arah_angin'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah kode_arah_angin';
		$data['result']=$this->mod->detail_kode_arah_angin($id);
		$this->parser->parse('kode_arah_angin/kode_arah_angin_ubah', $data);	}

	public function ubah_proses()
	{
		$data=[
			"id_kode_arah_angin"	=> $this->input->post('id_kode_arah_angin'),
			"nama_kategori"	=> $this->input->post('nama_kategori'),

		];

		$this->mod->ubah_kode_arah_angin($data);
		redirect(site_url('kode_arah_angin'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('kode_arah_angin'));
	}
	
}

/* End of file kode_arah_angin.php */
/* Location: ./application/controllers/produk.php */