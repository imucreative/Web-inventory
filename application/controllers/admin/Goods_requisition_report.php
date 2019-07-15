<?php
	ini_set('display_errors',0); 
	class Goods_requisition_report extends CI_Controller{
		
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
			$data['user']	= $this->Mod_user->select_all_user_in_report()->result();
			$this->template->load('templateadmin', 'admin/goods_requisition/data_report', $data);
		}
		
		function display_request_report(){
			$date_request_from	= $this->input->post("date_request_from");
			$date_request_to	= $this->input->post("date_request_to");
			$user_request		= $this->input->post("user_request");
			$status_request		= $this->input->post("status_request");
			$data_user			= $this->Mod_user->chek_user($user_request)->row_array();
			
			if($status_request == 1){
				$stat	= "Approve";
			}else{
				$stat	= "Not Approve";
			}
			
			$data	= array(
				"date_from"		=> $date_request_from,
				"date_to"		=> $date_request_to,
				"user"			=> $data_user['nama_lengkap'],
				"status_name"	=> $stat,
				"status"		=> $status_request
			);
			
			$cari_data_request_detail		= $this->Mod_goods_requisition->get_request_detail_to_report($data)->result();
			$data['result_request_detail']	= $cari_data_request_detail;
			
			$this->template->load('templateadmin', 'admin/goods_requisition/data_report_display', $data);
		}
		
		function display_request_report_print(){
			
		}
		//================================================================================
		
		
		
		
	}
?>