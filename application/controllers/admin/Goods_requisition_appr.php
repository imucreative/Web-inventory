<?php
	ini_set('display_errors',0); 
	class Goods_requisition_appr extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model(array('Mod_goods_requisition', 'Mod_material', 'Mod_user'));
			$this->load->library('m_pdf');
			
			if(!$this->session->userdata('user_id')){
				redirect('auth/logout');
			}
			
			if($this->session->userdata('status')!=1){
				redirect('errors/error_403');
			}
		}
		
		function index(){
			$data['record']	=  $this->Mod_goods_requisition->select_all_by_warehouse()->result();
			$this->template->load('templateadmin', 'admin/goods_requisition/data_appr', $data);
		}
		
		//================================================================================
		
		function approve_display(){
			$id						= $this->uri->segment(4);
			$data['request']		= $this->Mod_goods_requisition->get_request_by_no_request($id)->row_array();
			$data['request_detail']	= $this->Mod_goods_requisition->get_request_detail_by_no_request($id)->result();
			$this->template->load('templateadmin', 'admin/goods_requisition/data_appr_disp', $data);
		}
		
		function approve(){
			$id	= $this->input->post("request_no");
			if(!empty($id)){
				
				$request_detail		= $this->Mod_goods_requisition->get_request_detail_by_no_request($id)->result();
				foreach($request_detail as $r){
					$material_id_req	= $r->material_id;
					$qty_req			= $r->qty;
					$material			= $this->Mod_material->get_material_by_material_id($material_id_req)->row_array();
					$qty_act			= $material['qty'] - $qty_req;
					$this->Mod_goods_requisition->minus_qty_material($material_id_req, $qty_act);
				}
				
				$this->Mod_goods_requisition->approve($id);
			}
			redirect('admin/goods_requisition_appr');
		}
		
		
	}
?>