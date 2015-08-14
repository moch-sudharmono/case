<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rt3 extends CI_Controller {
	
	public $route = "index.php";
	private $class = "rt3";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
		$this->load->model("rt3_model");
		$this->load->model("rp12_model");
		$this->load->model("rp9_model");
		$this->load->model("rp7_model");
		$this->load->model("rp6_model");
		$this->load->model("suspect_model");
		$this->load->model("attorney_model");
		$this->load->library('pagination_lib');
	}
	public function index()
	{		
		$case = $this->rt3_model->displayAllCase();

		$data["case"] = $case; 
		$data["class"] = $this->class;

		$data["content"] = "main.rt3.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond_rp12 			= array("id_rp12"=>$id);			
		$data["rp12"]		= $this->rp12_model->displaySelectedData($cond_rp12);

		$cond_rt9 			= array("id_rp9"=>$data["rp12"][0]["rp9_id"]);			
		$data["rp9"]		= $this->rp9_model->displaySelectedData($cond_rt9);

		$cond_rp7 			= array("id_rp7"=>$data["rp9"][0]["rp7_id"]);
		$data["rp7"]		= $this->rp7_model->displaySelectedData($cond_rp7);

		$cond_rp6 			= array("id_rp6"=>$data["rp7"][0]["rp6_id"]);
		$data["rp6"]		= $this->rp6_model->displaySelectedData($cond_rp6);

		$cond_rt3 			= array("rp12_id"=>$data["rp12"][0]["id_rp12"]);			
		$data["rt3"]		= $this->rt3_model->displaySelectedData($cond_rt3);

		$cond_attorney		= array("id_attorney"=>$data["rp9"][0]["jpu1"]);
		$data["attorney1"]	= $this->attorney_model->displaySelectedData($cond_attorney);
		
		$cond_attorney2		= array("id_attorney"=>$data["rp9"][0]["jpu2"]);
		$data["attorney2"]	= $this->attorney_model->displaySelectedData($cond_attorney2);	

		$cond_suspect 		= array("id_suspect"=>$data["rp6"][0]["suspect_id"]);
		$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);	
		
		$data["content"] 	= "form.rt3.php";
		$this->load->view($this->route, $data);
	}	

	public function view($id)
	{	
		$cond = array("Id_Rt3"=>$id);			
		$data["value"]		= $this->rt3_model->displaySelectedData($cond);
		
		$data["attorney"]	= $this->attorney_model->displayAll();

		$cond_suspect 		= array("id_suspect"=>$data["value"][0]["suspect_id"]);
		$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);			

		$data["content"] 	= "case.rt3.php";
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
	
			$data["value"]	= $this->rt3_model->displayBetweenData($start, $finish);
			
            //load PHPExcel library
			$this->load->library('Excel');
			 
			// Create new PHPExcel object
			$objPHPExcel = new PHPExcel();
			
			// Add some data
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A1', 'No')
						->setCellValue('B1', "No & Tgl \n(RP-12)")
						->setCellValue('C1', 'Jaksa Penuntut Umum')
						->setCellValue('D1', "TERDAKWA/TERPIDANA\nNama Lengkap, Tempat Tgl Lahir, Jenis Kelamin, Kewarganegaraan,\n Tempat Tinggal, Agama, Pekerjaan, Pendidikan")
						->setCellValue('E1', 'Pasal yang Didakwakan')
						->setCellValue('F1', 'STATUS TAHANAN')
						->setCellValue('F2', 'TAHAP PENYIDIKAN')
						->setCellValue('F3', "Jenis Tahanan/\nTgl Berita Acara")
						->setCellValue('G3', 'Lama Ditahan')
						->setCellValue('H2', 'TAHAP PENUNTUTAN')
						->setCellValue('H3', "Jenis Tahanan/\nTgl Berita Acara")
						->setCellValue('I3', "Pengalihan/\nTgl Berita Acara")
						->setCellValue('J3', "Penangguhan/\nTgl Berita Acara")
						->setCellValue('K3', "Pencabutan/\nTgl Berita Acara")
						->setCellValue('L3', "Dikeluarkan/\nTgl Berita Acara")
						->setCellValue('M3', 'Diperpanjang Ketua PN')
						->setCellValue('N2', 'PENGADILAN NEGERI')
						->setCellValue('N3', "No/Tgl Penetapan\n BA Pelaksanaan")
						->setCellValue('O3', 'Lama Ditahan')
						->setCellValue('P2', 'PENGADILAN TINGGI')
						->setCellValue('P3', "No/Tgl Penetapan\n BA Pelaksanaan")
						->setCellValue('Q3', 'Lama Ditahan')
						->setCellValue('R2', 'MAHKAMAH AGUNG')
						->setCellValue('R3', "No/Tgl Penetapan\n BA Pelaksanaan")
						->setCellValue('S3', 'Lama Ditahan')
						->setCellValue('T1', 'AMAR PUTUSAN TENTANG TAHANAN OLEH')
						->setCellValue('T2', 'PN No/Tgl')
						->setCellValue('U2', 'PT No/Tgl')
						->setCellValue('V2', 'MA No/Tgl')
						->setCellValue('W1', 'Putusan Dilaksanakan')
						->setCellValue('X1', 'Keterangan')
						;
			
			$i=4;
			foreach($data['value'] as $no=>$val)
			{
				$cond_attorney 		= array("rp9_id"=>$val["id_rp9"]);
				$attorney			= $this->attorney_model->displayDataJaksaRp9($cond_attorney);
				$jaksa = '';
				foreach($attorney as $nox=>$valx)
				{
					$jaksa .= $valx["name_attorney"]."\n";
				}
			
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$i, $no+1)
						->setCellValue('B'.$i, $val["register_rp12"]."\n".$this->id_date($val["tgl_rp12"]))
						->setCellValue('C'.$i, $jaksa)
						->setCellValue('D'.$i, $val["name_suspect"].", ".$val["birthplace"].", ".$this->id_date($val["birthdate"]).", ".$val["gender"].", ".$val["nationality"]."\n".$val["address"].", ".$val["religion"].", ".$val["job"].", ".$val["education"])						

						->setCellValue('E'.$i, $val["pasal_dakwaan"])
						->setCellValue('F'.$i, $val["penyidikan_jenis"]."\n ".$this->id_date($val["penyidikan_tgl"]))
						->setCellValue('G'.$i, $val["penyidikan_lama"])
						->setCellValue('H'.$i, $val["penuntutan_jenis"]."\n ".$this->id_date($val["penuntutan_tgl"]))
						->setCellValue('I'.$i, $val["penuntutan_pengalihan"]."\n ".$this->id_date($val["penuntutan_pengalihan_tgl"]))
						->setCellValue('J'.$i, $val["penuntutan_penangguhan"]."\n ".$this->id_date($val["penuntutan_penangguhan_tgl"]))
						->setCellValue('K'.$i, $val["penuntutan_pencabutan"]."\n ".$this->id_date($val["penuntutan_pencabutan_tgl"]))
						->setCellValue('L'.$i, $val["penuntutan_dikeluarkan"]."\n ".$this->id_date($val["penuntutan_dikeluarkan_tgl"]))
						->setCellValue('M'.$i, $val["penuntutan_diperpanjang"]."\n ".$this->id_date($val["penuntutan_diperpanjang_tgl"]))
						->setCellValue('N'.$i, $val["pn_no"]."\n ".$this->id_date($val["pn_tgl"]))
						->setCellValue('O'.$i, $val["pn_lama_ditahan"])
						->setCellValue('P'.$i, $val["pt_no"]."\n ".$this->id_date($val["pt_tgl"]))
						->setCellValue('Q'.$i, $val["pt_lama_ditahan"])
						->setCellValue('R'.$i, $val["ma_no"]."\n ".$this->id_date($val["ma_tgl"]))
						->setCellValue('S'.$i, $val["ma_lama_ditahan"])
						->setCellValue('T'.$i, $val["amar_pn_no"]."\n ".$this->id_date($val["amar_pn_tgl"]))
						->setCellValue('U'.$i, $val["amar_pt_no"]."\n ".$this->id_date($val["amar_pt_tgl"]))
						->setCellValue('V'.$i, $val["amar_ma_no"]."\n ".$this->id_date($val["amar_ma_tgl"]))
						->setCellValue('W'.$i, $val["pelaksanaan_putusan"])
						->setCellValue('X'.$i, $val["keterangan_rt3"])
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
						->mergeCells('B1:B3')
						->mergeCells('C1:C3')
						->mergeCells('D1:D3')
						->mergeCells('E1:E3')
						->mergeCells('F1:S1')
						->mergeCells('F2:G2')
						->mergeCells('H2:M2')
						->mergeCells('N2:O2')
						->mergeCells('P2:Q2')
						->mergeCells('R2:S2')
						->mergeCells('T1:V1')
						->mergeCells('W1:W3')
						->mergeCells('X1:X3')						
						->mergeCells('T2:T3')
						->mergeCells('U2:U3')
						->mergeCells('V2:V3')
						;
			
			
			//there is the loops for data
			 
			// Rename worksheet (worksheet, not filename)
			$objPHPExcel->getActiveSheet()->setTitle('Register Tahanan 3');
			 
			// Set active sheet index to the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			 
			ob_end_clean();
			
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Register Tahanan 3 ('.$mulai.' - '.$akhir.').xls"');
			header('Cache-Control: max-age=0');
			
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
        }

	public function save()
	{
		$id_rt3 = $this->input->post('id_rt3');
		$data_rt3 = array(
			"rp12_id" 						=> $this->input->post('rp12_id'),
			"rp6_id" 						=> $this->input->post('rp6_id'),
			"register_rt3" 					=> $this->input->post('RegisterRT3'),
			"tgl_rt3" 						=> $this->dDate($this->input->post('tgl_rt3')),
			"penyidikan_jenis" 				=> $this->input->post('PenyidikanTahanan'),
			"penyidikan_tgl" 				=> $this->dDate($this->input->post('PenyidikanTgl')),
			"penyidikan_lama"				=> $this->input->post('LamaTahanan'),
			"penuntutan_jenis"				=> $this->input->post('PenuntutanTahanan'),
			"penuntutan_tgl" 				=> $this->dDate($this->input->post('PenuntutanTgl')),
			"penuntutan_pengalihan"			=> $this->input->post('Pengalihan'),
			"penuntutan_pengalihan_tgl" 	=> $this->dDate($this->input->post('PengalihanTgl')),
			"penuntutan_penangguhan"		=> $this->input->post('Penangguhan'),
			"penuntutan_penangguhan_tgl"	=> $this->dDate($this->input->post('PenangguhanTgl')),
			"penuntutan_pencabutan"			=> $this->input->post('Pencabutan'),
			"penuntutan_pencabutan_tgl"		=> $this->dDate($this->input->post('PencabutanTgl')),
			"penuntutan_dikeluarkan"		=> $this->input->post('Dikeluarkan'),
			"penuntutan_dikeluarkan_tgl"	=> $this->dDate($this->input->post('DikeluarkanTgl')),
			"penuntutan_diperpanjang"		=> $this->input->post('Perpanjang'),
			"penuntutan_diperpanjang_tgl"	=> $this->dDate($this->input->post('PerpanjangTgl')),
			"pn_tgl"						=> $this->dDate($this->input->post('PNTgl')),
			"pn_no"							=> $this->input->post('PNNo'),
			"pn_lama_ditahan"				=> $this->input->post('PNLama'),
			"pt_tgl"						=> $this->dDate($this->input->post('PTTgl')),
			"pt_no"							=> $this->input->post('PTNo'),
			"pt_lama_ditahan"				=> $this->input->post('PTLama'),
			"ma_tgl"						=> $this->dDate($this->input->post('MATgl')),
			"ma_no"							=> $this->input->post('MANo'),
			"ma_lama_ditahan"				=> $this->input->post('MALama'),
			"amar_pn_tgl"					=> $this->dDate($this->input->post('AmarPnTgl')),
			"amar_pn_no"					=> $this->input->post('AmarPnTgl'),
			"amar_pt_tgl" 					=> $this->dDate($this->input->post('AmarPtTgl')),
			"amar_pt_no"					=> $this->input->post('AmarPtNo'),
			"amar_ma_tgl"					=> $this->dDate($this->input->post('AmarMaTgl')),
			"amar_ma_no"					=> $this->input->post('AmarMaNo'),
			"pelaksanaan_putusan"			=> $this->input->post('Pelaksanaan'),
			"keterangan_rt3"				=> $this->input->post('keterangan_rt3')
		);
		/*
		echo '<pre>';
		echo $id_rt3;
		print_r($data_rt3);
		echo '</pre>';
		exit;
		*/
		$where = array(
			"id_rt3"=>$id_rt3
		);

		if( $id_rt3 != null ):
			$result = $this->rt3_model->update($data_rt3, $where);
		else:
			$result = $this->rt3_model->insert($data_rt3);
		endif;
		
		if( $result ):
			redirect("rt3");
		else:
			echo "Gagal";
		endif;
	}

	public function delete($id)
	{
		$where = array(
			"id_rt3"=>$id
		);

		if( $id != "" ):
			$result = $this->rt3_model->delete($where);
		endif;
		
		if( $result ):
			redirect("rt3");
		else:
			echo "Gagal";
		endif;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */