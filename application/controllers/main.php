<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public $route = "index.php";
	private $class = "rp6";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
		$this->load->model("rp6_model");
		$this->load->model("suspect_model");
		$this->load->model("attorney_model");
		$this->load->model("sms_model");
		$this->load->model("notification_model");
		$this->load->model("supervisor_model");		
		$this->load->library('pagination_lib');
	}

	public function index()
	{				
		if($this->session->userdata('logged_in'))
   		{
			$this->notification();	

			$case = $this->rp6_model->displayAllCase();
			$status_perkara = $this->rp6_model->displayStatus();

			$data["case"] = $case; 
			$data["status_perkara"] = $status_perkara;
			$data["class"] = $this->class;

			$data["content"] = "main.page.php";
			$this->load->view($this->route, $data);
		
		}else{
			redirect("user","refresh");
		}
	}

	public function notification()
	{
		/* Conditional for Notification */
			
			$case 		= $this->rp6_model->displayAllCase();
			$notify 	= $this->notification_model->displayAllNotification();
			$supervise 	= $this->supervisor_model->displayAllSupervisor();	
			
			$today = floor(strtotime(date("Y-m-d"))/(60*60*24));
			foreach ($case as $nox => $valx) {
				# code...
				$tglterima = floor(strtotime($valx["date_received"])/(60*60*24));
				foreach ($notify as $key => $value) {
					# code...

					if((date("H:i") == "09:00") && ($value["period"] + $tglterima) == $today)
					{
						$text = str_replace("[tersangka]", $valx["name_suspect"], $value["content"]);
						foreach ($supervise as $no => $val) {
							# code...
							$phone = $val["phone_supervisor"];		
							$data = array("DestinationNumber"=>$phone, "TextDecoded"=>$text);					
							$send = $this->sms_model->insert($data);

							if ($send == TRUE) {
								echo "<Script>Alert('SMS Notifikasi telah terkirim')</script>";
							}else{
								echo "<Script>Alert('SMS Notifikasi telah terkirim')</script>";
							}
						}						
					}
					else
					{
						//echo "not in period<br />";
					}								
				}
			}
			/* End of Conditional */
	}
	
	public function checksms()
	{
		// query untuk membaca SMS yang belum diproses
		$query = "SELECT * FROM inbox WHERE Processed = 'false'";
		//then read content plus update to DB then send notification to supervisor about status
		
		$query2 = "UPDATE RP7 SET P18=OK WHERE ID_RP7=XX";
		$query2 = "UPDATE RP7 SET P19=OK WHERE ID_RP7=XX";
		$query2 = "UPDATE RP7 SET P21=OK WHERE ID_RP7=XX";
		$query2 = "UPDATE RP7 SET P21A=OK WHERE ID_RP7=XX";
		
		// membuat SMS balasan
		$query3 = "INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES ('$noPengirim', '$reply', 'Gammu')";
		 
		// ubah nilai 'processed' menjadi 'true' untuk setiap SMS yang telah diproses 
		$query4 = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>