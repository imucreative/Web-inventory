<?php
	ini_set('display_errors',0);
	class Goods_requisition extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model(array('Mod_goods_requisition', 'Mod_material', 'Mod_user'));
			$this->load->library('m_pdf');
			
			if(!$this->session->userdata('user_id')){
				redirect('auth/logout');
			}
			
			if($this->session->userdata('status')!=2){
				redirect('errors/error_403');
			}
		}
		
		function index(){
			$username = $this->session->userdata('username');
			$data['record']	=  $this->Mod_goods_requisition->select_all_by_user($username)->result();
			$this->template->load('templateadmin', 'admin/goods_requisition/data', $data);
		}
		
		//================================================================================
		
		function post(){
			if(isset($_POST['submit'])){
				$qty	= $this->input->post('qty');
				$stock	= $this->input->post('stock');
				
				if($qty > $stock){
					$check_qty = "<div class='alert alert-danger'>
						<button data-dismiss='alert' class='close'>&times;</button>
						<i class='fa fa-times-circle'></i> Stock Unavailable
					</div>";
					
					$this->session->set_flashdata('check_qty', $check_qty);
					redirect('admin/goods_requisition/post');
				}else{
					$material_id	= $this->input->post('material_id');
					$data	= $this->Mod_goods_requisition->get_material_by_no_material($material_id)->row_array();
					
					$this->Mod_goods_requisition->simpan($data);
					redirect('admin/goods_requisition');
				}
				
			}else{
				$this->template->load('templateadmin', 'admin/goods_requisition/post');
			}
		}
		
		function edit(){
			if(isset($_POST['submit'])){
				$request_no				= $this->uri->segment(4);
				$this->Mod_goods_requisition->update($request_no);
				redirect('admin/goods_requisition');
			}else{
				$id						= $this->uri->segment(4);
				$data['request']		= $this->Mod_goods_requisition->get_request_by_no_request($id)->row_array();
				$data['request_detail']	= $this->Mod_goods_requisition->get_request_detail_by_no_request($id)->result();
				$this->template->load('templateadmin', 'admin/goods_requisition/edit', $data);
			}
		}
		
		function add_item(){
			$qty		= $this->input->post('qty');
			$stock		= $this->input->post('stock');
			$request	= $this->input->post('request_no');
			
			if($qty > $stock){
				$check_qty = "<div class='alert alert-danger'>
					<button data-dismiss='alert' class='close'>&times;</button>
					<i class='fa fa-times-circle'></i> Stock Unavailable
				</div>";
				
				$this->session->set_flashdata('check_qty', $check_qty);
				redirect('admin/goods_requisition/edit/'.$request);
			}else{
				$request	= $this->input->post('request_no');
				
				$this->Mod_goods_requisition->simpan_item();
				redirect('admin/goods_requisition/edit/'.$request);
			}
		}
		
		function delete(){
			$id = $this->uri->segment(4);
			if(!empty($id)){
				$this->Mod_goods_requisition->hapus($id);
			}
			redirect('admin/goods_requisition');
		}
		
		function delete_detail_item(){
			$request_no			= $this->uri->segment(4);
			$request_no_detail	= $this->uri->segment(5);
			if(!empty($request_no_detail)){
				$this->Mod_goods_requisition->hapus_detail_item($request_no_detail);
			}
			redirect('admin/goods_requisition/edit/'.$request_no);
		}
		
		//================================================================================
		
		function search_material(){
			$data['record']	=  $this->Mod_material->select_all();
			$this->template->load('templatereportadmin', 'admin/goods_requisition/search_material', $data);
		}
		
		function report_display(){
			$no_request				= $this->uri->segment(4);
			
			$cari_request			= $this->Mod_goods_requisition->get_request_by_no_request($no_request);
			$data_request			= $cari_request->row_array();
			$count_request			= $cari_request->num_rows();
			
			$cari_data_request_detail	= $this->Mod_goods_requisition->get_request_detail_by_no_request($no_request);
			$data_user				= $this->Mod_user->chek_user($data_request['user'])->row_array();
			$this->Mod_goods_requisition->print_report_display($no_request);
			
			$data['no_request']		= $no_request;
			$date_po				= date_create($data_request['tgl_request']);
			$data['tgl_request']	= date_format($date_po, 'd F Y');
			$data['note']			= $data_request['note'];
			$data['nama_lengkap']	= $data_user['nama_lengkap'];
			
			$data['result_request_detail']	= $cari_data_request_detail;
			
			if($count_request != 0){
				$this->template->load('templatereportadmin', 'admin/goods_requisition/report_display', $data);
			}else{
				$data['heading']		= "Sorry, Request Not Found";
				$this->template->load('templatereportadmin', 'errors/html/error_404', $data);
			}
		}
		
		
		//================================================================================
		
		//tidak digunakan, tapi bagus untuk mengetahui teknik menggunakan JSON
		function insert_json_material(){
			
			$nama_material = $this->input->post("material_id");
			
			$response = array();
			$posts = array();
			$posts[] = array(
				"nama_material"	=>  $nama_material
			);
			$response['posts'] = $posts;
			echo json_encode($response,TRUE);
		}
		
		
	}
?>