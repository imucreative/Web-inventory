<?php
	ini_set('display_errors',0);
	class Purchase_request extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model(array('Mod_goods_inventory', 'Mod_supplier', 'Mod_material', 'Mod_pr'));
			$this->load->library('m_pdf');
			
			if(!$this->session->userdata('user_id')){
				redirect('auth/logout');
			}
			
			if($this->session->userdata('status')!=1){
				redirect('errors/error_403');
			}
		}
		
		function index(){
			$data['record']	=  $this->Mod_pr->select_all_pr($this->session->userdata('username'))->result();
			$this->template->load('templateadmin', 'admin/purchase_request/data', $data);
		}
		
		//================================================================================
		
		function post(){
			if(isset($_POST['submit'])){
				$this->Mod_pr->simpan_pr($this->session->userdata('username'));
				redirect('admin/purchase_request');
				
			}else{
				$this->template->load('templateadmin', 'admin/purchase_request/post');
			}
		}
		
		function delete(){
			$id = $this->uri->segment(4);
			if(!empty($id)){
				$this->Mod_pr->hapus_pr($id);
			}
			redirect('admin/purchase_request');
		}
		
		function edit(){
			$id	= $this->uri->segment(4);
			//if(isset($_POST['submit'])){
				//$this->Mod_pr->update($id);
				//redirect('admin/purchase_request');
			//}else{
				$data['pr']				= $this->Mod_pr->get_pr_by_no_pr($id)->row_array();
				//$data['supplier']		= $this->Mod_supplier->get_supplier_all_by_id($data['po']['supplier_id'])->row_array();
				$data['pr_detail']		= $this->Mod_pr->get_pr_detail_by_no_pr($id)->result();
				$this->template->load('templateadmin', 'admin/purchase_request/edit', $data);
			//}
		}
		
		function add_item(){
			$pr	= $this->input->post("pr");
			$this->Mod_pr->simpan_item();
			redirect('admin/purchase_request/edit/'.$pr);
		}
		
		function delete_detail_item(){
			$request_no			= $this->uri->segment(4);
			$request_no_detail	= $this->uri->segment(5);
			if(!empty($request_no_detail)){
				$this->Mod_pr->hapus_detail_item($request_no_detail);
			}
			redirect('admin/purchase_request/edit/'.$request_no);
		}
		
		//================================================================================
		
		function search_material(){
			$data['record']	=  $this->Mod_material->select_all();
			$this->template->load('templatereportadmin', 'admin/purchase_request/search_material', $data);
		}
		
		function report_display(){
			$no_pr					= $this->uri->segment(4);
			
			$cari_data_pr			= $this->Mod_pr->get_pr_by_no_pr($no_pr);
			$data_pr				= $cari_data_pr->row_array();
			$count_pr				= $cari_data_pr->num_rows();
			//$cari_vendor			= $this->Mod_supplier->get_supplier_by_id($data_pr['supplier_id'])->row_array();
			$cari_data_pr_detail	= $this->Mod_pr->select_all_pr_detail($data_pr['no_pr']);
			
			$data['no_pr']				= $no_pr;
			$data['no_po']				= $data_pr['no_po'];
			$date_pr					= date_create($data_pr['tgl_pr']);
			$data['tgl_pr']				= date_format($date_pr, 'd F Y');
			
			////$data['supplier_name']		= $cari_vendor['supplier_name'];
			//$data['address']			= $cari_vendor['address'];
			////$data['phone']				= $cari_vendor['phone'];
			//$data['email']				= $cari_vendor['email'];
			//$data['note']				= $cari_vendor['note'];
			$data['result_pr_detail']	= $cari_data_pr_detail;
			
			if($count_pr != 0){
				$this->template->load('templatereportadmin', 'admin/purchase_request/report_display', $data);
			}else{
				redirect('errors/error_po_not_found');
			}
		}
		
		
		//================================================================================
		
		
		
		
	}
?>