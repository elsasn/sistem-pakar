<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kode_arah_angin extends CI_Model {

	public $table='kode_arah_angin';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(kode_arah_angin.id_kode_arah_angin,4) as kode', FALSE);
		  $this->db->order_by('id_kode_arah_angin','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('kode_arah_angin');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "KAA-$ym-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tampil_kode_arah_angin()
	{
		$this->db->select(["id_kode_arah_angin", "kode_arah_angin","nama_kategori"])
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	public function tampil_kode_arah_angin_pilihan()
	{
		$this->db->select(["id_kode_arah_angin", "kode_arah_angin"])
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result_array();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function detail_kode_arah_angin($id_kode_arah_angin)
	{
		$this->db->select()
			->from($this->table)
			->where("id_kode_arah_angin", $id_kode_arah_angin);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_kode_arah_angin($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('kode_arah_angin');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_kode_arah_angin($data)
	{
		$this->db->where("id_kode_arah_angin", $this->input->post('id_kode_arah_angin'));
		$query=$this->db->set($data)->get_compiled_update('kode_arah_angin');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_kode_arah_angin', $id);
    $this->db->delete('kode_arah_angin');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
}

/* End of file m_kode_arah_angin.php */
/* Location: ./application/models/m_kode_arah_angin.php */