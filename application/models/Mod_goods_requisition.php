<?php
	class Mod_goods_requisition extends CI_Model{
		
		public $table_request			= "tbl_request";
		public $table_request_detail	= "tbl_request_detail";
		public $table_material			= "tbl_material";
		
		function select_all_by_user($username){
			$this->db->where('status_delete', 0);
			$this->db->where('user', $username);
			$query		= $this->db->get($this->table_request);
			return $query;
		}
		
		function select_all_by_warehouse(){
			$this->db->where('status_delete', 0);
			$this->db->where('print!=', 0);
			$query		= $this->db->get($this->table_request);
			return $query;
		}
		
		
		//save
		function simpan($row){
			$req = array(
				'tgl_request'	=> date('Y-m-d'),
				'note'			=> $this->input->post('note'),
				'user'			=> $this->session->userdata('username')
			);
			$this->db->insert($this->table_request, $req);
			$req_id = $this->db->insert_id();
			
			$req_detail = array(
				'request_no'	=> $req_id,
				'material_id'	=> $row['material_id'],
				'qty'			=> $this->input->post('qty'),
				//'harga'			=> $row['harga'],
				'location'		=> $row['location']
			);
			$this->db->insert($this->table_request_detail, $req_detail);
		}
		
		function simpan_item(){
			$req_detail = array(
				'request_no'	=> $this->input->post('request_no'),
				'material_id'	=> $this->input->post('material_id'),
				'qty'			=> $this->input->post('qty'),
				//'harga'			=> $this->input->post('harga_tanpa_format_number'),
				'location'		=> $this->input->post('location')
			);
			$this->db->insert($this->table_request_detail, $req_detail);
		}
		
		function update($request_no){	//belum selesai
			$data = array(
				'note'			=> $this->input->post('note')
			);
			
			$this->db->where('request_no', $request_no);
			$this->db->update($this->table_request, $data);
		}
		
		function hapus($id){
			$data = array(
				'status_delete'    => "1"
			);
			$this->db->where('request_no', $id);
			$this->db->update($this->table_request, $data);
		}
		
		function hapus_detail_item($id){
			$data = array(
				'status_delete'    => "1"
			);
			$this->db->where('request_detail_no', $id);
			$this->db->update($this->table_request_detail, $data);
		}
		
		//display edit
		function get_request_by_no_request($no_req){
			$this->db->where('status_delete', 0);
			$this->db->where('request_no', $no_req);
			$query		= $this->db->get($this->table_request);
			return $query;
		}
		
		function get_material_by_no_material($material_id){
			$this->db->where('status_delete', 0);
			$this->db->where('material_id', $material_id);
			$query		= $this->db->get($this->table_material);
			return $query;
		}
		
		function get_request_detail_by_no_request($no_req){
			$this->db->where('status_delete', 0);
			$this->db->where('request_no', $no_req);
			$query		= $this->db->get($this->table_request_detail);
			return $query;
		}
		
		function print_report_display($id){
			$data = array(
				'print'	=> "1"
			);
			$this->db->where('request_no', $id);
			$this->db->update($this->table_request, $data);
		}
		
		function approve($id){
			$data = array(
				'status_request'	=> "1",
				'tgl_appr'			=> date('Y-m-d'),
				'user_appr'			=> $this->session->userdata('username')
			);
			$this->db->where('request_no', $id);
			$this->db->update($this->table_request, $data);
		}
		
		function minus_qty_material($material_id_req, $qty_req){
			$data = array(
				'qty'	=> $qty_req
			);
			$this->db->where('material_id', $material_id_req);
			$this->db->update($this->table_material, $data);
		}
		
		function get_request_detail_to_report($data){
			$date_from	= $data['date_from'];
			$date_to	= $data['date_to'];
			$user		= $data['user'];
			$status		= $data['status'];
			
			$this->db->where('tgl_request >=', $date_from);
			$this->db->where('tgl_request <=', $date_to);
			$this->db->where('user', $user);
			$this->db->where('status_request', $status);
			$query		= $this->db->get($this->table_request);
			return $query;
		}
		
		
		
	}
?>