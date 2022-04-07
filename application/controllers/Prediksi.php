<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class prediksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('M_Prediksi', 'mod');
	}


	public function index()
	{
		$data['title']='Tabel Prediksi';
		//$data['kodeunik'] = $this->m_prediksi->buat_kode();
		$data['result']=$this->mod->tampil_prediksi()['result'];
		$data['total_data']=$this->mod->tampil_prediksi()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('prediksi/prediksi_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah prediksi';
		//$data['kodeunik'] = $this->mod->buat_kode();
		$this->parser->parse('prediksi/prediksi_tambah', $data);
	}

	public function tambah_proses()
	{
		$this->parser->parse('prediksi/prediksi_hasil', $data);
	}

	public function delete($id)
	{
		$this->mod->delete($id);
		redirect(site_url('prediksi'));
	}
}

/* End of file prediksi.php */
/* Location: ./application/controllers/prediksi.php */