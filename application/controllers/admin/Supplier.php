<?php
	class Supplier extends CI_Controller{
		
		function __construct() {
			parent::__construct();
			$this->load->model('Mod_supplier');
			
			if(!$this->session->userdata('user_id')){
				redirect('auth/logout');
			}
			
			if($this->session->userdata('status')!=0){
				redirect('errors/error_403');
			}
		}
		
		
		function index(){
			$data['record']=  $this->Mod_supplier->select_all()->result();
			$this->template->load('templateadmin', 'admin/supplier/data', $data);
		}
		
		//==================================================================================================
		
		function post(){
			if(isset($_POST['submit'])){
				$image		= $this->upload_image();
				$this->Mod_supplier->simpan($image);
				redirect('admin/supplier');
			}else{
				$this->template->load('templateadmin','admin/supplier/post');
			}
		}
		
		
		function edit(){
			if(isset($_POST['submit'])){
				$image		= $this->upload_image();
				$this->Mod_supplier->update($image);
				redirect('admin/supplier');
			}else{
				$supplier_id		= $this->uri->segment(4);
				$data['row']		= $this->Mod_supplier->get_supplier_by_id($supplier_id)->row_array();
				$this->template->load('templateadmin', 'admin/supplier/edit', $data);
			}
		}
		
		function delete(){
			$supplier_id = $this->uri->segment(4);
			if(!empty($supplier_id)){
				$this->Mod_supplier->hapus($supplier_id);
			}
			redirect('admin/supplier');
		}
		
		//==================================================================================================
		
		function upload_image(){
			$config['upload_path']		= "./uploads/supplier/";
			$config['allowed_types']	= "jpg|png|jpeg";
			$config['max_size']			= 1024; //1mb
			$this->load->library('upload', $config);
			
			$this->upload->do_upload('userfile');
			$upload	= $this->upload->data();
			return $upload['file_name'];
		}
		
	}