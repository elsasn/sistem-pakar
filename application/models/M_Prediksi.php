<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Prediksi extends CI_Model {

	public $table='prediksi_temp';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(prediksi_temp.id,4) as kode', FALSE);
		  $this->db->order_by('id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('prediksi');      //cek dulu apakah ada sudah ada kode di tabel.    
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

	public function tampil_prediksi()
	{
		$this->db->select('*')
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	public function predict()
	{
		$this->db->select(["prediksi_temp.nama_cuaca"])
			->from($this->table);
		$this->db->where('suhu_min', $suhu_min);
		$this->db->where('suhu_max', $suhu_max);
		$this->db->where('kelembapan_min', $kelembapan_min);
		$this->db->where('kelembapan_max', $kelembapan_max);
		$this->db->where('kec_angin', $kec_angin);
		$this->db->where('id_kode_arah_angin', $id_kode_arah_angin);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result();
		$data['total_data']=$this->db->count_all_results();
		return $data;
		
	}
}

/* End of file m_prediksi.php */
/* Location: ./application/models/m_prediksi.php */