<?php 
/**
* 
*/
class MyModel extends CI_Model
{
	
	public function Login($user, $pass)
	{
		$this->db->select('*'); //select all
		$this->db->from('tb_user'); //table name
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		$query = $this->db->get(); //get data from Database 
		return $query;
	}
	public function DataUser($table_name)
	{
		$get_user = $this->db->get($table_name);
		return $get_user->result_array();
	}
	public function InsertUser($table_name,$data)
	{
		$insert = $this->db->insert($table_name,$data);
		return $insert;
	}
	public function EditUser($id)
	{
		$this->db->where('id_user', $id);
		return $update = $this->db->get('tb_user')->row_array();
	}

	public function UpdateUser($nm_user, $username,$password,$id)
	{
		$this->db->where('id_user', $id);
		return $update = $this->db->update('tb_user',[
			'id_user' => $id,
			'nm_user' => $nm_user,
			'username' => $username,
			'password' => $password
		]) > 0;
	}
	public function DeleteUser($id)
	{
		$this->db->where('id_user', $id);
		return $delete = $this->db->delete('tb_user');
	}
	public function DataPaket($table_name)
	{
		$get_paket = $this->db->get($table_name);
		return $get_paket->result_array();
	}
	public function InsertPaket($table_name,$data)
	{
		$insert = $this->db->insert($table_name,$data);
		return $insert;
	}
	public function EditPaket($id)
	{
		$this->db->where('id_paket', $id);
		return $update = $this->db->get('tb_paket')->row_array();
	}
	public function UpdateDataPaket($id_outlet,$jenis_paket,$nm_paket,$harga_paket,$deskripsi_paket, $id)
	{
		$this->db->where('id_paket', $id);
		return $update = $this->db->update('tb_paket',[
			'id_paket' => $id,
			'id_outlet' => $id_outlet,
			'jenis_paket' => $jenis_paket,
			'nm_paket' => $nm_paket,
			'harga_paket' => $harga_paket,
			'deskripsi_paket' => $deskripsi_paket,
			// 'gambar_paket' => $gambar_paket
		]) > 0;
	}
	public function DeletePaket($id)
	{
		$this->db->where('id_paket', $id);
		return $delete = $this->db->delete('tb_paket');
	}
	public function DataOutlet($table_name)
	{
		$get_outlet = $this->db->get($table_name);
		return $get_outlet->result_array();
	}
	public function InsertOutlet($table_name,$data)
	{
		$insert = $this->db->insert($table_name,$data);
		return $insert;
	}
	public function EditOutlet($id)
	{
		$this->db->where('id_outlet', $id);
		return $update = $this->db->get('tb_outlet')->row_array();
	}
	public function UpdateDataOutlet($nm_outlet,$alamat_outlet,$tlp_outlet,$id)
	{
		$this->db->where('id_outlet', $id);
		return $update = $this->db->update('tb_outlet',[
			'id_outlet' => $id,
			'nm_outlet' => $nm_outlet,
			'alamat_outlet' => $alamat_outlet,
			'tlp_outlet' => $tlp_outlet
		]) > 0;
	}
	public function DeleteOutlet($id)
	{
		$this->db->where('id_outlet', $id);
		return $delete = $this->db->delete('tb_outlet');
	}
	public function DataMember($table_name)
	{
		$get_member = $this->db->get($table_name);
		return $get_member->result_array();
	}
	public function InsertMember($table_name,$data)
	{
		$insert = $this->db->insert($table_name,$data);
		return $insert;
	}
	
	public function DeleteMember($id)
	{
		$this->db->where('id_member', $id);
		return $delete = $this->db->delete('tb_member');
	}

	public function EditMember($id)
	{
		$this->db->where('id_member', $id);
		return $update = $this->db->get('tb_member')->row_array();
	}

	public function UpdateDataMember($nm_member, $tlp_member,$jk_member, $alamat_member, $id)
	{
		$this->db->where('id_member', $id);
		return $hasil = $this->db->update('tb_member',[
			'id_member' => $id,
			'nm_member' => $nm_member,
			'tlp_member' => $tlp_member,
			'jk_member' => $jk_member,
			'alamat_member' => $alamat_member
		]) > 0;
	}


	public function Service()
	{
		return $hasil = $this->db->get('tb_paket')->result_array();
	}

	public function Paket($jenis_paket, $id_outlet)
	{
		$arrayName = array('jenis_paket' => $jenis_paket, 'id_outlet' => $id_outlet );
		$this->db->where($arrayName);
		return $hasil = $this->db->get('tb_paket')->result_array();
	}

	public function AmbilPaket($qty, $id_paket, $id_user)
	{

		return $this->db->insert('tb_detail_transaksi', [
			'qty' => $qty,
			'id_paket' => $id_paket,
			'status_detail' => 'dikeranjang',
			'id_user' => $id_user
			]) > 0;
	}

	public function Keranjang($id_user)
	{
		return $this->db
		->select('tb_detail_transaksi.*, tb_paket.*')
		->from('tb_paket')
		->join('tb_detail_transaksi', 'tb_detail_transaksi.id_paket = tb_paket.id_paket')
		->where('tb_detail_transaksi.status_detail', 'dikeranjang')
		->where('tb_detail_transaksi.id_user', $id_user)
		->get()
		->result_array();
	}

	public function ProsesKeranjang($id_member, $biaya_tambahan, $pajak, $diskon, $id_user, $id_outlet, $batas_waktu, $total_harga)
	{
			return $this->db->insert('tb_transaksi', [
			'id_outlet' => $id_outlet,
			'kode_invoice' => uniqid(),
			'id_member' => $id_member,
			'tgl_transaksi' => date('Y-m-d'),
			'batas_waktu' => $batas_waktu,
			'tgl_bayar' => '',
			'biaya_tambahan' => $biaya_tambahan,
			'diskon' => $diskon,
			'pajak' => $pajak,
			'status_transaksi' => 'baru',
			'status_pembayaran' => 'belum bayar',
			'id_user' => $id_user,
			'total_harga' =>$total_harga
			]) > 0;
	}

	public function UpdateKeranjang($id_user, $keterangan, $id_member)
	{
		$sql = $this->db->get_where('tb_transaksi', [
			'id_member' => $id_member,
			'status_transaksi' => 'baru'
			])->row_array();

		$dikeranjang = 'dikeranjang';
		$array = array('id_user' => $id_user, 'status_detail' => $dikeranjang);
		$this->db->where($array);
		return $hasil = $this->db->update('tb_detail_transaksi',[
			'id_transaksi' => $sql['id_transaksi'],
			'keterangan' => $keterangan,
			'status_detail' => 'ditransaksi'
		]) > 0;
	}


	public function DataTransaksi($id_member)
	{
		
		return $sql = $this->db->get_where('tb_transaksi', [
			'id_member' => $id_member,
			'status_transaksi' => 'baru'
			])->row_array();
		
	}

	public function UpdateStatus($kode_invoice)
	{
		$array = array('kode_invoice' => $kode_invoice, 'status_transaksi' => 'baru' );
		$this->db->where($array);
		return $hasil = $this->db->update('tb_transaksi',[
			'status_transaksi' => 'proses'
			]) > 0;
	}

	public function DeletePembayaran($id_transaksi)
	{
		$this->db->delete('tb_detail_transaksi', array('id_transaksi' => $id_transaksi));
		$this->db->delete('tb_transaksi', array('id_transaksi' => $id_transaksi));
	}

	public function Pembayaran($id_user)
	{
		$this->db->order_by('status_pembayaran', 'DeSC');
		return $this->db
		->select('tb_member.*, tb_transaksi.*')
		->from('tb_transaksi')
		->join('tb_member', 'tb_transaksi.id_member = tb_member.id_member')
		->where('tb_transaksi.id_user', $id_user)
		->get()
		->result_array();
	}
	
	public function ProsesHasilPembayaran($id_transaksi)
	{
		return $this->db
		->select('tb_transaksi.*, tb_detail_transaksi.*, tb_paket.*, tb_member.*')
		->from('tb_detail_transaksi')
		->join('tb_paket', 'tb_detail_transaksi.id_paket = tb_paket.id_paket')
		->join('tb_transaksi', 'tb_transaksi.id_transaksi = tb_detail_transaksi.id_transaksi')
		->join('tb_member', 'tb_member.id_member = tb_transaksi.id_member')
		->where('tb_detail_transaksi.id_transaksi', $id_transaksi)
		->get()
		->result_array();

	}

	public function ProsesPembayaran($id_transaksi, $bayar, $total_harga)
	{
		$this->db->where('id_transaksi', $id_transaksi);

		if ($bayar >= $total_harga) {
				return $hasil = $this->db->update('tb_transaksi',[
				'bayar_transaksi' => $bayar,
				'status_pembayaran' => 'dibayar',
				'tgl_bayar' => date('Y-m-d h:i:sa')
			]) > 0;
		} else {
			return $hasil = $this->db->update('tb_transaksi',[
				'bayar_transaksi' => $bayar,
				'status_pembayaran' => 'dp',
				'tgl_bayar' => date('Y-m-d h:i:sa')
			]) > 0;
		}
	}
	public function Selesai($id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		return $hasil = $this->db->update('tb_transaksi',[
			'status_transaksi' => 'selesai'
		]) > 0;
	}

	public function ProsesPengambilan($id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		return $hasil = $this->db->update('tb_transaksi',[
			'status_transaksi' => 'diambil'
		]) > 0;
	}
	public function MAmbilTotal($id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		return $this->db->get('tb_transaksi')->row_array();
	}
	public function DataPembayaranOwner()
	{
		$this->db->order_by('status_pembayaran', 'DeSC');
		return $this->db
		->select('tb_member.*, tb_transaksi.*')
		->from('tb_transaksi')
		->join('tb_member', 'tb_transaksi.id_member = tb_member.id_member')
		->get()
		->result_array();
	}

	public function SearchRange($id_user, $tgl_awal, $tgl_akhir)
	{
		$this->db->order_by('status_transaksi', 'DeSC');
		return $this->db
		->select('tb_member.*, tb_transaksi.*')
		->from('tb_transaksi')
		->join('tb_member', 'tb_transaksi.id_member = tb_member.id_member')
		->where('tb_transaksi.id_user', $id_user)
		->where('tgl_transaksi >=', $tgl_awal)
		->where('tgl_transaksi <=', $tgl_akhir)
		->get()
		->result_array();
	}
	



}

?>