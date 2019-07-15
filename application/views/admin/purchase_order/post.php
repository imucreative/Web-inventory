<div class="col-sm-12">
	<?php
		echo form_open('admin/purchase_order/post');
	?>
		<!-- start: TEXT FIELDS PANEL -->
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
								<label class="col-sm-12 control-label" for="supplier_name"><i class='fa fa-paperclip'></i> DOC REF / NO PR :</label>
							</td>
							<td>
								<div class="col-sm-12">
									<div class="input-group">
										<input type="text" class="form-control readonly" id="no_pr" placeholder="*" name="no_pr" required autocomplete="off" />
										<span class="input-group-btn">
											<a class="btn btn-primary" target="popup" onclick="search_pr()"><i class='fa fa-search'></i> Search PR</a>
										</span>
										
									</div>
									
								</div>
							</td>
						</tr>
						
						<tr>
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="supplier_name">NAMA SUPPLIER :</label>
							</td>
							<td>
								<div class="col-sm-2">
									<input type="text" class="form-control readonly" id="supplier_id" placeholder="*" name="supplier_id" required autocomplete="off" />
								</div>
							
								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" class="form-control readonly" id="supplier_name" placeholder="*" name="supplier_name" value="<?php echo $supplier_name;?>" required />
										<span class="input-group-btn">
											<a class="btn btn-primary" target="popup" onclick="search_supplier()"><i class='fa fa-search'></i> Search</a>
										</span>
										
									</div>
									
								</div>
							</td>
						</tr>
						
						<tr>
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="address">ALAMAT :</label>
							</td>
							<td>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="address" placeholder="*" name="address" value="<?php echo $address;?>" required readonly />
								</div>
							</td>
						</tr>
						
						<tr>
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="phone">TELEPHONE :</label>
							</td>
							<td>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="phone" placeholder="*" name="phone" value="<?php echo $phone;?>" required readonly />
								</div>
							</td>
						</tr>
						
						<tr>
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="email">EMAIL :</label>
							</td>
							<td>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="email" placeholder="*" name="email" value="<?php echo $email;?>" required readonly />
								</div>
							</td>
						</tr>
						
						<tr>
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="note">CATATAN :</label>
							</td>
							<td>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="note" placeholder="*" name="note" value="<?php echo $note;?>" note readonly />
								</div>
							</td>
						</tr>
						
						
					
				</table>
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-body">
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
							<div class="col-sm-8">
								<input type="text" class="form-control readonly" id="location" placeholder="*" name="location" autocomplete="off" />
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control readonly" id="kategori" placeholder="*" name="kategori" required autocomplete="off" />
							</div>
						</td>
					</tr>
					
					<tr >
						<td colspan='2' align='right' >
							<div class="col-sm-12">
								<button type="submit" name="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure?')"><i class='fa fa-save'></i> SAVE</button>
								<?php echo anchor('admin/purchase_order','<i class="fa fa-arrow-left"></i> BACK',"class='btn btn-info btn-sm'");?>
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
			var retValue = showModalDialog("search_material/", sharedObject, "fullscreen=yes;");
			if (retValue) {
				UpdateFields (retValue.material_id, retValue.nama_material, retValue.location, retValue.stock, retValue.kategori);
			}
		} else {
			var modal = window.open("search_material/", null, "fullscreen=yes;", null);
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
			var retValue = showModalDialog("search_supplier/", sharedObject, "fullscreen=yes;");
			if (retValue) {
				UpdateFieldsSupplier(retValue.supplier_id, retValue.supplier_name, retValue.address, retValue.phone, retValue.email, retValue.note);
			}
		} else {
			var modal = window.open("search_supplier/", null, "fullscreen=yes;", null);
			modal.dialogArguments = sharedObject;
		}
	}
	
	function search_pr() {
		var no_pr			= document.getElementById("no_pr");
		var sharedObject	= {};
		sharedObject.no_pr	= no_pr.value;
		
		if (window.showModalDialog){
			var retValue = showModalDialog("search_pr/", sharedObject, "fullscreen=yes;");
			if (retValue) {
				UpdateFieldsPr(retValue.no_pr);
			}
		} else {
			var modal = window.open("search_pr/", null, "fullscreen=yes;", null);
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
	
	function UpdateFieldsPr(id) {
		var no_pr		= document.getElementById("no_pr");
		no_pr.value		= id;
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