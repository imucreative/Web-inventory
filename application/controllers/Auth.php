<?php
	ini_set('display_errors',0); 
	class Auth extends CI_Controller{
		
		public $table	= "tbl_users";
		
		function __construct() {
			parent::__construct();
			$this->load->model('Mod_user');
		}
		
		function index(){
			if(isset($_POST['submit'])){
				$username	= $this->input->post('username');
				$password	= $this->input->post('password');
				$chek		= $this->Mod_user->chek_login($username, $password);
				if($chek->num_rows() > 0){
					$this->session->set_userdata($chek->row_array());
					$status	= $this->session->userdata('status');
					if($status == 0){
						redirect('admin/info');
					}else if($status == 1){
						redirect('admin/goods_inventory');
					}else if($status == 3){
						redirect('admin/purchase_order');
					}else{
						redirect('admin/goods_requisition');
					}
				}else{
					$data['error'] = "<div class='alert alert-danger'>
						<button data-dismiss='alert' class='close'>&times;</button>
						<i class='fa fa-times-circle'></i> Please check username & password.
					</div>";
					
					//$this->session->set_flashdata('check_qty', $check_qty);
					$this->load->view('admin/login', $data);
				}
			}else{
				$this->load->view('admin/login');
			}
		}
		
		function logout(){
			$this->session->sess_destroy();
			redirect('auth');
		}
		
		
	}