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
				<?php
					echo form_open('admin/goods_requisition/edit/'.$request['request_no']);
					
				?>
					<table class="table">
						<tr>
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="tgl_request">TGL REQUEST :</label>
							</td>
							<td>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="tgl_request" placeholder="*" name="tgl_request" value="<?php echo tgl_indo($request['tgl_request']);?>" required readonly />
								</div>
							</td>
						</tr>
						
						<tr>
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="note">NOTE :</label>
							</td>
							<td>
								<div class="col-sm-12 has-warning">
									<input type="text" class="form-control" id="note" placeholder="*" name="note" value="<?php echo $request['note'];?>" required />
								</div>
							</td>
						</tr>
						
						<tr>
							<td colspan='2' align="right">
								<div class="col-sm-12">
									<button type="submit" name="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure save request?')"><i class='fa fa-save'></i> SAVE</button>
									<?php echo anchor('admin/goods_requisition','<i class="fa fa-arrow-left"></i> BACK',"class='btn btn-info btn-sm'");?>
								</div>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-body">
				<?php
					echo form_open('admin/goods_requisition/add_item');
					$check_qty = $this->session->flashdata('check_qty');
					echo $check_qty;
				?>
					<table class="table">
						<tr>
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="nama_material">NAMA MATERIAL :</label>
							</td>
							<td>
								<div class="col-sm-2">
									<input type="text" class="form-control readonly" id="material_id" placeholder="*" name="material_id" required autocomplete="off" />
									<input type="hidden" class="readonly" id="request_no" name="request_no" value="<?php echo $request['request_no'];?>" />
								</div>
								
								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" class="form-control readonly" id="nama_material" placeholder="*" name="nama_material" autocomplete="off" />
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
								<div class="col-sm-6 has-warning">
									<input type="text" maxlength="4" class="form-control" id="qty" placeholder="* Qty Hanya Angka" name="qty" onkeypress="return hanyaAngka(event)" required autocomplete="off" />
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control readonly" id="stock" placeholder="*" name="stock" autocomplete="off" />
								</div>
							</td>
						</tr>
						
						<tr >
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="location">LOKASI & KATEGORI :</label>
							</td>
							<td>
								<div class="col-sm-6">
									<input type="text" class="form-control readonly" id="location" placeholder="*" name="location" autocomplete="off" />
								</div>
								<div class="col-sm-4">
									<!--<input type="text" class="form-control readonly" id="harga" placeholder="* Price" name="harga" autocomplete="off" />
									<input type="hidden" class="readonly" id="harga_tanpa_format_number" name="harga_tanpa_format_number" />-->
									<input type="text" class="form-control readonly" id="kategori" placeholder="*" name="kategori" required autocomplete="off" />
								</div>
								<div class="col-sm-2" align="right">
									<button type="submit" name="submit" class="btn btn-success btn-md" onclick="return confirm('Are you sure add item?')"><i class='fa fa-save'></i> ADD</button>
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
									foreach ($request_detail as $r){
										
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
												<td align='center'><?php echo $r->location;?></td>
												<td align='center'><?php echo $result_kategori['nama_kategori'];?></td>
												
												<td align='center'>
													<a href='../../goods_requisition/delete_detail_item/<?php echo $r->request_no;?>/<?php echo $r->request_detail_no;?>' class='btn btn-xs btn-danger tooltips' data-placement='top' data-original-title='Delete' title='Delete' onclick="return confirm('Are you sure?')" ><i class='fa fa-trash-o'></i></a>
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
		//var harga			= document.getElementById("harga");
		//var harga_tanpa_format_number			= document.getElementById("harga_tanpa_format_number");
		var location		= document.getElementById("location");
		var stock			= document.getElementById("stock");
		var kategori		= document.getElementById("kategori");

		var sharedObject = {};
		sharedObject.material_id	= material_id.value;
		sharedObject.nama_material	= nama_material.value;
		//sharedObject.harga			= harga.value;
		//sharedObject.harga_tanpa_format_number			= harga_tanpa_format_number.value;
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
	
	function UpdateFields(id, nama, loc, stock_item, kat) {
		var material_id		= document.getElementById("material_id");
		var nama_material	= document.getElementById("nama_material");
		//var harga			= document.getElementById("harga");
		//var harga_tanpa_format_number			= document.getElementById("harga_tanpa_format_number");
		var location		= document.getElementById("location");
		var qty				= document.getElementById("qty");
		var stock			= document.getElementById("stock");
		var kategori		= document.getElementById("kategori");
		
		material_id.value	= id;
		nama_material.value	= nama;
		//harga.value			= "Rp. "+price;
		//harga_tanpa_format_number.value			= harga_tanpa_format;
		location.value		= loc;
		qty.value			= "";
		stock.value			= stock_item;
		kategori.value			= kat;
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