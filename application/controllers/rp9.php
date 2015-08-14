<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rp9 extends CI_Controller {
	
	public $route = "index.php";
	private $class = "rp9";
	
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
		$this->load->model("suspect_model");
		$this->load->model("attorney_model");
		$this->load->library('pagination_lib');
	}
	public function index()
	{		
		$case = $this->rp9_model->displayAllCase();

		$data["case"] = $case; 
		$data["class"] = $this->class;

		$data["content"] = "main.rp9.php";
		$this->load->view($this->route, $data);
	}

	public function form($id=0)
	{	
		$cond 				= array("id_rp7"=>$id);			
		$data["rp7"]		= $this->rp7_model->displaySelectedData($cond);

		$cond_rp6 			= array("id_rp6"=>$data["rp7"][0]["rp6_id"]);
		$data["rp6"]		= $this->rp6_model->displaySelectedData($cond_rp6);

		$cond_rp9 			= array("rp7_id"=>$id);
		$data["rp9"]		= $this->rp9_model->displaySelectedData($cond_rp9);

		$data["attorney"]	= $this->attorney_model->displayAll();
		
		if(!empty($data["rp9"])){
			$cond_attorney		= array("rp9_id"=>$data["rp9"][0]["id_rp9"]);
			$data["jaksa"]		= $this->attorney_model->displayDataJaksaRp9($cond_attorney);
		}
		
		$cond_suspect 		= array("id_suspect"=>$data["rp6"][0]["suspect_id"]);
		$data["suspect"]	= $this->suspect_model->displaySelectedData($cond_suspect);	
		
		$data["content"] 	= "form.rp9.php";
		$this->load->view($this->route, $data);
	}	

	private function id_date($date)
	{
		if($date != null and $date != '0000-00-00'){
				$date 			= date("d-m-Y", strtotime($date));	
		}else{	$date 			= '';}
		return $date;
	}
	
	public function dDate($date)
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
	
			$data["value"]	= $this->rp9_model->displayBetweenData($start, $finish);
            //load PHPExcel library
			$this->load->library('Excel');
			 
			// Create new PHPExcel object
			$objPHPExcel = new PHPExcel();
			
			// Add some data
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A1', 'No')
						->setCellValue('B1', 'Tgl Terima Berkas Perkara P-21')
						->setCellValue('C1', 'Asal Perkara (Instansi)')
						->setCellValue('D1', "TAHANAN: \n a. No Register \n b. Jenis \n c. Ditahan Sejak")
						->setCellValue('E1', 'No Register BB')
						->setCellValue('F1', "IDENTITAS TERSANGKA\nNama Lengkap, Tempat Tgl Lahir, Jenis Kelamin, Kewarganegaraan,\n Tempat Tinggal, Agama, Pekerjaan, Pendidikan")
						->setCellValue('G1', "Tindak Pidana yang didakwakan\n(Pasal/Ayat)")
						->setCellValue('H1', "Jaksa Penuntut Umum \n(P-16 A)")
						->setCellValue('I1', 'Pasal yang disangkakan')
						->setCellValue('J1', "Tgl/No SK Penyampingan Demi \n Kepentingan Umum")
						->setCellValue('K1', "Tgl/No Perkara \n Dengan APB/APS")
						->setCellValue('L1', "No/Tgl Pengiriman Berkas\nKe Kejaksaan/Instansi Lain")
						->setCellValue('M1', "Tgl & Isi Tuntutan Pidana /n Jaksa Penuntut Umum")
						->setCellValue('N1', 'No & Tgl Amar Putusan')
						->setCellValue('O1', "No & Tgl Amar Penetapan PT \n atas Perlawanan")
						->setCellValue('P1', 'No/ Tgl AMAR PUTUSAN BANDING (PT)')
						->setCellValue('Q1', 'No/Tgl AMAR PUTUSAN KASASI (MA)')
						->setCellValue('R1', "No/Tgl AMAR PUTUSAN KASASI \n DEMI KEPENTINGAN HUKUM")
						->setCellValue('S1', 'No/Tgl AMAR PUTUSAN PENINJAUAN KEMBALI (MA)')
						->setCellValue('T1', 'No/Tgl AMAR PUTUSAN KEPPRES GRASI')
						->setCellValue('U1', 'Tanggal Pelaksanaan Putusan Pidana')
						->setCellValue('V1', 'KETERANGAN')
						;
			$i=2;
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
						->setCellValue('B'.$i, $this->id_date($val["tgl_lengkap"]))
						->setCellValue('C'.$i, $val["institution"])
						->setCellValue('D'.$i, "a. ".$val["register_rt2"]."\nb. ".$this->id_date($val["tgl_penahanan"])."\nc. ".$this->id_date($val["sp3_tanggal"]))							
						->setCellValue('E'.$i, $val["register_rb2"])	
						->setCellValue('F'.$i, $val["name_suspect"].", ".$val["birthplace"].", ".$this->id_date($val["birthdate"]).", ".$val["gender"].", ".$val["nationality"]."\n".$val["address"].", ".$val["religion"].", ".$val["job"].", ".$val["education"])						

						->setCellValue('G'.$i, $val["pasal_dakwaan"])
						->setCellValue('H'.$i, $jaksa)				
						->setCellValue('I'.$i, $val["pasal"])		
						->setCellValue('J'.$i, $this->id_date($val["tgl_penyampingan_umum"])."\n ".$val["no_sk_penyampingan_umum"])
						->setCellValue('K'.$i, $this->id_date($val["tgl_perkara_absaps"])."\n ".$val["no_perkara_absaps"])
						->setCellValue('L'.$i, $this->id_date($val["tgl_kirim_instansi_lain"])."\n ".$val["no_kirim_instansi_lain"])
						->setCellValue('M'.$i, $this->id_date($val["tgl_tuntutan_jpu"])."\n ".$val["tuntutan_jpu"])
						->setCellValue('N'.$i, $this->id_date($val["tgl_amar_putusan"])."\n ".$val["no_amar_putusan"])
						->setCellValue('O'.$i, $this->id_date($val["tgl_amar_pt"])."\n ".$val["no_amar_pt"])
						->setCellValue('P'.$i, $this->id_date($val["tgl_amar_banding"])."\n ".$val["no_amar_banding"])
						->setCellValue('Q'.$i, $this->id_date($val["tgl_amar_ma"])."\n ".$val["no_amar_ma"])
						->setCellValue('R'.$i, $this->id_date($val["tgl_kasasi"])."\n ".$val["no_kasasi"])
						->setCellValue('S'.$i, $this->id_date($val["tgl_amar_pk_ma"])."\n ".$val["no_amar_pk_ma"])
						->setCellValue('T'.$i, $this->id_date($val["tgl_grasi"])."\n ".$val["no_grasi"])
						->setCellValue('U'.$i, $this->id_date($val["tgl_pelaksanaan"]))
						->setCellValue('V'.$i, $val["keterangan_rp9"])
						;
			$i++;
			}
			
			// Calculate the column widths
			for ($i = 'A'; $i !== 'W'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);
			}
			$objPHPExcel->getActiveSheet()->calculateColumnWidths();
			
			// Set setAutoSize(false) so that the widths are not recalculated
			for ($i = 'A'; $i !== 'W'; $i++){
				$objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(false);
			}

			$objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(-1);
			$objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(-1);
			
			//Centering Content
			$objPHPExcel->getActiveSheet()
						->getStyle('A1:W1')
						->getAlignment()
						->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()
						->getStyle('A2:W'.$objPHPExcel->getActiveSheet()->getHighestRow())
						->getAlignment()
						->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
						->setWrapText(true);	
			
			//there is the loops for data
			 
			// Rename worksheet (worksheet, not filename)
			$objPHPExcel->getActiveSheet()->setTitle('Register Perkara 9');
			 
			// Set active sheet index to the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			 
			ob_end_clean();
			
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Register Perkara 9 ('.$mulai.' - '.$akhir.').xls"');
			header('Cache-Control: max-age=0');
			
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
        }

	public function save()
	{
		$id_rp9 		= $this->input->post("id_rp9");
		//Case RP9
		$RegisterRP9	= $this->input->post("RegisterRP9");
		$tgl_rp9          = $this->dDate($this->input->post("tgl_rp9"));
		$PasalDakwaan   = $this->input->post("PasalDakwaan");
		$TglKU          = $this->dDate($this->input->post("TglKU"));
		$NoKU           = $this->input->post("NoKU");
		$TglApbs        = $this->dDate($this->input->post("TglApbs"));
		$NoApbs         = $this->input->post("NoApbs");
		$TglKeLain      = $this->dDate($this->input->post("TglKeLain"));
		$NoKeLain       = $this->input->post("NoKeLain");
		$TglJPU         = $this->dDate($this->input->post("TglJPU"));
		$IsiJPU         = $this->input->post("IsiJPU");
		$TglAmarPutusan = $this->dDate($this->input->post("TglAmarPutusan"));
		$NoAmarPutusan  = $this->input->post("NoAmarPutusan");
		$TglPenetapan   = $this->dDate($this->input->post("TglPenetapan"));
		$NoPenetapan    = $this->input->post("NoPenetapan");
		$TglBanding     = $this->dDate($this->input->post("TglBanding"));
		$NoBanding      = $this->input->post("NoBanding");
		$TglKasasi      = $this->dDate($this->input->post("TglKasasi"));
		$NoKasasi       = $this->input->post("NoKasasi");
		$TglKasasiKU    = $this->dDate($this->input->post("TglKasasiKU"));
		$NoKasasiKU     = $this->input->post("NoKasasiKU");
		$TglPK          = $this->dDate($this->input->post("TglPK"));
		$NoPK           = $this->input->post("NoPK");
		$TglGrasi       = $this->dDate($this->input->post("TglGrasi"));
		$NoGrasi        = $this->input->post("NoGrasi");
		  
		$TglPelaksanaan = $this->dDate($this->input->post("TglPelaksanaan"));
		$keterangan_rp9 = $this->input->post("keterangan_rp9");

		
		$data_rp9 = array(
			"rp7_id"					=> $this->input->post("rp7_id"),	
			"register_rp9"   			=> $this->input->post("RegisterRP9"),
			"tgl_rp9"   				=> $tgl_rp9,
			"pasal_dakwaan"   			=> $this->input->post("PasalDakwaan"),
			"tgl_penyampingan_umum"     => $this->dDate($this->input->post("TglKU")),
			"no_sk_penyampingan_umum"   => $this->input->post("NoKU"),
			"tgl_perkara_absaps"        => $this->dDate($this->input->post("TglApbs")),
			"no_perkara_absaps"         => $this->input->post("NoApbs"),
			"tgl_kirim_instansi_lain"   => $this->dDate($this->input->post("TglKeLain")),
			"no_kirim_instansi_lain"    => $this->input->post("NoKeLain"),
			"tgl_tuntutan_jpu"          => $this->dDate($this->input->post("TglJPU")),
			"tuntutan_jpu"         		=> $this->input->post("IsiJPU"),
			"tgl_amar_putusan" 			=> $this->dDate($this->input->post("TglAmarPutusan")),
			"no_amar_putusan"  			=> $this->input->post("NoAmarPutusan"),
			"tgl_amar_pt"   			=> $this->dDate($this->input->post("TglPenetapan")),
			"no_amar_pt"    			=> $this->input->post("NoPenetapan"),
			"tgl_amar_banding"     		=> $this->dDate($this->input->post("TglBanding")),
			"no_amar_banding"      		=> $this->input->post("NoBanding"),
			"tgl_kasasi"      			=> $this->dDate($this->input->post("TglKasasi")),
			"no_kasasi"       			=> $this->input->post("NoKasasi"),
			"tgl_kasasi_ku"    			=> $this->dDate($this->input->post("TglKasasiKU")),
			"no_kasasi_ku"     			=> $this->input->post("NoKasasiKU"),
			"tgl_amar_pk_ma"          	=> $this->dDate($this->input->post("TglPK")),
			"no_amar_pk_ma"           	=> $this->input->post("NoPK"),
			"tgl_grasi"       			=> $this->dDate($this->input->post("TglGrasi")),
			"no_grasi"        			=> $this->input->post("NoGrasi"),
			"tgl_pelaksanaan" 			=> $this->dDate($this->input->post("TglPelaksanaan")),
			"keterangan_rp9" 				=> $this->input->post("keterangan_rp9")
		);
		
		$where = array(
			"id_rp9"=>$id_rp9
		);

		//Insert Jaksa
		$jaksa = $this->input->post("Jaksa"); 	
		$length = count($jaksa);
		$cond_reset = array("rp9_id" => $id_rp9);
		$reset_jaksa = $this->attorney_model->deleteJaksaRp9($cond_reset);
		for ($i = 0; $i < ($length-1); $i++) {
			$data_jaksa = array("attorney_id"=> $jaksa[$i], "rp9_id" => $id_rp9);
			$result_jaksa = $this->attorney_model->jpu2rp9($data_jaksa);			
		}
		
		if( $id_rp9 != null ):
			$result = $this->rp9_model->update($data_rp9, $where);
		else:
			$result = $this->rp9_model->insert($data_rp9);
		endif;
		
		if( $result ):
			redirect("rp9");
		else:
			echo "Gagal";
		endif;
		
	}

	public function delete($id)
	{
		$where = array(
			"id_rp9"=>$id
		);
		$where_jaksa   = array('rp9_id' => $id);
		if( $id != "" ):
			$result 	= $this->rp9_model->delete($where);
			$result2	= $this->attorney_model->deleteJaksaRp9($where_jaksa);
		endif;
		
		if( $result ):
			redirect("rp9");
		else:
			echo "Gagal";
		endif;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */