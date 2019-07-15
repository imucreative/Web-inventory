<?php
	class Info extends CI_Controller{
		
		function __construct() {
			parent::__construct();
			$this->load->model(array('Mod_info', 'Mod_user'));
			
			if(!$this->session->userdata('user_id')){
				redirect('auth/logout');
			}
			
			
		}
		
		
		function index(){
			if (isset($_POST['submit'])){
				$this->Mod_info->update();
				redirect('admin/info');
			}else{
				$data_info	= $this->Mod_info->select_info()->row_array();
				$data['id']			= $data_info['id'];
				$data['nama_toko']	= $data_info['nama_toko'];
				$data['alamat']		= $data_info['alamat'];
				$data['email']		= $data_info['email'];
				$data['telp']		= $data_info['telp'];
				$data['fax']		= $data_info['fax'];
				$data['siup']		= $data_info['siup'];
				$data['npwp']		= $data_info['npwp'];
				$data['about']		= $data_info['about'];
				$data['keunggulan']	= $data_info['keunggulan'];
				
				$this->template->load('templateadmin', 'admin/info', $data);
			}
		}
		
		function profil(){
			$this->template->load('templateadmin', 'admin/profil');
		}
		
		function save_profil(){
			if (isset($_POST['submit'])){
				$this->Mod_user->update_profil();
				redirect("auth/logout");
			}
		}
		
	}