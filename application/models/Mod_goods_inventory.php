<?php
	class Mod_goods_inventory extends CI_Model{
		
		public $table_po		= "tbl_po";
		public $table_pr		= "tbl_pr";
		public $table_po_detail	= "tbl_po_detail";
		public $table_material	= "tbl_material";
		
		function select_all_gi(){
			$this->db->where('status_delete', 0);
			$this->db->where('status_gi', 1);
			$query		= $this->db->get($this->table_po);
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
		
		function select_po(){
			$this->db->where('status_delete', 0);
			$query		= $this->db->get($this->table_po);
			return $query;
		}
		
		function select_all_po_detail($no_po){
			$this->db->where('status_delete', 0);
			$this->db->where('no_po', $no_po);
			$query	= $this->db->get($this->table_po_detail);
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
		
		function get_po_by_no_po($key){
			$this->db->where('status_delete', 0);
			$this->db->where('no_po', $key);
			$query		= $this->db->get($this->table_po);
			return $query;
		}
		function get_po_detail_by_no_po($po){
			$this->db->where('status_delete', 0);
			$this->db->where('no_po', $po);
			$query		= $this->db->get($this->table_po_detail);
			return $query;
		}
		
		function simpan_po(){
			$po = array(
				'tgl_po'		=> date('Y-m-d'),
				'supplier_id'	=> $this->input->post('supplier_id')
			);
			$this->db->insert($this->table_po, $po);
			$po_id = $this->db->insert_id();
			
			$po_detail = array(
				'no_po'			=> $po_id,
				'material_id'	=> $this->input->post('material_id'),
				'qty'			=> $this->input->post('qty')
			);
			$this->db->insert($this->table_po_detail, $po_detail);
			
			$pr = array(
				'tgl_po_appr'		=> date('Y-m-d'),
				'user_po_appr'		=> $this->session->userdata('username'),
				'status_po_appr'	=> "1",
				'no_po'				=> $po_id
			);
			$this->db->where('no_pr', $this->input->post('no_pr'));
			$this->db->update($this->table_pr, $pr);
		}
		
		function update_po(){
			$po = array(
				'supplier_id'	=> $this->input->post('supplier_id')
			);
			$this->db->where('no_po', $this->input->post('po'));
			$this->db->update($this->table_po, $po);
			//=================
			$pr = array(
				'tgl_po_appr'		=> "0000-00-00",
				'user_po_appr'		=> "",
				'status_po_appr'	=> "0",
				'no_po'				=> "0"
			);
			$this->db->where('no_po', $this->input->post('po'));
			$this->db->update($this->table_pr, $pr);
			//=================
			$pr = array(
				'tgl_po_appr'		=> date('Y-m-d'),
				'user_po_appr'		=> $this->session->userdata('username'),
				'status_po_appr'	=> "1",
				'no_po'				=> $this->input->post('po')
			);
			$this->db->where('no_pr', $this->input->post('no_pr'));
			$this->db->update($this->table_pr, $pr);
		}
		
		function hapus_po($id){
			$data = array(
				'status_delete'    => "1"
			);
			$this->db->where('no_po', $id);
			$this->db->update($this->table_po, $data);
		}
		

		//material
		function simpan_item(){
			$req_detail = array(
				'no_po'			=> $this->input->post('po'),
				'material_id'	=> $this->input->post('material_id'),
				'qty'			=> $this->input->post('qty'),
				'harga'			=> 0
			);
			$this->db->insert($this->table_po_detail, $req_detail);
		}
		
		function hapus_detail_item($id){
			$data = array(
				'status_delete'    => "1"
			);
			$this->db->where('no_po_detail', $id);
			$this->db->update($this->table_po_detail, $data);
		}
		
		
		
	}
?>