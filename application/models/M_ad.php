<?php
class M_ad extends CI_model
{
	function __construct()
	{
		parent::__construct();
	}
	public function getUserById()
	{
		$id= $this->session->userdata('id');
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
		$id=$this->session->userdata('id');
		return $this->db->query("select komentar,dd.nama as direktur,permohonan.id as id,nomor,user.nama as kepada,
		d.nama as dari,status,hal,tanggal,deskripsi 
		from permohonan,user,(select * from user) as d,(select * from user) as dd 
		where dd.id=permohonan.direktur and
		dari=$id and d.id=permohonan.dari and user.id=permohonan.kepada")->result();
	}
	function insertPermohonan($data)
	{
		$n = $data['nomor'];
		$kpd = $data['kepada'];
		$dr = $data['dari'];
		$tgl = $data['tanggal'];
		$dir = $data['dir'];
		$hal = $data['hal'];
		$desk =$data['deskripsi'];
		return $this->db->query("insert into permohonan
		 values ('','$n','$kpd','$dir','$dr','$tgl','$hal','$desk',0,'')");
	}
	function editPermohonan($data)
	{
		$id = $data['id'];
		$n = $data['nomor'];
		$kpd = $data['kepada'];
		$tgl = $data['tanggal'];
		$dir = $data['dir'];
		$hal = $data['hal'];
		$desk =$data['deskripsi'];
		return $this->db->query("update permohonan set nomor='$n', 
		kepada=$kpd,direktur=$dir, deskripsi='$desk',hal='$hal',tanggal='$tgl' where id=$id");
	}
	public function getPermohonanById($id)
	{
		return $this->db->query("select permohonan.kepada as kpd,permohonan.direktur as dir,d.nama as dari,
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
		$fee=$data['fee'];
		$setoran= $data['setoran'];
		$bnd= $data['bendahara'];
		$id=$data['id'];
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
		$fee=$data['fee'];
		$setoran= $data['setoran'];
		$bnd= $data['bendahara'];
		$id=$data['id'];
		return $this->db->query("update memo set desa='$desa', 
		norekening='$norek', fee='$fee',setoran='$setoran',bendahara='$bnd' where id=$id");
	}
	public function deleteMemo($id)
	{
		return $this->db->query("delete from memo where id=$id");		
	}

	//=====================direksi
	function getDataApp1()
	{
		$spv= $this->session->userdata('id');
		return $this->db->query("
		select komentar,dd.nama as direktur,permohonan.id as id,nomor,user.nama as kepada,
		d.nama as dari,status,hal,tanggal,deskripsi 
		from permohonan,user,(select * from user) as d,(select * from user) as dd
		where d.id=permohonan.dari and kepada=$spv and dd.id=permohonan.direktur and
		user.id=permohonan.kepada")->result();
	}
	public function approve($id,$status)
	{
		return $this->db->query("update permohonan set status=$status where id=$id");		
	}
	public function reject($id,$komentar,$status)
	{
		return $this->db->query("update permohonan set status=$status,komentar='$komentar' where id=$id");			
	}
	//============direktur
	function getDataApp2()
	{
		$dir= $this->session->userdata('id');
		return $this->db->query("
		select komentar,dd.nama as direktur,permohonan.id as id,nomor,user.nama as kepada,
		d.nama as dari,status,hal,tanggal,deskripsi 
		from permohonan,user,(select * from user) as d,(select * from user) as dd
		where d.id=permohonan.dari and direktur=$dir and dd.id=permohonan.direktur and
		user.id=permohonan.kepada")->result();
	}
	//====================super
	function getDataApp3()
	{
		return $this->db->query("
		select komentar,dd.nama as direktur,permohonan.id as id,nomor,user.nama as kepada,
		d.nama as dari,status,hal,tanggal,deskripsi 
		from permohonan,user,(select * from user) as d,(select * from user) as dd
		where d.id=permohonan.dari and dd.id=permohonan.direktur and
		user.id=permohonan.kepada")->result();
	}
	function insertUser($data)
	{
		$n = $data['nama'];
		$jb = $data['jabatan'];
		$l = $data['level'];
		return $this->db->query("insert into user
		 values ('','$n','$jb','$l','$n')");
	}
	function editUser($data)
	{
		$n = $data['nama'];
		$jb = $data['jabatan'];
		$p = $data['password'];
		$id= $this->session->userdata('id');
		return $this->db->query("update user set nama='$n',jabatan='$jb',password='$p' where id=$id");			
	}
	public function deleteUser($id)
	{
		return $this->db->query("delete from user where id=$id");		
	}



	function getMakananOffset($s,$off)
	{
		return $this->db->query("select * from makanan limit $s,$off")->result();
	}		
	function getAllUser()
	{
		return $this->db->query("select * from user")->result();
	}	
	function getAllData()
	{
		return $this->db->query("select * from permohonan")->result();
	}			
	//makanan		
	
	function editMakanan($data)
	{
		$j = $data['judul'];
		$t = $data['thumb'];
		$cat = $data['cat'];
		$id = $data['id'];
		$desk = $data['desk'];
		$h= $data['h'];
		if($t==""){
			return $this->db->query("update makanan set nama='$j', kategori=$cat, deskripsi='$desk',harga='$h' where id=$id");
		}else{
			return $this->db->query("update makanan set gambar='$t',nama='$j', kategori=$cat, deskripsi='$desk',harga='$h' where id=$id");
		}
	}	
	
	
	//end maknan
	public function cekUser($hp)
	{
		return $this->db->query("select * from user where nomorhp=$hp")->row();	
	}
	//api
	function insertInvoice($hp,$n,$m,$j,$trx,$st,$cab,$alamat)
	{
		// $alamat = "xxx";
		$d=$this->db->query("select * from user where nomorhp=$hp")->row();
		// echo $d->id;
		// if($d){
		// 	$d=$this->db->query("select * from user where nomorhp=$hp")->row();
		return $this->db->query("insert into trx values('',$d->id,$m,$cab,$j,$st,now(),$trx,'$alamat',0)");			
		// // }else{
		// 	$tt=$this->db->query("select * from trx where notrx=$trx")->row();
		// 	// if(!$tt){
		// 		$this->db->query("insert into user values('','$n','$hp')");
		// 	// }
		// 	$d=$this->db->query("select * from user where nomorhp=$hp")->row();			
		// 	return $this->db->query("insert into trx values('',$d->id,$m,$cab,$j,$st,now(),$trx,'$alamat',0)");
			// echo "insert into trx values('',$d->id,$m,$cab,$j,$st,now(),$trx,'$alamat',0)";
		// }	
		// echo "insert into trx values('',$d->id,$m,$cab,$j,$st,now(),$trx,'$alamat',0)";

	}
	public function getMaxTrx()
	{
		return $this->db->query("select max(notrx) as x from trx")->result();		
	}
	public function del($id,$hp)
	{
		return $this->db->query("delete from user where nomorhp='$hp' and id!=$id");
		// $tt=$this->db->query("select * from trx where notrx=102")->row();
		// 	if($tt){
		// 		echo "ada";
		// 		// $this->db->query("insert into user values('','$n','$hp')");
		// 	}		
	}
	
	public function getJUser($hp)
	{
		return $this->db->query("select count(*) as j from user where nomorhp=$hp")->result();		
	}
	public function getJumlahOrder()
	{
		$today = date("Y-m-d");   
		return $this->db->query("select count(*) as jo from (SELECT DISTINCT notrx FROM `trx` where tanggal='$today') as d")->row();		
	}
	public function getJumlahOrderBulanan()
	{
		$today = date("Y-m-d");   
		return $this->db->query("select count(*) as jo from (SELECT DISTINCT notrx,month(tanggal) as tgl FROM `trx`) as d where d.tgl=month(now())")->row();		
	}
	public function getPemasukan()
	{
		$today = date("Y-m-d");   		
		return $this->db->query("select sum(subtotal) as total from trx where tanggal='$today'")->row();		
	}
	public function getPemasukanMonth()
	{
		$d = $this->db->query("select sum(subtotal) as total from (select month(tanggal) as t, subtotal from trx) as d where d.t=month(now()) GROUP by d.t")->row();
		if(!$d){
			$d=0;
		}else{
			$d=$d->total;
		}
		return $d;		
	}
	public function jumlahPelanggan()
	{
		$today = date("Y-m-d");   
		return $this->db->query("select count(*) as j from user")->result();		
	}
	public function daftarOrder()
	{		
		return $this->db->query("SELECT notrx,tanggal,user.nama as p,makanan.nama as m,jumlah,subtotal from makanan,trx,user
		WHERE
		id_makanan=makanan.id and user.id=id_user  
		ORDER BY `trx`.`notrx`  desc")->result();		
	}
	//cabang
	function insertCabang($data)
	{
		$j = $data['nama'];
		$t = $data['thumb'];
		$desk = $data['desk'];
		$alamat = $data['alamat'];
		return $this->db->query("insert into cabang values ('','$alamat','$desk','$j')");
	}	
	function getCabangById($id)
	{
		return $this->db->query("select * from cabang where id=$id")->result();
	}	
	function editCabang($data)
	{
		$j = $data['nama'];
		$t = "";
		$id = $data['id'];
		$desk = $data['desk'];
		$alamat = $data['alamat'];
		if($t==""){
			return $this->db->query("update cabang set nama='$j',deskripsi='$desk', alamat='$alamat' where id=$id");
		}else{
			return $this->db->query("update cabang set gambar='$t',judul='$j', deskripsi='$desk' where id=$id");
		}
	}	
	public function deleteCabang($id)
	{
		return $this->db->query("delete from cabang where id=$id");		
	}

	//promo
	function insertPromo($data)
	{
		$j = $data['judul'];
		$t = $data['thumb'];
		$desk = $data['desk'];
		return $this->db->query("insert into promo values ('','$j','$desk','$t')");
	}
	function getPromo()
	{
		return $this->db->query("select * from promo")->result();
	}		
	function getPromoById($id)
	{
		return $this->db->query("select * from promo where id=$id")->result();
	}	
	function editPromo($data)
	{
		$j = $data['judul'];
		$t = $data['thumb'];
		$id = $data['id'];
		$desk = $data['desk'];
		if($t==""){
			return $this->db->query("update promo set judul='$j',deskripsi='$desk' where id=$id");
		}else{
			return $this->db->query("update promo set gambar='$t',judul='$j', deskripsi='$desk' where id=$id");
		}
	}	
	public function deletePromo($id)
	{
		return $this->db->query("delete from promo where id=$id");		
	}
	//==end promo
	function getCabang()
	{
		return $this->db->query("select * from cabang")->result();
	}	
	function getTrx($hp)
	{
		return $this->db->query("select trx.alamat as alamat,tanggal, cabang.nama, sum(subtotal) as total, notrx,status from trx, cabang where id_user=(select id from user where nomorhp='$hp') and cabang.id=trx.id_cabang group by notrx")->result();
	}	
	function getTrxById($notrx)
	{
		return $this->db->query("select status,user.nama as user,nomorhp, makanan.gambar as gambar, makanan.nama as nama, trx.jumlah as jumlah, subtotal from trx, makanan,user where user.id=trx.id_user and makanan.id = trx.id_makanan and notrx=$notrx")->result();
	}
	function getCabangOrder()
	{
		return $this->db->query("select cabang.id,COALESCE(jumlah, 0) as jumlah,cabang.nama,cabang.alamat from cabang left join (select count(status) as jumlah,nama, id from (SELECT cabang.alamat as alamat, cabang.id as id, cabang.nama as nama,status from cabang, trx where cabang.id=trx.id_cabang and status<>1 GROUP by notrx) as d group by d.id) as x on cabang.id=x.id")->result();
	}
	function getTrxByCabang($idCabang)
	{
		return $this->db->query("select user.nama as user, tanggal, cabang.nama, sum(subtotal) as total, notrx,trx.alamat,status from trx, cabang,user where trx.id_user=user.id and id_cabang=$idCabang and cabang.id=trx.id_cabang group by notrx order by status asc")->result();
	}
	function finish($notrx,$status)
	{
		return $this->db->query("update trx set status=$status where notrx=$notrx")->result();
	}
	function deleteTrx($notrx)
	{
		return $this->db->query("delete from trx where notrx=$notrx");
	}
	function getNewTrx()
	{
		return $this->db->query("select count(*) as jumlah from (select * from trx where status=0 group by notrx) as data");
	}
}