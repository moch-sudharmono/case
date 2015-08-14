<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public $route = "index.php";
	private $class = "administration";

	public function __construct(){
		//function check access			
		parent::__construct();	
		$this->load->model("admin_model");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('inputEmail', 'Email', 'trim|required|xss_clean|email');
	   	$this->form_validation->set_rules('inputPassword', 'Password', 'trim|required|xss_clean|callback_check_database');

	   if($this->session->userdata('logged_in'))
	   {
	     $session_data = $this->session->userdata('logged_in');
	     $data['name'] = $session_data['name'];
	   }

		   if($this->form_validation->run() == FALSE)
		   {
		     //Field validation failed.  User redirected to login page
		   	$data["error"] = "";
		     $this->load->view('login',$data);
		   }
		   else
		   {
		     //Go to private area
		     redirect('main', 'refresh');
		   }
		//$this->load->view('login');
	}

	public function logout()
	{
		session_start(); 
   		$this->session->unset_userdata('logged_in');
   		session_destroy();
   		
   		redirect('user', 'refresh');
	}

	public function login()
	{
		$uname = $this->input->post("inputEmail");
		$pword = $this->input->post("inputPassword");

		$data = array("email"=>$uname, "password"=>md5($pword));

		//query the database
		   $result = $this->admin_model->login($data);

		   if($result != null)
		   {
		     $sess_array = array();
		     foreach($result as $row)
		     {
		       $sess_array = array(
		       	 'id_admin' => $row["id_admin"],
		         'email' => $row["email"],
		         'name' => $row["name"],
				 'role' => $row["role"]
		       );
		       $this->session->set_userdata('logged_in', $sess_array);
		     }
		     
		     redirect('main', 'refresh');
		   }
		   else
		   {
		   	 $data["error"] = "Email atau Password salah";
		   	 $this->load->view('login',$data);
		     
		     return false;
		   }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */