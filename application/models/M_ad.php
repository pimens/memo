<?php
class M_ad extends CI_model
{
	function __construct()
	{
		parent::__construct();
	}
	public function getUserById()
	{
		$id = $this->session->userdata('id');
		return $this->db->query("select * from user where id=$id")->row();
	}
	public function userLevel()
	{
		return $this->db->query("select * from user where level=2 or level=3 order by level")->result();
	}
	public function userLevelAll()
	{
		return $this->db->query("select * from user")->result();
	}
	function getDataByUser()
	{
		$id = $this->session->userdata('id');
		return $this->db->query("select komentar,dd.nama as direktur,permohonan.id as id,nomor,user.nama as kepada,
		d.nama as dari,status,hal,tanggal,deskripsi 
		from permohonan,user,(select * from user) as d,(select * from user) as dd 
		where dd.id=permohonan.direktur and
		dari=$id and d.id=permohonan.dari and user.id=permohonan.kepada")->result();
	}
	function getDataByUserJenis($jns)
	{
		$id = $this->session->userdata('id');
		return $this->db->query("select komentar,dd.nama as direktur,permohonan.id as id,nomor,user.nama as kepada,
		d.nama as dari,status,hal,tanggal,deskripsi 
		from permohonan,user,(select * from user) as d,(select * from user) as dd 
		where dd.id=permohonan.direktur and permohonan.jenis=$jns and
		dari=$id and d.id=permohonan.dari and user.id=permohonan.kepada")->result();
	}
	function insertPermohonan($data)
	{
		return $this->db->insert("permohonan",$data);
	}
	function editPermohonan($data)
	{
		$id = $data['id'];
		$n = $data['nomor'];
		$kpd = $data['kepada'];
		$tgl = $data['tanggal'];
		$dir = $data['dir'];
		$hal = $data['hal'];
		$desk = $data['deskripsi'];
		$jns = $data['jenis'];
		return $this->db->query("update permohonan set nomor='$n', 
		kepada=$kpd,direktur=$dir, deskripsi='$desk',hal='$hal',tanggal='$tgl',jenis=$jns where id=$id");
	}
	public function getPermohonanById($id)
	{
		return $this->db->query("select jenis,permohonan.kepada as kpd,permohonan.direktur as dir,d.nama as dari,
		dd.nama as direktur,status,permohonan.id as id,nomor,user.nama as kepada,hal,tanggal,
		deskripsi from permohonan,user,(select * from user) as d,(select * from user) as dd
		where permohonan.id=$id and user.id=permohonan.kepada and dd.id=permohonan.direktur
		and d.id=permohonan.dari")->row();
	}
	public function getPermohonanByIdLaporan($id)
	{
		return $this->db->query("select d.lokasi as fromLokasi,user.lokasi as toLokasi,
		d.email as fromEmail, user.email as toEmail,
		d.jabatan as fromJabatan,user.jabatan as toJabatan,jenis,permohonan.kepada as kpd,permohonan.direktur as dir,d.nama as dari,
		dd.nama as direktur,status,permohonan.id as id,nomor,user.nama as kepada,hal,tanggal,
		deskripsi from permohonan,user,(select * from user) as d,(select * from user) as dd
		where permohonan.id=$id and user.id=permohonan.kepada and dd.id=permohonan.direktur
		and d.id=permohonan.dari")->row();
	}
	public function deletePermohonan($id)
	{
		return $this->db->query("delete from permohonan where id=$id");
	}
	//=============================================================memo
	function getTabelMemo($id)
	{
		return $this->db->query("select * from memo where permohonan=$id order by id desc")->result();
	}
	function insertMemo($data)
	{
		$desa = $data['desa'];
		$norek = $data['norek'];
		$fee = $data['fee'];
		$setoran = $data['setoran'];
		$bnd = $data['bendahara'];
		$id = $data['id'];
		return $this->db->query("insert into memo
			 values ('',$id,'$desa','$setoran','$fee','$norek','$bnd')");
	}
	public function getMemoById($id)
	{
		return $this->db->query("select * from memo where id=$id")->row();
	}
	function editMemo($data)
	{
		$desa = $data['desa'];
		$norek = $data['norek'];
		$fee = $data['fee'];
		$setoran = $data['setoran'];
		$bnd = $data['bendahara'];
		$id = $data['id'];
		return $this->db->query("update memo set desa='$desa', 
			norekening='$norek', fee='$fee',setoran='$setoran',bendahara='$bnd' where id=$id");
	}
	public function deleteMemo($id)
	{
		return $this->db->query("delete from memo where id=$id");
	}

	//==============================barang
	function getTabelBarang($id)
	{
		return $this->db->query("select * from barang where permohonan=$id order by id desc")->result();
	}
	function insertBarang($data)
	{
		$nama = $data['nama'];
		$unit = $data['unit'];
		$h= $data['harga'];
		$t = $data['satuan'];
		$k = $data['ket'];
		$id = $data['id'];
		return $this->db->query("insert into barang
	 values ('',$id,'$nama','$unit','$h','$t','$k')");
	}
	public function getBarangById($id)
	{
		return $this->db->query("select * from barang where id=$id")->row();
	}
	function editBarang($data)
	{
		$nama = $data['nama'];
		$unit = $data['unit'];
		$h= $data['harga'];
		$t = $data['satuan'];
		$k = $data['ket'];
		$id = $data['id'];
		return $this->db->query("update barang set nama_barang='$nama', 
	unit='$unit', harga='$h',satuan='$t',keterangan='$k' where id=$id");
	}
	public function deleteBarang($id)
	{
		return $this->db->query("delete from barang where id=$id");
	}
	//=============barang


	//=====================direksi
	function getDataApp1()
	{
		$spv = $this->session->userdata('id');
		return $this->db->query("
		select jenis,komentar,dd.nama as direktur,permohonan.id as id,nomor,user.nama as kepada,
		d.nama as dari,status,hal,tanggal,deskripsi 
		from permohonan,user,(select * from user) as d,(select * from user) as dd
		where d.id=permohonan.dari and kepada=$spv and dd.id=permohonan.direktur and
		user.id=permohonan.kepada")->result();
	}
	public function approve($id, $status)
	{
		return $this->db->query("update permohonan set status=$status where id=$id");
	}
	public function reject($id, $komentar, $status)
	{
		return $this->db->query("update permohonan set status=$status,komentar='$komentar' where id=$id");
	}
	//============direktur
	function getDataApp2()
	{
		$dir = $this->session->userdata('id');
		return $this->db->query("
		select jenis,komentar,dd.nama as direktur,permohonan.id as id,nomor,user.nama as kepada,
		d.nama as dari,status,hal,tanggal,deskripsi 
		from permohonan,user,(select * from user) as d,(select * from user) as dd
		where d.id=permohonan.dari and direktur=$dir and dd.id=permohonan.direktur and
		user.id=permohonan.kepada")->result();
	}
	//====================super
	function getDataApp3()
	{
		return $this->db->query("
		select jenis,komentar,dd.nama as direktur,permohonan.id as id,nomor,user.nama as kepada,
		d.nama as dari,status,hal,tanggal,deskripsi 
		from permohonan,user,(select * from user) as d,(select * from user) as dd
		where d.id=permohonan.dari and dd.id=permohonan.direktur and
		user.id=permohonan.kepada")->result();
	}
	function insertUser($data)
	{
		$n = $data['nama'];
		$p = md5($n);
		$jb = $data['jabatan'];
		$l = $data['level'];
		return $this->db->query("insert into user
		 values ('','$n','','','$jb','$l','$p')");
	}
	function editUser($data)
	{
		$n = $data['nama'];
		$e = $data['email'];
		$lok = $data['lokasi'];
		$jb = $data['jabatan'];
		$p = md5($data['password']);
		$l = $data['lama'];
		if ($p == md5("Password Baru")) {
			$p = $l;
		}
		$id = $this->session->userdata('id');
		return $this->db->query("update user set email='$e',lokasi='$lok',nama='$n',jabatan='$jb',password='$p' where id=$id");
	}
	public function deleteUser($id)
	{
		return $this->db->query("delete from user where id=$id");
	}
}
