	<!-- end: SPANEL CONFIGURATION MODAL FORM -->
	<div class="container">
		<!-- start: PAGE HEADER -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-header">
					<h1>Search <small>Purchase Request Send User</small></h1>
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
										<th width='15%'><center>NO PR</center></th>
										<th width='25%'><center>TGL PR</center></th>
										<th width='30%'><center>USER</center></th>
										<th width='25%'><center>#</center></th>
									</tr>
								</thead>
								
								<tbody>
									<?php
										$no=1;
										foreach ($record->result() as $r){
									?>
											<tr onload="Init('<?php echo $no;?>');">
												<input type="hidden" id="<?php echo 'no_pr'.$no;?>" value="<?php echo $r->no_pr;?>"/>
												<input type="hidden" id="<?php echo 'reject'.$no;?>" value=" "/>
												
												<td align='center'><?php echo $no;?></td>
												<td align='center'>#<?php echo $r->no_pr;?></td>
												<td align='center'><?php echo tgl_indo($r->tgl_pr);?></td>
												<td align='center'><?php echo $r->user_pr;?></td>
												<td align='center'>
													<a href="#" class="btn btn-xs btn-success "><span onclick="OnOK('<?php echo $no;?>')"><i class='fa fa-paperclip'></i> Attach</span></a>
												</td>
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
		var no_pr		= document.getElementById("no_pr"+number);
		no_pr.value	= sharedObject.no_pr;
	}

	function OnOK(number) {
		var no_pr		= document.getElementById ("no_pr"+number);

		if (window.showModalDialog) {
			var sharedObject = {};
			sharedObject.no_pr	= no_pr.value;
			window.returnValue = sharedObject;
		} else {
			// if not modal, we cannot use the returnValue property, we need to update the opener window
			window.opener.UpdateFieldsPr(no_pr.value);
		}
		
		window.close ();
	}
	
	
</script>