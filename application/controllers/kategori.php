<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {
	
	public $route = "index.php";
	private $class = "kategori";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
		$this->load->model("kategori_model");
	}
	public function index()
	{		
		
		
		$kategori = $this->kategori_model->displayAllKategori();

		$data["kategori"] = $kategori; 
		$data["class"] = $this->class;

		$data["content"] = "main.kategori.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond 				= array("id_kategori"=>$id);			
		$data["value"]		= $this->kategori_model->displaySelectedData($cond);
		
		$data["content"] 	= "form.kategori.php";
		$this->load->view($this->route, $data);
	}	

	public function save()
	{
		//Case RP6
		$id					= $this->input->post("id_kategori");
		$kategori			= $this->input->post("kategori_perkara");
		$deskripsi 			= $this->input->post("deskripsi_kategori");
		$status				= $this->input->post("status_kategori");
		
		$data = array(
			"kategori_perkara" 		=> $kategori,
			"deskripsi_kategori"	=> $deskripsi,
			"status_kategori"		=> $status
		);
		
		$where = array(
			"id_kategori"=>$id
		);
		//echo '<pre>';
//		print_r($data);
//		print_r($where);
//		echo '</pre>';
//		exit;
		if( $id != null ):
			$result = $this->kategori_model->update($data, $where);
		else:
			$result = $this->kategori_model->insert($data);			
		endif;

		if( $result ):
			redirect("kategori");
		else:
			echo "Gagal";
		endif;
	}
	
	public function change($id, $status)
	{
		$status = ($status==1?$status=0:$status=1);
		$data = array(
			"status_kategori" 		=> $status
		);
		
		$where = array(
			"id_kategori"=>$id
		);

		$result = $this->kategori_model->update($data, $where);

		if( $result ):
			redirect("kategori");
		else:
			echo "Gagal";
		endif;
	}

	public function delete($id)
	{
		$where = array(
			"id_kategori"=>$id
		);

		if( $id != "" ):
			$result = $this->kategori_model->delete($where);
		endif;
		
		if( $result ):
			redirect("kategori");
		else:
			echo "Gagal";
		endif;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */