<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rp12 extends CI_Controller {
	
	public $route = "index.php";
	private $class = "rp12";
	
	public function __construct(){
		//function check access			
		parent::__construct();	
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect("user","refresh");
   		}
   		$this->load->model("rp9_model");
		$this->load->model("rp7_model");
		$this->load->model("rp6_model");
		$this->load->model("rt2_model");
		$this->load->model("rb2_model");
		$this->load->model("rp12_model");
		$this->load->model("suspect_model");
		$this->load->model("attorney_model");
		$this->load->library('pagination_lib');
	}
	public function index()
	{		
		$case = $this->rp12_model->displayAllCase();

		$data["case"] = $case; 
		$data["class"] = $this->class;

		$data["content"] = "main.rp12.php";
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

		$cond_rb2 			= array("rp9_id"=>$data["rp9"][0]["id_rp9"]);
		$data["rb2"]		= $this->rb2_model->displaySelectedData($cond_rb2);

		$cond_rt2 			= array("rp6_id"=>$data["rp6"][0]["id_rp6"]);
		$data["rt2"]		= $this->rt2_model->displaySelectedData($cond_rt2);

		$cond_rp12 			= array("rp12.rp9_id"=>$id);
		$data["rp12"]		= $this->rp12_model->displaySelectedData($cond_rp12);

		$data["attorney"]	= $this->attorney_model->displayAll();

		$cond_suspect 		= array("id_suspect"=>$data["rp6"][0]["suspect_id"]);
		$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);	
		
		$data["content"] 	= "form.rp12.php";
		$this->load->view($this->route, $data);
	}	

	public function view($id)
	{	
		$cond = array("Id_Rp12"=>$id);			
		$data["value"]		= $this->rp12_model->displaySelectedData($cond);
		
		$data["attorney"]	= $this->attorney_model->displayAll();

		$cond_suspect 		= array("id_suspect"=>$data["value"][0]["suspect_id"]);
		$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);			

		$data["content"] 	= "case.rp12.php";
		$this->load->view($this->route, $data);
	}
	
	private function id_date($date)
	{
		if($date != null and $date != '0000-00-00'){
				$date 			= date("d-m-Y", strtotime($date));	
		}else{	$date 			= '';}
		return $date;
	}
	
	private function ddate($date)
	{
		if($date != null){
				$date 			= str_replace('/', '-', $date);
				$date 			= date("Y-m-d", strtotime($date));	
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
	
			$data["value"]	= $this->rp12_model->displayBetweenData($start, $finish);
			
            //load PHPExcel library
			$this->load->library('Excel');
			 
			// Create new PHPExcel object
			$objPHPExcel = new PHPExcel();
			
			// Add some data
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A1', 'NOMOR')
						->setCellValue('A2', 'No Urut')
						->setCellValue('B2', "Register Perkara \n(RP-9)")
						->setCellValue('C2', "Register Tahanan \n(RT-2)")
						->setCellValue('D2', "Register Barang Bukti \n(RB-2)")
						->setCellValue('E1', "TERDAKWA/TERPIDANA\nNama Lengkap, Tempat Tgl Lahir, Jenis Kelamin, Kewarganegaraan,\n Tempat Tinggal, Agama, Pekerjaan, Pendidikan")
						->setCellValue('F1', "No & Tgl AMAR PUTUSAN \nPN/PT/MA/Grasi/PK \nYANG TELAH MEMPUNYAI \nKEKUATAN HUKUM TETAP")					
						->setCellValue('G1', "No & Tgl \nSurat Perintah \n(P-48)")
						->setCellValue('H1', 'TGL BERITA ACARA PELAKSANAAN PUTUSAN TERHADAP')
						->setCellValue('H2', 'Terpidana Mati/Badan')
						->setCellValue('I2', 'Denda/Kurungan Pengganti')
						->setCellValue('J2', 'Biaya Perkara/Uang Pengganti')
						->setCellValue('K2', 'Barang Bukti')
						->setCellValue('L1', 'PIDANA BERSYARAT')
						->setCellValue('L2', "Tgl Pemberitahuan\n(P-51)")
						->setCellValue('M2', 'Syarat-Syarat')
						->setCellValue('M3', 'Umum')
						->setCellValue('N3', 'Khusus')
						->setCellValue('O3', 'Perubahan Syarat Khusus')
						->setCellValue('P2', "Usul JPU untuk menjalankan \nPidana Peringatan")
						->setCellValue('Q2', 'Amar Penetapan Hakim')
						->setCellValue('R2', 'No/Tanggal Ketetapan')
						->setCellValue('S2', "Tgl BA Pelaksanaan \nPenetapan Hakim")
						->setCellValue('T1', 'KEWENANGAN EKSEKUSI')
						->setCellValue('T2', 'No/Tgl Ketetapan')
						->setCellValue('U2', 'Alasan Mati/Daluarsa')
						->setCellValue('V2', "Lama Pidana yang \nDijalankan")
						->setCellValue('W1', 'PELEPASAN BERSYARAT')
						->setCellValue('W2', "No & Tgl Kep. \nMenteri Kehakiman")
						->setCellValue('X2', 'Tgl Pelaksanaan')
						->setCellValue('Y2', "Tgl Masa Percobaan \nBerakhir")
						->setCellValue('Z2', 'Kejari yang melepas')
						->setCellValue('AA2', 'Kejari yang mengawasi')
						->setCellValue('AB2', 'Balai Bispa')
						->setCellValue('AC2', "Tempat Kediaman \nTerpidana")
						->setCellValue('AD1', 'KETERANGAN')
						;
			$i=4;
			foreach($data['value'] as $no=>$val)
			{
				
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$i, $no+1)
						->setCellValue('B'.$i, $val["register_rp9"])
						->setCellValue('C'.$i, $val["register_rt2"])
						->setCellValue('D'.$i, $val["register_rb2"])							
						->setCellValue('E'.$i, $val["name_suspect"].", ".$val["birthplace"].", ".$this->id_date($val["birthdate"]).", ".$val["gender"].", ".$val["nationality"]."\n".$val["address"].", ".$val["religion"].", ".$val["job"].", ".$val["education"])						
						->setCellValue('F'.$i, $val["no_amar_hukum_tetap"]."\n ".$this->id_date($val["tgl_amar_hukum_tetap"]))
						->setCellValue('G'.$i, $val["no_p48"]."\n ".$this->id_date($val["tgl_p48"]))
						->setCellValue('H'.$i, $this->id_date($val["tgl_putusan_terpidana"]))
						->setCellValue('I'.$i, $this->id_date($val["tgl_putusan_denda_pengganti"]))
						->setCellValue('J'.$i, $this->id_date($val["tgl_putusan_biaya_perkara"]))
						->setCellValue('K'.$i, $this->id_date($val["tgl_putusan_bb"]))
						->setCellValue('L'.$i, $this->id_date($val["tgl_p51"]))
						->setCellValue('M'.$i, $val["pidana_bersyarat_umum"])	
						->setCellValue('N'.$i, $val["pidana_bersyarat_khusus"])	
						->setCellValue('O'.$i, $val["pidana_bersyarat_perubahan_khusus"])	
						->setCellValue('P'.$i, $val["pidana_bersyarat_usul_jpu"])	
						->setCellValue('Q'.$i, $val["pidana_bersyarat_amar_hakim"])	
						->setCellValue('R'.$i, $val["pidana_bersyarat_no"]."\n ".$this->id_date($val["pidana_bersyarat_tgl"]))
						->setCellValue('S'.$i, $this->id_date($val["pidana_bersyarat_tgl_ba"]))
						->setCellValue('T'.$i, $val["eksekusi_no"]."\n ".$this->id_date($val["eksekusi_tgl"]))
						->setCellValue('U'.$i, $val["eksekusi_alasan"])	
						->setCellValue('V'.$i, $val["eksekusi_lama_pidana"])
						->setCellValue('W'.$i, $val["lepas_bersyarat_no_hakim"]."\n ".$this->id_date($val["lepas_bersyarat_tgl_hakim"]))
						->setCellValue('X'.$i, $this->id_date($val["lepas_bersyarat_tgl_pelaksanaan"]))
						->setCellValue('Y'.$i, $this->id_date($val["lepas_bersyarat_tgl_percobaan"]))	
						->setCellValue('Z'.$i, $val["lepas_bersyarat_kajari_lepas"])
						->setCellValue('AA'.$i, $val["lepas_bersyarat_kajari_awas"])
						->setCellValue('AB'.$i, $val["lepas_bersyarat_bispa"])
						->setCellValue('AC'.$i, $val["lepas_bersyarat_kediaman"])
						->setCellValue('AD'.$i, $val["keterangan_rp12"])
						;
			$i++;
			}
			// Calculate the column widths
			for ($i = 'A'; $i !== 'AE'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);
			}
			$objPHPExcel->getActiveSheet()->calculateColumnWidths();
			
			// Set setAutoSize(false) so that the widths are not recalculated
			for ($i = 'A'; $i !== 'AE'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(false);
			}
			
			//Centering Content
			$objPHPExcel->getActiveSheet()
						->getStyle('A1:AD1')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
			$objPHPExcel->getActiveSheet()
						->getStyle('A2:AD2')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
			$objPHPExcel->getActiveSheet()
						->getStyle('A3:AD3')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()
						->getStyle('A4:AD'.$objPHPExcel->getActiveSheet()->getHighestRow())
						->getAlignment()
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);	
			//Merge Cell						
			$objPHPExcel->getActiveSheet()
						->mergeCells('A1:D1')
						->mergeCells('A2:A3')
						->mergeCells('B2:B3')
						->mergeCells('C2:C3')
						->mergeCells('D2:D3')
						->mergeCells('E1:E3')
						->mergeCells('F1:F3')
						->mergeCells('G1:G3')
						->mergeCells('H1:K1')
						->mergeCells('H2:H3')
						->mergeCells('I2:I3')
						->mergeCells('J2:J3')
						->mergeCells('K2:K3')
						->mergeCells('L1:S1')
						->mergeCells('L2:L3')
						->mergeCells('M1:S1')
						->mergeCells('M2:M3')
						->mergeCells('N2:P2')
						->mergeCells('Q2:Q3')
						->mergeCells('R2:R3')
						->mergeCells('S2:S3')
						->mergeCells('T1:V1')
						->mergeCells('T2:T3')
						->mergeCells('U2:U3')
						->mergeCells('V2:V3')
						->mergeCells('W1:AC1')
						->mergeCells('W2:W3')
						->mergeCells('X2:X3')
						->mergeCells('Y2:Y3')
						->mergeCells('Z2:Z3')
						->mergeCells('AA2:AA3')
						->mergeCells('AB2:AB3')		
						->mergeCells('AC2:AC3')
						->mergeCells('AD1:AD3')								
						;
			
			
			//there is the loops for data
			 
			// Rename worksheet (worksheet, not filename)
			$objPHPExcel->getActiveSheet()->setTitle('Register Perkara 12');
			 
			// Set active sheet index to the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			 
			ob_end_clean();
			
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Register Perkara 12 ('.$mulai.' - '.$akhir.').xls"');
			header('Cache-Control: max-age=0');
			
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
        }

	public function save()
	{
		$id_rp12 = $this->input->post('id_rp12');
		$data_rp12 = array(
			"rp9_id" 				=> $this->input->post('rp9_id'),
			"rt2_id" 				=> $this->input->post('rt2_id'),
			"rb2_id" 				=> $this->input->post('rb2_id'),
			"register_rp12" 				=> $this->input->post('RegisterRp12'),
			"tgl_rp12" 						=> $this->dDate($this->input->post('tgl_rp12')),
			"no_amar_hukum_tetap" 			=> $this->input->post('NoAmarPutusan'),
			"tgl_amar_hukum_tetap" 			=> $this->dDate($this->input->post('TglAmarPutusan')),
			"no_p48"						=> $this->input->post('NoP48'),
			"tgl_p48" 						=> $this->dDate($this->input->post('TglP48')),
			"tgl_putusan_terpidana"			=> $this->dDate($this->input->post('TglBATerpidana')),
			"tgl_putusan_denda_pengganti" 	=> $this->dDate($this->input->post('TglBADenda')),
			"tgl_putusan_biaya_perkara"		=> $this->dDate($this->input->post('TglBABiayaPerkara')),
			"tgl_putusan_bb"		 		=> $this->dDate($this->input->post('TglBABukti')),
			"tgl_p51"						=> $this->dDate($this->input->post('TglP51')),
			"pidana_bersyarat_umum" 		=> $this->input->post('PBUmum'),
			"pidana_bersyarat_khusus"		=> $this->input->post('PBKhusus'),
			"pidana_bersyarat_perubahan_khusus"	=> $this->input->post('PBPerubahanKhusus'),
			"pidana_bersyarat_usul_jpu"		=> $this->input->post('PBUsulJpu'),
			"pidana_bersyarat_amar_hakim"	=> $this->input->post('PBAmarHakim'),
			"pidana_bersyarat_no"			=> $this->input->post('PBNo'),
			"pidana_bersyarat_tgl"			=> $this->dDate($this->input->post('PBTgl')),
			"pidana_bersyarat_tgl_ba"		=> $this->dDate($this->input->post('PBTglBa')),
			"eksekusi_no"					=> $this->input->post('EksekusiNo'),
			"eksekusi_tgl"					=> $this->dDate($this->input->post('EksekusiTgl')),
			"eksekusi_alasan"				=> $this->input->post('EksekusiAlasan'),
			"eksekusi_lama_pidana"			=> $this->input->post('EksekusiLamaPidana'),
			"lepas_bersyarat_no_hakim"		=> $this->input->post('LBNoHakim'),
			"lepas_bersyarat_tgl_hakim"		=> $this->dDate($this->input->post('LBTglHakim')),
			"lepas_bersyarat_tgl_pelaksanaan"	=> $this->dDate($this->input->post('LBTglPelaksanaan')),
			"lepas_bersyarat_tgl_percobaan"		=> $this->dDate($this->input->post('LBTglPercobaan')),
			"lepas_bersyarat_kajari_lepas" 		=> $this->input->post('KejariLepas'),
			"lepas_bersyarat_kajari_awas"		=> $this->input->post('KejariAwas'),
			"lepas_bersyarat_bispa"				=> $this->input->post('Bispa'),
			"lepas_bersyarat_kediaman"			=> $this->input->post('KediamanTpd'),
			"keterangan_rp12"					=> $this->input->post('keterangan_rp12')
		);
		
		
		$where = array(
			"id_rp12"=>$id_rp12
		);

		if( $id_rp12 != null ):
			$result = $this->rp12_model->update($data_rp12, $where);
		else:
			$result = $this->rp12_model->insert($data_rp12);
		endif;
		
		if( $result ):
			redirect("rp12");
		else:
			echo "Gagal";
		endif;
		
	}

	public function delete($id)
	{
		$where = array(
			"id_rp12"=>$id
		);

		if( $id != "" ):
			$result = $this->rp12_model->delete($where);
		endif;
		
		if( $result ):
			redirect("rp12");
		else:
			echo "Gagal";
		endif;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */