<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Rp7_Model extends CI_Model 
{
	protected 	 $table = 'rp7';	 	 
	protected 	 $primary_key = 'id_rp7';

	public function __construct() {        
		parent::__construct();
	}
	
	public function displayAll(/*$offset=10, $limit=0*/)
	{
		//$this->db->limit($offset, $limit);
		$this->db->order_by($this->table .".date" . " desc ");
		$this->db->join('suspect','suspect.id_suspect ='.$this->table.'.suspect_id');
		//$this->db->join('attorney','attorney.id_attorney ='.$this->table.'.attorney1');
		$query = $this->db->get($this->table);
		//echo $this->db->last_query();
		return $query->result_array();
	}
	
	public function displaySelectedData($data)
	{
		$this->db->join('rp6','rp6.id_rp6 ='.$this->table.'.rp6_id');
		$this->db->join('rt2','rt2.rp6_id =rp6.id_rp6');
		$this->db->join('suspect','suspect.id_suspect =rp6.suspect_id');
		//$this->db->join('attorney','attorney.id_attorney =rp6.attorney1');
		$this->db->where($data);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function displayAllCase()
	{
		$this->db->join('rp6','rp6.id_rp6 ='.$this->table.'.rp6_id');
		$this->db->join('rt2','rt2.rp6_id =rp6.id_rp6');
		$this->db->join('suspect','suspect.id_suspect =rp6.suspect_id');
		//$this->db->join('attorney','attorney.id_attorney =rp6.attorney1');
				
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	
	public function displayBetweenData($start, $finish)
	{
		$this->db->join('rp6','rp6.id_rp6 ='.$this->table.'.rp6_id');
		$this->db->join('rt2','rt2.rp6_id =rp6.id_rp6');
		$this->db->join('suspect','suspect.id_suspect =rp6.suspect_id');
		//$this->db->join('attorney','attorney.id_attorney =rp6.attorney1');
		
		$this->db->where("date_received >= '".$start."'");
		$this->db->where("date_received <= '".$finish."'");
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