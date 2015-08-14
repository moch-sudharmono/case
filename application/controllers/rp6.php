<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rp6 extends CI_Controller {
	
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
		$this->load->model("kategori_model");
	}
	public function index()
	{		
		$case = $this->rp6_model->displayAllCase();

		$data["case"] = $case; 
		$data["class"] = $this->class;

		$data["content"] = "main.rp6.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond = array("Id_Rp6"=>$id);			
		$data["value"]		= $this->rp6_model->displaySelectedData($cond);

		$data["attorney"]	= $this->attorney_model->displayAll();
		$data["kategori"]	= $this->kategori_model->displayAllKategori();		
		
		if(!empty($data["value"])){
			$cond_suspect 		= array("id_suspect"=>$data["value"][0]["suspect_id"]);
			$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);			
			$cond_jaksa 		= array("rp6_id"=>$id);
			$data["jaksa"]		= $this->attorney_model->displayJaksaRp6($cond_jaksa);

		}
		
		$data["content"] 	= "form.rp6.php";
		$this->load->view($this->route, $data);
	}	

	public function view($id)
	{	
		$cond = array("Id_Rp6"=>$id);			
		$data["value"]		= $this->rp6_model->displaySelectedData($cond);
		
		$data["attorney"]	= $this->attorney_model->displayAll();

		$cond_suspect 		= array("id_suspect"=>$data["value"][0]["suspect_id"]);
		$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);			

		$data["content"] 	= "case.suspect.php";
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
	
	public function export()
	{
		$this->load->library('excel');
		$start = $this->ddate($this->input->post("MulaiTanggal"));
		$finish = $this->ddate($this->input->post("SampaiTanggal"));

		$data["value"]	= $this->rp6_model->displayBetweenData($start, $finish);	
		print_r($start);
	}
	
	public function downloadExcel()
        {
			$this->load->library('excel');
			$mulai = $this->input->post("MulaiTanggal");
			$start = $this->ddate($mulai);
			$akhir = $this->input->post("SampaiTanggal");
			$finish = $this->ddate($akhir);
	
			$data["value"]	= $this->rp6_model->displayBetweenData($start, $finish);
			
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
						->setCellValue('F1', "WAKTU, TEMPAT, TINDAK PIDANA, PASAL YANG DISANGKAKAN")	
						->setCellValue('F2', "Tanggal Waktu Kejadian")
						->setCellValue('G2', "Tempatnya")
						->setCellValue('H2', "Pasal Yang Disangkakan")
						->setCellValue('I1', "Jaksa Peneliti")						
						->setCellValue('J1', "PENAHANAN")
						->setCellValue('J2', "Tgl / No Penangkapan")
						->setCellValue('K2', "Tgl / No Penahanan")
						->setCellValue('L2', "Jenis Penahanan")
						->setCellValue('M2', "Perpanjangan Penahanan")
						->setCellValue('N2', "Penangguhan Penahanan")
						->setCellValue('O1', "PENGHENTIAN PENYIDIKAN")
						->setCellValue('O2', "Tanggal / Nomor")
						->setCellValue('P2', "Tidak Didahului SPDP")
						->setCellValue('Q2', "Alasannya")
						->setCellValue('R2', "Pendapat Jaksa Peneliti")
						->setCellValue('S2', "PRA PERADILAN")
						->setCellValue('S3', "Yang Mengajukan")
						->setCellValue('T3', "Putusan PN")
						->setCellValue('U3', "Putusan PT")
						->setCellValue('V1', "PENERIMAAN BERKAS TAHAP PERTAMA")
						->setCellValue('V2', "Tanggal")
						->setCellValue('W2', "Didahului SPDP")
						->setCellValue('X2', "SPDP Bersama Berkas")
						->setCellValue('Y1', "Keterangan")
						
						;
			//there is the loops for data
			$i=4;
			foreach($data['value'] as $no=>$val)
			{
				$cond_attorney 		= array("rp6_id"=>$val["id_rp6"]);
				$attorney			= $this->attorney_model->displayDataJaksaRp6($cond_attorney);
				$jaksa = '';
				foreach($attorney as $nox=>$valx)
				{
					$jaksa .= $valx["name_attorney"]."\n";
				}
				//$attorney = (!empty($attorney)? $jaksa1.','.$jaksa2:$jaksa1);

				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$i, $no+1)
						->setCellValue('B'.$i, $this->id_date($val["date"])."\n".$val["registration_no"])
						->setCellValue('C'.$i, $val["institution"])
						->setCellValue('D'.$i, $this->id_date($val["date_received"]))
						->setCellValue('E'.$i, $val["name_suspect"].", ".$val["birthplace"].", ".$this->id_date($val["birthdate"]).", ".$val["gender"].", ".$val["nationality"]."\n".$val["address"].", ".$val["religion"].", ".$val["job"].", ".$val["education"])
						->setCellValue('F'.$i, $val["case_time"])
						->setCellValue('G'.$i, $val["case_place"])
						->setCellValue('H'.$i, $val["pasal"])
						->setCellValue('I'.$i, $jaksa)						
						->setCellValue('J'.$i, $this->id_date($val["tgl_penangkapan"])."\n".$val["no_penangkapan"])
						->setCellValue('K'.$i, $this->id_date($val["tgl_penahanan"])."\n".$val["no_penahanan"])
						->setCellValue('L'.$i, $val["jenis_penahanan"])
						->setCellValue('M'.$i, $val["perpanjang_penahanan"])
						->setCellValue('N'.$i, $val["penangguhan_penahanan"])
						->setCellValue('O'.$i, $this->id_date($val["tanggal_penghentian"])."\n".$val["no_penghentian"])
						->setCellValue('P'.$i, $val["tanpa_spdp"])
						->setCellValue('Q'.$i, $val["alasan"])
						->setCellValue('R'.$i, $val["pendapat_jaksa"])
						->setCellValue('S'.$i, $val["pp_mengajukan"])
						->setCellValue('T'.$i, $val["pp_putusan_pn"])
						->setCellValue('U'.$i, $val["pp_putusan_pt"])
						->setCellValue('V'.$i, $this->id_date($val["tahapsatu_tanggal"]))
						->setCellValue('W'.$i, $val["tahapsatu_spdp"])
						->setCellValue('X'.$i, $val["tahapsatu_spdp_berkas"])
						->setCellValue('Y'.$i, $val["keterangan"])
						;
				$i++;
			}
			
			// Calculate the column widths
			for ($i = 'A'; $i !== 'Z'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);
			}
			$objPHPExcel->getActiveSheet()->calculateColumnWidths();
			
			// Set setAutoSize(false) so that the widths are not recalculated
			for ($i = 'A'; $i !== 'Z'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(false);
			}
			
			//Centering Content
			$objPHPExcel->getActiveSheet()
						->getStyle('A1:Y1')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
			$objPHPExcel->getActiveSheet()
						->getStyle('A2:Y2')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
			$objPHPExcel->getActiveSheet()
						->getStyle('A3:Y3')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);				
						
			$objPHPExcel->getActiveSheet()
						->getStyle('A4:Y'.$objPHPExcel->getActiveSheet()->getHighestRow())
						->getAlignment()
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);	

			//Merge Cell						
			$objPHPExcel->getActiveSheet()
						->mergeCells('A1:A3')
						->mergeCells('B1:D1')
						->mergeCells('B2:B3')
						->mergeCells('C2:C3')
						->mergeCells('D2:D3')
						->mergeCells('E1:E3')						
						->mergeCells('F1:H1')
						->mergeCells('F2:F3')
						->mergeCells('G2:G3')
						->mergeCells('H2:H3')
						->mergeCells('I1:I3')						
						->mergeCells('J1:N1')
						->mergeCells('J2:J3')
						->mergeCells('K2:K3')
						->mergeCells('L2:L3')
						->mergeCells('M2:M3')
						->mergeCells('N2:N3')						
						->mergeCells('O1:U1')
						->mergeCells('O2:O3')
						->mergeCells('P2:P3')
						->mergeCells('Q2:Q3')
						->mergeCells('R2:R3')
						->mergeCells('S2:U2')
						->mergeCells('V1:X1')
						->mergeCells('V2:V3')
						->mergeCells('W2:W3')
						->mergeCells('X2:X3')
						->mergeCells('Y1:Y3')
						;
			
			
			
			 
			// Rename worksheet (worksheet, not filename)
			$objPHPExcel->getActiveSheet()->setTitle('Register Perkara 6');
			 
			// Set active sheet index to the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			 
			ob_end_clean();
			
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Register Perkara 6 ('.$mulai.' - '.$akhir.').xls"');
			header('Cache-Control: max-age=0');
			
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
        }

	public function save()
	{
		//Case RP6
		$id_rp6 				= $this->input->post("Id_Rp6");
		$register_rp6	 		= $this->input->post("RegisterRp6");
		$registration_no 		= $this->input->post("NoRegistrasi");
		$date 					= $this->input->post("TanggalSaatIni");
		
		if($date != null){
				$date 			= str_replace('/', '-', $date);
				$date 			= date("Y-m-d", strtotime($date));	
		}else{	$date 			= '';}
		
		$institution 			= $this->input->post("Instansi");
		$date_received 			= $this->input->post("TanggalTerima");
		
		if($date_received != null){
				$date_received 				= str_replace('/', '-', $date_received);
				$date_received 			= date("Y-m-d", strtotime($date_received));	
		}else{	$date_received 			= '';}

		$case_place 			= $this->input->post("TempatKejadian");
		$case_time 				= $this->input->post("WaktuKejadian");
		$pasal 					= $this->input->post("Pasal");	 
		$no_penangkapan			= $this->input->post("NoPenangkapan");
		$tgl_penangkapan 		= $this->input->post("TglPenangkapan");

		if($tgl_penangkapan != null){
				$tgl_penangkapan 			= str_replace('/', '-', $tgl_penangkapan);
				$tgl_penangkapan 			= date("Y-m-d", strtotime($tgl_penangkapan));	
		}else{	$tgl_penangkapan 			= '';}

		$no_penahanan			= $this->input->post("NoPenahanan");
		$tgl_penahanan			= $this->input->post("TglPenahanan");
		
		if($tgl_penahanan != null){
				$tgl_penahanan 			= str_replace('/', '-', $tgl_penahanan);
				$tgl_penahanan 			= date("Y-m-d", strtotime($tgl_penahanan));	
		}else{	$tgl_penahanan 			= '';}
		
		$jenis_penahanan		= $this->input->post("JenisPenahanan");
		$perpanjang_penahanan	= $this->input->post("PerpanjangPenahanan");
		$penangguhan_penahanan	= $this->input->post("PenangguhanPenahanan");
		$tanggal_penghentian	= $this->input->post("TanggalPenghentian");
		
		if($tanggal_penghentian != null){
				$tanggal_penghentian 			= str_replace('/', '-', $tanggal_penghentian);
				$tanggal_penghentian 			= date("Y-m-d", strtotime($tanggal_penghentian));	
		}else{	$tanggal_penghentian 			= '';}

		$no_penghentian			= $this->input->post("NoPenghentian");
		$tanpa_spdp				= $this->input->post("TanpaSpdp");
		$alasan					= $this->input->post("AlasanPenghentian");
		$pendapat_jaksa			= $this->input->post("PendapatJaksaPeneliti");
		$pp_mengajukan			= $this->input->post("PPYangMengajukan");
		$pp_putusan_pn			= $this->input->post("PPPutusanPN");
		$pp_putusan_pt			= $this->input->post("PPPutusanPT");
		$tahapsatu_tanggal		= $this->input->post("TglTerimaTahap1");
		
		if($tahapsatu_tanggal != null){
				$tahapsatu_tanggal 			= str_replace('/', '-', $tahapsatu_tanggal);
				$tahapsatu_tanggal 			= date("Y-m-d", strtotime($tahapsatu_tanggal));	
		}else{	$tahapsatu_tanggal 			= '';}

		$tahapsatu_spdp 		= $this->input->post("DenganSPDP");
		$tahapsatu_spdp_berkas	= $this->input->post("SPDPBerkas");
		$keterangan				= $this->input->post("Keterangan");

		//Suspect
		$id_suspect				= $this->input->post("SuspectId");
		$name 					= $this->input->post("NamaTersangka");
		$birthplace				= $this->input->post("TempatLahir");
		$birthdate				= $this->input->post("TanggalLahir");
		
		if($birthdate != null){
				$birthdate 			= str_replace('/', '-', $birthdate);
				$birthdate 			= date("Y-m-d", strtotime($birthdate));	
		}else{	$birthdate 			= '';}

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

		$session_data = $this->session->userdata('logged_in');

		$data_rp6 = array(
			"register_rp6" 			=> $register_rp6,
			"registration_no" 		=> $registration_no,
			"date" 					=> $date,
			"institution" 			=> $institution,
			"date_received"			=> $date_received,
			"case_place" 			=> $case_place,
			"case_time"				=> $case_time,
			"pasal" 				=> $pasal,			
			"no_penangkapan"		=> $no_penangkapan,
			"tgl_penangkapan" 		=> $tgl_penangkapan,
			"no_penahanan"			=> $no_penahanan,
			"tgl_penahanan"			=> $tgl_penahanan,
			"jenis_penahanan"		=> $jenis_penahanan,
			"perpanjang_penahanan"	=> $perpanjang_penahanan,
			"penangguhan_penahanan"	=> $penangguhan_penahanan,
			"tanggal_penghentian"	=> $tanggal_penghentian,
			"no_penghentian"		=> $no_penghentian,
			"tanpa_spdp"			=> $tanpa_spdp,
			"alasan"				=> $alasan,
			"pendapat_jaksa"		=> $pendapat_jaksa,
			"pp_mengajukan"			=> $pp_mengajukan,
			"pp_putusan_pn"			=> $pp_putusan_pn,
			"pp_putusan_pt"			=> $pp_putusan_pt,
			"tahapsatu_tanggal"		=> $tahapsatu_tanggal,
			"tahapsatu_spdp" 		=> $tahapsatu_spdp,
			"tahapsatu_spdp_berkas"	=> $tahapsatu_spdp_berkas,
			"keterangan"			=> $keterangan,
			"suspect_id"			=> $id_suspect
		);
		
		$where = array(
			"id_rp6"=>$id_rp6
		);
		
		//Insert Jaksa
		$jaksa = $this->input->post("Jaksa"); 	
		$length = count($jaksa);
		$cond_reset = array("rp6_id" => $id_rp6);
		$reset_jaksa = $this->attorney_model->deleteJaksaRp6($cond_reset);
		for ($i = 0; $i < ($length-1); $i++) {
			$data_jaksa = array("attorney_id"=> $jaksa[$i], "rp6_id" => $id_rp6);
			$result_jaksa = $this->attorney_model->jpu2rp6($data_jaksa);			
		}

		//Execution main data
		if( $id_rp6 != null ):
			$update = array("user_update"=>$session_data['name'], "date_update"=> date('Y-m-d'));
			$data_rp6 = array_merge($data_rp6, $update);
			$result = $this->rp6_model->update($data_rp6, $where);
		else:
			$insert = array("user_input"=>$session_data['name'], "date_input"=> date('Y-m-d'));
			$data_rp6 = array_merge($data_rp6, $insert);
			$result = $this->rp6_model->insert($data_rp6);
		endif;
		
		if( $result ):
			redirect("rp6");
		else:
			echo "Gagal";
		endif;
	}

	public function delete($id,$id_suspect)
	{
		$where = array(
			"id_rp6"=>$id
		);

		$where_suspect = array('id_suspect' => $id_suspect );
		$where_jaksa   = array('rp6_id' => $id);  
		if( $id != "" ):
			$result 		= $this->rp6_model->delete($where);
			$result2 		= $this->suspect_model->delete($where_suspect);
			$result3	 	= $this->attorney_model->deleteJaksaRp6($where_jaksa);
		endif;
		
		if( $result ):
			redirect("rp6");
		else:
			echo "Gagal";
		endif;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */