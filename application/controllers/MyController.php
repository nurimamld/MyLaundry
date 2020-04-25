<?php 
/**
* 
*/
class MyController extends CI_Controller
{

	public function __construct() {

    parent::__construct();

    $this->load->helper('url');
    

  	}
	
	public function Index()
	{
		$this->load->view('Homepage');
	}
	public function LoginView()
	{
		$this->load->view('login');
	}
	public function Login(){
		$user = $this->input->post('username',TRUE);
		$pass = $this->input->post('pass',TRUE);
		$result = $this->MyModel->Login($user, $pass);
		if ($result->num_rows() > 0) {
			$data = $result->row_array();
			$user = $data['username'];
			$nm_user = $data['nm_user'];
			$id_user = $data['id_user'];
			$role = $data['role'];
			$active = $data['active'];
			$userdata = array(
				'username' => $user,
				'nm_user' => $nm_user,
				'id_user' => $id_user,
				'role' => $role,
				'active' => $active,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($userdata);

			if ($role == 'admin') {
				$this->session->set_flashdata('status', 'Selamat Datang : ' .$userdata['username']);
				redirect('MyController/DataUser');
			} elseif ($role == 'kasir') {
				$this->session->set_flashdata('status', 'Selamat Datang : ' .$userdata['username']);
				redirect('MyController/DataMember');
			} elseif ($role == 'owner') {
				$this->session->set_flashdata('status', 'Selamat Datang : ' .$userdata['username']);
				redirect('MyController/LaporanOwner');
			}
		} else {
			$this->session->set_flashdata('error_login', true);
		}
	}
	public function DataUser()
	{
		$this->data['user'] =  $this->MyModel->DataUser('tb_user');
		$this->load->view('DataPengguna', $this->data);
	}
	public function InputUser()
	{
		$this->load->view('InsertUser');
	}
	public function InsertUser()
	{
		$nm_user = $_POST['nm_user'];
		$username =  $_POST['username'];
		$password = $_POST['password'];
		$id_outlet = $_POST['id_outlet'];
		$role =  $_POST['role'];
		$data = array(
			'nm_user'=>$nm_user,
			'username'=>$username,
			'password' =>$password,
			'id_outlet'=>$id_outlet,
			'role'=>$role
		);
		$insert = $this->MyModel->InsertUser('tb_user',$data);
		if ($insert == true) {
			$this->session->set_flashdata('status', 'Berhasil Menambahkan User');

		}else {
			$this->session->set_flashdata('status', 'Gagal Menambahkan User');
		}
		redirect('MyController/DataUser');
	}
	public function EditUser($id)
	{
		$data = $this->MyModel->EditUser($id);
		$this->load->view('EditUser', ['data' => $data]);
	}
	public function UpdateDataUser($id_user)
	{
		$id = $id_user;
		$nm_user =  $_POST['nm_user'];
		$username =  $_POST['username'];
		$password = $_POST['password'];
		$update = $this->MyModel->UpdateUser($nm_user, $username,$password,$id);
		if ($update == true) {
			$this->session->set_flashdata('status', 'Berhasil Merubah Pengguna ');

		}else {
			$this->session->set_flashdata('status', 'Gagal Merubah Pengguna');
		}
		redirect('MyController/DataUser');
	}
	public function DeleteUser($id)
	{
		$this->MyModel->DeleteUser($id);
		redirect('MyController/DataUser');
	}
	public function DataPaket()
	{
		$this->data['paket'] =  $this->MyModel->DataPaket('tb_paket');
		$this->load->view('DataPaket', $this->data);
	}
	public function InputPaket()
	{
		$this->load->view('InsertPaket');
	}
	public function InsertPaket()
	{
		$id_outlet = $_POST['id_outlet'];
		$jenis_paket = $_POST['jenis_paket'];
		$nm_paket = $_POST['nm_paket'];
		$harga_paket = $_POST['harga_paket'];
		$deskripsi_paket = $_POST['deskripsi_paket'];
		// $gambar_paket = $_POST['gambar_paket'];
		// if ($gambar_paket=''){}else{
		// 	$config['upload_path'] = './assets/image/';
		// 	$config['allowed_types'] = 'jpeg|png|jpg|gif';
		// 	$this->load->library('upload',$config);
		// 	if (!$this->upload->do_upload('gambar_paket')) {
		// 		echo "gagal upload"; die();
		// 	} else{
		// 		$gambar_paket = $this->upload->data('file_name');
		// 	}
		// }
		$data = array(
			'id_outlet'=>$id_outlet,
			'jenis_paket'=>$jenis_paket,
			'nm_paket'=>$nm_paket,
			'harga_paket'=>$harga_paket,
			'deskripsi_paket'=>$deskripsi_paket,
			// 'gambar_paket'=>$gambar_paket
		);
		$insert = $this->MyModel->InsertPaket('tb_paket',$data);
		if ($insert == true) {
			$this->session->set_flashdata('status', 'Berhasil Menambahkan Paket');

		}else {
			$this->session->set_flashdata('status', 'Gagal Menambahkan Paket');
		}
		redirect('MyController/DataPaket');
	}
	public function EditPaket($id)
	{
		$data = $this->MyModel->EditPaket($id);
		$this->load->view('EditPaket', ['data' => $data]);
	}
	public function UpdateDataPaket($id_paket)
	{
		$id = $id_paket;
		$id_outlet = $_POST['id_outlet'];
		$jenis_paket = $_POST['jenis_paket'];
		$nm_paket = $_POST['nm_paket'];
		$harga_paket = $_POST['harga_paket'];
		$deskripsi_paket = $_POST['deskripsi_paket'];
		// $gambar_paket = $_POST['gambar_paket'];
		$update = $this->MyModel->UpdateDataPaket($id_outlet,$jenis_paket,$nm_paket,$harga_paket,$deskripsi_paket,$id);
		if ($update == true) {
			$this->session->set_flashdata('status', 'Berhasil Merubah Paket ');

		}else {
			$this->session->set_flashdata('status', 'Gagal Merubah Paket');
		}
		redirect('MyController/DataPaket');
	}
	public function DeletePaket($id)
	{
		$this->MyModel->DeletePaket($id);
		redirect('MyController/DataPaket');
	}
	public function DataOutlet()
	{
		$this->data['outlet'] =  $this->MyModel->DataOutlet('tb_outlet');
		$this->load->view('DataOutlet', $this->data);
	}
	public function InputOutlet()
	{
		$this->load->view('InsertOutlet');
	}
	public function InsertOutlet()
	{
		$nm_outlet = $_POST['nm_outlet'];
		$alamat_outlet = $_POST['alamat_outlet'];
		$tlp_outlet = $_POST['tlp_outlet'];
		$data = array(
			'nm_outlet'=>$nm_outlet,
			'alamat_outlet'=>$alamat_outlet,
			'tlp_outlet'=>$tlp_outlet
		);
		$insert = $this->MyModel->InsertOutlet('tb_outlet',$data);
		if ($insert == true) {
			$this->session->set_flashdata('status', 'Berhasil Menambahkan Outlet');

		}else {
			$this->session->set_flashdata('status', 'Gagal Menambahkan Outlet');
		}
		redirect('MyController/DataOutlet');
	}
	public function EditOutlet($id)
	{
		$data = $this->MyModel->EditOutlet($id);
		$this->load->view('EditOutlet', ['data' => $data]);
	}
	public function UpdateDataOutlet($id_outlet)
	{
		$id = $id_outlet;
		$nm_outlet = $_POST['nm_outlet'];
		$alamat_outlet = $_POST['alamat_outlet'];
		$tlp_outlet = $_POST['tlp_outlet'];
		$update = $this->MyModel->UpdateDataOutlet($nm_outlet,$alamat_outlet,$tlp_outlet,$id);
		if ($update == true) {
			$this->session->set_flashdata('status', 'Berhasil Merubah Outlet');
		}else {
			$this->session->set_flashdata('status', 'Gagal Merubah Outlet');
		}
		redirect('MyController/DataOutlet');
	}
	public function DeleteOutlet($id)
	{
		$this->MyModel->DeleteOutlet($id);
		redirect('MyController/DataOutlet');
	}
	public function DataMember()
	{
		$this->data['member'] =  $this->MyModel->DataMember('tb_member');
		$this->load->view('DataMember', $this->data);
	}
	public function InputMember()
	{
		$this->load->view('InsertMember');
	}

	public function InsertMember()
	{
		$nm_member = $_POST['nm_member'];
		$tlp_member = $_POST['tlp_member'];
		$jk_member = $_POST['jk_member'];
		$alamat_member = $_POST['alamat_member'];
		$data = array(
			'nm_member'=>$nm_member,
			'tlp_member'=>$tlp_member,
			'jk_member'=>$jk_member,
			'alamat_member'=>$alamat_member
		);
		$insert = $this->MyModel->InsertMember('tb_member',$data);
		if ($insert == true) {
			$this->session->set_flashdata('status', 'Berhasil Menambahkan Member ');
		}else {
			$this->session->set_flashdata('status', 'Gagal Menambahkan Member');
		}
		redirect('MyController/DataMember');
	}
	public function DeleteMember($id)
	{
		$this->MyModel->DeleteMember($id);
		redirect('MyController/DataMember');
	}

	public function EditMember($id)
	{
		$data = $this->MyModel->EditMember($id);
		$this->load->view('EditMember', ['data' => $data]);
	}

	public function UpdateDataMember($id_member)
	{
		$id = $id_member;
		$nm_member = $_POST['nm_member'];
		$tlp_member = $_POST['tlp_member'];
		$jk_member = $_POST['jk_member'];
		$alamat_member = $_POST['alamat_member'];
		$update = $this->MyModel->UpdateDataMember($nm_member, $tlp_member,$jk_member,$alamat_member, $id);
		if ($update == true) {
			$this->session->set_flashdata('status', 'Berhasil Merubah Member ');
		}else {
			$this->session->set_flashdata('status', 'Gagal Merubah Member');
		}
		redirect('MyController/DataMember');
	}

	public function Service()
	{
		$ambil_jenis = $this->MyModel->Service();
		$id_outlet = $this->session->userdata('id_outlet');


		foreach ($ambil_jenis as $j) {
			if ($j['jenis_paket'] == 'paketan') {
				$paketan = $this->MyModel->Paket('paketan', $id_outlet);
				$paketan2 = $this->load->view('ServicePaket', ['data' => $paketan], true);
			} elseif ($j['jenis_paket'] == 'standar' ) {
				$standar = $this->MyModel->Paket('standar', $id_outlet);
				$standar2 = $this->load->view('ServiceStandar', ['data' => $standar], true);
			}
		}

		$this->load->view('Service', ['standar' => $standar2, 'paketan' => $paketan2]);

	}

	public function AmbilPaket($id)
	{
		
		$id_paket = $id;
		$id_user = $this->session->userdata('id_user');
		$qty = $this->input->post('kuantitas');


		$hasil = $this->MyModel->AmbilPaket($qty, $id_paket, $id_user);
		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Berhasil Masuk Keranjang ');

		}else {
			$this->session->set_flashdata('status', 'Gagal Masuk Keranjang');
		}
		redirect('MyController/Keranjang');
	}

