<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
	
	<?php 
		echo form_open("admin/goods_requisition/post");
	?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-external-link-square"></i>Form Input
				<div class="panel-tools">
					<a class="btn btn-xs btn-link panel-expand" href="#"><i class="fa fa-expand"></i></a>
				</div>
			</div>
			
			<div class="panel-body">
				<table class="table">
					
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="tgl_request">TGL REQUEST :</label>
						</td>
						<td>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="tgl_request" placeholder="*" name="tgl_request" value="<?php echo date("d F Y");?>" required readonly />
							</div>
						</td>
					</tr>
					
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="note">NOTE :</label>
						</td>
						<td>
							<div class="col-sm-12 has-warning">
								<input type="text" class="form-control" id="note" placeholder="*" name="note" required />
							</div>
						</td>
					</tr>
						
				</table>
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-body">
			<?php 
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
							</div>
							
							<div class="col-sm-10">
								<div class="input-group">
									<input type="text" class="form-control readonly" id="nama_material" placeholder="*" name="nama_material" required autocomplete="off" />
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
							<div class="col-sm-8 has-warning">
								<input type="text" maxlength="4" class="form-control" id="qty" placeholder="* Qty Hanya Angka" name="qty" onkeypress="return hanyaAngka(event)" required autocomplete="off" />
							</div>
							
							
							<div class="col-sm-4">
								
								<input type="text" class="form-control readonly" id="stock" placeholder="*" name="stock" />
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
							<div class="col-sm-6" align="right">
								<!--
								<input type="text" class="form-control readonly" id="harga" placeholder="* Price" name="harga" required autocomplete="off" />
								<input type="hidden" class="readonly" id="harga_tanpa_format_number" name="harga_tanpa_format_number" />
								-->
								<input type="text" class="form-control readonly" id="kategori" placeholder="*" name="kategori" required autocomplete="off" />
							</div>
						</td>
					</tr>
					
					<tr >
						<td colspan='2' align='right' >
							<div class="col-sm-12">
								<button type="submit" name="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure?')"><i class='fa fa-save'></i> SAVE</button>
								<?php echo anchor('admin/goods_requisition','<i class="fa fa-arrow-left"></i> BACK',"class='btn btn-info btn-sm'");?>
							</div>
						</td>
					</tr>
					
				</table>
			</div>
		</div>
		
		<!-- end: TEXT FIELDS PANEL -->
	</form>
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
			var retValue = showModalDialog("search_material/", sharedObject, "fullscreen=yes;");
			if (retValue) {
				UpdateFields (retValue.material_id, retValue.nama_material, retValue.location, retValue.stock, retValue.kategori);
			}
		} else {
			var modal = window.open("search_material/", null, "fullscreen=yes;", null);
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
		kategori.value		= kat;
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