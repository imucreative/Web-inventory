	<!-- end: SPANEL CONFIGURATION MODAL FORM -->
	<div class="container">
		<!-- start: PAGE HEADER -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-header">
					<h1>Search <small>Material</small></h1>
				</div>
				<!-- end: PAGE TITLE & BREADCRUMB -->
			</div>
		</div>
		<!-- end: PAGE HEADER -->
		
		<!-- start: PAGE CONTENT-->
		<form name="form_search_material">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class='table-responsive'>
							<table id="mytable" class="table table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th width='10%'><center>NO.</center></th>
										<th width='50%'><center>NAMA MATERIAL</center></th>
										<th width='10%'><center>QTY</center></th>
										<th width='10%'><center>S.LOC</center></th>
										<th width='20%'><center>KATEGORI</center></th>
									</tr>
								</thead>
								
								<tbody>
									<?php
										$no=1;
										foreach ($record->result() as $r){
											$count	= $record->num_rows();
											$CI		= &get_instance();
											$CI->load->model('Mod_kategori');
											$result	= $CI->Mod_kategori->get_kategori_by_kategori_id($r->kategori_id)->row_array();
									?>
											<tr onload="Init('<?php echo $no;?>');">
												<input type="hidden" id="<?php echo 'material_id'.$no;?>" value="<?php echo $r->material_id;?>"/>
												<input type="hidden" id="<?php echo 'nama_material'.$no;?>" value="<?php echo $r->nama_material;?>"/>
												<input type="hidden" id="<?php echo 'harga'.$no;?>" value="<?php echo number_format($r->harga);?>"/>
												<input type="hidden" id="<?php echo 'harga_tanpa_format_number'.$no;?>" value="<?php echo $r->harga;?>"/>
												<input type="hidden" id="<?php echo 'location'.$no;?>" value="<?php echo $r->location;?>"/>
												<input type="hidden" id="<?php echo 'stock'.$no;?>" value="<?php echo $r->qty;?>"/>
												<input type="hidden" id="<?php echo 'kategori'.$no;?>" value="<?php echo $result['nama_kategori'];?>"/>
												
												<td align='center'><?php echo $no;?></td>
												<td><a href="#"><span onclick="OnOK('<?php echo $no;?>')"><?php echo $r->nama_material;?></span></a></td>
												<td align='center'><?php echo $r->qty;?></td>
												<td align='center'><?php echo $r->location;?></td>
												<td align='center'><?php echo $result['nama_kategori'];?></td>
											</tr>
									<?php
											$no++;
										}
									?>
								</tbody>
								
								
								
							</table>
						
					</div>
				</div>
			</div>
		</form>
		<!-- end: PAGE CONTENT-->
	</div>
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>

<script>
	$(document).ready(function() {
		$('#mytable').DataTable();
	});
	
	
	function Init(number) {
		var sharedObject = window.dialogArguments;

		var material_id		= document.getElementById("material_id"+number);
		var nama_material	= document.getElementById("nama_material"+number);
		//var harga			= document.getElementById("harga"+number);
		//var harga_tanpa_format_number			= document.getElementById("harga_tanpa_format_number"+number);
		var location		= document.getElementById("location"+number);
		var stock			= document.getElementById("stock"+number);
		var kategori		= document.getElementById("kategori"+number);
		
		material_id.value	= sharedObject.material_id;
		nama_material.value	= sharedObject.nama_material;
		//harga.value			= sharedObject.harga;
		//harga_tanpa_format_number.value			= sharedObject.harga_tanpa_format_number;
		location.value		= sharedObject.location;
		stock.value			= sharedObject.stock;
		kategori.value		= sharedObject.kategori;
	}

	function OnOK(number) {
		var material_id		= document.getElementById ("material_id"+number);
		var nama_material	= document.getElementById ("nama_material"+number);
		//var harga			= document.getElementById ("harga"+number);
		//var harga_tanpa_format_number			= document.getElementById ("harga_tanpa_format_number"+number);
		var location		= document.getElementById ("location"+number);
		var stock			= document.getElementById ("stock"+number);
		var kategori		= document.getElementById ("kategori"+number);

		if (window.showModalDialog) {
			var sharedObject = {};
			sharedObject.material_id	= material_id.value;
			sharedObject.nama_material	= nama_material.value;
			//sharedObject.harga			= harga.value;
			//sharedObject.harga_tanpa_format_number			= harga_tanpa_format_number.value;
			sharedObject.location		= location.value;
			sharedObject.stock			= stock.value;
			sharedObject.kategori		= kategori.value;

			window.returnValue = sharedObject;
		} else {
				// if not modal, we cannot use the returnValue property, we need to update the opener window
			window.opener.UpdateFields(material_id.value, nama_material.value, location.value, stock.value, kategori.value);
		}
		
		if(stock.value != 0){
			window.close ();
		}
	}
</script>