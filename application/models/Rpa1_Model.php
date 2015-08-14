<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Rpa1_Model extends CI_Model 
{
	protected 	 $table = 'rpa1';	 	 
	protected 	 $primary_key = 'id_rpa1';

	public function __construct() {        
		parent::__construct();
	}
	
	public function displayAll()
	{
		$this->db->order_by($this->table .".tgl_spdp_diterima" . " desc ");
		$this->db->join('suspect','suspect.id_suspect='.$this->table.'.suspect_id');
		//$this->db->join('jpu_rpa1','jpu_rpa1.rpa1_id='.$this->table .'.id_rpa1');
		//$this->db->join('attorney','jpu_rpa1.attorney_id=attorney.id_attorney');
		$query = $this->db->get($this->table);
		return $query->result_array();
		
	}

	public function displaySelectedData($data)
	{
		$this->db->join('suspect','suspect.id_suspect=rpa1.suspect_id');
		//$this->db->join('jpu_rpa1','jpu_rpa1.rpa1_id=rpa1.id_rpa1');
		//$this->db->join('attorney','jpu_rpa1.attorney_id=attorney.id_attorney');
		$this->db->where($data);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	
	public function displayBetweenData($start, $finish)
	{
		$this->db->order_by($this->table .".tgl_spdp_diterima" . " desc ");
		$this->db->join('suspect','suspect.id_suspect=rpa1.suspect_id');
		$this->db->where("tgl_spdp_diterima >= '".$start."'");
		$this->db->where("tgl_spdp_diterima <= '".$finish."'");
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	
	public function countAllData()
	{
		return $this->db->count_all_results($this->table);
	}
	
	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}
	
	public function send($data)
	{
		return $this->db->insert($this->table, $data);
	}
	
	public function update($data, $where)
	{
		$this->db->where($where);
		return $this->db->update($this->table, $data);
	}
	
	public function delete($where)
	{
		return $this->db->delete($this->table, $where);
	}
	
	public function insert_id()
	{
		return $this->db->insert_id();
	}
}
?>