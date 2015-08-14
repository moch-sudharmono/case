<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rp7 extends CI_Controller {
	
	public $route = "index.php";
	private $class = "rp7";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
		$this->load->model("rp7_model");
		$this->load->model("rp6_model");
		$this->load->model("rt2_model");
		$this->load->model("suspect_model");
		$this->load->model("attorney_model");
	}
	public function index()
	{		
		$case = $this->rp7_model->displayAllCase();

		$data["case"] = $case; 
		$data["class"] = $this->class;

		$data["content"] = "main.rp7.php";
		$this->load->view($this->route, $data);
	}

	public function add($id=0)
	{	
		$cond = array("id_rp6"=>$id);			
		$data["value"]		= $this->rp6_model->displaySelectedData($cond);

		if(!empty($data["value"])){
			$cond_suspect 		= array("id_suspect"=>$data["value"][0]["suspect_id"]);
			$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);			
		}
		
		$data["content"] 	= "form.rp7.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond = array("rp7.rp6_id"=>$id);			
		$data["value"]		= $this->rp7_model->displaySelectedData($cond);

		$cond_rp6 			= array("id_rp6"=>$id);
		$data["rp6"]		= $this->rp6_model->displaySelectedData($cond_rp6);

		$cond_rt2 			= array("rp6_id"=>$data["rp6"][0]["id_rp6"]);
		$data["rt2"]		= $this->rt2_model->displaySelectedData($cond_rt2);

		$cond_suspect 		= array("id_suspect"=>$data["rp6"][0]["suspect_id"]);
		$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);	
		
		$cond_attorney		= array("rp6_id"=>$id);
		$data["attorney"]	= $this->attorney_model->displayDataJaksaRp6($cond_attorney);	

		$data["content"] 	= "form.rp7.php";
		$this->load->view($this->route, $data);
	}	

	public function view($id)
	{	
		$cond 				= array("rp6_id"=>$id);			
		$data["value"]		= $this->rp7_model->displaySelectedData($cond);

		$cond_rp6 			= array("id_rp6"=>$id);
		$data["rp6"]		= $this->rp6_model->displaySelectedData($cond_rp6);

		$cond_suspect 		= array("id_suspect"=>$data["rp6"][0]["suspect_id"]);
		$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);	

		$cond_attorney		= array("id_attorney"=>$data["rp6"][0]["attorney1"]);
		$data["attorney"]	= $this->attorney_model->displaySelectedData($cond_attorney);	

		$data["content"] 	= "case.rp7.php";
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
	
			$data["value"]	= $this->rp7_model->displayBetweenData($start, $finish);
			
            //load PHPExcel library
			$this->load->library('Excel');
			 
			// Create new PHPExcel object
			$objPHPExcel = new PHPExcel();
			
			// Add some data
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A1', "No")
						->setCellValue('B1', "PEMBERITAHUAN DIMULAINYA PENYIDIKAN")
						->setCellValue('B2', "Tanggal / Nomor")
						->setCellValue('C2', "Instansi Penyidik")
						->setCellValue('D2', "Tanggal diterima di Kejaksaan\n / Penuntut Umum")
						->setCellValue('E1', "IDENTITAS TERSANGKA\nNama Lengkap, Tempat Tgl Lahir, Jenis Kelamin, Kewarganegaraan,\n Tempat Tinggal, Agama, Pekerjaan, Pendidikan")
						
						->setCellValue('F1', 'Pasal yang Disangkakan')	
						->setCellValue('G1', 'No Register RP6')
						->setCellValue('H1', 'No Register RT2')
						->setCellValue('I1', 'Jaksa Peneliti')						
						->setCellValue('J1', 'TIDAK LENGKAP')
						->setCellValue('J2', 'Tgl/No P19')
						->setCellValue('K2', 'Tgl Diterima kembali penyidik')
						->setCellValue('L2', 'Petunjuk belum terpenuhi')
						->setCellValue('M2', 'Tgl Pemeriksaan Tambahan')
						->setCellValue('N1', 'LENGKAP')
						->setCellValue('N2', 'Tanggal')
						->setCellValue('O2', "Tgl setelah dilengkapi penyidik\n (Setelah P19)")
						->setCellValue('P1', 'Tgl Berkas Perkara Tahap II')
						->setCellValue('Q1', 'Keterangan')
						;
			
			$i=3;
			foreach($data['value'] as $no=>$val)
			{
				$cond_attorney 		= array("rp6_id"=>$val["rp6_id"]);
				$attorney			= $this->attorney_model->displayDataJaksaRp6($cond_attorney);
				$jaksa = '';
				foreach($attorney as $nox=>$valx)
				{
					$jaksa .= $valx["name_attorney"]."\n";
				}
			
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$i, $no+1)
						->setCellValue('B'.$i, $this->id_date($val["date"])."\n".$val["registration_no"])
						->setCellValue('C'.$i, $val["institution"])
						->setCellValue('D'.$i, $this->id_date($val["date_received"]))
						->setCellValue('E'.$i, $val["name_suspect"].", ".$val["birthplace"].", ".$this->id_date($val["birthdate"]).", ".$val["gender"].", ".$val["nationality"]."\n".$val["address"].", ".$val["religion"].", ".$val["job"].", ".$val["education"])						
						->setCellValue('F'.$i, $val["pasal"])	
						->setCellValue('G'.$i, $val["register_rp6"])
						->setCellValue('H'.$i, $val["register_rt2"])
						->setCellValue('I'.$i, $jaksa)						
						->setCellValue('J'.$i, $this->id_date($val["date_p19"]).",\n ".$val["no_p19"])
						->setCellValue('K'.$i, $this->id_date($val["tgl_terima_kembali_penyidik"]))
						->setCellValue('L'.$i, $val["petunjuk_belum_terpenuhi"])
						->setCellValue('M'.$i, $this->id_date($val["tgl_pemeriksaan_tambahan"]))
						->setCellValue('N'.$i, $this->id_date($val["tgl_lengkap"]))
						->setCellValue('O'.$i, $this->id_date($val["tgl_setelah_dilengkapi_penyidik"]))
						->setCellValue('P'.$i, $this->id_date($val["tgl_bp_tahap2"]))
						->setCellValue('Q'.$i, $val["keterangan_rp7"])
						;
			$i++;
			}
			// Calculate the column widths
			for ($i = 'A'; $i !== 'R'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);
			}
			$objPHPExcel->getActiveSheet()->calculateColumnWidths();
			
			// Set setAutoSize(false) so that the widths are not recalculated
			for ($i = 'A'; $i !== 'R'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(false);
			}
			
			//Centering Content
			$objPHPExcel->getActiveSheet()
						->getStyle('A1:Q1')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
			$objPHPExcel->getActiveSheet()
						->getStyle('A2:Q2')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
						
			$objPHPExcel->getActiveSheet()
						->getStyle('A3:Q'.$objPHPExcel->getActiveSheet()->getHighestRow())
						->getAlignment()
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);	
			//Merge Cell						
			$objPHPExcel->getActiveSheet()
						->mergeCells('A1:A2')
						->mergeCells('B1:D1')
						->mergeCells('E1:E2')
						->mergeCells('F1:F2')
						->mergeCells('G1:G2')
						->mergeCells('H1:H2')
						->mergeCells('I1:I2')
						->mergeCells('J1:M1')
						->mergeCells('N1:O1')
						->mergeCells('P1:P2')
						->mergeCells('Q1:Q2')
						;
			
			
			//there is the loops for data
			 
			// Rename worksheet (worksheet, not filename)
			$objPHPExcel->getActiveSheet()->setTitle('Register Perkara 7');
			 
			// Set active sheet index to the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			 
			ob_end_clean();
			
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Register Perkara 7 ('.$mulai.' - '.$akhir.').xls"');
			header('Cache-Control: max-age=0');
			
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
        }

	public function save()
	{
		$id_rp7         = $this->input->post("id_rp7");
		$rp6_id         = $this->input->post("rp6_id");
		$register_rp7   = $this->input->post("register_rp7");
		$tgl_rp7        = $this->ddate($this->input->post("tgl_rp7"));
		$tgl_p19        = $this->input->post("tgl_p19");
		$no_p19         = $this->input->post("no_p19");
		$tgl_kembali    = $this->input->post("tgl_kembali");
		$petunjuk       = $this->input->post("petunjuk");
		$tgl_tambahan   = $this->input->post("tgl_tambahan");
		$tgl_lengkap    = $this->input->post("tgl_lengkap");
		$tgl_setelah_p19 = $this->input->post("tgl_setelah_p19");
		$tgl_tahap2     = $this->input->post("tgl_tahap2");
		$keterangan_rp7 = $this->input->post("keterangan_rp7");
				
		if($tgl_p19 != null){
				$tgl_p19 			= str_replace('/', '-', $tgl_p19);
				$tgl_p19 			= date("Y-m-d", strtotime($tgl_p19));	
		}else{	$tgl_p19 			= '';}
		
		if($tgl_kembali != null){
				$tgl_kembali 				= str_replace('/', '-', $tgl_kembali);
				$tgl_kembali 			= date("Y-m-d", strtotime($tgl_kembali));	
		}else{	$tgl_kembali 			= '';}

		if($tgl_tambahan != null){
				$tgl_tambahan 			= str_replace('/', '-', $tgl_tambahan);
				$tgl_tambahan 			= date("Y-m-d", strtotime($tgl_tambahan));	
		}else{	$tgl_tambahan 			= '';}

		
		if($tgl_lengkap != null){
				$tgl_lengkap 			= str_replace('/', '-', $tgl_lengkap);
				$tgl_lengkap 			= date("Y-m-d", strtotime($tgl_lengkap));	
		}else{	$tgl_lengkap 			= '';}
				
		if($tgl_setelah_p19 != null){
				$tgl_setelah_p19 			= str_replace('/', '-', $tgl_setelah_p19);
				$tgl_setelah_p19 			= date("Y-m-d", strtotime($tgl_setelah_p19));	
		}else{	$tgl_setelah_p19 			= '';}

		if($tgl_tahap2 != null){
				$tgl_tahap2 			= str_replace('/', '-', $tgl_tahap2);
				$tgl_tahap2 			= date("Y-m-d", strtotime($tgl_tahap2));	
		}else{	$tgl_tahap2 			= '';}

		$data_rp7 = array(
			"rp6_id" 						=> $rp6_id,
			"date_p19" 						=> $tgl_p19,
			"register_rp7" 					=> $register_rp7,
			"tgl_rp7" 					=> $tgl_rp7,
			"no_p19"						=> $no_p19,
			"tgl_terima_kembali_penyidik" 	=> $tgl_kembali,
			"petunjuk_belum_terpenuhi"		=> $petunjuk,
			"tgl_pemeriksaan_tambahan" 		=> $tgl_tambahan,
			"tgl_lengkap"					=> $tgl_lengkap,
			"tgl_setelah_dilengkapi_penyidik"	=> $tgl_setelah_p19,
			"tgl_bp_tahap2"					=> $tgl_tahap2,
			"keterangan_rp7" 				=> $keterangan_rp7
		);
		
		$where = array(
			"id_rp7"=>$id_rp7
		);

		if( $id_rp7 != null ):
			
			$result = $this->rp7_model->update($data_rp7, $where);
		else:
			$result = $this->rp7_model->insert($data_rp7);
		endif;
		
		if( $result ):
			redirect("rp7");
		else:
			echo "Gagal";
		endif;
		
	}

	public function delete($id)
	{
		$where = array(
			"id_rp7"=>$id
		);

		if( $id != "" ):
			$result = $this->rp7_model->delete($where);
		endif;
		
		if( $result ):
			redirect("rp7");
		else:
			echo "Gagal";
		endif;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */