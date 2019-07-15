<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
	
	
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-external-link-square"></i>Form Edit
				<div class="panel-tools">
					<!--<a class="btn btn-xs btn-link panel-expand" href="#"><i class="fa fa-expand"></i></a>-->
				</div>
			</div>
			
			<div class="panel-body">
					<table class="table">
						<tr>
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="pr">PR & TGL PR :</label>
							</td>
							<td>
								<div class="col-sm-3">
									<input type="text" class="form-control readonly" id="pr" placeholder="* PR" name="pr" value="<?php echo $pr['no_pr'];?>" required />
								</div>
								<div class="col-sm-9">
									<input type="text" class="form-control readonly" id="tgl_pr" placeholder="* PR Date" name="tgl_pr" value="<?php echo tgl_indo($pr['tgl_pr']);?>" required />
								</div>
							</td>
						</tr>
						
						
					</table>
				
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-body">
				<?php
					echo form_open('admin/purchase_request/add_item');
					//$check_qty = $this->session->flashdata('check_qty');
					//echo $check_qty;
				?>
					<table class="table">
						<tr>
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="nama_material">NAMA MATERIAL :</label>
							</td>
							<td>
								<div class="col-sm-2">
									<input type="text" class="form-control readonly" id="material_id" placeholder="* Material ID" name="material_id" required autocomplete="off" />
									<input type="hidden" class="readonly" id="pr" name="pr" value="<?php echo $pr['no_pr'];?>" />
								</div>
								
								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" class="form-control readonly" id="nama_material" placeholder="* Nama Material" name="nama_material" autocomplete="off" />
										<span class="input-group-btn">
											<a class="btn btn-primary" target="popup" onclick="search_material()"><i class='fa fa-search'></i> Search</a>
										</span>
									</div>
								</div>
								
							</td>
						</tr>
						
						<tr>
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="qty">QTY & STOK :</label>
							</td>
							<td>
								<div class="col-sm-5 has-warning">
									<input type="text" maxlength="4" class="form-control" id="qty" placeholder="* Qty Hanya Angka" name="qty" onkeypress="return hanyaAngka(event)" required autocomplete="off" />
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control readonly" id="stock" placeholder="* Stock" name="stock" autocomplete="off" />
								</div>
							</td>
						</tr>
						
						<tr >
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="location">LOKASI & KATEGORI :</label>
							</td>
							<td>
								<div class="col-sm-5">
									<input type="text" class="form-control readonly" id="location" placeholder="* Lokasi" name="location" autocomplete="off" />
								</div>
								<div class="col-sm-4">
									<!--<input type="text" class="form-control readonly" id="harga" placeholder="* Price" name="harga" autocomplete="off" />
									<input type="hidden" class="readonly" id="harga_tanpa_format_number" name="harga_tanpa_format_number" />-->
									<input type="text" class="form-control readonly" id="kategori" placeholder="* Kategori" name="kategori" required autocomplete="off" />
								</div>
								<div class="col-sm-3" align="right">
									<button type="submit" name="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure add item?')"><i class='fa fa-save'></i> ADD</button>
									<?php echo anchor('admin/purchase_request','<i class="fa fa-arrow-left"></i> BACK',"class='btn btn-info btn-sm'");?>
								</div>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		
		
		<div class="panel panel-default">
			<div class="panel-body">
				<div class='table-responsive'>
					
						<table class="table table-bordered table-hover table-full-width" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th width='5%'><center>#</center></th>
									<th width='45%'><center>NAMA MATERIAL</center></th>
									<th width='5%'><center>QTY</center></th>
									<th width='5%'><center>S.LOC</center></th>
									<th width='30%'><center>KATEGORI</center></th>
									<!--<th width='20%'><center>AMOUNT</center></th>-->
									<th width='10%'><center>#</center></th>
								</tr>
							</thead>
							
							<tbody>
								<?php
									$no=1;
									$total="";
									foreach ($pr_detail as $r){
										
										$CI=&get_instance();
										$CI->load->model('Mod_material');
										$CI->load->model('Mod_kategori');
										$result_material	= $CI->Mod_material->get_material_by_material_id($r->material_id)->row_array();
										$result_kategori	= $CI->Mod_kategori->get_kategori_by_kategori_id($result_material['kategori_id'])->row_array();
										$amount = $r->qty*$r->harga;
								?>
										
											<tr>
												<td align='center'><?php echo $no;?></td>
												<td><?php echo $result_material['nama_material'];?></td>
												<td align='center'><?php echo $r->qty;?></td>
												<td align='center'><?php echo $result_material['location'];?></td>
												<td align='center'><?php echo $result_kategori['nama_kategori'];?></td>
												
												<td align='center'>
													<a href='../delete_detail_item/<?php echo $r->no_pr;?>/<?php echo $r->no_pr_detail;?>' class='btn btn-xs btn-danger tooltips' data-placement='top' data-original-title='Delete' title='Delete' onclick="return confirm('Are you sure?')" ><i class='fa fa-trash-o'></i></a>
												</td>
											</tr>
								<?php
										$no++;
										$total=$amount+$total;
									}
								?>
							</tbody>
					
							
						</table>
					
				</div>
			</div>
		</div>
		
		<!-- end: TEXT FIELDS PANEL -->
	
