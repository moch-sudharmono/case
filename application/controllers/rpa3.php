<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rpa3 extends CI_Controller {
	
	public $route = "index.php";
	private $class = "rpa3";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
		$this->load->model("Rpa3_Model");
		$this->load->model("Rpa2_Model");
		$this->load->model("Rpa1_Model");
		$this->load->model("Suspect_Model");
		$this->load->model("attorney_model");
	}
	public function index()
	{		
		$case = $this->Rpa3_Model->displayAll();
		/*echo '<pre>';
		print_r($case);
		echo '</pre>';exit;*/
		$data["case"] = $case; 
		$data["class"] = $this->class;

		$data["content"] = "main.rpa3.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond = array("rpa3.rpa2_id"=>$id);			
		$data["value"]		= $this->Rpa3_Model->displaySelectedData($cond);
		
		$cond_rpa2 = array("id_rpa2"=>$id);			
		$data["rpa2"]		= $this->Rpa2_Model->displaySelectedData($cond_rpa2);
		
		$cond_rpa1 = array("id_rpa1"=>$data["rpa2"][0]["rpa1_id"]);			
		$data["rpa1"]		= $this->Rpa1_Model->displaySelectedData($cond_rpa1);

		if(!empty($data["rpa1"])){
			$cond_suspect 		= array("id_suspect"=>$data["rpa1"][0]["suspect_id"]);
			$data["suspect"]	= $this->Suspect_Model->displaySelectedData($cond_suspect);			

		}
		
		$data["content"] 	= "form.rpa3.php";
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
	
			$data["value"]	= $this->Rpa3_Model->displayBetweenData($start, $finish);
			
            //load PHPExcel library
			$this->load->library('Excel');
			 
			// Create new PHPExcel object
			$objPHPExcel = new PHPExcel();
			
			// Add some data
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A1', 'No')
						->setCellValue('B1', "1. No/Tgl P-16\n2. Nama Penuntut Umum")
						->setCellValue('C1', "No Reg Perkara")
						->setCellValue('D1', "No/Tgl Putusan\nPN/PT/MA")
						->setCellValue('E1', "Amar Putusan\nPN/PT/MA")
						->setCellValue('F1', "No/Tgl Eksekusi Anak")
						->setCellValue('G1', "No/Tgl Eksekusi Barang Bukti")
						->setCellValue('H1', "No/Tgl Eksekusi Biaya Perkara")
						->setCellValue('I1', 'Keterangan')						
						;
			//there is the loops for data
			$i=2;
			foreach($data['value'] as $no=>$val)
			{
				$cond_attorney 		= array("rpa1_id"=>$val["rpa1_id"]);
				$attorney			= $this->attorney_model->displayDataJaksaRpa1($cond_attorney);
				$jaksa = '';
				foreach($attorney as $nox=>$valx)
				{
					$jaksa .= $valx["name_attorney"]."\n";
				}
				
				$amar 		= isset($val["putusan_pn"])?$val["putusan_pn"]:$val["putusan_pt_ma"];
				$tgl_amar 	= isset($val["tgl_putusan_pn"])?$this->id_date($val["tgl_putusan_pn"]):$this->id_date($val["tgl_upaya_hukum"]);
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$i, $no+1)
						->setCellValue('B'.$i, "1. ".$val["no_p16"]."\n".$this->id_date($val["tgl_p16"])."\n2. ".$jaksa)						
						->setCellValue('C'.$i, $val["register_rpa1"])
						->setCellValue('D'.$i, $val["no_putusan_pn"]."\n".$tgl_amar)
						->setCellValue('E'.$i, $amar)
						->setCellValue('F'.$i, $val["no_eksekusi_anak"]."\n".$this->id_date($val["tgl_eksekusi_anak"]))
						->setCellValue('G'.$i, $val["no_eksekusi_bukti"]."\n".$this->id_date($val["tgl_eksekusi_bukti"]))
						->setCellValue('H'.$i, $val["no_eksekusi_biaya"]."\n".$this->id_date($val["tgl_eksekusi_biaya"]))
						->setCellValue('I'.$i, $val["keterangan_rpa3"])
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
						->getStyle('A2:I'.$objPHPExcel->getActiveSheet()->getHighestRow())
						->getAlignment()
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);	
			
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
			$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(50);

			
			// Rename worksheet (worksheet, not filename)
			$objPHPExcel->getActiveSheet()->setTitle('Register Perkara Anak 3');
			 
			// Set active sheet index to the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			 
			ob_end_clean();
			
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Register Perkara Anak 3('.$mulai.' - '.$akhir.').xls"');
			header('Cache-Control: max-age=0');
			
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
        }

	public function save()
	{
		$data_rpa3 = array(
			"register_rpa3" 			=> $this->input->post("register_rpa3"),
			"rpa2_id" 					=> $this->input->post("rpa2_id"),
			"tgl_rpa3" 					=> $this->ddate($this->input->post("tgl_rpa3")),
			"no_eksekusi_anak" 			=> $this->input->post("no_eksekusi_anak"),
			"tgl_eksekusi_anak"			=> $this->ddate($this->input->post("tgl_eksekusi_anak")),
			"no_eksekusi_bukti"			=> $this->input->post("no_eksekusi_bukti"),
			"tgl_eksekusi_bukti"		=> $this->ddate($this->input->post("tgl_eksekusi_bukti")),
			"no_eksekusi_biaya"			=> $this->input->post("no_eksekusi_biaya"),
			"tgl_eksekusi_biaya"		=> $this->ddate($this->input->post("tgl_eksekusi_biaya")),
			"keterangan_rpa3"			=> $this->input->post("keterangan_rpa3")
		);
		
		$id_rpa3 = $this->input->post("id_rpa3");
		
		$where = array(
			"id_rpa3"=>$id_rpa3
		);

		if( $id_rpa3 != null ):
			$result = $this->Rpa3_Model->update($data_rpa3, $where);
		else:
			$result = $this->Rpa3_Model->insert($data_rpa3);
		endif;
		
		
		if( $result ):
			redirect("rpa3");
		else:
			echo "Gagal";
		endif;
	}

	public function delete($id,$id_suspect)
	{
		$where = array(
			"id_rpa3"=>$id
		);

		$where_attorney = array('rpa3_id' => $id );
		
		if( $id != "" ):
			$result = $this->Rpa3_Model->delete($where);
		endif;
		
		if( $result ):
			redirect("rpa3");
		else:
			echo "Gagal";
		endif;
	}
}
