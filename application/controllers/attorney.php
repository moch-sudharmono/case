<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attorney extends CI_Controller {
	
	public $route = "index.php";
	private $class = "attorney";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
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
		
		$attorney = $this->attorney_model->displayAll($limit, $offset);

		// Paging
		$total_row =  $this->attorney_model->countAllData();
		$url = base_url() . "index.php/attorney/?paging=true";
		$data_paging = array(
			"url"=>$url,
			"total_rows"=>$total_row,
			"per_page"=>$limit,
			"halaman"=>$page
		);
		
		$data["paging"] = $this->pagination_lib->paging($data_paging);
		
		$data["page"] = $page; 
		$data["attorney"] = $attorney; 
		$data["class"] = $this->class;

		$data["content"] = "main.attorney.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond = array("id_attorney"=>$id);		
		if($id != 0){
			$data["value"]		= $this->attorney_model->displaySelectedData($cond);			
		}	
		
		$data["content"] 	= "form.attorney.php";
		$this->load->view($this->route, $data);
	}	

	public function save()
	{
		$id_attorney			= $this->input->post("AttorneyId");
		$NamaJaksa		 		= $this->input->post("NamaJaksa");
		$NoHandphone			= $this->input->post("NoHandphone");
		$EmailJaksa				= $this->input->post("EmailJaksa");

		$data = array(
			"name_attorney" => $NamaJaksa,
			"phone" => $NoHandphone,
			"email" => $EmailJaksa
			);

		$where = array(
			"id_attorney"=>$id_attorney
		);

		if( $id_attorney != null ):
			$result = $this->attorney_model->update($data, $where);
		else:
			$result = $this->attorney_model->insert($data);
		endif;
		
		if( $result ):
			redirect("attorney");
		else:
			echo "Gagal";
		endif;
	}

	public function delete($id=0)
	{
		$where = array(
			"id_attorney"=>$id
		);
		
		if( $id != "" ):
			$result = $this->attorney_model->delete($where);
		endif;
		
		if( $result ):
			redirect("attorney");
		else:
			echo "Gagal";
		endif;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */