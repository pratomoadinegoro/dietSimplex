<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User extends CI_Controller{
	
	public function __construct()
		{
			parent::__construct();
			$this->load->model('model_user');
			$this->load->helper(array('form', 'url'));
			$this->load->library('session');

			
		}	

	public function index(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		//print_r($data);
		if ($this->form_validation->run() == FALSE){
			$this->load->view('header');
			$this->load->view('nav');
			$this->load->view('index');
			$this->load->view('footer');
		}
		else{
			redirect('user/index','refresh');
		}
	
	}

	public function set_login(){
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
			$check = $this->model_user->checkUser();
		//	print_r($check);
			if ($check == "true") {
				$session = array(
					'username' => $username,
					'status' => 'true');
				$this->session->set_userdata($session);
				$data['username']=$this->session->userdata('username');
				$data['status']=$this->session->userdata('status');
		//	print_r($data);
				redirect('user/home','refresh');
				}
			else{
				$this->session->set_userdata('status','false');
				redirect('user/index');
				}
	}

	public function home(){
		
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');
		$this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer');
				
	}

	public function signup(){
		
		$this->load->library('form_validation');
		$data['query'] = $this->model_user->aktifitas();
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('umur', 'umur', 'required');
		$this->form_validation->set_rules('jk', 'Jk', 'required');
		$this->form_validation->set_rules('berat', 'Berat', 'required');
		$this->form_validation->set_rules('tinggi', 'Tinggi', 'required');
		$this->form_validation->set_rules('aktifitas', 'aktifitas', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('header');
				$this->load->view('signup', $data);
				$this->load->view('footer');
			}
			else{
				redirect('user/getsignup','refresh');
			}
			
	}

	public function getsignup(){
			
		$umur     		= $this->input->post('umur');
		if ($umur >12) {
			redirect('user/signup','refresh');
		}
		else
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$nama     		= $this->input->post('nama');
		$jeniskelamin 	= $this->input->post('jk');
			if ($jeniskelamin == 'lakilaki') {	
			$jeniskelamin= str_replace($jeniskelamin,'lakilaki', $jeniskelamin);
			}
			else
			$jeniskelamin= str_replace($jeniskelamin,'perempuan', $jeniskelamin);
		
		$beratbadan     = $this->input->post('berat');
		$tinggibadan 	= $this->input->post('tinggi');
		$aktifitas 		= $this->input->post('aktifitas');
		$check = $this->model_user->checkUser();
		if($check == "false"){
			$insertUser = $this->model_user->insertUser();
			$insertPI   = $this->model_user->insertPI();
		//	$lihatProfil= $this->model_user->lihatProfil();
		//	print_r($lihatProfil);
			redirect('user/index','refresh');	
		}
		//masih error
		else{
			echo "Akun $username sudah terdaftar";
		}

	}

	public function logout(){
		
		$this->session->sess_destroy();
		redirect('user/index');

	}

	public function profil(){
		
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');
		if ($data['status']== 'true') {
			$data['aktifitas'] = $this->model_user->aktifitas();
			$data['query'] = $this->model_user->data_pengguna($data['username']);
			$this->load->view('header');
			$this->load->view('profil', $data);
			$this->load->view('footer');
		}
		else{
			$this->load->view('header');
			$this->load->view('belumlogin');
			$this->load->view('footer');		
		}

	}

	/*public function updateProfil(){
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');

		$this->load->library('form_validation');
		$data['query'] = $this->model_user->data_pengguna($data['username']);
		$data['query1'] = $this->model_user->aktifitas();

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('umur', 'umur', 'required');
		$this->form_validation->set_rules('jk', 'Jk', 'required');
		$this->form_validation->set_rules('berat', 'Berat', 'required');
		$this->form_validation->set_rules('tinggi', 'Tinggi', 'required');
		$this->form_validation->set_rules('aktifitas', 'aktifitas', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('header');
				$this->load->view('editprofil', $data);
				$this->load->view('footer');
			}
			else{
				redirect('user/profil','refresh');
			}
		
	}*/

	/*public function getUpdateProfil(){
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');

		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$nama     		= $this->input->post('nama');
		$umur     		= $this->input->post('umur');
		$jeniskelamin 	= $this->input->post('jk');
		$beratbadan     = $this->input->post('berat');
		$tinggibadan 	= $this->input->post('tinggi');
		$aktifitas 		= $this->input->post('aktifitas ');

		if ($data['status']== 'true') {
			$this->model_user->updatePI($username,$nama,$umur,$jeniskelamin,$beratbadan,$tinggibadan,$aktifitas);
			redirect('user/profil','refresh');
		}
		else{
			$this->load->view('header');
			$this->load->view('nav');
			$this->load->view('belumlogin');
			$this->load->view('footer');	
		}

	}*/

	public function insertRekamKonsumsi(){
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');

		$gizi		= $this->input->post('gizi');
		$harga 		= $this->input->post('harga');
		$tanggal	= date("Y-m-d");
		// kalo pengen sehari cuman bisa ngerekam 1 kali saja. Yang dicomment alias "//" atau "*//*" hapus biar nyala lagi kodingannyaa
		if ($data['status']== 'true') {
		//	$checkTanggal = $this->model_user->checkTanggal($tanggal);
			//if ($checkTanggal == 'false') {
				$data['query'] = $this->model_user->insertRekamKebutuhan($tanggal,$data['username'],$gizi,$harga);		
				redirect('user/rekamkonsumsi','refresh');	
		//	}
		/*else{
				$this->load->view('header');
				$this->load->view('errorRekam');
				$this->load->view('footer');
			}*/
		}
		else{
			$this->load->view('header');
			$this->load->view('belumlogin');
			$this->load->view('footer');
		}
	}

	public function rekamkonsumsi(){
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');

		if ($data['status']== 'true') {
			$data['query'] = $this->model_user->rekamKebutuhan($data['username']);

			$this->load->view('header');
			$this->load->view('rekamkonsumsi', $data);
			$this->load->view('footer');		
		}
		else{
			$this->load->view('header');
			$this->load->view('belumlogin');
			$this->load->view('footer');
		}
	}

	public function menumakanan(){ 
		
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');
		if ($data['status']== 'true') {
			$data['query'] = $this->model_user->makanan();
			$this->load->view('header');
			$this->load->view('menumakanan', $data);
			$this->load->view('footer');
		}
		else{
			$this->load->view('header');
			$this->load->view('nav');
			$this->load->view('belumlogin');
			$this->load->view('footer');
		}
	
	}

	public function pilihmakanan(){
		
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');
		if ($data['status']== 'true') {
			$data['makanan']= $this->model_user->makanan();
				$this->load->view('header');
				$this->load->view('pilihmakanan', $data);
				$this->load->view('footer');
		}
		else{
			$this->load->view('header');
			$this->load->view('nav');
			$this->load->view('belumlogin');
			$this->load->view('footer');
		}
	
	}

	private function hitung_kebutuhan_pengguna($data,$pilihmakanan){
		
		$pengguna= $this->model_user->data_pengguna($data['username']);
			//	print_r($pengguna[0]->nama);
		if ($pengguna[0]->jenis_kelamin == 'lakilaki') {
			echo $pengguna[0]->jenis_kelamin;
			
			if(0<$pengguna[0]->umur and $pengguna[0]->umur <=3){
				$BMR = (0.167* $pengguna[0]->bBadan)+(1517.4 *  ($pengguna[0]->tBadan/100))-617.6;
			}
			else if(3<$pengguna[0]->umur and $pengguna[0]->umur <=10){
				$BMR = (19.6* $pengguna[0]->bBadan)+(130.3 *  ($pengguna[0]->tBadan/100))+414.9;
			}
			else {
				$BMR = (16.25* $pengguna[0]->bBadan)+(137.2 *  ($pengguna[0]->tBadan/100))+515.5;
			}
		}
		else{
				echo $pengguna[0]->jenis_kelamin;
				if(0<$pengguna[0]->umur and $pengguna[0]->umur <=3){
				$BMR = (16.25* $pengguna[0]->bBadan)+(1023.2 *  ($pengguna[0]->tBadan/100))-413.5;
			}
			else if(3<$pengguna[0]->umur and $pengguna[0]->umur <=10){
				$BMR = (16.97* $pengguna[0]->bBadan)+(161.8 *  ($pengguna[0]->tBadan/100))+371.2;
			}
			else {
				$BMR = (8.365* $pengguna[0]->bBadan)+(465 *  ($pengguna[0]->tBadan/100))+200;
			}
		}

			if ($pengguna[0]->id_aktifitas == 1) {
				$TEE= $BMR * 1.2 ;
			} 
			elseif ($pengguna[0]->id_aktifitas == 2) {
				$TEE= $BMR * 1.3 -1.375 ;
			}
			elseif ($pengguna[0]->id_aktifitas == 3) {
				$TEE= $BMR * 1.5 -1.55 ;
			}
			elseif ($pengguna[0]->id_aktifitas == 4) {
				$TEE= $BMR * 1.7 ;
			}
			else{
				$TEE= $BMR * 1.9 ;
			}

		$bts_b_protein 	 = ($TEE * 0.1)/4 ;
		$bts_a_protein 	 = ($TEE * 0.35)/4 ;
		$bts_b_karbo = ($TEE * 0.45)/4 ;
		$bts_a_karbo = ($TEE * 0.65)/4 ;
		$bts_b_lemak 		 = ($TEE * 0.2)/9 ;
		$bts_a_lemak 		 = ($TEE * 0.35)/9 ;

		//$nilai_gizi = array($bts_a_protein,$bts_a_karbo,$bts_a_lemak,$bts_b_protein,$bts_b_karbo,$bts_b_lemak,$TEE);
		$nilai_gizi = array('bts_a_protein' => $bts_a_protein,'bts_a_lemak' => $bts_a_lemak,'bts_a_karbo' => $bts_a_karbo,
								'bts_b_protein' => $bts_b_protein,'bts_b_lemak' => $bts_b_lemak,'bts_b_karbo' => $bts_b_karbo,
									'TEE' => $TEE);

		return $nilai_gizi;
	
	}

	private function getMakanan($data,$pilihmakanan){
		
		foreach ($pilihmakanan as $row) {
			$getMakanan[] = $this->model_user->getMakanan($row);
		}
			
		return $getMakanan ;
	
	}

	private function countMakanan($pilihmakanan){
		
		$jumlahMakanan= count($pilihmakanan);
		return $jumlahMakanan ;
	
	}

	private function countNutrisi($nilai_gizi){
		
		$batasNutrisi = count($nilai_gizi);
		return $batasNutrisi ;
	
	}

	private function fungsiTujuan($harga,$jumlah){
		
		$Z="";
		for ($i=0; $i < $jumlah; $i++) { 
			if ($i<$jumlah-1) {
				$Z=	$Z.$harga[$i]['harga']."x".($i+1)."+"; 
			}
			else{
				$Z = $Z.$harga[$i]['harga']."x".($i+1) ;			
			}
		}
			
		return $Z ;
	
	}

	private function fungsiKendala($nilai_gizi,$jumlah,$jumlahGizi,$giziMakanan,$min_jumlah){
		
		$kendala[]="";
		//	var_dump($nilai_gizi) ;
		for ($i=0; $i < $jumlahGizi; $i++) { 
			for ($j=0; $j < $jumlah; $j++) {
				if ($i==0) {
				 		if ($j<$jumlah-1) {
				 			$kendala[$i] = $kendala[$i].$giziMakanan[$j]['protein']."x".($j+1)."+" ;
				 		//	echo $kendala[$i];
				 		}
				 		else{
				 			$kendala[$i] = $kendala[$i].$giziMakanan[$j]['protein']."x".($j+1)." <= ".$nilai_gizi['bts_a_protein'] ;
						//	echo $kendala[$i]."<br>";	
				 		}
				}	
				else if ($i==1) {
						if ($j<$jumlah-1) {
						 	@$kendala[$i] = $kendala[$i].$giziMakanan[$j]['lemak']."x".($j+1)."+" ;
						 }
						 else{
						 	@$kendala[$i] = $kendala[$i].$giziMakanan[$j]['lemak']."x".($j+1)." <= ".$nilai_gizi['bts_a_lemak'] ;
				 		 }	
				}
				else if ($i==2) {
						if ($j<$jumlah-1) {
							@$kendala[$i] = $kendala[$i].$giziMakanan[$j]['karbohidrat']."x".($j+1)."+" ;
				 		}
						 else{
				 			@$kendala[$i] = $kendala[$i].$giziMakanan[$j]['karbohidrat']."x".($j+1)." <= ".$nilai_gizi['bts_a_karbo'];
						 }	
				}
				else if ($i==3) {
						if ($j<$jumlah-1) {
					 		@$kendala[$i] = $kendala[$i].$giziMakanan[$j]['protein']."x".($j+1)."+" ;
					 	}
					 	else{
					 		@$kendala[$i] = $kendala[$i].$giziMakanan[$j]['protein']."x".($j+1)." >= ".$nilai_gizi['bts_b_protein'] ;
					 	}
				}
				else if ($i==4) {
						if ($j<$jumlah-1) {
						 	@$kendala[$i] = $kendala[$i].$giziMakanan[$j]['lemak']."x".($j+1)."+" ;
						 }
						 else{
						 	@$kendala[$i] = $kendala[$i].$giziMakanan[$j]['lemak']."x".($j+1)." >= ".$nilai_gizi['bts_b_lemak'] ;		
						}
				}		
				else if ($i==5) {
						if ($j<$jumlah-1) {
							@$kendala[$i] = $kendala[$i].$giziMakanan[$j]['karbohidrat']."x".($j+1)."+" ;
						}
						else{
							 @$kendala[$i] = $kendala[$i].$giziMakanan[$j]['karbohidrat']."x".($j+1)." >= ".$nilai_gizi['bts_b_karbo'] ;								
						}
				}		
				else{
						if ($j<$jumlah-1) {
						 	@$kendala[$i] = $kendala[$i].$giziMakanan[$j]['kalori']."x".($j+1)."+" ;
						 }
						 else{
						 	@$kendala[$i] = $kendala[$i].$giziMakanan[$j]['kalori']."x".($j+1)." = ".$nilai_gizi['TEE'] ;
				 		}
				}
			} //end for $j
		}	 //end for $i
		
		for ($k=0; $k < $jumlah ; $k++) { 
			$kendala[$k+7] = 	"x".($k+1)." >=".$min_jumlah ;					
		}						
				
		return $kendala ;
	
	}

	private function modelStandar($jumlahMakanan,$batasNutrisi,$kendala,$Z,$min_jumlah){
		
		for ($i=0; $i < $jumlahMakanan+4; $i++) { 
			$Z = $Z."0S1+0S2+0S3"."+ 0A".($i+1) ;
		}
				
		for ($j=0; $j < $batasNutrisi+$jumlahMakanan; $j++) { 
			//var_dump($batas[$ju]) ;
			$replace = array(">=","<=");
			$s=$j+1;
			$a=$j-2 ;
				if ($j<3) {
					$bts_baru[$j]= (str_replace($replace, "+ S$s =", $kendala[$j]));	
				}
				else if ($j==6) {
					$bts_baru[$j]= (str_replace("=", "+ A$a =", $kendala[$j]));
				}
				else{
					$bts_baru[$j]= (str_replace($replace, "- S$s + A$a =", $kendala[$j]));
				}	
		}
		
		return array($Z,$bts_baru) ;
	
	}

	private function tabelnilaiAwal($nilai_gizi,$jum_makanan,$makanan,$min_jumlah){
				
		$nilai_cj = -1;
		$jmlKol_Asli = 10;
		$jmlKol_tambahan = 2* $jum_makanan;
		$jmlKol = $jum_makanan + $jmlKol_Asli + $jmlKol_tambahan + 1 ;
		$jmlBar = 7 + $jum_makanan ;
		
		$matriks_identitas = array();
		//membuat nilai identitas
		for ($i=0; $i < $jum_makanan; $i++) { 
			for ($j=0; $j < $jum_makanan; $j++) { 
				if ($i == $j) {
					$matriks_identitas[$i][$j] = 1;
				} else {
					$matriks_identitas[$i][$j] = 0;
				}
			}
		}
		
		
		//mengisi nilai kolom flesibel 1 
		for ($i=-1; $i <= $jmlBar; $i++) { 
			for ($j=-1; $j <= $jum_makanan; $j++) { 
				if ($i==-1 && $j==-1) {
					$nilai[$i][$j] = "Kolom" ;
				}
				else if ($i==-1 && $j==0) {
					$nilai[$i][$j] = "Variabel" ;
				}
				else if (($i==-1) and (0<$j and $j<=$jum_makanan)) {
					$nilai[$i][$j] = "x$j" ;
				}
				else if ($i==0 && $j<1) {
					$nilai[$i][$j] = "Cj" ;
				}
				else if (($i==0) && (0<$j and $j<=$jum_makanan)) {
					$nilai[$i][$j] =0 ;
				}
				else if ((0<$i and $i<4) && ($j==-1)) {
					$nilai[$i][$j] = 0 ;
				}
				else if ((3<$i and $i<=$jmlBar) && ($j==-1)) {
					$nilai[$i][$j] = $nilai_cj ;
				}
				else if ((0<$i and $i<4) && ($j==0)) {
					$nilai[$i][$j] = "S$i" ;
				}
				else if ((3<$i and $i<=$jmlBar) && ($j==0)) {
					$a = $i -3;
					$nilai[$i][$j] = "A$a" ;
				}
				else if(($i==1 || $i== 4) && (0<$j and $j<=$jum_makanan)){
					$nilai[$i][$j] = $makanan[$j-1]['protein'] ;
				}
				else if(($i==2 || $i== 5) && (0<$j and $j<=$jum_makanan)){
					$nilai[$i][$j] = $makanan[$j-1]['lemak'] ;
				}
				else if(($i==3 || $i== 6) && (0<$j and $j<=$jum_makanan)){
					$nilai[$i][$j] = $makanan[$j-1]['karbohidrat'] ;
				}
				else if(($i==7) && (0<$j and $j<=$jum_makanan)){
					$nilai[$i][$j] = $makanan[$j-1]['kalori'] ;
				}
				else {
					$nilai[$i][$j] = 0 ;		//jika tidak ada dalam matrix diisi 0	
				}					
			}
		}

		// mengisi nilai identitas pada baris ke-8 dst
		$mi = 0;
		for ($i=8; $i <=$jmlBar; $i++) {
		$mj = 0 ;
			for ($j=1; $j <= $jum_makanan; $j++) { 
			 	$nilai[$i][$j] = $matriks_identitas[$mi][$mj];
				$mj++;
			 }$mi++; 
		}

		//mengisi nilai kolom 2 statis ()
		$var_judulBasis 	= array("S1","S2","S3","S4","A1","S5","A2","S6","A3","A4"); 
		$cj_basis	= array(0,0,0,0,$nilai_cj,0,$nilai_cj,0,$nilai_cj,$nilai_cj) ;
		$nilai_basis	= array(array(1,0,0,0,0,0,0,0,0,0),
							array(0,1,0,0,0,0,0,0,0,0),
							array(0,0,1,0,0,0,0,0,0,0),
							array(0,0,0,-1,1,0,0,0,0,0),
							array(0,0,0,0,0,-1,1,0,0,0),
							array(0,0,0,0,0,0,0,-1,1,0),
							array(0,0,0,0,0,0,0,0,0,1));
		$bts_gizi	 = array($nilai_gizi['bts_a_protein'],$nilai_gizi['bts_a_lemak'],$nilai_gizi['bts_a_karbo'],
									$nilai_gizi['bts_b_protein'],$nilai_gizi['bts_b_lemak'],$nilai_gizi['bts_b_karbo'],
									$nilai_gizi['TEE']);
		
		for ($i=-1; $i <= $jmlBar; $i++) { 
			for ($j=$jum_makanan+1; $j <= $jum_makanan+10; $j++) { 
				if (($i==-1) and ($jum_makanan<$j and $j<=$jum_makanan+10)) {
					$nilai[$i][$j] = $var_judulBasis[$j-$jum_makanan-1];
				}
				else if(($i==0) and ($jum_makanan<$j and $j<=$jum_makanan+10)) {
					$nilai[$i][$j] =	$cj_basis[$j-$jum_makanan-1];
				}
				else if ((0<$i and $i<=7) and ($jum_makanan<$j and $j<=$jum_makanan+10)) {
					$nilai[$i][$j] =  $nilai_basis[$i-1][$j-$jum_makanan-1] ;
				}
				else{
					$nilai[$i][$j] = 0 ;
				}
				
			}
		}
		
		//mengisi nilai kolom flesibel 3 
		$initS = 7;
		$initA = 5;
		
		for ($i=-1; $i <= $jmlBar; $i++) { 
			for ($j=$jum_makanan+11; $j <= $jmlKol; $j++) { 
				if (($i==-1) and ($jum_makanan+10<$j and $j<$jmlKol )) {
					if (substr($nilai[$i][$j-1], 0, 1) == "A") {
						$nilai[$i][$j] = "S".($initS);
						$initS++;
					} else {
						$nilai[$i][$j] = "A".($initA);
						$initA++;
					}
				}
				else if(($i==0) and ($jum_makanan+10<$j and $j<$jmlKol)) { 
					if (substr($nilai[-1][$j],0,1 ) == "A") {
						$nilai[$i][$j] = $nilai_cj ;
					}
					else{
						$nilai[$i][$j] = 0 ;
					}
				}
				else if ((0<$i and $i<=7) and ($jum_makanan+10<$j and $j<$jmlKol)) {
					$nilai[$i][$j] =  0 ;
				}
				else if ($i > 7 and $i<=$jmlBar and $j < $jmlKol) {
					if($nilai[$i][0] === $nilai[-1][$j+1]) {
						$nilai[$i][$j] = -1;
						$nilai[$i][$j+1] = 1;
					} else {
						$nilai[$i][$j] = 0;
						$nilai[$i][$j+1] = 0;
					}
					$j++;
				}
				else if ((0<$i and $i<=7) and ($j==$jmlKol)) {
					$nilai[$i][$j] = $bts_gizi[$i-1] ;
				}
				else if ((7<$i and $i<=$jmlBar) and ($j==$jmlKol)) {
					$nilai[$i][$j] = $min_jumlah;
				}
				else{
					$nilai[$i][$j] = "BATAS" ;
				}
				
			}
		}
		
		return array($nilai,$jmlBar,$jmlKol) ;
	
	}

	private function zjcj($nilai,$jmlBrs,$jmlKlm){
		
		$Zj = array();
		$ZjCj = array();

		for ($i=1; $i <= $jmlKlm; $i++) {
		$Zj[$i] = 0 ;
			for ($j=1; $j <= $jmlBrs ; $j++) {
			$Zj[$i] += ($nilai[$j][-1] * $nilai[$j][$i]);
				if ($i>0 and $i<=$jmlKlm) {
					$ZjCj[$i] =  $Zj[$i]-$nilai[0][$i] ;
						//echo $Zj[$i]."=".$nilai[$j][-1]."*".$nilai[$j][$i]."<br/>";	
						//echo "ZjCj : ".$ZjCj[$i]."<br/>";
				}
				else{
					$ZjCj[$i] = null;
				}
			}
		}
		
		return array($Zj,$ZjCj);
	
	}

	private function variabel_baru($nilai,$jmlBrs,$jmlKlm,$Zj,$ZjCj){
		
		$ZjCj_variabel_baru = $ZjCj[1];
		$index_variabel_baru = 1;
		for ($i=1; $i <$jmlKlm ; $i++) { 
			if ($ZjCj_variabel_baru > $ZjCj[$i]) {
				$ZjCj_variabel_baru = $ZjCj[$i] ;
				$index_variabel_baru = $i ;
			}

		}
			
		return array($ZjCj_variabel_baru,$index_variabel_baru) ;	
	
	}

	private function variabel_digantikan($nilai,$Jum_Baris,$Jum_Kolom,$index_variabel_baru){
		
		$hasilBagi = array();
		$variabel_digantikan =1000000000000;
		$index_variabel_digantikan = 1;
		for ($i=1; $i <= $Jum_Baris ; $i++) { 

			$namakolom[$i] = $nilai[$i][0] ;
			$kolomterpilih[$i] = $nilai[$i][$index_variabel_baru] ;
			//kolom terpilih atau variabel baru sama
			$batas[$i] = $nilai[$i][$Jum_Kolom] ; 
			if ($kolomterpilih[$i] != 0) {
				$hasilBagi[$i] = $batas[$i] / $kolomterpilih[$i] ;
				if ($hasilBagi[$i] > 0) {
					if ($variabel_digantikan > $hasilBagi[$i]) {
						$variabel_digantikan = $hasilBagi[$i] ;
						$index_variabel_digantikan = $i ;
					}	
				}	
			}
			else{
				$hasilBagi[$i] = "infinity" ;
			}		
		}	//end of for

		return array($hasilBagi,$variabel_digantikan,$index_variabel_digantikan);

	}

	private function koef_var_baru($nilai,$Jum_Baris,$Jum_Kolom,$index_variabel_baru,$index_variabel_digantikan){

		//menghitung koefisien terpilih
		for ($i=-1; $i <=$Jum_Kolom ; $i++) { 
			if ($i>0) {
				$nilaiBaru[$index_variabel_digantikan][$i] = $nilai[$index_variabel_digantikan][$i] / $nilai[$index_variabel_digantikan][$index_variabel_baru] ;
				//echo "cek : ".$index_variabel_digantikan."dan".$index_variabel_baru;
				//echo "iki loh : ".$nilaiBaru[$index_variabel_digantikan][$i]."=". $nilai[$index_variabel_digantikan][$i]."/".$nilai[$index_variabel_digantikan][$index_variabel_baru];
			}
			elseif ($i == 0) {
				$nilaiBaru[$index_variabel_digantikan][$i] = $nilai[-1][$index_variabel_baru] ;

			}
			else{
				$nilaiBaru[$index_variabel_digantikan][$i] = $nilai[0][$index_variabel_baru] ; 
			} 
			
		}

		//revisi koefisien baris lainnya
		for ($i=-1; $i <= $Jum_Baris ; $i++) { 
			for ($j=-1; $j <= $Jum_Kolom ; $j++) { 
				if (($i != $index_variabel_digantikan and $i>0) and ($j>0 and $j<=$Jum_Kolom)) {
					$nilaiBaru[$i][$j] = $nilai[$i][$j] - 
											($nilaiBaru[$index_variabel_digantikan][$j] * $nilai[$i][$index_variabel_baru] ) ;
				}
				else if (($i != $index_variabel_digantikan and $i>0 ) and ($j==0 or $j==-1)) {
					$nilaiBaru[$i][$j] = $nilai[$i][$j] ;
				}
				else if ($i==0 or $i==-1) {
					$nilaiBaru[$i][$j] = $nilai[$i][$j] ;
				}
				else{
					$nilaiBaru[$i][$j];
				}
			}
		}

		return $nilaiBaru ;
	
	}

	private function tampilTabelAwal($nilai,$Jum_Baris,$Jum_Kolom){
		echo	"<table border='1px'>
				<caption>Tabel nilai</caption>
				<tbody>" ;
			for ($i=-1; $i <= $Jum_Baris; $i++) { 
		echo	"<tr>" ;
				for ($j=-1; $j <= $Jum_Kolom ; $j++) {
					if ($i>0 and $j>0) {
					 	echo "<td align='center'>".round($nilai[$i][$j], 3)."</td>" ;
					 }
					 else{
					 	echo "<td align='center'>".$nilai[$i][$j]."</td>" ;
					 } 
				 } 
		echo	"</tr>" ;
				 }
		echo	"</tbody>
				</table>" ;
	
	}

	private function tampilCJZJ($nilai,$Zj,$ZjCj,$ZjCj_variabel_baru,$index_variabel_baru,$Jum_Kolom){
		//menampilkan tabel Zj dan Cj-Zj
			echo"<table border='1px'>
				<tbody>
				<thead>
					<tr>
					<th></th>" ;
					for ($i=1; $i <= $Jum_Kolom; $i++) {
			echo	"<th>".$nilai[-1][$i] ."</th>" ;
					} 
			echo	"</tr>
				</thead>
				<tr>
				<td>Zj</td>" ;
				for ($i=1; $i <= $Jum_Kolom; $i++) { 
			echo	"<td>".$Zj[$i]."</td>";			
					} 
			echo"</tr>
				<tr>
				<td>Cj-Zj</td>" ;
				for ($i=1; $i <= $Jum_Kolom; $i++) { 
			echo	"<td>".$ZjCj[$i]."</td>" ;			
				}
			echo	"</tr>
				</tbody>
				</table>";

			echo "Kolom Kuncinya adalah ".$nilai[-1][$index_variabel_baru]."<br>" ;
			echo "Dengan nilai ZjCj adalah ".$ZjCj_variabel_baru."<br>" ;
			echo "indeks Kolom Kunci adalah ".$index_variabel_baru."<br><br>" ;
	
	}

	private function tampilBarisKunci($nilai,$variabel_digantikan,$index_variabel_digantikan,$index_variabel_baru,$hasilBagi,$Jum_Kolom,$Jum_Baris){
		//menampilkan tabel baris kunci 
		echo	"<table border='1px'>
			<caption>Menghitung Baris Kunci</caption>
			<thead>
				<tr>
					<th>Kolom</th>";
		echo		"<th>".$nilai[-1][$index_variabel_baru]."</th>" ;
		echo		"<th>Batas</th>
					<th>Hasil Bagi</th>
				</tr>
			</thead>
			<tbody>";
				for ($j=1; $j <= $Jum_Baris ; $j++) { 
			echo	"<tr>";
			echo	"<td>".$nilai[$j][0]."</td>";
			echo	"<td>".$nilai[$j][$index_variabel_baru]."</td>" ;
			echo	"<td>".$nilai[$j][$Jum_Kolom]."</td>" ;
			echo	"<td>".$hasilBagi[$j]."</td>";
			echo	"</tr>" ;
				}
		echo	"</tbody>
		</table>";

		echo "Dengan nilai Baris Kunci adalah ".$variabel_digantikan ."<br>" ;
		echo "indeks Baris Kunci adalah Baris ke-".$index_variabel_digantikan ."<br>";
	
	}

	private function tampilTabel($nilai,$Jum_Baris,$Jum_Kolom){
		//menampilkan tabel nilai
		echo	"<table border='1px'>
				<caption>Tabel nilai</caption>
				<tbody>" ;
			for ($i=-1; $i <= $Jum_Baris; $i++) { 
		echo	"<tr>" ;
				for ($j=-1; $j <= $Jum_Kolom ; $j++) {
					if ($i>0 and $j>0) {
					 	echo "<td align='center'>".$nilai[$i][$j]."</td>" ;
					 }
					 else{
					 	echo "<td align='center'>".$nilai[$i][$j]."</td>" ;
					 } 
				 } 
		echo	"</tr>" ;
				 }
		echo	"</tbody>
				</table>" ;
	
	}
	
	private function stopcondition1($array,$Jum_Kolom){
		echo $array[$Jum_Kolom]."x";
		if ($array[$Jum_Kolom]==0){
			return true;
			
		}
		else {
			
			return false;
				

		}
	}

	private function stopcondition2($array){
		$jum_positif = 0;
		
		for ($i=1; $i < count($array) ; $i++) { 
		//		echo $array[$i]." ";
			if ($array[$i] < 0) {
				return false;
			} 
			else {
				$jum_positif++;
			}
		}
	/*	echo "<br/>";
		echo "Jumlah Positif: ". $jum_positif. "<br/>";
		echo "count array: ". count($array);*/

		if ($jum_positif == (count($array) - 1)) {
			return true;
		} else {
			return false;
		}
	}

	private function result($nilai,$Jum_Kolom,$Jum_Baris,$getMakanan,$jumlahMakanan){
		$hasil = array() ;
		$cek = array() ;
		$x = array() ;
		$count = 0 ;

		//memasukkan identitas x dan nama
		for ($i=0; $i < $jumlahMakanan; $i++) { 
			$x[$i][0] = "x".($i+1);
			$x[$i][1] = $getMakanan[$i]['nama_makanan'] ;
		}

		//cek apakah ada var x dalam nilai
		for ($i=1; $i <= $Jum_Baris ; $i++) { 
			if (substr($nilai[$i][0], 0, 1) == "x") {
					$cek[$count][0] = $nilai[$i][0];
					$cek[$count][1] = $nilai[$i][$Jum_Kolom];
					$count++;	
			}
		}
		
		$temp = array();
		for ($i=0; $i < $jumlahMakanan; $i++) {
			$flag = false;

			for ($j=0; $j < $count ; $j++) { 
			
				if ($x[$i][0] == $cek[$j][0]) {
					$flag = true;
					$temp[0] = $x[$i][0] ;
					$temp[1] = $x[$i][1] ;
					$temp[2] = $cek[$j][1];	
				}
				
			}
			if ($flag == true)
			{
				$hasil[$i][0] = $temp[0] ;
				$hasil[$i][1] = $temp[1] ;
				$hasil[$i][2] = $temp[2];				
			}
			else{
				$hasil[$i][0] = $x[$i][0] ;
				$hasil[$i][1] = $x[$i][1] ;
				$hasil[$i][2] = 0;
				}
		}
		
		return $hasil ;
	}
	
	//AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
	private function tabelnilaiAwal2($nilai_gizi,$jumlahMakanan,$getMakanan,$min_jumlah,$nilai){
				
		$nilai_cj = -1;
		$Jum_KolomSurplus = 10;
		$Jum_KolomSurplus_flex = 2* $jumlahMakanan;
		$Jum_Kolom = $jumlahMakanan + $Jum_KolomSurplus + $Jum_KolomSurplus_flex + 1 ;
		$Jum_Baris = 7 + $jumlahMakanan ;
		
		for ($i=-1;$i<=$Jum_Baris;$i++){
			for ($j=-1;$j<=$Jum_Kolom;$j++){
				//echo $i." ".$j."<br>";
				//echo "ABC";
		$nilai2[$i][$j]=$nilai[$i][$j];
		
		
		}
		}
		
		for ($i=-1;$i<=$Jum_Baris;$i++){
			for ($j=-1;$j<=$Jum_Kolom;$j++){
					/*if (($i==-1) && (0<$j and $j <= $Jum_Kolom)){
					$kalimat = $nilai2[$i][$j];
					$sub_kalimat = substr($kalimat,0,1);
					//echo $i." ".$j."<br>";
					if($sub_kalimat=="A"){
						//echo "AA";
							//echo $i." ".$j;
						for ($i=-1; $i<=$Jum_Baris;$i++){
							$nilai2[$i][$j]="-";
						}
					}
					
				
			}*/
				 if ((0<$i and $i<=$Jum_Baris) && ($j==0)){
					$kalimat = $nilai2[$i][$j];
					$sub_kalimat = substr($kalimat,0,1);
										$index = substr($kalimat,1);
										$indexx= intval($index);

					//echo $i." ".$j."<br>";
					if($sub_kalimat=="x"){
						//echo "azz";
						$nilai2[$i][$j-1]= ($getMakanan[$indexx-1]['harga'])*-1;
					}
				}
			else if (($i==0) && (0<$j and $j<=$jumlahMakanan)){
					$nilai2[$i][$j] = ($getMakanan[$j-1]['harga'])*-1 ;				
		
			}
			
			else if (($i==-1)&&(0<$j and $j<$Jum_Kolom)){
			if (substr($nilai2[$i][$j],0,1)=="A"){
			for ($temp=-1;$temp<$Jum_Kolom;$temp++){
		//	echo $i.$j;	
				$nilai2[$temp][$j]=0;
			}
			
		}
			}
			
	
		}
		}
	

		return array($nilai2,$Jum_Baris,$Jum_Kolom) ;
		}
	
		
		
		
	//AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA

	public function nilai_gizi(){
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');

		$data['pilihmakanan']=$this->input->post("pilihmakanan");
		$data['min_jumlah'] = 1;

		if ($data['status']== 'true') {
			$data['kebutuhanUser'] = $this->hitung_kebutuhan_pengguna($data,$data['pilihmakanan']);
			
			$data['getMakanan'] = $this->getMakanan($data,$data['pilihmakanan']);	
			$data['countMakanan'] = $this->countMakanan($data['getMakanan']) ;
			$data['countNutrisi'] = $this->countNutrisi($data['kebutuhanUser']) ;
			if ($data['countMakanan'] == 0) {
				redirect('user/pilihmakanan','refresh') ;
			}
			else
			$data['fungsiTujuan'] = $this->fungsiTujuan($data['getMakanan'],$data['countMakanan']);
			$data['fungsiKendala'] = $this->fungsiKendala($data['kebutuhanUser'],$data['countMakanan'],$data['countNutrisi'],$data['getMakanan'],$data['min_jumlah']);
			$modelStandar = $this->modelStandar($data['countMakanan'],$data['countNutrisi'],$data['fungsiKendala'],$data['fungsiTujuan'],$data['min_jumlah']);
			$data['modelStandar_Tujuan'] = $modelStandar[0] ;
			$data['modelStandar_Kendala'] = $modelStandar[1] ;
			// fungsi tabel nilai awal
			$tabelnilaiAwal = $this->tabelnilaiAwal($data['kebutuhanUser'],$data['countMakanan'],$data['getMakanan'],$data['min_jumlah']);
			$data['nilai'] = $tabelnilaiAwal[0];
			$data['nilai_AWAL'] = $tabelnilaiAwal[0];
			$data['Jum_Baris'] = $tabelnilaiAwal[1];
			$data['Jum_Kolom'] = $tabelnilaiAwal[2];


		//	$this->tampilTabelAwal($data['nilai'],$data['Jum_Baris'],$data['Jum_Kolom']) ;
			$data['countIterasi'] = 0;
			do {
		//		echo "Iterasi ke -".$data['countIterasi'];
				$zj_zjcj= $this->zjcj($data['nilai'],$data['Jum_Baris'],$data['Jum_Kolom']);
				$data['Zj'] = $zj_zjcj[0];
				$data['ZjCj'] = $zj_zjcj[1];
				
				// minimum negatif ZjCj terbesar(kolom pengganti)
				$variabel_baru =  $this->variabel_baru($data['nilai'],$data['Jum_Baris'],$data['Jum_Kolom'],$data['Zj'],$data['ZjCj']) ;
				$data['ZjCj_variabel_baru'] = $variabel_baru[0] ;
				$data['index_variabel_baru'] = $variabel_baru[1] ;
		//		$this->tampilCJZJ($data['nilai'],$data['Zj'],$data['ZjCj'],$data['ZjCj_variabel_baru'],$data['index_variabel_baru'],$data['Jum_Kolom']);

				// mencari baris yang terganti 
				$variabel_digantikan = $this->variabel_digantikan($data['nilai'],$data['Jum_Baris'],$data['Jum_Kolom'],$data['index_variabel_baru']) ;
				$data['hasilBagi'] =$variabel_digantikan[0] ;
				$data['variabel_digantikan'] = $variabel_digantikan[1] ;
				$data['index_variabel_digantikan'] = $variabel_digantikan[2] ;
		//		$this->tampilBarisKunci($data['nilai'],$data['variabel_digantikan'],$data['index_variabel_digantikan'],$data['index_variabel_baru'],$data['hasilBagi'],$data['Jum_Kolom'],$data['Jum_Baris']);

				//koefisien baru yang masuk
		//		$setnilai = array();
					
				$data['nilai'] = $this->koef_var_baru($data['nilai'],$data['Jum_Baris'],$data['Jum_Kolom'],$data['index_variabel_baru'],$data['index_variabel_digantikan']);
		//		$this->tampilTabel($data['nilai'],$data['Jum_Baris'],$data['Jum_Kolom']) ;
				
		//		$setnilai[] = $data['nilai'];
				$data['countIterasi']++;
				$data['ZjCj'] = $zj_zjcj[1];
			if ($data['countIterasi'] == 25) {
					break;
				}
			//	echo "<br> nilai ZjCj = ".$data['ZjCj'] ;
//$this->stopcondition2($data['ZjCj'],$data['Jum_Kolom']) == false;
			}
	//while ($data['countIterasi'] !=25);
			while($this->stopcondition1($data['ZjCj'],$data['Jum_Kolom']) == false);
		//$data['SETnilai'] = $setnilai;	
			
			

			//FASE2
			
			$tabelnilaiAwal2 = $this->tabelnilaiAwal2($data['kebutuhanUser'],$data['countMakanan'],$data['getMakanan'],$data['min_jumlah'],$data['nilai']);
			$data['nilai2'] = $tabelnilaiAwal2[0];
			$data['nilai_AWAL2'] = $tabelnilaiAwal2[0];
			$data['Jum_Baris'] = $tabelnilaiAwal[1];
			$data['Jum_Kolom'] = $tabelnilaiAwal[2];
			$data['countIterasi2'] = 0;
			do{
		//		echo "Iterasi ke -".$data['countIterasi'];
				$zj_zjcj= $this->zjcj($data['nilai2'],$data['Jum_Baris'],$data['Jum_Kolom']);
				$data['Zj'] = $zj_zjcj[0];
				$data['ZjCj'] = $zj_zjcj[1];
				
				// minimum negatif ZjCj terbesar(kolom pengganti)
				$variabel_baru =  $this->variabel_baru($data['nilai2'],$data['Jum_Baris'],$data['Jum_Kolom'],$data['Zj'],$data['ZjCj']) ;
				$data['ZjCj_variabel_baru'] = $variabel_baru[0] ;
				$data['index_variabel_baru'] = $variabel_baru[1] ;
		//		$this->tampilCJZJ($data['nilai2'],$data['Zj'],$data['ZjCj'],$data['ZjCj_variabel_baru'],$data['index_variabel_baru'],$data['Jum_Kolom']);

				// mencari baris yang terganti 
				$variabel_digantikan = $this->variabel_digantikan($data['nilai2'],$data['Jum_Baris'],$data['Jum_Kolom'],$data['index_variabel_baru']) ;
				$data['hasilBagi'] =$variabel_digantikan[0] ;
				$data['variabel_digantikan'] = $variabel_digantikan[1] ;
				$data['index_variabel_digantikan'] = $variabel_digantikan[2] ;
		//		$this->tampilBarisKunci($data['nilai2'],$data['variabel_digantikan'],$data['index_variabel_digantikan'],$data['index_variabel_baru'],$data['hasilBagi'],$data['Jum_Kolom'],$data['Jum_Baris']);

				//koefisien baru yang masuk
		//		$setnilai2 = array();
					
				$data['nilai2'] = $this->koef_var_baru($data['nilai2'],$data['Jum_Baris'],$data['Jum_Kolom'],$data['index_variabel_baru'],$data['index_variabel_digantikan']);
		//		$this->tampilTabel($data['nilai2'],$data['Jum_Baris'],$data['Jum_Kolom']) ;
				
		//		$setnilai2[] = $data['nilai2'];
				$data['countIterasi2']++;
				$data['ZjCj'] = $zj_zjcj[1];
			/*	if ($data['countIterasi'] == 15) {
					break;
				}
				echo "<br> nilai ZjCj = ".$data['ZjCj'] ;*/

			}while($this->stopcondition2($data['ZjCj']) == false);
	$data['result'] = $this->result($data['nilai2'],$data['Jum_Kolom'],$data['Jum_Baris'],$data['getMakanan'],$data['countMakanan']);

			//FASE2
			$this->load->view('header');
			$this->load->view('nilai_gizi', $data);
			$this->load->view('footer') ;
		}
		else{
			$this->load->view('header');
			$this->load->view('belumlogin');
			$this->load->view('footer');
		}
	
	}
	
}