<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supervisor extends CI_Controller {
	
	public $route = "index.php";
	private $class = "supervisor";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
		$this->load->model("supervisor_model");
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
		
		$supervisor = $this->supervisor_model->displayAll($limit, $offset);

		// Paging
		$total_row =  $this->supervisor_model->countAllData();
		$url = base_url() . "index.php/supervisor/?paging=true";
		$data_paging = array(
			"url"=>$url,
			"total_rows"=>$total_row,
			"per_page"=>$limit,
			"halaman"=>$page
		);
		
		$data["paging"] = $this->pagination_lib->paging($data_paging);
		
		$data["page"] = $page; 
		$data["supervisor"] = $supervisor; 
		$data["class"] = $this->class;

		$data["content"] = "main.supervisor.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond = array("id_supervisor"=>$id);		
		if($id != 0){
			$data["value"]		= $this->supervisor_model->displaySelectedData($cond);			
		}	
		
		$data["content"] 	= "form.supervisor.php";
		$this->load->view($this->route, $data);
	}	

	public function save()
	{
		$id_supervisor			= $this->input->post("SupervisorId");
		$NamaSupervisor	 		= $this->input->post("NamaSupervisor");
		$NoHandphone			= $this->input->post("NoHandphone");
		$EmailSupervisor		= $this->input->post("EmailSupervisor");

		$data = array(
			"name_supervisor" => $NamaSupervisor,
			"phone_supervisor" => $NoHandphone,
			"email_supervisor" => $EmailSupervisor
			);

		$where = array(
			"id_supervisor"=>$id_supervisor
		);

		if( $id_supervisor != null ):
			$result = $this->supervisor_model->update($data, $where);
		else:
			$result = $this->supervisor_model->insert($data);
		endif;
		
		if( $result ):
			redirect("supervisor");
		else:
			echo "Gagal";
		endif;
	}

	public function delete($id=0)
	{
		$where = array(
			"id_supervisor"=>$id
		);
		
		if( $id != "" ):
			$result = $this->supervisor_model->delete($where);
		endif;
		
		if( $result ):
			redirect("supervisor");
		else:
			echo "Gagal";
		endif;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */