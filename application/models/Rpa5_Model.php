<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Rpa5_Model extends CI_Model 
{
	protected 	 $table = 'rpa5';	 	 
	protected 	 $primary_key = 'id_rpa5';

	public function __construct() {        
		parent::__construct();
	}
	
	public function displayAll()
	{
		$this->db->order_by($this->table .".tgl_rpa5" . " desc ");
		
		$this->db->join('suspect','suspect.id_suspect=rpa5.suspect_id');
		$this->db->join('victim','victim.id_victim=rpa5.victim_id');
		//$this->db->join('jpu_rpa5','jpu_rpa5.rpa5_id='.$this->table.'.id_rpa5');
		//$this->db->join('attorney','jpu_rpa5.attorney_id=attorney.id_attorney');
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function displaySelectedData($data)
	{
		$this->db->join('suspect','suspect.id_suspect=rpa5.suspect_id');
		$this->db->join('victim','victim.id_victim=rpa5.victim_id');
		//$this->db->join('jpu_rpa5','jpu_rpa5.rpa5_id='.$this->table.'.id_rpa5');
		//$this->db->join('attorney','jpu_rpa5.attorney_id=attorney.id_attorney');
		$this->db->where($data);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	
	public function displayBetweenData($start, $finish)
	{
		$this->db->order_by($this->table .".tgl_rpa5" . " desc ");
		$this->db->join('suspect','suspect.id_suspect=rpa5.suspect_id');
		$this->db->join('victim','victim.id_victim=rpa5.victim_id');
		//$this->db->join('jpu_rpa5','jpu_rpa5.rpa5_id='.$this->table.'.id_rpa5');
		//$this->db->join('attorney','jpu_rpa5.attorney_id=attorney.id_attorney');
		$this->db->where("tgl_rpa5 >= '".$start."'");
		$this->db->where("tgl_rpa5 <= '".$finish."'");
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