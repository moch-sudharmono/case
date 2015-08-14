<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rt2 extends CI_Controller {
	
	public $route = "index.php";
	private $class = "rt2";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
		$this->load->model("rt2_model");
		$this->load->model("rp6_model");
		$this->load->model("suspect_model");
		$this->load->model("attorney_model");
		$this->load->library('pagination_lib');
	}
	public function index()
	{		
		$case = $this->rt2_model->displayAllCase();

		$data["case"] = $case; 
		$data["class"] = $this->class;

		$data["content"] = "main.rt2.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond 				= array("rp6_id"=>$id);			
		$data["value"]		= $this->rt2_model->displaySelectedData($cond);
		
		$cond_rp6 			= array("id_rp6"=>$id);
		$data["rp6"]		= $this->rp6_model->displaySelectedData($cond_rp6);

		$cond_suspect 		= array("id_suspect"=>$data["rp6"][0]["suspect_id"]);
		$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);			

		$data["content"] 	= "form.rt2.php";
		$this->load->view($this->route, $data);
	}	

	public function view($id)
	{	
		$cond = array("id_rt2"=>$id);			
		$data["value"]		= $this->rt2_model->displaySelectedData($cond);
		
		$cond_rp6 		= array("id_rp6"=>$data["value"][0]["rp6_id"]);
		$data["rp6"]	= $this->rp6_model->displaySelectedData($cond_rp6);

		$cond_suspect 		= array("id_suspect"=>$data["rp6"][0]["suspect_id"]);
		$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);			

		$data["content"] 	= "case.rt2.php";
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
	
			$data["value"]	= $this->rt2_model->displayBetweenData($start, $finish);
			
            //load PHPExcel library
			$this->load->library('Excel');
			 
			// Create new PHPExcel object
			$objPHPExcel = new PHPExcel();
			
			// Add some data
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A1', 'No Urut')
						->setCellValue('B1', 'No/Tgl KETETAPAN PERPANJANGAN PENAHANAN')
						->setCellValue('C1', "IDENTITAS TERSANGKA\nNama Lengkap, Tempat Tgl Lahir, Jenis Kelamin, Kewarganegaraan,\n Tempat Tinggal, Agama, Pekerjaan, Pendidikan")
						->setCellValue('D1', 'Pasal yang Disangkakan')						
						->setCellValue('E1', 'SURAT PERINTAH PENAHANAN PENYIDIK')
						->setCellValue('E2', 'Nomor/Tanggal')
						->setCellValue('F2', 'Tanggal Mulai Ditahan')						
						->setCellValue('G1', "PERPANJANG PENAHANAN DARI PENUNTUT UMUM\nMulai Tanggal sampai dengan Tanggal")
						->setCellValue('H1', "Ditangguhkan Penahanan oleh Penyidik\nMulai Tanggal")
						->setCellValue('I1', 'Keterangan')
						;
			$i=3;
			foreach($data['value'] as $no=>$val)
			{
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$i, $no+1)
						->setCellValue('B'.$i, $this->id_date($val["tgl_rt2"])."\n".$val["no_ketetapan"])
						->setCellValue('C'.$i, $val["name_suspect"].", ".$val["birthplace"].", ".$this->id_date($val["birthdate"]).", ".$val["gender"].", ".$val["nationality"]."\n".$val["address"].", ".$val["religion"].", ".$val["job"].", ".$val["education"])						
						->setCellValue('D'.$i, $val["pasal"])	
						->setCellValue('E'.$i, $val["sp3_no"]."\n".$this->id_date($val["sp3_tgl"]))
						->setCellValue('F'.$i, $this->id_date($val["sp3_tgl_ditahan"]))
						->setCellValue('G'.$i, $this->id_date($val["pp_dari_pu_mulai"])." - ".$this->id_date($val["pp_dari_pu_sampai"]))						
						->setCellValue('H'.$i, $this->id_date($val["ditangguhkan_mulai"]))
						->setCellValue('I'.$i, $val["keterangan_rt2"])
						;
			$i++;
			}
			// Calculate the column widths
			for ($i = 'A'; $i !== 'J'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);
			}
			$objPHPExcel->getActiveSheet()->calculateColumnWidths();
			
			// Set setAutoSize(false) so that the widths are not recalculated
			for ($i = 'A'; $i !== 'J'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(false);
			}
			
			//Centering Content
			$objPHPExcel->getActiveSheet()
						->getStyle('A1:I1')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
			$objPHPExcel->getActiveSheet()
						->getStyle('A2:I2')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
						
			$objPHPExcel->getActiveSheet()
						->getStyle('A3:I'.$objPHPExcel->getActiveSheet()->getHighestRow())
						->getAlignment()
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);	
			//Merge Cell						
			$objPHPExcel->getActiveSheet()
						->mergeCells('A1:A2')
						->mergeCells('B1:B2')
						->mergeCells('C1:C2')
						->mergeCells('D1:D2')
						->mergeCells('E1:F1')
						->mergeCells('G1:G2')
						->mergeCells('H1:H2')
						->mergeCells('I1:I2')
						;
			
			
			//there is the loops for data
			 
			// Rename worksheet (worksheet, not filename)
			$objPHPExcel->getActiveSheet()->setTitle('Register Tahanan 2');
			 
			// Set active sheet index to the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			 
			ob_end_clean();
			
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Register Tahanan 2 ('.$mulai.' - '.$akhir.').xls"');
			header('Cache-Control: max-age=0');
			
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
        }

	public function save()
	{
		//Case RP6
		$rp6_id 				= $this->input->post("rp6_id");
		$suspect_id 			= $this->input->post("suspect_id");
		
		$id_rt2 				= $this->input->post("id_rt2");
		$register_rt2 			= $this->input->post("register_rt2");
		
		$tgl_rt2 				= $this->input->post("tgl_rt2");
		if($tgl_rt2 != null){
				$tgl_rt2 		= str_replace('/', '-', $tgl_rt2);
				$tgl_rt2 		= date("Y-m-d", strtotime($tgl_rt2));	
		}else{	$tgl_rt2 		= '';}
		
		$no_ketetapan 			= $this->input->post("no_ketetapan");
		$no_sp3	 				= $this->input->post("no_sp3");
		
		$tgl_sp3	 			= $this->input->post("tgl_sp3");
		$lama_sp3	 			= $this->input->post("lama_sp3");
		$pp_mulai	 			= $this->input->post("pp_mulai");
		$pp_akhir	 			= $this->input->post("pp_akhir");
		$penangguhan	 		= $this->input->post("penangguhan");

		if($tgl_sp3 != null){
				$tgl_sp3 		= str_replace('/', '-', $tgl_sp3);
				$tgl_sp3 		= date("Y-m-d", strtotime($tgl_sp3));	
		}else{	$tgl_sp3 		= '';}

		if($lama_sp3 != null){
				$lama_sp3 		= str_replace('/', '-', $lama_sp3);
				$lama_sp3 		= date("Y-m-d", strtotime($lama_sp3));	
		}else{	$lama_sp3 		= '';}

		if($pp_mulai != null){
				$pp_mulai 		= str_replace('/', '-', $pp_mulai);
				$pp_mulai 		= date("Y-m-d", strtotime($pp_mulai));	
		}else{	$pp_mulai 		= '';}

		if($pp_akhir != null){
				$pp_akhir 		= str_replace('/', '-', $pp_akhir);
				$pp_akhir 		= date("Y-m-d", strtotime($pp_akhir));	
		}else{	$pp_akhir 		= '';}

		if($penangguhan != null){
				$penangguhan 		= str_replace('/', '-', $penangguhan);
				$penangguhan 		= date("Y-m-d", strtotime($penangguhan));	
		}else{	$penangguhan 		= '';}
		$keterangan_rt2					= $this->input->post("keterangan_rt2");

		$data_rt2 = array(
			"register_rt2" 			=> $register_rt2,
			"tgl_rt2" 				=> $tgl_rt2,
			"no_ketetapan" 			=> $no_ketetapan,
			"rp6_id"				=> $rp6_id,
			"sp3_no" 				=> $no_sp3,
			"sp3_tgl"				=> $tgl_sp3,
			"sp3_tgl_ditahan"		=> $lama_sp3,
			"pp_dari_pu_mulai"		=> $pp_mulai,
			"pp_dari_pu_sampai"		=> $pp_akhir,
			"ditangguhkan_mulai"	=> $penangguhan,
			"keterangan_rt2" 			=> $keterangan_rt2
		);
		
		$where = array(
			"id_rt2"=>$id_rt2
		);

		if( $id_rt2 != null ):
			$result = $this->rt2_model->update($data_rt2, $where);
		else:
			$result = $this->rt2_model->insert($data_rt2);
		endif;
		
		if( $result ):
			redirect("rt2");
		else:
			echo "Gagal";
		endif;
	}

	public function delete($id)
	{
		$where = array(
			"id_rt2"=>$id
		);

		$where_suspect = array('id_suspect' => $id_suspect );
		
		if( $id != "" ):
			$result = $this->rt2_model->delete($where);
			$result2 = $this->suspect_model->delete($where_suspect);
		endif;
		
		if( $result ):
			redirect("rt2");
		else:
			echo "Gagal";
		endif;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */