<?php
class Mod_supplier extends CI_Model{
	
	public $table = "tbl_supplier";
	
	function simpan($image){
		if($image == null){
			$data	= array(
				'supplier_name'	=> strtoupper($this->input->post('supplier_name')),
				'address'		=> strtoupper($this->input->post('address')),
				'phone'			=> strtoupper($this->input->post('phone')),
				'email'			=> strtoupper($this->input->post('email')),
				'note'			=> strtoupper($this->input->post('note'))
			);
		}else{
			$data	= array(
				'supplier_name'	=> strtoupper($this->input->post('supplier_name')),
				'address'		=> strtoupper($this->input->post('address')),
				'phone'			=> strtoupper($this->input->post('phone')),
				'email'			=> strtoupper($this->input->post('email')),
				'note'			=> strtoupper($this->input->post('note')),
				'image'			=> $image
			);
		}
		$this->db->insert($this->table, $data);
	}
    
	function update($image){
		if($image == null){
			$data	= array(
				'supplier_name'	=> strtoupper($this->input->post('supplier_name')),
				'address'		=> strtoupper($this->input->post('address')),
				'phone'			=> strtoupper($this->input->post('phone')),
				'email'			=> strtoupper($this->input->post('email')),
				'note'			=> strtoupper($this->input->post('note'))
			);
		}else{
			$data	= array(
				'supplier_name'	=> strtoupper($this->input->post('supplier_name')),
				'address'		=> strtoupper($this->input->post('address')),
				'phone'			=> strtoupper($this->input->post('phone')),
				'email'			=> strtoupper($this->input->post('email')),
				'note'			=> strtoupper($this->input->post('note')),
				'image'			=> $image
			);
		}
		$this->db->where('supplier_id', $this->input->post('supplier_id'));
		$this->db->update($this->table, $data);
	}
	
	function hapus($supplier_id){
		$data	= array(
			'status_delete'	=> 1
		);
		$this->db->where('supplier_id', $supplier_id);
		$this->db->update($this->table, $data);
	}
	
	//==================================================================================================
	
	function select_all(){
		$this->db->where('status_delete', 0);
		$query		= $this->db->get($this->table);
		return $query;
	}
	
	function get_supplier_by_id($supplier_id){
		$this->db->where('status_delete', 0);
		$this->db->where('supplier_id', $supplier_id);
		$query	= $this->db->get($this->table);
		return $query;
	}
	
	function get_supplier_all_by_id($supplier_id){
		$this->db->where('supplier_id', $supplier_id);
		$query	= $this->db->get($this->table);
		return $query;
	}
	
}