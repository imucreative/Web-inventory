<?php
	ini_set('display_errors',0);
	class Purchase_order extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model(array('Mod_goods_inventory', 'Mod_supplier', 'Mod_material', 'Mod_pr'));
			$this->load->library('m_pdf');
			
			if(!$this->session->userdata('user_id')){
				redirect('auth/logout');
			}
			
			if($this->session->userdata('status')!=3){
				redirect('errors/error_403');
			}
		}
		
		function index(){
			$data['record']	=  $this->Mod_goods_inventory->select_all_po()->result();
			$this->template->load('templateadmin', 'admin/purchase_order/data', $data);
		}
		
		//================================================================================
		
		function post(){
			if(isset($_POST['submit'])){
				$this->Mod_goods_inventory->simpan_po();
				redirect('admin/purchase_order');
				
			}else{
				$this->template->load('templateadmin', 'admin/purchase_order/post');
			}
		}
		
		function delete(){
			$id = $this->uri->segment(4);
			if(!empty($id)){
				$this->Mod_goods_inventory->hapus_po($id);
			}
			redirect('admin/purchase_order');
		}
		
		function edit(){
			$id	= $this->uri->segment(4);
			if(isset($_POST['submit'])){
				$this->Mod_goods_inventory->update_po($id);
				redirect('admin/purchase_order');
			}else{
				$data['po']				= $this->Mod_goods_inventory->get_po_by_no_po($id)->row_array();
				$data['pr']				= $this->Mod_pr->get_pr_by_no_po($id)->row_array();
				$data['supplier']		= $this->Mod_supplier->get_supplier_all_by_id($data['po']['supplier_id'])->row_array();
				$data['po_detail']		= $this->Mod_goods_inventory->get_po_detail_by_no_po($id)->result();
				$this->template->load('templateadmin', 'admin/purchase_order/edit', $data);
			}
		}
		
		function add_item(){
			$po	= $this->input->post("po");
			$this->Mod_goods_inventory->simpan_item();
			redirect('admin/purchase_order/edit/'.$po);
		}
		
		function delete_detail_item(){
			$request_no			= $this->uri->segment(4);
			$request_no_detail	= $this->uri->segment(5);
			if(!empty($request_no_detail)){
				$this->Mod_goods_inventory->hapus_detail_item($request_no_detail);
			}
			redirect('admin/purchase_order/edit/'.$request_no);
		}
		
		//================================================================================
		
		function search_material(){
			$data['record']	=  $this->Mod_material->select_all();
			$this->template->load('templatereportadmin', 'admin/purchase_order/search_material', $data);
		}
		
		function search_supplier(){
			$data['record']	=  $this->Mod_supplier->select_all();
			$this->template->load('templatereportadmin', 'admin/purchase_order/search_supplier', $data);
		}
		
		function search_pr(){
			$data['record']	=  $this->Mod_pr->select_all_send_user();
			$this->template->load('templatereportadmin', 'admin/purchase_order/search_pr', $data);
		}
		
		
		
		function report_display(){
			$no_po					= $this->uri->segment(4);
			
			$cari_data_po			= $this->Mod_goods_inventory->get_po_by_no_po($no_po);
			$data_po				= $cari_data_po->row_array();
			$count_po				= $cari_data_po->num_rows();
			$cari_vendor			= $this->Mod_supplier->get_supplier_by_id($data_po['supplier_id'])->row_array();
			$cari_data_po_detail	= $this->Mod_goods_inventory->select_all_po_detail($data_po['no_po']);
			
			$data['no_po']				= $no_po;
			$date_po					= date_create($data_po['tgl_po']);
			$data['tgl_po']				= date_format($date_po, 'd F Y');
			
			$data['supplier_name']		= $cari_vendor['supplier_name'];
			$data['address']			= $cari_vendor['address'];
			$data['phone']				= $cari_vendor['phone'];
			$data['email']				= $cari_vendor['email'];
			$data['note']				= $cari_vendor['note'];
			$data['result_po_detail']	= $cari_data_po_detail;
			
			if($count_po != 0){
				$this->template->load('templatereportadmin', 'admin/purchase_order/report_display', $data);
			}else{
				redirect('errors/error_po_not_found');
			}
		}
		
		
		//================================================================================
		
		
		
		
	}
?>