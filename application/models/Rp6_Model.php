<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Rp6_Model extends CI_Model 
{
	protected 	 $table = 'rp6';	 	 
	protected 	 $primary_key = 'id_rp6';

	public function __construct() {        
		parent::__construct();
	}
	
	public function displayAll(/*$offset=10, $limit=0*/)
	{
		//$this->db->limit($offset, $limit);
		$this->db->order_by($this->table .".date" . " desc ");
		$this->db->join('suspect','suspect.id_suspect ='.$this->table.'.suspect_id');
		$this->db->join('kategori_perkara','kategori_perkara.id_kategori ='.$this->table.'.kategori_id');		
		$query = $this->db->get($this->table);
		//echo $this->db->last_query();
		return $query->result_array();
	}
	
	public function displaySelectedData($data)
	{
		$this->db->join('suspect','suspect.id_suspect ='.$this->table.'.suspect_id');
		$this->db->join('kategori_perkara','kategori_perkara.id_kategori ='.$this->table.'.kategori_id');		
		$this->db->where($data);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	
	public function displayBetweenData($start, $finish)
	{
		$this->db->join('suspect','suspect.id_suspect ='.$this->table.'.suspect_id');
		$this->db->join('kategori_perkara','kategori_perkara.id_kategori ='.$this->table.'.kategori_id');		
		$this->db->where("date >= '".$start."'");
		$this->db->where("date <= '".$finish."'");
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function displayAllCase()
	{
		$this->db->join('suspect','suspect.id_suspect ='.$this->table.'.suspect_id');	
		$this->db->join('kategori_perkara','kategori_perkara.id_kategori ='.$this->table.'.kategori_id');		
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function displayStatus()
	{
		$query = $this->db->get('status_perkara');
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