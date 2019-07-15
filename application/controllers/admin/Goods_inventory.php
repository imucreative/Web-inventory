<?php
	ini_set('display_errors',0);
	class Goods_inventory extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model(array('Mod_goods_inventory','Mod_supplier'));
			$this->load->library('m_pdf');
			
			if(!$this->session->userdata('user_id')){
				redirect('auth/logout');
			}
			
			if($this->session->userdata('status')!=1){
				redirect('errors/error_403');
			}
		}
		
		function index(){
			$data['record']	=  $this->Mod_goods_inventory->select_all_gi()->result();
			$this->template->load('templateadmin', 'admin/goods_inventory/data', $data);
		}
		
		//================================================================================
		
		function post(){
			if(isset($_POST['submit'])){
				$no_po	= $this->input->post('no_po');
				$this->Mod_goods_inventory->simpan($no_po);
				$this->Mod_goods_inventory->update_qty_material($no_po);
				
				redirect('admin/goods_inventory');
				
			}else{
				$cari_data_po_detail		= $this->Mod_goods_inventory->select_all_po_detail("");
				$data['result_po_detail']	= $cari_data_po_detail;
				
				$this->template->load('templateadmin', 'admin/goods_inventory/post', $data);
			}
		}
		
		function unapprove(){
			$id = $this->uri->segment(4);
			if(!empty($id)){
				$this->Mod_goods_inventory->unapprove($id);
			}
			redirect('admin/goods_inventory');
		}
		
		function report_display(){
			$no_po					= $this->uri->segment(4);
			
			$cari_data_po			= $this->Mod_goods_inventory->search_po_approve($no_po);
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
				$this->template->load('templatereportadmin', 'admin/goods_inventory/report_display', $data);
			}else{
				redirect('errors/error_po_not_found');
			}
		}
		
		function report_pdf(){	//belum digunakan
			$no_po = $this->uri->segment(4);
			$this->data['title']="MY PDF TITLE 1.";
			$this->data['description']="";
			$this->data['description']=$this->official_copies;
			
			$html	= $this->template->load('templateadmin', 'admin/goods_inventory/report_pdf', $this->data, true);
 	 
			//this the the PDF filename that user will get to download
			$pdfFilePath ="mypdfName-".time()."-download.pdf";
			
			//actually, you can pass mPDF parameter on this load() function
			$pdf = $this->m_pdf->load();
			//generate the PDF!
			$pdf->WriteHTML($html, 2);
			//offer it to user via browser download! (The PDF won't be saved on your server HDD)
			$pdf->Output($pdfFilePath, "D");
		}
		
		//================================================================================
		
		function search_po(){
			$no_po					= $this->input->post('no_po');
			$cari_data_po			= $this->Mod_goods_inventory->search_po($no_po);
			$data_po				= $cari_data_po->row_array();
			$count_po				= $cari_data_po->num_rows();
			$cari_vendor			= $this->Mod_supplier->get_supplier_by_id($data_po['supplier_id'])->row_array();
			$cari_data_po_detail	= $this->Mod_goods_inventory->select_all_po_detail($data_po['no_po']);
			
			$data['supplier_name']		= $cari_vendor['supplier_name'];
			$data['address']			= $cari_vendor['address'];
			$data['phone']				= $cari_vendor['phone'];
			$data['email']				= $cari_vendor['email'];
			$data['note']				= $cari_vendor['note'];
			$data['no_po']				= $no_po;
			$data['result_po_detail']	= $cari_data_po_detail;
			
			if($count_po == 0){
				$data['count'] = "<div class='alert alert-danger'>
					<button data-dismiss='alert' class='close'>&times;</button>
					<i class='fa fa-times-circle'></i> No PO Unknown
				</div>";
			}
			
			$this->template->load('templateadmin', 'admin/goods_inventory/post', $data);
		}
		
		//================================================================================
		
		
	}
?>