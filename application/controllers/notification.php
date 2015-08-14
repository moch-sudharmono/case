<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {
	
	public $route = "index.php";
	private $class = "notification";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
		$this->load->model("notification_model");
		$this->load->model("rp6_model");
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
		
		$notify = $this->notification_model->displayAll($limit, $offset);

		// Paging
		$total_row =  $this->notification_model->countAllData();
		$url = base_url() . "index.php/notification/?paging=true";
		$data_paging = array(
			"url"=>$url,
			"total_rows"=>$total_row,
			"per_page"=>$limit,
			"halaman"=>$page
		);
		
		$data["paging"] = $this->pagination_lib->paging($data_paging);
		
		$data["page"] = $page; 
		$data["notify"] = $notify; 
		$data["class"] = $this->class;

		$data["content"] = "main.notification.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond = array("id_notification"=>$id);			
		$data["value"]		= $this->notification_model->displaySelectedData($cond);
		
		$data["content"] 	= "form.notification.php";
		$this->load->view($this->route, $data);
	}	

	public function save()
	{
		//Case RP6
		$id_notification	= $this->input->post("Id_Notification");
		$title 				= $this->input->post("Title");
		$periode 			= $this->input->post("Periode");
		$kode_perkara		= $this->input->post("KodePerkara");
		$content			= $this->input->post("Content");
		
		$data = array(
			"title" 		=> $title,
			"period"		=> $periode,
			"kode_perkara"	=> $kode_perkara,
			"content"		=> $content			
		);
		
		$where = array(
			"id_notification"=>$id_notification
		);

		if( $id_notification != null ):
			$result = $this->notification_model->update($data, $where);
		else:
			$result = $this->notification_model->insert($data);			
		endif;

		if( $result ):
			redirect("notification");
		else:
			echo "Gagal";
		endif;
	}

	public function delete($id)
	{
		$where = array(
			"id_notification"=>$id
		);

		if( $id != "" ):
			$result = $this->notification_model->delete($where);
		endif;
		
		if( $result ):
			redirect("notification");
		else:
			echo "Gagal";
		endif;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */