<?php
	class Mod_pr extends CI_Model{
		
		public $table_po		= "tbl_po";
		public $table_po_detail	= "tbl_po_detail";
		public $table_pr		= "tbl_pr";
		public $table_pr_detail	= "tbl_pr_detail";
		public $table_material	= "tbl_material";
		
		//pr
		function select_all_pr($username){
			$this->db->where('status_delete', 0);
			$this->db->where('user_pr', $username);
			$query		= $this->db->get($this->table_pr);
			return $query;
		}
		
		function select_all_send_user(){
			$this->db->where('status_delete', 0);
			$this->db->where('status_po_appr', 0);
			$query		= $this->db->get($this->table_pr);
			return $query;
		}
		
		function simpan_pr($username){
			$pr = array(
				'tgl_pr'	=> date('Y-m-d'),
				'user_pr'	=> $username
			);
			$this->db->insert($this->table_pr, $pr);
			$pr_id = $this->db->insert_id();
			
			$pr_detail = array(
				'no_pr'			=> $pr_id,
				'material_id'	=> $this->input->post('material_id'),
				'qty'			=> $this->input->post('qty')
			);
			$this->db->insert($this->table_pr_detail, $pr_detail);
		}
		
		function hapus_pr($id){
			$data = array(
				'status_delete'    => "1"
			);
			$this->db->where('no_pr', $id);
			$this->db->update($this->table_pr, $data);
		}
		
		function get_pr_by_no_pr($key){
			$this->db->where('status_delete', 0);
			$this->db->where('no_pr', $key);
			$query		= $this->db->get($this->table_pr);
			return $query;
		}
		function get_pr_by_no_po($key){
			$this->db->where('status_delete', 0);
			$this->db->where('no_po', $key);
			$query		= $this->db->get($this->table_pr);
			return $query;
		}
		function get_pr_detail_by_no_pr($pr){
			$this->db->where('status_delete', 0);
			$this->db->where('no_pr', $pr);
			$query		= $this->db->get($this->table_pr_detail);
			return $query;
		}
		
		
		//material
		function simpan_item(){
			$req_detail = array(
				'no_pr'			=> $this->input->post('pr'),
				'material_id'	=> $this->input->post('material_id'),
				'qty'			=> $this->input->post('qty'),
				'harga'			=> 0
			);
			$this->db->insert($this->table_pr_detail, $req_detail);
		}
		
		function hapus_detail_item($id){
			$data = array(
				'status_delete'    => "1"
			);
			$this->db->where('no_pr_detail', $id);
			$this->db->update($this->table_pr_detail, $data);
		}
		
		
		
		function select_all_pr_detail($no_pr){
			$this->db->where('status_delete', 0);
			$this->db->where('no_pr', $no_pr);
			$query	= $this->db->get($this->table_pr_detail);
			return $query;
		}
		
		
		
		
		
		
		
		
		
		
		
		//save
		function simpan($no_po){
			$data = array(
				'status_gi'		=> 1,
				'tgl_gi'		=> date('Y-m-d'),
				'user_gi'		=> $this->session->userdata('username')
			);
			$this->db->where('no_po', $no_po);
			$this->db->update($this->table_po, $data);
		}
		
		function update_qty_material($no_po){
			$this->db->where('no_po', $no_po);
			$query = $this->db->get($this->table_po_detail);
			$n =1;
			foreach($query->result() as $rows){
				$this->db->where('material_id', $rows->material_id);
				$cek_qty = $this->db->get($this->table_material)->row_array();
				$jumlah_qty = $rows->qty + $cek_qty['qty'];
				$data[$n] = array(
					'qty'	=> $jumlah_qty
				);
				$this->db->where('material_id', $rows->material_id);
				$this->db->update($this->table_material, $data[$n]);
				$n++;
			}
		}
		
		function unapprove($id){
			$data = array(
				'status_gi'    => "0"
				
			);
			$this->db->where('no_po', $id);
			$this->db->update($this->table_po, $data);
		}
		
		
		//po
		function select_all_po(){
			$this->db->where('status_delete', 0);
			$query		= $this->db->get($this->table_po);
			return $query;
		}
		
		
		
		
		
		function search_po_approve($key){
			$this->db->where('status_delete', 0);
			$this->db->where('status_gi', 1);
			$this->db->where('no_po', $key);
			$query		= $this->db->get($this->table_po);
			return $query;
		}
		
		function search_po($key){
			$this->db->where('status_delete', 0);
			$this->db->where('status_gi', 0);
			$this->db->where('no_po', $key);
			$query		= $this->db->get($this->table_po);
			return $query;
		}
		
		
		
		
		
		
		

		
		
		
		
	}
?>