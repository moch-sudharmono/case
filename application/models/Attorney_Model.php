<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Attorney_Model extends CI_Model 
{
    protected    $table = 'attorney';         
    protected    $primary_key = 'id_attorney';

    public function __construct() {        
        parent::__construct();
    }
    
    public function displayAll(/*$offset=10, $limit=0*/)
    {
        //$this->db->limit($offset, $limit);
        $this->db->order_by($this->primary_key . " desc ");
        $query = $this->db->get($this->table);
        //echo $this->db->last_query();
        return $query->result_array();
    }
    
    public function displaySelectedData($data)
    {
        $this->db->where($data);
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
    
    public function getlatest_id()
    {
        return $this->db->insert_id();
    }

    public function jpu2rp9($data)
    {
        return $this->db->insert('jpu_rp9', $data);   
    }

    public function jpu2rp9update($data, $where)
    {
        $this->db->where($where);
        return $this->db->update('jpu_rp9', $data);
    }

    public function displayJaksaRp9($data)
    {
        $this->db->where($data);
        $query = $this->db->get('jpu_rp9');
        return $query->result_array();
    }
	
	public function displayDataJaksaRp9($data)
    {
		$this->db->join('attorney','attorney.id_attorney =jpu_rp9.attorney_id');
        $this->db->where($data);
        $query = $this->db->get('jpu_rp9');
        return $query->result_array();
    }
    
    public function deleteJaksaRp9($where)
    {
        return $this->db->delete('jpu_rp9', $where);
    }
	
	public function jpu2rp6($data)
    {
        return $this->db->insert('jpu_rp6', $data);   
    }

    public function jpu2rp6update($data, $where)
    {
        $this->db->where($where);
        return $this->db->update('jpu_rp6', $data);
    }

    public function displayJaksaRp6($data)
    {
        $this->db->where($data);
        $query = $this->db->get('jpu_rp6');
        return $query->result_array();
    }
	
	public function displayDataJaksaRp6($data)
    {
		$this->db->join('attorney','attorney.id_attorney =jpu_rp6.attorney_id');
        $this->db->where($data);
        $query = $this->db->get('jpu_rp6');
        return $query->result_array();
    }
    
    public function deleteJaksaRp6($where)
    {
        return $this->db->delete('jpu_rp6', $where);
    }
	
	public function jpu2rpa1($data)
    {
        return $this->db->insert('jpu_rpa1', $data);   
    }

    public function jpu2rpa1update($data, $where)
    {
        $this->db->where($where);
        return $this->db->update('jpu_rpa1', $data);
    }

    public function displayJaksaRpa1($data)
    {
        $this->db->where($data);
        $query = $this->db->get('jpu_rpa1');
        return $query->result_array();
    }
	
	public function displayDataJaksaRpa1($data)
    {
		$this->db->join('attorney','attorney.id_attorney =jpu_rpa1.attorney_id');
        $this->db->where($data);
        $query = $this->db->get('jpu_rpa1');
        return $query->result_array();
    }
	
	public function jpu2rpa5($data)
    {
        return $this->db->insert('jpu_rpa5', $data);   
    }

    public function jpu2rpa5update($data, $where)
    {
        $this->db->where($where);
        return $this->db->update('jpu_rpa5', $data);
    }

    public function displayJaksaRpa5($data)
    {
        $this->db->where($data);
        $query = $this->db->get('jpu_rpa5');
        return $query->result_array();
    }
	
	public function displayDataJaksaRpa5($data)
    {
		$this->db->join('attorney','attorney.id_attorney =jpu_rpa5.attorney_id');
        $this->db->where($data);
        $query = $this->db->get('jpu_rpa5');
        return $query->result_array();
    }
    
    public function deleteJaksaRpa5($where)
    {
        return $this->db->delete('jpu_rpa5', $where);
    }
}
?>