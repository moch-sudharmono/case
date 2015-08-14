<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rpa4 extends CI_Controller {
	
	public $route = "index.php";
	private $class = "rpa4";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
		$this->load->model("Rpa4_Model");
		$this->load->model("Rpa3_Model");
		$this->load->model("Rpa2_Model");
		$this->load->model("Rpa1_Model");
		$this->load->model("Suspect_Model");
		$this->load->model("attorney_model");
	}
	public function index()
	{		
		$case = $this->Rpa4_Model->displayAll();
		$data["case"] = $case; 
		$data["class"] = $this->class;

		$data["content"] = "main.rpa4.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond = array("rpa4.rpa3_id"=>$id);			
		$data["value"]		= $this->Rpa4_Model->displaySelectedData($cond);
		
		$cond_rpa3 = array("id_rpa3"=>$id);			
		$data["rpa3"]		= $this->Rpa3_Model->displaySelectedData($cond_rpa3);
		
		$cond_rpa2 = array("id_rpa2"=>$id);			
		$data["rpa2"]		= $this->Rpa2_Model->displaySelectedData($cond_rpa2);
		
		$cond_rpa1 = array("id_rpa1"=>$data["rpa2"][0]["rpa1_id"]);			
		$data["rpa1"]		= $this->Rpa1_Model->displaySelectedData($cond_rpa1);

		if(!empty($data["rpa1"])){
			$cond_suspect 		= array("id_suspect"=>$data["rpa1"][0]["suspect_id"]);
			$data["suspect"]	= $this->Suspect_Model->displaySelectedData($cond_suspect);			

		}
		
		$data["content"] 	= "form.rpa4.php";
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
	
			$data["value"]	= $this->Rpa4_Model->displayBetweenData($start, $finish);
			
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
						->setCellValue('E1', "Jenis & Jumlah\nBarang Bukti")
						->setCellValue('F1', "1. No/Tgl P-16\n2. Nama Penuntut Umum")						
						->setCellValue('G1', "Diversi Penyidik")
						->setCellValue('G2', "Hasil Kesepakatan")						
						->setCellValue('H2', "No/Tgl TAP\nKetua PN")						
						->setCellValue('I1', "No/Tgl SP-3")
						->setCellValue('J1', "Tgl Terima Berkas")
						->setCellValue('K1', "Laporan Penelitian\nKemasyarakatan")
						->setCellValue('L1', "Diversi Penuntut Umum")
						->setCellValue('L2', 'Tgl Diversi')
						->setCellValue('M2', 'Pihak Diversi')
						->setCellValue('N2', "No/Tgl Hasil\nKesepakatan")
						->setCellValue('O2', "No/Tgl TAP\nKetua PN")
						->setCellValue('P1', 'No/Tgl S.K.P.P')
						->setCellValue('Q1', 'No/Tgl Pelimpahan ke PN')
						->setCellValue('R1', "Diversi Penyidik")
						->setCellValue('R2', "Hasil Kesepakatan")						
						->setCellValue('S2', "No/Tgl TAP\nKetua PN")
						->setCellValue('T1', 'No/Tgl S.K.P.P')
						->setCellValue('U1', 'Keterangan')						
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
						->setCellValue('B'.$i, "1. ".$val["no_spdp"]."\n".$this->id_date($val["tgl_spdp"])."\n2. ".$this->id_date($val["tgl_spdp_diterima"]))
						->setCellValue('C'.$i, "1. ".$val["name_suspect"].", ".$val["birthplace"].", ".$this->id_date($val["birthdate"]).", ".$val["gender"].", ".$val["nationality"]."\n".$val["address"].", ".$val["religion"].", ".$val["job"].", ".$val["education"]."\n2. ".$val["pasal_tindak_pidana"])
						->setCellValue('D'.$i, $val["kasus_posisi"])
						->setCellValue('E'.$i, $val["jenis_jumlah_bukti"])
						->setCellValue('F'.$i, "1. ".$val["no_p16"]."\n".$this->id_date($val["tgl_p16"])."\n2. ".$jaksa)						
						->setCellValue('G'.$i, $val["diversi_kesepakatan_penyidik"])
						->setCellValue('H'.$i, $val["no_tap_ketua_pn_penyidik"]."\n".$this->id_date($val["tgl_tap_ketua_pn_penyidik"]))						
						->setCellValue('I'.$i, $val["no_sp3"]."\n".$this->id_date($val["tgl_sp3"]))
						->setCellValue('J'.$i, $this->id_date($val["tgl_terima_berkas"]))
						->setCellValue('K'.$i, $val["lap_penelitian_kemasyarakatan"])						
						->setCellValue('L'.$i, $this->id_date($val["tgl_diversi_pu"]))
						->setCellValue('M'.$i, $val["pihak_diversi_pu"])
						->setCellValue('N'.$i, $val["no_kesepakatan_pu"]."\n".$this->id_date($val["tgl_kesepakatan_pu"]))						
						->setCellValue('O'.$i, $val["no_tap_ketua_pn_pu"]."\n".$this->id_date($val["tgl_tap_ketua_pn_pu"]))
						->setCellValue('P'.$i, $val["no_skpp_pu"]."\n".$this->id_date($val["tgl_skpp_pu"]))
						->setCellValue('Q'.$i, $val["no_pelimpahan_pn"]."\n".$this->id_date($val["tgl_pelimpahan_pn"]))
						->setCellValue('R'.$i, $val["diversi_kesepakatan_hakim"])
						->setCellValue('S'.$i, $val["no_tap_ketua_pn_hakim"]."\n".$this->id_date($val["tgl_tap_ketua_pn_hakim"]))
						->setCellValue('T'.$i, $val["no_skpp_hakim"]."\n".$this->id_date($val["tgl_skpp_hakim"]))
						->setCellValue('U'.$i, $val["keterangan_rpa4"])
						;
				$i++;
			}
			
			// Calculate the column widths
			for ($i = 'A'; $i !== 'V'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);
			}
			$objPHPExcel->getActiveSheet()->calculateColumnWidths();
			
			// Set setAutoSize(false) so that the widths are not recalculated
			for ($i = 'A'; $i !== 'V'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(false);
			}
			
			//Centering Content
			$objPHPExcel->getActiveSheet()
						->getStyle('A1:U1')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
			$objPHPExcel->getActiveSheet()
						->getStyle('A2:U2')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()
						->getStyle('A3:U'.$objPHPExcel->getActiveSheet()->getHighestRow())
						->getAlignment()
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);	
			
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
			$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(50);
			$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(50);
			$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(50);

			 //Merge Cell						
			$objPHPExcel->getActiveSheet()
						->mergeCells('A1:A2')
						->mergeCells('B1:B2')
						->mergeCells('C1:C2')
						->mergeCells('D1:D2')
						->mergeCells('E1:E2')
						->mergeCells('F1:F2')
						->mergeCells('G1:H1')
						->mergeCells('I1:I2')
						->mergeCells('J1:J2')
						->mergeCells('K1:K2')
						->mergeCells('L1:O1')
						->mergeCells('P1:P2')
						->mergeCells('Q1:Q2')
						->mergeCells('R1:S1')
						->mergeCells('T1:T2')
						->mergeCells('U1:U2')
						;
			// Rename worksheet (worksheet, not filename)
			$objPHPExcel->getActiveSheet()->setTitle('Register Perkara Anak 4');
			 
			// Set active sheet index to the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			 
			ob_end_clean();
			
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Register Perkara Anak 4 ('.$mulai.' - '.$akhir.').xls"');
			header('Cache-Control: max-age=0');
			
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
        }

	public function save()
	{
		$data_rpa4 = array(
			"register_rpa4" 				=> $this->input->post("register_rpa4"),
			"rpa3_id" 						=> $this->input->post("rpa3_id"),
			"tgl_rpa4" 						=> $this->ddate($this->input->post("tgl_rpa4")),
			"diversi_kesepakatan_penyidik" 	=> $this->input->post("diversi_kesepakatan_penyidik"),
			"no_tap_ketua_pn_penyidik" 		=> $this->input->post("no_tap_ketua_pn_penyidik"),
			"tgl_tap_ketua_pn_penyidik"		=> $this->ddate($this->input->post("tgl_tap_ketua_pn_penyidik")),
			"no_sp3"						=> $this->input->post("no_sp3"),
			"tgl_sp3"						=> $this->ddate($this->input->post("tgl_sp3")),
			"lap_penelitian_kemasyarakatan"	=> $this->input->post("lap_penelitian_kemasyarakatan"),
			"tgl_terima_berkas"				=> $this->ddate($this->input->post("tgl_terima_berkas")),
			"pihak_diversi_pu"				=> $this->input->post("pihak_diversi_pu"),
			"tgl_diversi_pu"				=> $this->ddate($this->input->post("tgl_diversi_pu")),
			"no_kesepakatan_pu"				=> $this->input->post("no_kesepakatan_pu"),
			"tgl_kesepakatan_pu"			=> $this->ddate($this->input->post("tgl_kesepakatan_pu")),
			"no_tap_ketua_pn_pu"			=> $this->input->post("no_tap_ketua_pn_pu"),
			"tgl_tap_ketua_pn_pu"			=> $this->ddate($this->input->post("tgl_tap_ketua_pn_pu")),
			"no_skpp_pu"					=> $this->input->post("no_skpp_pu"),
			"tgl_skpp_pu"					=> $this->ddate($this->input->post("tgl_skpp_pu")),
			"no_pelimpahan_pn"				=> $this->input->post("no_pelimpahan_pn"),
			"tgl_pelimpahan_pn"				=> $this->ddate($this->input->post("tgl_pelimpahan_pn")),
			"diversi_kesepakatan_hakim"		=> $this->input->post("diversi_kesepakatan_hakim"),
			"no_tap_ketua_pn_hakim"			=> $this->input->post("no_tap_ketua_pn_hakim"),
			"tgl_tap_ketua_pn_hakim"		=> $this->ddate($this->input->post("tgl_tap_ketua_pn_hakim")),
			"no_skpp_hakim"					=> $this->input->post("no_skpp_hakim"),
			"tgl_skpp_hakim"				=> $this->ddate($this->input->post("tgl_skpp_hakim")),
			"keterangan_rpa4"				=> $this->input->post("keterangan_rpa4")
		);
		
		$id_rpa4 = $this->input->post("id_rpa4");
		
		$where = array(
			"id_rpa4"=>$id_rpa4
		);

		if( $id_rpa4 != null ):
			$result = $this->Rpa4_Model->update($data_rpa4, $where);
		else:
			$result = $this->Rpa4_Model->insert($data_rpa4);
		endif;
		
		
		if( $result ):
			redirect("rpa4");
		else:
			echo "Gagal";
		endif;
	}

	public function delete($id,$id_suspect)
	{
		$where = array(
			"id_rpa4"=>$id
		);

		$where_attorney = array('rpa4_id' => $id );
		
		if( $id != "" ):
			$result = $this->Rpa4_Model->delete($where);
		endif;
		
		if( $result ):
			redirect("rpa4");
		else:
			echo "Gagal";
		endif;
	}
}
