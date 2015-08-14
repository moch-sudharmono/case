<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public $route = "index.php";
	private $class = "admin";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
		$this->load->model("admin_model");
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
		
		$admin = $this->admin_model->displayAll($limit, $offset);

		// Paging
		$total_row =  $this->admin_model->countAllData();
		$url = base_url() . "index.php/admin/?paging=true";
		$data_paging = array(
			"url"=>$url,
			"total_rows"=>$total_row,
			"per_page"=>$limit,
			"halaman"=>$page
		);
		
		$data["paging"] = $this->pagination_lib->paging($data_paging);
		
		$data["page"] = $page; 
		$data["admin"] = $admin; 
		$data["class"] = $this->class;

		$data["content"] = "main.admin.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond = array("id_admin"=>$id);		
		if($id != 0){
			$data["value"]		= $this->admin_model->displaySelectedData($cond);			
		}	
		
		$data["content"] 	= "form.admin.php";
		$this->load->view($this->route, $data);
	}

	public function change()
	{					
		$data["content"] 	= "form.password.php";
		$data['error']		= '';
		$this->load->view($this->route, $data);
	}	

	public function updatepassword()
	{
		$id_admin	= $this->input->post("IdAdmin");
		$old		= $this->input->post("OldPassword");
		$new		= $this->input->post("NewPassword");
		
		$data = array(
			"password" 	=> md5($old)
		);

		$where = array(
			"id_admin"=>$id_admin,
			"password" 	=> md5($old)
		);

		$result = $this->admin_model->checkpassword($where);
		
		if( isset($result) && !empty($result) ):
			$newdata = array(
				"password" 	=> md5($new)
			);

			$newwhere = array(
				"id_admin"=>$id_admin
			);

			$change = $this->admin_model->update($newdata, $newwhere);
			
			if( $change ):
				redirect("admin");
			else:
				echo "Gagal";
			endif;

		else:
			$data["content"] 	= "form.password.php";
			$data['error']		= 'Password lama salah.';
			$this->load->view($this->route, $data);   
		endif;
	}

	public function save()
	{
		$id_admin	= $this->input->post("IdAdmin");
		$EmailAdmin	= $this->input->post("EmailAdmin");
		$NamaAdmin	= $this->input->post("NamaAdmin");
		$Pword		= $this->input->post("Pword");
		$role		= $this->input->post("role");

		$data = array(
			"email" 	=> $EmailAdmin,
			"name" 		=> $NamaAdmin,
			"password" 	=> md5($Pword),
			"role" 		=> $role
			);

		$where = array(
			"id_admin"=>$id_admin
		);

		if( $id_admin != null ):
			$result = $this->admin_model->update($data, $where);
		else:
			$result = $this->admin_model->insert($data);
		endif;
		
		if( $result ):
			redirect("admin");
		else:
			echo "Gagal";
		endif;
	}

	public function delete($id=0)
	{
		$where = array(
			"id_admin"=>$id
		);
		
		if( $id != "" ):
			$result = $this->admin_model->delete($where);
		endif;
		
		if( $result ):
			redirect("admin");
		else:
			echo "Gagal";
		endif;
	}
	
	public function panduan()
	{
		$data["content"] 	= "form.panduan.php";
		$this->load->view($this->route, $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */