<?php
	class Material extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model(array('Mod_material', 'Mod_kategori'));
			
			if(!$this->session->userdata('user_id')){
				redirect('auth/logout');
			}
			
			if($this->session->userdata('status')!=1){
				redirect('errors/error_403');
			}
		}
		
		function index(){
			$data['record']	=  $this->Mod_material->select_all_material()->result();
			$this->template->load('templateadmin', 'admin/material/data', $data);
		}
		
		//================================================================================
		
		function post(){
			if(isset($_POST['submit'])){
				$image	= $this->upload_image();
				$this->Mod_material->simpan($image);
				redirect('admin/material');
				
			}else{
				$data['category']	= $this->Mod_kategori->select_all()->result();
				$this->template->load('templateadmin', 'admin/material/post', $data);
			}
		}
		
		function edit(){
			if(isset($_POST['submit'])){
				$image	= $this->upload_image();
				$this->Mod_material->update($image);
				redirect('admin/material');
			}else{
				$id						= $this->uri->segment(4);
				$data['row']			= $this->Mod_material->get_material_by_material_id($id)->row_array();
				$data['category']		= $this->Mod_kategori->select_all()->result();
				$this->template->load('templateadmin', 'admin/material/edit', $data);
			}
		}
		
		function delete(){
			$id = $this->uri->segment(4);
			if(!empty($id)){
				$this->Mod_material->hapus($id);
			}
			redirect('admin/material');
		}
		
		function publish(){
			$id 	= $this->uri->segment(4);
			$status	= $this->uri->segment(5);
			if(!empty($id)){
				$this->Mod_material->publish($id, $status);
			}
			redirect('admin/material');
		}
		
		//================================================================================
		
		function upload_image(){
			$config['upload_path']		= "./uploads/material/";
			$config['allowed_types']	= "jpg|png|jpeg";
			$config['max_size']			= 1024; //1mb
			$this->load->library('upload', $config);
			
			$this->upload->do_upload('userfile');
			$upload	= $this->upload->data();
			return $upload['file_name'];
		}
	}
?>