</div>

<script>
	$(document).ready(function() {
		$('.readonly').keydown(function(e) {
			if (e.keyCode === 8 || e.keyCode === 46)  // Backspace & del
			e.preventDefault();
		}).on('keypress paste cut', function(e) {
			e.preventDefault();
		});
	});
	
	function search_material() {
		
		var material_id		= document.getElementById("material_id");
		var nama_material	= document.getElementById("nama_material");
		var location		= document.getElementById("location");
		var stock			= document.getElementById("stock");
		var kategori		= document.getElementById("kategori");

		var sharedObject = {};
		sharedObject.material_id	= material_id.value;
		sharedObject.nama_material	= nama_material.value;
		sharedObject.location		= location.value;
		sharedObject.stock			= stock.value;
		sharedObject.kategori		= kategori.value;
		
		if (window.showModalDialog){
			var retValue = showModalDialog("../search_material/", sharedObject, "fullscreen=yes;");
			if (retValue) {
				UpdateFields (retValue.material_id, retValue.nama_material, retValue.location, retValue.stock, retValue.kategori);
			}
		} else {
			var modal = window.open("../search_material/", null, "fullscreen=yes;", null);
			modal.dialogArguments = sharedObject;
		}
	}
	
	function search_supplier() {
		
		var supplier_id		= document.getElementById("supplier_id");
		var supplier_name	= document.getElementById("supplier_name");
		var address			= document.getElementById("address");
		var phone			= document.getElementById("phone");
		var email			= document.getElementById("email");
		var note			= document.getElementById("note");

		var sharedObject = {};
		sharedObject.supplier_id	= supplier_id.value;
		sharedObject.supplier_name	= supplier_name.value;
		sharedObject.address		= address.value;
		sharedObject.phone			= phone.value;
		sharedObject.email			= email.value;
		sharedObject.note			= note.value;
		
		if (window.showModalDialog){
			var retValue = showModalDialog("../search_supplier/", sharedObject, "fullscreen=yes;");
			if (retValue) {
				UpdateFieldsSupplier(retValue.supplier_id, retValue.supplier_name, retValue.address, retValue.phone, retValue.email, retValue.note);
			}
		} else {
			var modal = window.open("../search_supplier/", null, "fullscreen=yes;", null);
			modal.dialogArguments = sharedObject;
		}
	}
	
	function UpdateFields(id, nama, loc, stock_item, kat) {
		var material_id		= document.getElementById("material_id");
		var nama_material	= document.getElementById("nama_material");
		var location		= document.getElementById("location");
		var qty				= document.getElementById("qty");
		var stock			= document.getElementById("stock");
		var kategori		= document.getElementById("kategori");
		material_id.value	= id;
		nama_material.value	= nama;
		location.value		= loc;
		qty.value			= "";
		stock.value			= stock_item;
		kategori.value		= kat;
	}
	
	function UpdateFieldsSupplier(id, nama, addr, hp, em, not) {
		var supplier_id		= document.getElementById("supplier_id");
		var supplier_name	= document.getElementById("supplier_name");
		var address			= document.getElementById("address");
		var phone			= document.getElementById("phone");
		var email			= document.getElementById("email");
		var note			= document.getElementById("note");
		supplier_id.value	= id;
		supplier_name.value	= nama;
		address.value		= addr;
		phone.value			= hp;
		email.value			= em;
		note.value			= not;
	}
	
	function hanyaAngka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57)){
				//alert("Please Input Number Only");
				return false;
			}
		return true;
	}
	
</script>