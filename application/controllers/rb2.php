<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rb2 extends CI_Controller {
	
	public $route = "index.php";
	private $class = "rb2";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
		$this->load->model("rb2_model");
		$this->load->model("rp9_model");
		$this->load->model("rp7_model");
		$this->load->model("rp6_model");
		$this->load->model("suspect_model");
		$this->load->model("attorney_model");
	}
	public function index()
	{		
		$case = $this->rb2_model->displayAllCase();

		$data["case"] = $case; 
		$data["class"] = $this->class;

		$data["content"] = "main.rb2.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond 				= array("id_rp9"=>$id);			
		$data["rp9"]		= $this->rp9_model->displaySelectedData($cond);

		$cond_rp7 			= array("id_rp7"=>$data["rp9"][0]["rp7_id"]);			
		$data["rp7"]		= $this->rp7_model->displaySelectedData($cond_rp7);

		$cond_rp6 			= array("id_rp6"=>$data["rp7"][0]["rp6_id"]);
		$data["rp6"]		= $this->rp6_model->displaySelectedData($cond_rp6);

		$cond_rb2 			= array("rp9_id"=>$id);
		$data["rb2"]		= $this->rb2_model->displaySelectedData($cond_rb2);

		$cond_attorney		= array("rp9_id"=>$id);
		$data["attorney"]	= $this->attorney_model->displayDataJaksaRp9($cond_attorney);

		$cond_suspect 		= array("id_suspect"=>$data["rp6"][0]["suspect_id"]);
		$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);	

		$data["content"] 	= "form.rb2.php";
		$this->load->view($this->route, $data);
	}	

	public function view($id)
	{	
		$cond = array("Id_Rb2"=>$id);			
		$data["value"]		= $this->rb2_model->displaySelectedData($cond);

		$cond_suspect 		= array("id_suspect"=>$data["value"][0]["suspect_id"]);
		$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);			

		$data["content"] 	= "case.rb2.php";
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
	
			$data["value"]	= $this->rb2_model->displayBetweenData($start, $finish);
			
            //load PHPExcel library
			$this->load->library('Excel');
			 
			// Create new PHPExcel object
			$objPHPExcel = new PHPExcel();
			
			// Add some data
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A1', 'NOMOR')
						->setCellValue('A2', 'No Urut')
						->setCellValue('B2', 'Register Perkara')
						->setCellValue('C1', "Tanggal Penerimaan Tanggung Jawab\n Barang Bukti dari Penyidik")
						->setCellValue('D1', 'Jaksa Penuntut Umum')
						->setCellValue('E1', "IDENTITAS TERSANGKA\nNama Lengkap, Tempat Tgl Lahir, Jenis Kelamin, Kewarganegaraan,\n Tempat Tinggal, Agama, Pekerjaan, Pendidikan")
						->setCellValue('F1', 'Pasal yang didakwakan')
						->setCellValue('G1', 'Jumlah, Ukuran, Jenis')
						->setCellValue('H1', "Penyimpanan/Penitipan/\nPelelangan/Pemusnahan\n Barang Bukti")
						->setCellValue('I1', "Tgl Penyerahan kepada PN\n(Pelimpahan APB/APS)")
						->setCellValue('J1', 'PUTUSAN')
						->setCellValue('J2', "No/Tgl\nPutusan")
						->setCellValue('K2', "No/Tgl Amar\n Putusan PT")
						->setCellValue('L2', "No/Tgl Amar\n Putusan MA")
						->setCellValue('M1', 'BA Pelaksanaan Putusan PN/PT/MA')
						->setCellValue('N1', 'BARANG BUKTI YANG TIDAK DIAMBIL')
						->setCellValue('N2', 'No/Tgl Pengumuman')
						->setCellValue('O2', "No/Tgl Permohonan\nIjin Lelang")
						->setCellValue('P2', "Tgl Berita Acara \nPenyerahan ke Pembinaan")
						->setCellValue('Q2', 'No/Tgl Pemanfaatan')
						->setCellValue('R1', 'BARANG TEMUAN')
						->setCellValue('R2', "Penyerahan\n(Tgl BA, Asal Instansi)")
						->setCellValue('S2', 'No/Tgl Pengumuman')
						->setCellValue('T2', "No/Tgl Permohonan \nIjin Lelang")
						->setCellValue('U2', "Tgl Berita Acara \nPenyerahan ke Pembinaan")
						->setCellValue('V2', 'No/Tgl Pemanfaatan')
						->setCellValue('W1', 'Keterangan')
						;
			$i=3;
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
						->setCellValue('B'.$i, $val["register_rp6"])
						->setCellValue('C'.$i, $this->id_date($val["tgl_penerimaan_bb"]))
						->setCellValue('D'.$i, $jaksa)							
						->setCellValue('E'.$i, $val["name_suspect"].", ".$val["birthplace"].", ".$this->id_date($val["birthdate"]).", ".$val["gender"].", ".$val["nationality"]."\n".$val["address"].", ".$val["religion"].", ".$val["job"].", ".$val["education"])						

						->setCellValue('F'.$i, $val["pasal_dakwaan"])
						->setCellValue('G'.$i, $val["bb_juj"])				
						->setCellValue('H'.$i, $val["penyimpanan"])		
						->setCellValue('I'.$i, $this->id_date($val["tgl_penyerahan_pn"]))
						->setCellValue('J'.$i, $val["putusan_no"]."\n ".$this->id_date($val["putusan_tgl"]))
						->setCellValue('K'.$i, $val["no_amar_pt"]."\n ".$this->id_date($val["tgl_amar_pt"]))
						->setCellValue('L'.$i, $val["no_amar_ma_rb2"]."\n ".$this->id_date($val["tgl_amar_ma_rb2"]))
						->setCellValue('M'.$i, $this->id_date($val["tgl_ba_pelaksanaan"]))
						->setCellValue('N'.$i, $val["bbtd_no_pengumuman"]."\n ".$this->id_date($val["bbtd_tgl_pengumuman"]))
						->setCellValue('O'.$i, $val["bbtd_no_lelang"]."\n ".$this->id_date($val["bbtd_tgl_lelang"]))
						->setCellValue('P'.$i, $this->id_date($val["bbtd_tgl_ba_pembinaan"]))
						->setCellValue('Q'.$i, $val["bbtd_no_pemanfaatan"]."\n ".$this->id_date($val["bbtd_tgl_pemanfaatan"]))
						->setCellValue('R'.$i, $this->id_date($val["bt_tgl_ba"])."\n ".$val["bt_asal_instansi"])
						->setCellValue('S'.$i, $val["bt_no_pengumuman"]."\n ".$this->id_date($val["bt_tgl_pengumuman"]))
						->setCellValue('T'.$i, $val["bt_no_lelang"]."\n ".$this->id_date($val["bt_tgl_lelang"]))
						->setCellValue('U'.$i, $this->id_date($val["bt_tgl_ba_pembinaan"]))
						->setCellValue('V'.$i, $val["bt_no_pemanfaatan"]."\n ".$this->id_date($val["bt_tgl_pemanfaatan"]))						
						->setCellValue('V'.$i, $val["keterangan_rb2"])
						;
			$i++;
			}
			// Calculate the column widths
			for ($i = 'A'; $i !== 'X'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);
			}
			$objPHPExcel->getActiveSheet()->calculateColumnWidths();
			
			// Set setAutoSize(false) so that the widths are not recalculated
			for ($i = 'A'; $i !== 'X'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(false);
			}
			
			//Centering Content
			$objPHPExcel->getActiveSheet()
						->getStyle('A1:W1')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
			$objPHPExcel->getActiveSheet()
						->getStyle('A2:W2')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
						
			$objPHPExcel->getActiveSheet()
						->getStyle('A3:W'.$objPHPExcel->getActiveSheet()->getHighestRow())
						->getAlignment()
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);	
						
			//Merge Cell						
			$objPHPExcel->getActiveSheet()
						->mergeCells('A1:B1')
						->mergeCells('C1:C2')
						->mergeCells('D1:D2')
						->mergeCells('E1:E2')
						->mergeCells('F1:F2')
						->mergeCells('G1:G2')
						->mergeCells('H1:H2')
						->mergeCells('I1:I2')
						->mergeCells('M1:M2')
						->mergeCells('J1:L1')
						->mergeCells('N1:Q1')
						->mergeCells('R1:V1')
						->mergeCells('W1:W2')
						;
			
			
			//there is the loops for data
			 
			// Rename worksheet (worksheet, not filename)
			$objPHPExcel->getActiveSheet()->setTitle('Register Barang Bukti 2');
			 
			// Set active sheet index to the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			 
			ob_end_clean();
			
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Register Barang Bukti 2 ('.$mulai.' - '.$akhir.').xls"');
			header('Cache-Control: max-age=0');
			
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
        }

	public function save()
	{
		//Case RB2
		$id_rb2 				= $this->input->post("id_rb2");

		$data_rb2 = array(
			"rp9_id" 			=> $this->input->post("rp9_id"),
			"register_rb2" 		=> $this->input->post("RegisterRB2"),
			"tgl_penerimaan_bb" => $this->ddate($this->input->post("TglPenerimaanBb")),
			"bb_juj" 			=> $this->input->post("JumlahUkuranJenis"),
			"penyimpanan"		=> $this->input->post("Penyimpanan"),
			"tgl_penyerahan_pn" => $this->ddate($this->input->post("TglPenyerahanPN")),
			"putusan_no"		=> $this->input->post("NoPutusan"),
			"putusan_tgl" 		=> $this->ddate($this->input->post("TglPutusan")),
			"no_amar_pt"		=> $this->input->post("NoPutusanPT"),
			"tgl_amar_pt"		=> $this->ddate($this->input->post("TglPutusanPT")),
			"no_amar_ma_rb2"		=> $this->input->post("NoPutusanMA"),
			"tgl_amar_ma_rb2" 		=> $this->ddate($this->input->post("TglPutusanMA")),
			"tgl_ba_pelaksanaan"	=> $this->ddate($this->input->post("TglBAPutusan")),
			"bbtd_tgl_pengumuman"	=> $this->ddate($this->input->post("TglPengumumanTD")),
			"bbtd_no_pengumuman"	=> $this->input->post("NoPengumumanTD"),
			"bbtd_tgl_lelang"		=> $this->ddate($this->input->post("TglPermohonanTD")),
			"bbtd_no_lelang"		=> $this->input->post("NoPermohonanTD"),
			"bbtd_tgl_ba_pembinaan"	=> $this->ddate($this->input->post("TglPenyerahanTD")),
			"bbtd_tgl_pemanfaatan"	=> $this->ddate($this->input->post("TglPemanfaatanTD")),
			"bbtd_no_pemanfaatan"	=> $this->input->post("NoPemanfaatanTD"),
			"bt_tgl_ba"				=> $this->ddate($this->input->post("TglBABT")),
			"bt_asal_instansi"		=> $this->input->post("AsalInstansi"),
			"bt_tgl_pengumuman"		=> $this->ddate($this->input->post("TglPengumumanBT")),
			"bt_no_pengumuman"		=> $this->input->post("NoPengumumanBT"),
			"bt_tgl_lelang"			=> $this->ddate($this->input->post("TglLelangBT")),
			"bt_no_lelang"			=> $this->input->post("NoLelangBT"),
			"bt_tgl_ba_pembinaan" 	=> $this->ddate($this->input->post("TglPenyerahanBT")),
			"bt_no_pemanfaatan"		=> $this->input->post("NoPermohonanBT"),
			"bt_tgl_pemanfaatan"	=> $this->ddate($this->input->post("TglPermohonanBT")),
			"keterangan_rb2"		=> $this->input->post("keterangan_rb2")
		);
		
		$where = array(
			"id_rb2"=>$id_rb2
		);

		if( $id_rb2 != null ):
			$result = $this->rb2_model->update($data_rb2, $where);
		else:
			$result = $this->rb2_model->insert($data_rb2);
		endif;
		
		if( $result ):
			redirect("rb2");
		else:
			echo "Gagal";
		endif;
		
	}

	public function delete($id)
	{
		$where = array(
			"id_rb2"=>$id
		);

		if( $id != "" ):
			$result = $this->rb2_model->delete($where);
		endif;
		
		if( $result ):
			redirect("rb2");
		else:
			echo "Gagal";
		endif;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */