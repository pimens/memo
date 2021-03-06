<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('ModelApi');
		$this->load->model('M_ad');
    }
    public function login()
	{
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$result = $this->ModelApi->loginUser($nama,$password);
		echo json_encode($result);
    }
    //untuk pemohon
    
	public function index()
	{

		$data['title'] = 'Beranda Adminnn';
		$d['course'] = $this->ModelApi->getAllData();
		$this->load->view('admin/v_head', $data);
		$this->load->view('admin/v_sidebar', $d);
		$this->load->view('admin/v_dash');
	}	
	public function getMakananById($id)
	{
		$data['title'] = 'Edit Makanan';
		$d['course'] = $this->ModelApi->getMakananById($id);
		$this->load->view('admin/v_head', $data);
		$this->load->view('admin/v_sidebar', $d);
		$this->load->view('admin/v_editMakanan');
	}
	public function getMakanan()
	{
        $d = $this->ModelApi->getAllData();
        echo json_encode($d);
	}	
	public function getMakananOffset($start,$offset)
	{
        $d = $this->ModelApi->getMakananOffset($start,$offset);
        echo json_encode($d);
	}	
	public function getMaxTrx()
	{
        $d = $this->ModelApi->getMaxTrx();
        echo json_encode($d);
	}	
	public function getJUser($hp)
	{
        $d = $this->ModelApi->getJUser($hp);
        echo json_encode($d);
	}	
	public function getJumlahOrder()
	{
        $d = $this->ModelApi->getJumlahOrder();
        echo json_encode($d);
	}	
	public function getPemasukan()
	{
        $d = $this->ModelApi->getPemasukan();
        echo json_encode($d);
	}	
	public function jumlahPelanggan()
	{
        $d = $this->ModelApi->jumlahPelanggan();
        echo json_encode($d);
	}	
	public function addMakanan()
	{
		$nama = $this->input->post('nama');
		echo $nama."ini tes";
	}
	public function insertInvoice()
	{
		$hp = $this->input->post('hp');
		$nama = $this->input->post('nama');
		$makanan = $this->input->post('mkn');
		$jumlah = $this->input->post('jmlh');
		$trx = $this->input->post('trx');
		$st = $this->input->post('st');
		$outlet = $this->input->post('cab');
		$address = $this->input->post('alamat');
		$dd = $this->ModelApi->cekUser($hp);
		if($this->ModelApi->cekUser($hp)){			 
			// echo$hp;
			$this->ModelApi->insertInvoice($hp,$nama,$makanan,$jumlah,$trx,$st,$outlet,$address,true);
		}else{
			// echo $dd->id;
			$this->ModelApi->insertUser($nama,$hp);			
			$this->ModelApi->insertInvoice($hp,$nama,$makanan,$jumlah,$trx,$st,$outlet,$address,false);
			// $this->ModelApi->del($dd->id,$hp);			
		}		
		// echo "$nama.$hp.$makanan.$jumlah.$st.$cab.$trx";

		// $this->ModelApi->del();

		// $this->ModelApi->insertInvoice("526666","iman","1","3","100","8","1","swd");
		// $this->ModelApi->insertInvoice("526666","iman","1","3","100","8","1","swd");
		// $this->ModelApi->insertInvoice("526666","iman","1","3","100","8","1","swd");


		
	}
	public function editPermohonan($id)
	{
		$data['title'] = 'Edit Permohonan';
		$d['permohonan'] = $this->ModelApi->getPermohonanById($id);
		$data['user'] = $this->ModelApi->userLevel();
		$this->load->view('admin/routing', $data);
		$this->load->view('admin/v_head', $data);
		$this->load->view('admin/v_sidebar', $d);
		$this->load->view('admin/v_editPermohonan');
	}
	public function insertPermohonan()
	{
		$this->load->view('admin/routing');
		$data['nomor'] = $this->input->post('nomor');
		$data['kepada'] = $this->input->post('kepada');
		$data['dir'] = $this->input->post('dir');
		$data['dari'] = $this->session->userdata('id');
		$data['tanggal'] = $this->input->post('tanggal');
		$data['hal'] = $this->input->post('hal');
		$data['jenis'] = $this->input->post('jenis');
		$data['deskripsi'] = $this->input->post('deskripsi');
		$this->ModelApi->insertPermohonan($data);
		redirect('Ad/');
	}
	public function editPermohonanAction()
	{
		$this->load->view('admin/routing');
		$data['nomor'] = $this->input->post('nomor');
		$data['id'] = $this->input->post('id');
		$data['kepada'] = $this->input->post('kepada');
		$data['dir'] = $this->input->post('dir');
		$data['dari'] = $this->session->userdata('id');
		$data['tanggal'] = $this->input->post('tanggal');
		$data['hal'] = $this->input->post('hal');
		$data['jenis'] = $this->input->post('jenis');
		$data['deskripsi'] = $this->input->post('deskripsi');
		$this->ModelApi->editPermohonan($data);
		redirect('Ad');
	}
	public function deletePermohonan($id)
	{
		$this->load->view('admin/routing');
		$this->ModelApi->deletePermohonan($id);
		echo json_encode(array("status" => TRUE));
	}
	//tabel memo
	public function memo($id)
	{
		$this->load->view('admin/routing');
		$d['permohonan'] = $this->ModelApi->getPermohonanById($id);
		$d['memo'] =  $this->ModelApi->getTabelMemo($id);
		$data['title'] = 'Tabel Memo';
		$this->load->view('admin/v_head', $data);
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_memo', $d);
	}
	public function insertMemo()
	{
		$this->load->view('admin/routing');
		$data['desa'] = $this->input->post('desa');
		$data['norek'] = $this->input->post('norek');
		$data['fee'] = $this->input->post('fee');
		$data['setoran'] = $this->input->post('setoran');
		$data['bendahara'] = $this->input->post('bendahara');
		$data['id'] = $this->input->post('id');
		$this->ModelApi->insertMemo($data);
		$this->session->set_flashdata('notif', '<div id="success-alert" class="alert alert-success alert-dismissable">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                 <center>Data Ditambahkan!</center>
	              </div>');
		redirect("Ad/memo/" . $data['id'] . "");
	}
	public function editMemo($id)
	{
		$this->load->view('admin/routing');
		$data['title'] = 'Edit Memo';
		$d['memo'] = $this->ModelApi->getMemoById($id);
		$this->load->view('admin/v_head', $data);
		$this->load->view('admin/v_sidebar', $d);
		$this->load->view('admin/v_editMemo');
	}
	public function editMemoAction()
	{
		$data['desa'] = $this->input->post('desa');
		$data['norek'] = $this->input->post('norek');
		$data['fee'] = $this->input->post('fee');
		$data['setoran'] = $this->input->post('setoran');
		$data['bendahara'] = $this->input->post('bendahara');
		$data['id'] = $this->input->post('id');
		$data['permohonan'] = $this->input->post('permohonan');
		$this->ModelApi->editMemo($data);
		redirect("Ad/memo/" . $data['permohonan'] . "");
	}
	public function deleteMemo($id)
	{
		$this->ModelApi->deleteMemo($id);
		$this->session->set_flashdata('notif', '<div id="success-alert" class="alert alert-success alert-dismissable">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                 <center>Data Dihapus!</center>
	              </div>');
		echo json_encode(array("status" => TRUE));
	}
	public function approve($id, $status)
	{
		$this->ModelApi->approve($id, $status);
		redirect("Ad");
	}
	public function reject()
	{
		$komentar = $this->input->post('komentar');
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$this->ModelApi->reject($id, $komentar, $status);
		redirect("Ad");
	}
	//Barang
	public function barang($id)
	{
		$this->load->view('admin/routing');
		$d['permohonan'] = $this->ModelApi->getPermohonanById($id);
		$d['barang'] =  $this->ModelApi->getTabelBarang($id);
		$data['title'] = 'Tabel Barang';
		$this->load->view('admin/v_head', $data);
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_barang', $d);
	}
	public function insertBarang()
	{
		$this->load->view('admin/routing');
		$data['nama'] = $this->input->post('nama');
		$data['unit'] = $this->input->post('unit');
		$data['ket'] = $this->input->post('keterangan');
		$data['harga'] = $this->input->post('harga');
		$data['satuan'] = $this->input->post('total');
		$data['id'] = $this->input->post('id');
		$this->ModelApi->insertBarang($data);
		$this->session->set_flashdata('notif', '<div id="success-alert" class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				 <center>Data Ditambahkan!</center>
			  </div>');
		redirect("Ad/barang/" . $data['id'] . "");
	}
	public function editBarang($id)
	{
		$this->load->view('admin/routing');
		$data['title'] = 'Edit Memo';
		$d['barang'] = $this->ModelApi->getBarangById($id);
		$this->load->view('admin/v_head', $data);
		$this->load->view('admin/v_sidebar', $d);
		$this->load->view('admin/v_editBarang');
	}
	public function editBarangAction()
	{
		$data['nama'] = $this->input->post('nama');
		$data['unit'] = $this->input->post('unit');
		$data['ket'] = $this->input->post('keterangan');
		$data['harga'] = $this->input->post('harga');
		$data['satuan'] = $this->input->post('total');
		$data['id'] = $this->input->post('id');
		$data['permohonan'] = $this->input->post('permohonan');
		$this->ModelApi->editBarang($data);
		redirect("Ad/barang/" . $data['permohonan'] . "");
	}
	public function deleteBarang($id)
	{
		$this->ModelApi->deleteBarang($id);
		$this->session->set_flashdata('notif', '<div id="success-alert" class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				 <center>Data Dihapus!</center>
			  </div>');
		echo json_encode(array("status" => TRUE));
	}




	//direksi
	public function app1()
	{
		$data['permohonan'] = $this->ModelApi->getDataApp1();
		$data['title'] = 'Beranda Memo';
		$this->load->view('app1/routing');
		$this->load->view('admin/v_head', $data);
		$this->load->view('app1/v_sidebar');
		$this->load->view('app1/v_MemoApp1');
	}
	public function detailMemo($id)
	{
		$d['permohonan'] = $this->ModelApi->getPermohonanById($id);
		$d['memo'] =  $this->ModelApi->getTabelMemo($id);
		$data['title'] = 'Tabel Memo';
		$this->load->view('app1/routing');
		$this->load->view('admin/v_head', $data);
		$this->load->view('app1/v_sidebar');
		$this->load->view('app1/v_detailMemo', $d);
	}
	public function detailBarang($id)
	{
		$d['permohonan'] = $this->ModelApi->getPermohonanById($id);
		$d['barang'] =  $this->ModelApi->getTabelBarang($id);
		$data['title'] = 'Tabel Memo';
		$this->load->view('app1/routing');
		$this->load->view('admin/v_head', $data);
		$this->load->view('app1/v_sidebar');
		$this->load->view('app1/v_detailBarang', $d);
	}

	//direktur
	public function app2()
	{
		$data['permohonan'] = $this->ModelApi->getDataApp2();
		$data['title'] = 'Beranda Memo';
		$this->load->view('direktur/routing');
		$this->load->view('admin/v_head', $data);
		$this->load->view('direktur/v_dirSidebar');
		$this->load->view('direktur/v_dirMemoApp1');
	}
	public function detailMemo2($id)
	{
		$d['permohonan'] = $this->ModelApi->getPermohonanById($id);
		$d['memo'] =  $this->ModelApi->getTabelMemo($id);
		$data['title'] = 'Tabel Memo';
		$this->load->view('direktur/routing');
		$this->load->view('admin/v_head', $data);
		$this->load->view('direktur/v_dirSidebar');
		$this->load->view('direktur/v_dirDetailMemo', $d);
	}
	public function detailBarang2($id)
	{
		$d['permohonan'] = $this->ModelApi->getPermohonanById($id);
		$d['barang'] =  $this->ModelApi->getTabelBarang($id);
		$data['title'] = 'Tabel Barang';
		$this->load->view('direktur/routing');
		$this->load->view('admin/v_head', $data);
		$this->load->view('direktur/v_dirSidebar');
		$this->load->view('direktur/v_dirDetailBarang', $d);
	}
	//superadmin
	public function app3()
	{
		$data['permohonan'] = $this->ModelApi->getDataApp3();
		$data['title'] = 'Beranda Memo';
		$this->load->view('superadmin/routing');
		$this->load->view('admin/v_head', $data);
		$this->load->view('superadmin/v_superSidebar');
		$this->load->view('superadmin/v_superMemoApp1');
	}
	public function detailMemo3($id)
	{
		$d['permohonan'] = $this->ModelApi->getPermohonanById($id);
		$d['memo'] =  $this->ModelApi->getTabelMemo($id);
		$data['title'] = 'Tabel Memo';
		$this->load->view('superadmin/routing');
		$this->load->view('admin/v_head', $data);
		$this->load->view('superadmin/v_superSidebar');
		$this->load->view('superadmin/v_superDetailMemo', $d);
	}
	public function detailBarang3($id)
	{
		$d['permohonan'] = $this->ModelApi->getPermohonanById($id);
		$d['barang'] =  $this->ModelApi->getTabelBarang($id);
		$data['title'] = 'Tabel Memo';
		$this->load->view('superadmin/routing');
		$this->load->view('admin/v_head', $data);
		$this->load->view('superadmin/v_superSidebar');
		$this->load->view('superadmin/v_superDetailBarang', $d);
	}

	public function user()
	{
		$data['user'] = $this->ModelApi->userLevelAll();
		$data['title'] = 'Manage User';
		$this->load->view('superadmin/routing');
		$this->load->view('admin/v_head', $data);
		$this->load->view('superadmin/v_superSidebar');
		$this->load->view('superadmin/v_user');
	}

	public function insertUser()
	{
		$this->load->view('superadmin/routing');
		$data['nama'] = $this->input->post('nama');
		$data['jabatan'] = $this->input->post('jabatan');
		$data['level'] = $this->input->post('level');
		$this->ModelApi->insertUser($data);
		$this->session->set_flashdata('notif', '<div id="success-alert" class="alert alert-success alert-dismissable">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                 <center>Data User Ditambahkan!</center>
	              </div>');
		redirect("Ad/user");
	}
	public function profil()
	{
		$data['title'] = 'Edit Profil';
		$d['user'] = $this->ModelApi->getUserById();
		$this->load->view('admin/v_head', $data);
		$this->load->view('admin/v_sidebar', $d);
		$this->load->view('profil');
	}
	public function editUser()
	{
		$data['nama'] = $this->input->post('nama');
		$data['jabatan'] = $this->input->post('jabatan');
		$data['password'] = $this->input->post('password');
		$data['lama'] = $this->input->post('lama');
		$this->ModelApi->editUser($data);
		$this->session->set_flashdata('notif', '<div id="success-alert" class="alert alert-success alert-dismissable">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                 <center>Data User Diedit!</center>
	              </div>');
		redirect("Ad");
	}
	public function deleteUser($id)
	{
		$this->ModelApi->deleteUser($id);
		$this->session->set_flashdata('notif', '<div id="success-alert" class="alert alert-success alert-dismissable">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                 <center>Data Dihapus!</center>
	              </div>');
		echo json_encode(array("status" => TRUE));
	}
	//report=================
	public function report($idPermohonan)
	{
		$this->load->library('csvimport'); //meload library csvimport.php
		$d['permohonan'] = $this->ModelApi->getPermohonanById($idPermohonan);
		$q =  $this->ModelApi->getTabelMemo($idPermohonan);
		$data = array();
		$header = array();
		$i = 2;
		$in = 1;
		$data[1] = array('', '', '', 'No.', 'Desa', 'Setoran (Rp)', 'Fee (Rp)', 'No Rekening', 'Nama Bendahara');
		// $data[2] = array('');
		$header[1] = array('', 'Memo',);
		$header[2] = array('', 'Nomor', ':', $d['permohonan']->nomor);
		$header[3] = array('', 'Kepada', ':', $d['permohonan']->kepada);
		$header[4] = array('', 'Dari', ':', $d['permohonan']->dari);
		$header[5] = array('', 'Tanggal', ':', $d['permohonan']->tanggal);
		$header[6] = array('', 'Perihal', ':', $d['permohonan']->hal);

		$header[7] = array('', '', '');
		$header[8] = array('', '', '');
		$header[9] = array('', '', '', $d['permohonan']->deskripsi);
		$header[10] = array('', '', '');
		$header[11] = array('', '', '');

		$total = 0;
		$this->load->helper('csv');
		// $q = $this->ModelApi->getAllUser();
		foreach ($q as $row) {
			$total = $total + $row->setoran;
			$data[++$i] = array('', '', '', $in, $row->desa, $row->setoran, $row->fee, $row->norekening, $row->bendahara);
			$in++;
		}
		$data[++$i] = array('', '', '', '', 'Total', $total);
		echo array_to_csv($header);
		echo array_to_csv($data, 'Report-' . $d['permohonan']->nomor . '.csv');
		die();
	}
	public function reportBarang($idPermohonan)
	{
		$this->load->library('csvimport'); //meload library csvimport.php
		$d['permohonan'] = $this->ModelApi->getPermohonanById($idPermohonan);
		$q =  $this->ModelApi->getTabelBarang($idPermohonan);
		$data = array();
		$header = array();
		$i = 2;
		$in = 1;
		$data[1] = array('', '', '', 'No.', 'Nama', 'Unit', 'Harga (Rp)', 'Total', 'Keterangan');
		$data[2] = array('');
		$header[1] = array('', 'Memo',);
		$header[2] = array('', 'Nomor', ':', $d['permohonan']->nomor);
		$header[3] = array('', 'Kepada', ':', $d['permohonan']->kepada);
		$header[4] = array('', 'Dari', ':', $d['permohonan']->dari);
		$header[5] = array('', 'Tanggal', ':', $d['permohonan']->tanggal);
		$header[6] = array('', 'Perihal', ':', $d['permohonan']->hal);

		$header[7] = array('', '', '');
		$header[8] = array('', '', '');
		$header[9] = array('', '', '', $d['permohonan']->deskripsi);
		$header[10] = array('', '', '');
		$header[11] = array('', '', '');

		$total = 0;
		$this->load->helper('csv');
		foreach ($q as $row) {
			$j=0;
			$j=$row->unit*$row->harga;
			$total = $total + $j;
			$data[++$i] = array('', '', '', $in, $row->nama_barang, $row->unit, $row->harga, 
			$j, $row->keterangan);
			$in++;
		}
		$data[++$i] = array('', '', '', '','', 'Total', $total);
		echo array_to_csv($header);
		echo array_to_csv($data, 'ReportBarang-' . $d['permohonan']->nomor . '.csv');
		die();
	}
	public function listMemo()
	{
		$this->load->library('csvimport'); //meload library csvimport.php
		$q =  $this->ModelApi->getDataApp3();
		$data = array();
		$header = array();
		$i = 2;
		$in = 1;
		$data[1] = array('', 'No.', 'Dari', 'Kepada', 'Direktur', 'Tanggal', 'Perihal', 'Status', 'Komentar',);
		$data[2] = array('');
		$header[1] = array('', 'List All Memo',);
		$header[2] = array('');
		$this->load->helper('csv');
		foreach ($q as $row) {
			if ($row->status == 0) {
				$st = "Pending";
			} else if ($row->status == 1) {
				$st = "Approve X";
			} else if ($row->status == 2) {
				$st = "Approve XX";
			} else if ($row->status == 3) {
				$st = "Reject X";
			} else {
				$st = "Reject XX";
			}
			$data[++$i] = array(
				'', $in, $row->dari, $row->kepada, $row->direktur,
				$row->tanggal, $row->hal, $st, $row->komentar
			);
			$in++;
		}
		echo array_to_csv($header);
		echo array_to_csv($data, 'ReportAllMemo.csv');
		die();
	}
}