	public function Keranjang()
	{
		$data = $this->MyModel->Keranjang($this->session->userdata('id_user'));
		$this->load->view('Keranjang', ['keranjang' => $data]);
	}

	public function ProsesKeranjang()
	{
		$total_harga = $this->input->post('total_bayar');
		$id_member = $this->input->post('id_member');
		$biaya_tambahan = $this->input->post('biaya_tambahan');
		$pajak = $this->input->post('pajak');
		$diskon = $this->input->post('diskon');
		$keterangan = $this->input->post('keterangan');
		$batas_waktu = $this->input->post('batas_waktu');

		$id_user = $this->session->userdata('id_user');
		$id_outlet = $this->session->userdata('id_outlet');
		
		$hasil = $this->MyModel->ProsesKeranjang($id_member, $biaya_tambahan, $pajak, $diskon, $id_user, $id_outlet, $batas_waktu, $total_harga);
		$hasil2 = $this->MyModel->UpdateKeranjang($id_user, $keterangan, $id_member);
		
		$invoice = $this->MyModel->DataTransaksi($id_member);
		$invoice2 = array(
			'kode_invoice' => $invoice['kode_invoice']
			);

		$updateStatus = $this->MyModel->UpdateStatus($invoice2['kode_invoice']);
		if ($hasil == true) {
			$this->session->set_userdata($invoice2);
			$this->session->set_flashdata('status', 'Berhasil Checkout, dengan Kode Invoice : '.$invoice2['kode_invoice']);

		}else {
			$this->session->set_flashdata('status', 'Gagal Checkout');
		}
		redirect('MyController/Pembayaran');
	}
	public function DeleteKeranjang()
	{
		$this->MyModel->DeletePembayaran($id);
		redirect('MyController/Keranjang');
	}


