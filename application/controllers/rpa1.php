<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rpa1 extends CI_Controller {
	
	public $route = "index.php";
	private $class = "rpa1";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
		$this->load->model("Rpa1_Model");
		$this->load->model("suspect_model");
		$this->load->model("attorney_model");
	}
	public function index()
	{		
		$case = $this->Rpa1_Model->displayAll();
		/*echo '<pre>';
		print_r($case);
		echo '</pre>';exit;*/
		$data["case"] = $case; 
		$data["class"] = $this->class;

		$data["content"] = "main.rpa1.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond = array("id_rpa1"=>$id);			
		$data["value"]		= $this->Rpa1_Model->displaySelectedData($cond);

		$data["attorney"]	= $this->attorney_model->displayAll();
		
		if(!empty($data["value"])){
			$cond_suspect 		= array("id_suspect"=>$data["value"][0]["suspect_id"]);
			$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);			
			$cond_jaksa 		= array("rpa1_id"=>$id);
			$data["jaksa"]		= $this->attorney_model->displayJaksaRpa1($cond_jaksa);
		}
		
		$data["content"] 	= "form.rpa1.php";
		$this->load->view($this->route, $data);
	}	

	private function ddate($date)
	{
		if($date != null){
				$date 			= str_replace('/', '-', $date);
				$date 			= date("Y-m-d", strtotime($date));	
		}else{	$date 			= '';}
		return $date;
	}
	
	private function id_date($date)
	{
		if($date != null and $date != '0000-00-00'){
				$date 			= date("d-m-Y", strtotime($date));	
		}else{	$date 			= '';}
		return $date;
	}
		
	public function downloadExcel()
    {
			$this->load->library('excel');
			$mulai = $this->input->post("MulaiTanggal");
			$start = $this->ddate($mulai);
			$akhir = $this->input->post("SampaiTanggal");
			$finish = $this->ddate($akhir);
	
			$data["value"]	= $this->Rpa1_Model->displayBetweenData($start, $finish);
			
            //load PHPExcel library
			$this->load->library('Excel');
			 
			// Create new PHPExcel object
			$objPHPExcel = new PHPExcel();
			
			// Add some data
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A1', 'No')
						->setCellValue('B1', "1. No/Tgl SPDP\n2. Tgl SPDP Diterima")
						->setCellValue('C1', "1. Identitas Anak\n2. Pasal Tindak Pidana")
						->setCellValue('D1', 'Kasus Posisi')
						->setCellValue('E1', "1. No/Tgl P-16\n2. Nama Penuntut Umum")
						->setCellValue('F1', "1. No/Tgl Penahanan\n2. No/Tgl Perpanjangan Penahanan")
						->setCellValue('G1', "Jenis & Jumlah\nBarang Bukti")
						->setCellValue('H1', "Tgl Terima\nBerkas Perkara")
						->setCellValue('I1', 'No/Tgl P-18')
						->setCellValue('J1', 'No/Tgl P-19')
						->setCellValue('K1', 'No/Tgl P-21')
						->setCellValue('L1', 'Keterangan')						
						;
			//there is the loops for data
			$i=2;
			foreach($data['value'] as $no=>$val)
			{
				$cond_attorney 		= array("rpa1_id"=>$val["id_rpa1"]);
				$attorney			= $this->attorney_model->displayDataJaksaRpa1($cond_attorney);
				$jaksa = '';
				foreach($attorney as $nox=>$valx)
				{
					$jaksa .= $valx["name_attorney"]."\n";
				}
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$i, $no+1)
						->setCellValue('B'.$i, "1. ".$val["no_spdp"]."\n".$this->id_date($val["tgl_spdp"])."\n2. ".$this->id_date($val["tgl_spdp_diterima"]))
						->setCellValue('C'.$i, "1. ".$val["name_suspect"].", ".$val["birthplace"].", ".$this->id_date($val["birthdate"]).", ".$val["gender"].", ".$val["nationality"]."\n".$val["address"].", ".$val["religion"].", ".$val["job"].", ".$val["education"]."\n2. ".$val["pasal_tindak_pidana"])
						->setCellValue('D'.$i, $val["kasus_posisi"])
						->setCellValue('E'.$i, "1. ".$val["no_p16"]."\n".$this->id_date($val["tgl_p16"])."\n2. ".$jaksa)
						->setCellValue('F'.$i, "1. ".$val["no_penahanan"]."\n".$this->id_date($val["tgl_penahanan"])."\n2. ".$val["no_perpanjangan"]."\n".$this->id_date($val["tgl_perpanjangan"]))
						->setCellValue('G'.$i, $val["jenis_jumlah_bukti"])
						->setCellValue('H'.$i, $this->id_date($val["tgl_terima_berkas_perkara"]))
						->setCellValue('I'.$i, $val["p18_no"]."\n".$this->id_date($val["p18_tgl"]))
						->setCellValue('J'.$i, $val["p19_no"]."\n".$this->id_date($val["p19_tgl"]))
						->setCellValue('K'.$i, $val["p21_no"]."\n".$this->id_date($val["p21_tgl"]))
						->setCellValue('L'.$i, $val["keterangan_rpa1"])
						;
				$i++;
			}
			
			// Calculate the column widths
			for ($i = 'A'; $i !== 'M'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);
			}
			$objPHPExcel->getActiveSheet()->calculateColumnWidths();
			
			// Set setAutoSize(false) so that the widths are not recalculated
			for ($i = 'A'; $i !== 'M'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(false);
			}
			
			//Centering Content
			$objPHPExcel->getActiveSheet()
						->getStyle('A1:L1')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()
						->getStyle('A2:L'.$objPHPExcel->getActiveSheet()->getHighestRow())
						->getAlignment()
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);	
			
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
			 
			// Rename worksheet (worksheet, not filename)
			$objPHPExcel->getActiveSheet()->setTitle('Register Perkara Anak 1');
			 
			// Set active sheet index to the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			 
			ob_end_clean();
			
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Register Perkara Anak 1 ('.$mulai.' - '.$akhir.').xls"');
			header('Cache-Control: max-age=0');
			
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
        }

	public function save()
	{
		//Suspect
		$id_suspect				= $this->input->post("SuspectId");
		$name 					= $this->input->post("NamaTersangka");
		$birthplace				= $this->input->post("TempatLahir");
		$birthdate				= $this->ddate($this->input->post("TanggalLahir"));
		$gender					= $this->input->post("JenisKelamin");
		$nationality			= $this->input->post("WargaNegara");
		$address				= $this->input->post("Alamat");
		$job					= $this->input->post("Pekerjaan");
		$education				= $this->input->post("Pendidikan");
		$religion				= $this->input->post("Agama");


		$data_suspect = array(
			"name_suspect"	=> $name,
			"birthplace"	=> $birthplace,
			"birthdate"		=> $birthdate,
			"gender"		=> $gender,
			"nationality"	=> $nationality,
			"address"		=> $address,
			"job"			=> $job,
			"education"		=> $education,
			"religion"		=> $religion
		);
		
		//print_r($data); exit;
		
		$wheres = array(
			"id_suspect"=>$id_suspect
		);

		if( $id_suspect != null ):
			$results = $this->suspect_model->update($data_suspect, $wheres);
		else:
			$results = $this->suspect_model->insert($data_suspect);
			$id_suspect = $this->suspect_model->getlatest_id();
		endif;
				

		$data_rpa1 = array(
			"register_rpa1" 			=> $this->input->post("register_rpa1"),
			"no_spdp" 					=> $this->input->post("no_spdp"),
			"tgl_spdp" 					=> $this->ddate($this->input->post("tgl_spdp")),
			"tgl_spdp_diterima" 		=> $this->ddate($this->input->post("tgl_spdp_diterima")),
			"suspect_id"				=> $id_suspect,
			"pasal_tindak_pidana" 		=> $this->input->post("pasal_tindak_pidana"),
			"kasus_posisi"				=> $this->input->post("kasus_posisi"),
			"no_p16" 					=> $this->input->post("no_p16"),
			"tgl_p16"					=> $this->ddate($this->input->post("tgl_p16")),
			"no_penahanan"				=> $this->input->post("no_penahanan"),
			"tgl_penahanan"				=> $this->ddate($this->input->post("tgl_penahanan")),
			"no_perpanjangan"			=> $this->input->post("no_perpanjangan"),
			"tgl_perpanjangan"			=> $this->ddate($this->input->post("tgl_perpanjangan")),
			"jenis_jumlah_bukti"		=> $this->input->post("jenis_jumlah_bukti"),
			"tgl_terima_berkas_perkara"	=> $this->ddate($this->input->post("tgl_terima_berkas_perkara")),
			"p18_no"					=> $this->input->post("p18_no"),
			"p18_tgl"					=> $this->ddate($this->input->post("p18_tgl")),
			"p19_no"					=> $this->input->post("p19_no"),
			"p19_tgl"					=> $this->ddate($this->input->post("p19_tgl")),
			"p21_no"					=> $this->input->post("p21_no"),
			"p21_tgl"					=> $this->ddate($this->input->post("p21_tgl")),
			"keterangan_rpa1"			=> $this->input->post("keterangan_rpa1")
		);
		$id_rpa1 = $this->input->post("id_rpa1");
		
		$where = array(
			"id_rpa1"=>$id_rpa1
		);
		
		//Insert Jaksa
		$jaksa = $this->input->post("Jaksa"); 	
		$length = count($jaksa);
		$cond_reset = array("rpa1_id" => $id_rpa1);
		$reset_jaksa = $this->attorney_model->deleteJaksaRpa1($cond_reset);
		for ($i = 0; $i < ($length-1); $i++) {
			$data_jaksa = array("attorney_id"=> $jaksa[$i], "rpa1_id" => $id_rpa1);
			$result_jaksa = $this->attorney_model->jpu2rpa1($data_jaksa);			
		}
		
		if( $id_rpa1 != null ):
			$result = $this->Rpa1_Model->update($data_rpa1, $where);
		else:
			$result = $this->Rpa1_Model->insert($data_rpa1);
		endif;
		
		//Code below for adding Jpu2Rpa1
		
		if( $result ):
			redirect("rpa1");
		else:
			echo "Gagal";
		endif;
	}

	public function delete($id,$id_suspect)
	{
		$where = array(
			"id_rpa1"=>$id
		);

		$where_suspect 	= array('id_suspect' => $id_suspect );
		$where_attorney = array('rpa1_id' => $id );
		
		if( $id != "" ):
			$result3 = $this->attorney_model->deleteJaksaRpa1($where_attorney);
			$result2 = $this->suspect_model->delete($where_suspect);
			$result = $this->Rpa1_Model->delete($where);
		endif;
		
		if( $result ):
			redirect("rpa1");
		else:
			echo "Gagal";
		endif;
	}
}
