<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Rule_base extends CI_Model {

	public $table='rule_base';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(rule_base.id_rule_base,4) as kode', FALSE);
		  $this->db->order_by('id_rule_base','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('rule_base');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $ym = date('ym');
		  $kodejadi = "RL-$ym-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tampil_rule_base()
	{
		$this->db->select('*')
			->from($this->table);
			// ->join('kode_arah_angin','rule_base.id_rule_base=kode_arah_angin.id_kode_arah_angin');
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	public function tampil_rule_base_pilihan()
	{
		$this->db->select(["id_rule_base", "nama_rule"])
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result_array();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function detail_rule_base($id_rule_base)
	{
		$this->db->select()
			->from($this->table)
			->where("id_rule_base", $id_rule_base);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_rule_base($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('rule_base');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_rule_base($data)
	{
		$this->db->where("id_rule_base", $this->input->post('id_rule_base'));
		$query=$this->db->set($data)->get_compiled_update('rule_base');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_rule_base', $id);
    $this->db->delete('rule_base');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
}

/* End of file m_rule_base.php */
/* Location: ./application/models/m_rule_base.php */