	public function Pembayaran()
	{
		$id_user = $this->session->userdata('id_user');

		$data = $this->MyModel->Pembayaran($id_user);
		$this->load->view('Pembayaran', ['pembayaran' => $data]);
	}

	public function ProsesHasilPembayaran($id_transaksi)
	{
		$data = $this->MyModel->ProsesHasilPembayaran($id_transaksi);
		$this->load->view('ProsesPembayaran', ['pembayaran' => $data]);
	}

	public function DeletePembayaran($id_transaksi)
	{
		$data = $this->MyModel->DeletePembayaran($id_transaksi);
		redirect('MyController/Pembayaran');
	}

	public function ProsesPembayaran($id_transaksi)
	{
		$bayar = $this->input->post('bayar');
		$ambil_total_harga = $this->MyModel->MAmbilTotal($id_transaksi);
		$total_harga = $ambil_total_harga['total_harga'];
		

		$hasil = $this->MyModel->ProsesPembayaran($id_transaksi, $bayar, $total_harga);

		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Pembayaran Berhasil ');

		}else {
			$this->session->set_flashdata('status', 'Gagal Melakukan Pembayaran');
		}

		redirect('MyController/Pembayaran/'.$id_transaksi);
	}

	public function Selesai($id_transaksi)
	{
		$hasil = $this->MyModel->Selesai($id_transaksi);

		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Data Berhasil Diperbaharui ');

		}else {
			$this->session->set_flashdata('status', 'Gagal Melakukan Pembaharuan');
		}

		redirect('MyController/Pembayaran/');
	}

	public function TampilProsesPengambilan($id_transaksi)
	{
		$data = $this->MyModel->ProsesHasilPembayaran($id_transaksi);
		$this->load->view('ProsesPengambilan', ['ambil' => $data]);
	}

	public function ProsesPengambilan($id_transaksi)
	{
		$hasil = $this->MyModel->ProsesPengambilan($id_transaksi);

		if ($hasil == true) {
			$this->session->set_flashdata('status', 'Data Berhasil Diperbaharui ');

		}else {
			$this->session->set_flashdata('status', 'Gagal Melakukan Pembaharuan');
		}

		redirect('MyController/Pembayaran/');
	}
	public function LaporanOwner()
	{
		$id_user = $this->session->userdata('id_user');

		$data = $this->MyModel->DataPembayaranOwner($id_user);
		$this->load->view('LaporanOwner', ['owner' => $data]);
	}
	public function SearchRangeOwner()
	{
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');

		$id_user = $this->session->userdata('id_user');

		$data = $this->MyModel->MCariRange($id_user, $tgl_awal, $tgl_akhir);
		$this->load->view('LaporanOwner', ['owner' => $data]);
	}
	public function Laporan()
	{
		$id_user = $this->session->userdata('id_user');

		$data = $this->MyModel->Pembayaran($id_user);
		$this->load->view('Laporan', ['laporan' => $data]);
	}

	public function SearchRange()
	{
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');

		$id_user = $this->session->userdata('id_user');

		$data = $this->MyModel->SearchRange($id_user, $tgl_awal, $tgl_akhir);
		$this->load->view('Laporan', ['laporan' => $data]);
	}


	public function Pdf()
	{
			$this->load->library('Pdf');
			$id_user = $this->session->userdata('id_user');
			$data=$this->MyModel->Pembayaran($id_user);
			$this->load->view('laporan_pdf',['data'=>$data]);
			$papersize = 'A4';
			$orientation = 'landscape';
			$html = $this->output->get_output();
			$this->dompdf->set_paper($papersize,$orientation);

			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("Laporan_DataTransaksi.pdf",array('Attachment'=>0));
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		redirect('MyController/loginView');
	}

}

?>