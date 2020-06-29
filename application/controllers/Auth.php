<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Auth extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('ModelAuth');
		}
		public function index()
		{			
			
			$data['tit']='Loginn';
			$this->load->view('tambahan/v_head',$data);
			$this->load->view('login');
			$this->load->view('tambahan/jss');
			
			
		}	
		public function login()
		{
			$nama = $this->input->post('nama');
			$pass = $this->input->post('pass');
			// $pass = md5($pass);
			$result = $this->ModelAuth->cekLogin($nama, $pass);
			if($result) {
				$sess_array = array();
				foreach($result as $row) {
					//create the session
					$sess_array = array(
						'nama' => $row->nama,
						'id' => $row->id,
						'level' => $row->level,
						'login_status' => true,
						
					);
					
					
					$msg="<div id='success-alert' class='alert alert-success alert-dismissable'>
	                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
	                 <center>Selamat Datang ".$row->nama."!</center>
	              	</div>";
					$this->session->set_userdata($sess_array);	
					$this->session->set_flashdata('notif', $msg);	
					if($row->level==0){
						redirect('Ad/app3','refresh');

					}else if($row->level==2){
						redirect('Ad/app1','refresh');

					}else if($row->level==3){
						redirect('Ad/app2','refresh');

					}else if($row->level==1){
						redirect('Ad','refresh');
					}				
				}
			}		
			if(!$result)
			{
				$msg="<div id='success-alert' class='alert alert-success alert-dismissable'>
	                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
	                 <center>Password/Nama Salah</center>
	              	</div>";
				$this->session->set_flashdata('nn',$msg);
				redirect('Auth','refresh');
			}
			
		}
	
		function logout() {		
				$this->session->unset_userdata('id');
				$this->session->unset_userdata('level');
				$this->session->unset_userdata('login_status');		
				$msg="<div id='success-alert' class='alert alert-success alert-dismissable'>
	                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
	                 <center>Berhasil Logout</center>
	              	</div>";		
				$this->session->set_flashdata('nn',$msg);
				redirect('Auth'); 
		}
	}
