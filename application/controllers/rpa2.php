<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rpa2 extends CI_Controller {
	
	public $route = "index.php";
	private $class = "rpa2";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
		$this->load->model("Rpa2_Model");
		$this->load->model("Rpa1_Model");
		$this->load->model("Suspect_Model");
		$this->load->model("attorney_model");
	}
	public function index()
	{		
		$case = $this->Rpa2_Model->displayAll();
		/*echo '<pre>';
		print_r($case);
		echo '</pre>';exit;*/
		$data["case"] = $case; 
		$data["class"] = $this->class;

		$data["content"] = "main.rpa2.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond = array("rpa2.rpa1_id"=>$id);			
		$data["value"]		= $this->Rpa2_Model->displaySelectedData($cond);
		
		$cond_rpa1 = array("id_rpa1"=>$id);			
		$data["rpa1"]		= $this->Rpa1_Model->displaySelectedData($cond_rpa1);

		if(!empty($data["rpa1"])){
			$cond_suspect 		= array("id_suspect"=>$data["rpa1"][0]["suspect_id"]);
			$data["suspect"]	= $this->Suspect_Model->displaySelectedData($cond_suspect);			

		}
		
		$data["content"] 	= "form.rpa2.php";
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
	
			$data["value"]	= $this->Rpa2_Model->displayBetweenData($start, $finish);
			
            //load PHPExcel library
			$this->load->library('Excel');
			 
			// Create new PHPExcel object
			$objPHPExcel = new PHPExcel();
			
			// Add some data
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A1', 'No')
						->setCellValue('B1', "1. No/Tgl P-16\n2. Nama Penuntut Umum")
						->setCellValue('C1', "No Reg Perkara")
						->setCellValue('D1', "No/Tgl Pelimpahan\nke PN")
						->setCellValue('E1', "Penahanan")
						->setCellValue('E2', "No/Tgl Penahanan")
						->setCellValue('F2', "No/Tgl Perpanjangan Penahanan")
						->setCellValue('G1', 'Tuntutan')
						->setCellValue('G2', "No/Tgl Surat Tuntutan")
						->setCellValue('H2', 'Isi Tuntutan')
						->setCellValue('I1', 'Putusan Pengadilan Negeri')
						->setCellValue('I2', 'No/Tgl Putusan PN')
						->setCellValue('J2', 'Amar Putusan PN')
						->setCellValue('K1', 'Upaya Hukum')
						->setCellValue('K2', 'Jenis/Tgl Upaya Hukum')
						->setCellValue('L2', 'Amar Putusan PT/MA')						
						->setCellValue('M1', 'Keterangan')						
						;
			//there is the loops for data
			$i=3;
			foreach($data['value'] as $no=>$val)
			{
				$cond_attorney 		= array("rpa1_id"=>$val["rpa1_id"]);
				$attorney			= $this->attorney_model->displayDataJaksaRpa1($cond_attorney);
				$jaksa = '';
				foreach($attorney as $nox=>$valx)
				{
					$jaksa .= $valx["name_attorney"]."\n";
				}
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$i, $no+1)
						->setCellValue('B'.$i, "1. ".$val["no_p16"]."\n".$this->id_date($val["tgl_p16"])."\n2. ".$jaksa)						
						->setCellValue('C'.$i, $val["register_rpa1"])
						->setCellValue('D'.$i, $val["no_pn"]."\n".$this->id_date($val["tgl_pn"]))
						->setCellValue('E'.$i, $val["no_penahanan"]."\n".$this->id_date($val["tgl_penahanan"]))
						->setCellValue('F'.$i, $val["no_perpanjangan"]."\n".$this->id_date($val["tgl_perpanjangan"]))
						->setCellValue('G'.$i, $val["no_tuntutan"]."\n".$this->id_date($val["tgl_tuntutan"]))						
						->setCellValue('H'.$i, $val["isi_tuntutan"])
						->setCellValue('I'.$i, $val["no_putusan_pn"]."\n".$this->id_date($val["tgl_putusan_pn"]))
						->setCellValue('J'.$i, $val["putusan_pn"])
						->setCellValue('K'.$i, $val["jenis_upaya_hukum"]."\n".$this->id_date($val["tgl_upaya_hukum"]))
						->setCellValue('L'.$i, $val["putusan_pt_ma"])
						->setCellValue('M'.$i, $val["keterangan_rpa2"])
						;
				$i++;
			}
			
			// Calculate the column widths
			for ($i = 'A'; $i !== 'N'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);
			}
			$objPHPExcel->getActiveSheet()->calculateColumnWidths();
			
			// Set setAutoSize(false) so that the widths are not recalculated
			for ($i = 'A'; $i !== 'N'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(false);
			}
			
			//Centering Content
			$objPHPExcel->getActiveSheet()
						->getStyle('A1:N1')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
			$objPHPExcel->getActiveSheet()
						->getStyle('A2:N2')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()
						->getStyle('A3:N'.$objPHPExcel->getActiveSheet()->getHighestRow())
						->getAlignment()
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);	
			
			$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(50);
			$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(50);
			$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(50);

			 //Merge Cell						
			$objPHPExcel->getActiveSheet()
						->mergeCells('A1:A2')
						->mergeCells('B1:B2')
						->mergeCells('C1:C2')
						->mergeCells('D1:D2')
						->mergeCells('E1:F1')
						->mergeCells('G1:H1')
						->mergeCells('I1:J1')
						->mergeCells('K1:L1')
						->mergeCells('M2:M2')
						;
			// Rename worksheet (worksheet, not filename)
			$objPHPExcel->getActiveSheet()->setTitle('Register Perkara Anak 2');
			 
			// Set active sheet index to the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			 
			ob_end_clean();
			
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Register Perkara Anak 2 ('.$mulai.' - '.$akhir.').xls"');
			header('Cache-Control: max-age=0');
			
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
        }

	public function save()
	{
		$data_rpa2 = array(
			"register_rpa2" 			=> $this->input->post("register_rpa2"),
			"rpa1_id" 					=> $this->input->post("rpa1_id"),
			"tgl_rpa2" 					=> $this->ddate($this->input->post("tgl_rpa2")),
			"no_pn" 					=> $this->input->post("no_pn"),
			"tgl_pn"					=> $this->ddate($this->input->post("tgl_pn")),
			"no_tuntutan"				=> $this->input->post("no_tuntutan"),
			"tgl_tuntutan"				=> $this->ddate($this->input->post("tgl_tuntutan")),
			"isi_tuntutan"				=> $this->input->post("isi_tuntutan"),
			"no_putusan_pn"				=> $this->input->post("no_putusan_pn"),
			"tgl_putusan_pn"			=> $this->ddate($this->input->post("tgl_putusan_pn")),
			"putusan_pn"				=> $this->input->post("putusan_pn"),
			"jenis_upaya_hukum"			=> $this->input->post("jenis_upaya_hukum"),
			"tgl_upaya_hukum"			=> $this->ddate($this->input->post("tgl_upaya_hukum")),
			"putusan_pt_ma"				=> $this->input->post("putusan_pt_ma"),
			"keterangan_rpa2"			=> $this->input->post("keterangan_rpa2")
		);
		
		$id_rpa2 = $this->input->post("id_rpa2");
		
		$where = array(
			"id_rpa2"=>$id_rpa2
		);

		if( $id_rpa2 != null ):
			$result = $this->Rpa2_Model->update($data_rpa2, $where);
		else:
			$result = $this->Rpa2_Model->insert($data_rpa2);
		endif;
		
		
		if( $result ):
			redirect("rpa2");
		else:
			echo "Gagal";
		endif;
	}

	public function delete($id,$id_suspect)
	{
		$where = array(
			"id_rpa2"=>$id
		);

		$where_attorney = array('rpa2_id' => $id );
		
		if( $id != "" ):
			$result = $this->Rpa2_Model->delete($where);
		endif;
		
		if( $result ):
			redirect("rpa2");
		else:
			echo "Gagal";
		endif;
	}
}
