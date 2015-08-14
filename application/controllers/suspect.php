<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suspect extends CI_Controller {
	
	public $route = "index.php";
	private $class = "suspect";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
		$this->load->model("suspect_model");
		$this->load->model("rp6_model");
		$this->load->model("attorney_model");
		$this->load->library('pagination_lib');
	}
	public function index()
	{		
		$page = $this->input->get("page");
		$page = !empty($page)?$page:1;
		$limit = 10;
		
		if(isset($page) and !empty($page)):
			$offset = ($page * $limit) - $limit;
		else:
			$offset = 0;
		endif;
		
		$suspect = $this->suspect_model->displayAll($limit, $offset);

		// Paging
		$total_row =  $this->suspect_model->countAllData();
		$url = base_url() . "index.php/suspect/?paging=true";
		$data_paging = array(
			"url"=>$url,
			"total_rows"=>$total_row,
			"per_page"=>$limit,
			"halaman"=>$page
		);
		
		$data["paging"] = $this->pagination_lib->paging($data_paging);
		
		$data["page"] = $page; 
		$data["suspect"] = $suspect; 
		$data["class"] = $this->class;

		$data["content"] = "main.suspect.php";
		$this->load->view($this->route, $data);
	}

	public function cases($id_suspect=0)
	{	
		$cond = array("suspect_id"=>$id_suspect);			
		$data["value"]		= $this->rp6_model->displaySelectedData($cond);
		
		$data["attorney"]	= $this->attorney_model->displayAll();

		$cond_suspect 		= array("id_suspect"=>$id_suspect);
		$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);			

		$data["content"] 	= "case.suspect.php";
		$this->load->view($this->route, $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */