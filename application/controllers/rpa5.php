<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rpa5 extends CI_Controller {
	
	public $route = "index.php";
	private $class = "Rpa5";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
		$this->load->model("Rpa5_Model");
		$this->load->model("Suspect_Model");
		$this->load->model("Victim_Model");
		$this->load->model("attorney_model");
	}
	public function index()
	{		
		$case = $this->Rpa5_Model->displayAll();
		$data["case"] = $case; 
		$data["class"] = $this->class;

		$data["content"] = "main.rpa5.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond = array("id_rpa5"=>$id);			
		$data["value"]		= $this->Rpa5_Model->displaySelectedData($cond);
		$data["attorney"]	= $this->attorney_model->displayAll();

		if(!empty($data["value"])){
			$cond_suspect 		= array("id_suspect"=>$data["value"][0]["suspect_id"]);
			$data["suspect"]	= $this->Suspect_Model->displaySelectedData($cond_suspect);			
			$cond_victim 		= array("id_victim"=>$data["value"][0]["victim_id"]);
			$data["victim"]		= $this->Victim_Model->displaySelectedData($cond_victim);	
			$cond_jaksa 		= array("rpa5_id"=>$id);
			$data["jaksa"]		= $this->attorney_model->displayJaksaRpa5($cond_jaksa);		
		}
		//echo '<pre>';
		//print_r($data["suspect"]);
		//echo '</pre>';exit;
		$data["content"] 	= "form.rpa5.php";
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
	
			$data["value"]	= $this->Rpa5_Model->displayBetweenData($start, $finish);
			
            //load PHPExcel library
			$this->load->library('Excel');
			 
			// Create new PHPExcel object
			$objPHPExcel = new PHPExcel();
			
			// Add some data
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A1', 'No')
						->setCellValue('B1', "1. Identitas Anak\n2. Pasal Tindak Pidana")
						->setCellValue('C1', "Identitas Tersangka")
						->setCellValue('D1', "1. No/Tgl SPDP\n2. Tgl SPDP Diterima")
						->setCellValue('E1', "1. No/Tgl P-16\n2. Nama Penuntut Umum")
						->setCellValue('F1', 'Kasus Posisi')	
						->setCellValue('G1', "Tgl Terima\nBerkas Perkara")					
						->setCellValue('H1', "Keadaan Korban")
						->setCellValue('I1', "Laporan\nPEKSOS dan TEKSOS")						
						->setCellValue('J1', 'Lembaga Rujukan')
						->setCellValue('K1', 'Keterangan')						
						;
			//there is the loops for data
			$i=2;
			foreach($data['value'] as $no=>$val)
			{
				$cond_attorney 		= array("rpa5_id"=>$val["id_rpa5"]);
				$attorney			= $this->attorney_model->displayDataJaksaRpa5($cond_attorney);
				$jaksa = '';
				foreach($attorney as $nox=>$valx)
				{
					$jaksa .= $valx["name_attorney"]."\n";
				}
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$i, $no+1)
						->setCellValue('B'.$i, "1. ".$val["name_victim"].", ".$val["tempat_lahir"].", ".$this->id_date($val["tgl_lahir"]).", ".$val["kelamin"].", ".$val["kebangsaan"]."\n".$val["alamat"].", ".$val["agama"].", ".$val["pekerjaan"].", ".$val["pendidikan"]."\n2. ".$val["pasal_rpa5"])
						->setCellValue('C'.$i, $val["name_suspect"].", ".$val["birthplace"].", ".$this->id_date($val["birthdate"]).", ".$val["gender"].", ".$val["nationality"]."\n".$val["address"].", ".$val["religion"].", ".$val["job"].", ".$val["education"])
						->setCellValue('D'.$i, "1. ".$val["no_spdp"]."\n".$this->id_date($val["tgl_spdp"])."\n2. ".$this->id_date($val["tgl_spdp_diterima"]))						
						->setCellValue('E'.$i, "1. ".$val["no_p16"]."\n".$this->id_date($val["tgl_p16"])."\n2. ".$jaksa)
						->setCellValue('F'.$i, $val["kasus_posisi"])
						->setCellValue('G'.$i, $this->id_date($val["tgl_terima_berkas_perkara"]))
						->setCellValue('H'.$i, $val["keadaan_korban"])
						->setCellValue('I'.$i, $val["lap_peksos_teksos"])
						->setCellValue('J'.$i, $val["lembaga_rujukan"])
						->setCellValue('K'.$i, $val["keterangan_rpa1"])
						;
				$i++;
			}
			
			// Calculate the column widths
			for ($i = 'A'; $i !== 'L'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);
			}
			$objPHPExcel->getActiveSheet()->calculateColumnWidths();
			
			// Set setAutoSize(false) so that the widths are not recalculated
			for ($i = 'A'; $i !== 'L'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(false);
			}
			
			//Centering Content
			$objPHPExcel->getActiveSheet()
						->getStyle('A1:K1')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()
						->getStyle('A2:K'.$objPHPExcel->getActiveSheet()->getHighestRow())
						->getAlignment()
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);	
			
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
			$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(50);
			$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(50);
			$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(50);
			 
			// Rename worksheet (worksheet, not filename)
			$objPHPExcel->getActiveSheet()->setTitle('Register Perkara Anak 5');
			 
			// Set active sheet index to the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			 
			ob_end_clean();
			
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Register Perkara Anak 5 ('.$mulai.' - '.$akhir.').xls"');
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
		
		$wheres = array(
			"id_suspect"=>$id_suspect
		);

		if( $id_suspect != null ):
			$results = $this->Suspect_Model->update($data_suspect, $wheres);
		else:
			$results = $this->Suspect_Model->insert($data_suspect);
			$id_suspect = $this->Suspect_Model->getlatest_id();
		endif;
		
		//Victim
		$id_victim		= $this->input->post("VictimId");
		$nama 			= $this->input->post("NamaKorban");
		$tempatlahir	= $this->input->post("TempatLahirKorban");
		$tanggallahir	= $this->ddate($this->input->post("TanggalLahirKorban"));
		$kelamin		= $this->input->post("JenisKelaminKorban");
		$kebangsaan		= $this->input->post("WargaNegaraKorban");
		$alamat			= $this->input->post("AlamatKorban");
		$pekerjaan		= $this->input->post("PekerjaanKorban");
		$pendidikan		= $this->input->post("PendidikanKorban");
		$agama			= $this->input->post("AgamaKorban");
		
		$data_victim = array(
			"name_victim"	=> $nama,
			"tempat_lahir"	=> $tempatlahir,
			"tgl_lahir"		=> $tanggallahir,
			"kelamin"		=> $kelamin,
			"kebangsaan"	=> $kebangsaan,
			"alamat"		=> $alamat,
			"pekerjaan"		=> $pekerjaan,
			"pendidikan"	=> $pendidikan,
			"agama"			=> $agama
		);
		
		$wherev = array(
			"id_victim"=>$id_victim
		);

		if( $id_victim != null ):
			$resultv = $this->Victim_Model->update($data_victim, $wherev);
		else:
			$resultv = $this->Victim_Model->insert($data_victim);
			$id_victim = $this->Victim_Model->getlatest_id();
		endif;
		
		$data_rpa5 = array(
			"register_rpa5"		=> $this->input->post("register_rpa5"),
			"tgl_rpa5" 			=> $this->ddate($this->input->post("tgl_rpa5")),
			"suspect_id" 		=> $id_suspect,
			"victim_id" 		=> $id_victim,
			"pasal_rpa5"		=> $this->input->post("pasal_rpa5"),
			"no_spdp"			=> $this->input->post("no_spdp"),
			"tgl_spdp"			=> $this->ddate($this->input->post("tgl_spdp")),
			"tgl_spdp_diterima"	=> $this->ddate($this->input->post("tgl_spdp_diterima")),
			"no_p16"			=> $this->input->post("no_p16"),
			"tgl_p16"			=> $this->ddate($this->input->post("tgl_p16")),
			"kasus_posisi"		=> $this->input->post("kasus_posisi"),
			"tgl_terima_berkas"	=> $this->ddate($this->input->post("tgl_terima_berkas")),
			"keadaan_korban"	=> $this->input->post("keadaan_korban"),
			"lap_peksos_teksos"	=> $this->input->post("lap_peksos_teksos"),
			"lembaga_rujukan"	=> $this->input->post("lembaga_rujukan"),			
			"keterangan_rpa5"	=> $this->input->post("keterangan_rpa5")
		);
		
		$id_rpa5 = $this->input->post("id_rpa5");
		
		$where = array(
			"id_rpa5"=>$id_rpa5
		);
		
		//Insert Jaksa
		$jaksa = $this->input->post("Jaksa"); 	
		$length = count($jaksa);
		$cond_reset = array("rpa5_id" => $id_rpa5);
		$reset_jaksa = $this->attorney_model->deleteJaksaRpa5($cond_reset);
		for ($i = 0; $i < ($length-1); $i++) {
			$data_jaksa = array("attorney_id"=> $jaksa[$i], "rpa5_id" => $id_rpa5);
			$result_jaksa = $this->attorney_model->jpu2rpa5($data_jaksa);			
		}

		if( $id_rpa5 != null ):
			$result = $this->Rpa5_Model->update($data_rpa5, $where);
		else:
			$result = $this->Rpa5_Model->insert($data_rpa5);
		endif;
		
		
		if( $result ):
			redirect("rpa5");
		else:
			echo "Gagal";
		endif;
	}

	public function delete($id,$id_suspect)
	{
		$where = array(
			"id_rpa5"=>$id
		);
		$where_suspect 	= array('id_suspect' => $id_suspect );
		$where_attorney = array('rpa5_id' => $id );

		if( $id != "" ):
			$result3 = $this->attorney_model->deleteJaksaRpa5($where_attorney);
			$result2 = $this->suspect_model->delete($where_suspect);
			$result = $this->Rpa5_Model->delete($where);
		endif;
		
		if( $result ):
			redirect("rpa5");
		else:
			echo "Gagal";
		endif;
	}
}
