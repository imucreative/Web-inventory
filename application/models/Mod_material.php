<?php
	class Mod_material extends CI_Model{
		
		public $table_material	= "tbl_material";
		public $table_kategori	= "tbl_kategori";
		
		//display edit
		function get_material_by_material_id($material_id){
			$this->db->where('status_delete', 0);
			$this->db->where('material_id', $material_id);
			$query		= $this->db->get($this->table_material);
			return $query;
		}
		
		//produk
		function simpan($gambar){
			$data = array(
				'tgl_input'			=> date('Y-m-d'),
				'nama_material'		=> strtoupper($this->input->post('nama_material')),
				'nama_material_seo'	=> seo_title($this->input->post('nama_material')),
				'keterangan'		=> $this->input->post('keterangan'),
				'qty'				=> $this->input->post('qty'),
				'location'			=> $this->input->post('location'),
				'kualitas'			=> $this->input->post('kualitas'),
				'kategori_id'		=> $this->input->post('kategori'),
				'image'				=> $gambar
			);
			$this->db->insert($this->table_material, $data);
			$material_id = $this->db->insert_id();
		}
		
		function update($gambar){
			if($gambar == null){
				$data = array(
					'nama_material'		=> strtoupper($this->input->post('nama_material')),
					'nama_material_seo'	=> seo_title($this->input->post('nama_material')),
					'keterangan'		=> $this->input->post('keterangan'),
					'qty'				=> $this->input->post('qty'),
					'location'			=> $this->input->post('location'),
					'kualitas'			=> $this->input->post('kualitas'),
					'kategori_id'		=> $this->input->post('kategori')
				);
			}else{
				$data = array(
					'nama_material'		=> strtoupper($this->input->post('nama_material')),
					'nama_material_seo'	=> seo_title($this->input->post('nama_material')),
					'keterangan'		=> $this->input->post('keterangan'),
					'qty'				=> $this->input->post('qty'),
					'location'			=> $this->input->post('location'),
					'kualitas'			=> $this->input->post('kualitas'),
					'kategori_id'		=> $this->input->post('kategori'),
					'image'				=> $gambar
				);
			}
			$this->db->where('material_id', $this->input->post('id'));
			$this->db->update($this->table_material, $data);
		}
		
		function hapus($id){
			$data = array(
				'status_delete'    => "1"
			);
			$this->db->where('material_id', $id);
			$this->db->update($this->table_material, $data);
		}
		
		function publish($id, $status){
			if($status=='1'){
				$data = array(
					'publish'    => "0"	//jika publish, maka ubah jadi 0/draft
				);
			}else{
				$data = array(
					'publish'    => "1"	//jika draft, maka ubah jadi 1/publish
				);
			}
			
			$this->db->where('material_id', $id);
			$this->db->update($this->table_material, $data);
		}
		
		//material
		function select_all_material(){
			$query	= "SELECT tp.*, tk.*
				FROM tbl_material AS tp, tbl_kategori AS tk 
				WHERE tp.kategori_id=tk.kategori_id AND tp.status_delete='0'
				ORDER BY tk.nama_kategori, tp.nama_material";
			$select	= $this->db->query($query);
			return $select;
		}
		
		function select_all(){
			$query	= "SELECT tp.*, tk.*
				FROM tbl_material AS tp, tbl_kategori AS tk 
				WHERE tp.kategori_id=tk.kategori_id AND tp.status_delete='0' AND tp.publish='1'
				ORDER BY tk.nama_kategori, tp.nama_material";
			$select	= $this->db->query($query);
			return $select;
		}
		
//=======================================================================================================================================
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		function select_all_publish(){
			$query	= "SELECT tp.*, tk.*
				FROM tbl_product AS tp, tbl_kategori AS tk 
				WHERE tp.kategori_id=tk.kategori_id AND tp.status_delete='0' AND tp.publish='1'
				ORDER BY tk.nama_kategori, tp.nama_material";
			$select	= $this->db->query($query);
			return $select;
		}
		
		function search($key){
			$this->db->where('status_delete', 0);
			$this->db->where('publish', 1);
			$this->db->like('nama_material', $key);
			$query	= $this->db->get($this->table_material);
			return $query;
		}
		
		function jumlah_data_search($key){
			$this->db->where('status_delete', 0);
			$this->db->where('publish', 1);
			$this->db->like('nama_material', $key);
			$query		= $this->db->get($this->table_material);
			return $query;
		}
		
		function get_material_sama_by_kategori_id($kategori_id, $material_id){
			$this->db->where('material_id !=', $material_id);
			$this->db->where('status_delete', 0);
			$this->db->where('publish', 1);
			$this->db->limit(4);
			$this->db->order_by('rand()');
			$this->db->where('kategori_id', $kategori_id);
			$query		= $this->db->get($this->table_material);
			return $query;
		}
		
		function get_material_by_kategori_id($kategori_id){
			$this->db->where('status_delete', 0);
			$this->db->where('publish', 1);
			$this->db->where('kategori_id', $kategori_id);
			$query		= $this->db->get($this->table_material);
			return $query;
		}
		
		function get_material_by_seo($seo){
			$this->db->where('status_delete', 0);
			$this->db->where('nama_material_seo', $seo);
			$this->db->where('publish', 1);
			$query		= $this->db->get($this->table_material);
			return $query;
		}
		
	}
?>