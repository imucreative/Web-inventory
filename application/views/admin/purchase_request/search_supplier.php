	<!-- end: SPANEL CONFIGURATION MODAL FORM -->
	<div class="container">
		<!-- start: PAGE HEADER -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-header">
					<h1>Search <small>Supplier</small></h1>
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
										<th width='5%'><center>NO.</center></th>
										<th width='25%'><center>NAMA SUPPLIER</center></th>
										<th width='20%'><center>ADDRESS</center></th>
										<th width='15%'><center>PHONE</center></th>
										<th width='15%'><center>EMAIL</center></th>
										<th width='20%'><center>NOTE</center></th>
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
												<input type="hidden" id="<?php echo 'supplier_id'.$no;?>" value="<?php echo $r->supplier_id;?>"/>
												<input type="hidden" id="<?php echo 'supplier_name'.$no;?>" value="<?php echo $r->supplier_name;?>"/>
												<input type="hidden" id="<?php echo 'address'.$no;?>" value="<?php echo $r->address;?>"/>
												<input type="hidden" id="<?php echo 'phone'.$no;?>" value="<?php echo $r->phone;?>"/>
												<input type="hidden" id="<?php echo 'email'.$no;?>" value="<?php echo $r->email;?>"/>
												<input type="hidden" id="<?php echo 'note'.$no;?>" value="<?php echo $r->note;?>"/>
												
												<td align='center'><?php echo $no;?></td>
												<td><a href="#"><span onclick="OnOK('<?php echo $no;?>')"><?php echo $r->supplier_name;?></span></a></td>
												<td align='center'><?php echo $r->address;?></td>
												<td align='center'><?php echo $r->phone;?></td>
												<td align='center'><?php echo $r->email;?></td>
												<td align='center'><?php echo $r->note;?></td>
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

		var supplier_id		= document.getElementById("supplier_id"+number);
		var supplier_name	= document.getElementById("supplier_name"+number);
		var address			= document.getElementById("address"+number);
		var phone			= document.getElementById("phone"+number);
		var email			= document.getElementById("email"+number);
		var note			= document.getElementById("note"+number);
		
		supplier_id.value	= sharedObject.supplier_id;
		supplier_name.value	= sharedObject.supplier_name;
		address.value		= sharedObject.address;
		phone.value			= sharedObject.phone;
		email.value			= sharedObject.email;
		note.value			= sharedObject.note;
	}

	function OnOK(number) {
		var supplier_id		= document.getElementById ("supplier_id"+number);
		var supplier_name	= document.getElementById ("supplier_name"+number);
		var address			= document.getElementById ("address"+number);
		var phone			= document.getElementById ("phone"+number);
		var email			= document.getElementById ("email"+number);
		var note			= document.getElementById ("note"+number);

		if (window.showModalDialog) {
			var sharedObject = {};
			sharedObject.supplier_id	= supplier_id.value;
			sharedObject.supplier_name	= supplier_name.value;
			sharedObject.address		= address.value;
			sharedObject.phone			= phone.value;
			sharedObject.email			= email.value;
			sharedObject.note			= note.value;

			window.returnValue = sharedObject;
		} else {
				// if not modal, we cannot use the returnValue property, we need to update the opener window
			window.opener.UpdateFieldsSupplier(supplier_id.value, supplier_name.value, address.value, phone.value, email.value, note.value);
		}
		
		window.close ();
	}
</script>