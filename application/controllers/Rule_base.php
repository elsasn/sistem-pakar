<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rule_base extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('M_Rule_base', 'mod');
		$this->load->model('M_Kode_arah_angin');
	}


	public function index()
	{
		$data['title']='Tabel rule_base';
		//$data['kodeunik'] = $this->m_rule_base->buat_kode();
		$data['result']=$this->mod->tampil_rule_base()['result'];
		$data['total_data']=$this->mod->tampil_rule_base()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('rule_base/rule_base_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah rule_base';
		$data['kodeunik'] = $this->mod->buat_kode();
		$data['result_kode_arah_angin_pilihan'] = $this->M_Kode_arah_angin->tampil_kode_arah_angin_pilihan()['result'];
		$this->parser->parse('rule_base/rule_base_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_rule_base"	=> $this->input->post('id_rule_base'),
			"nama_rule"	=> $this->input->post('nama_rule'),
			"suhu_min"	=> $this->input->post('suhu_min'),
			"suhu_max"	=> $this->input->post('suhu_max'),
			"kelembapan_min"	=> $this->input->post('kelembapan_min'),
			"kelembapan_max"	=> $this->input->post('kelembapan_max'),
			"kec_angin"	=> $this->input->post('kec_angin'),
			"id_kode_arah_angin"	=> $this->input->post('id_kode_arah_angin')
			
		];

		$this->mod->tambah_rule_base($data);
		redirect(site_url('rule_base'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah rule_base';
		$data['result']=$this->mod->detail_rule_base($id);
		$this->parser->parse('rule_base/rule_base_ubah', $data);
	}

	public function ubah_proses()
	{
		$data=[
			"id_rule_base"	=> $this->input->post('id_rule_base'),
			"nama_rule"	=> $this->input->post('nama_rule'),
			"suhu_min"	=> $this->input->post('suhu_min'),
			"suhu_max"	=> $this->input->post('suhu_max'),
			"kelembapan_min"	=> $this->input->post('kelembapan_min'),
			"kelembapan_max"	=> $this->input->post('kelembapan_max'),
			"kec_angin"	=> $this->input->post('kec_angin'),
			"id_kode_arah_angin"	=> $this->input->post('id_kode_arah_angin')
		];

		$this->mod->ubah_rule_base($data);
		redirect(site_url('rule_base'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('rule_base'));
	}
}

/* End of file rule_base.php */
/* Location: ./application/controllers/rule_base.php */