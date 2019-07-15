	<div class="col-md-12">
		<!-- start: DYNAMIC TABLE PANEL -->
	   
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-external-link-square"></i> List
				<div class="panel-tools">
					<a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-expand"></i></a>
				</div>
			</div>
			<div class="panel-body">
				<div class='table-responsive'>
					<table id="mytable" class="table table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th width='5%'><center>#</center></th>
								<th width='5%'><center>NO</center></th>
								<th width='13%'><center>TGL REQUEST</center></th>
								<th width='12%'><center>NO PR</center></th>
								<th width='20%'><center>STATUS PR</center></th>
								<th width='13%'><center>TGL APPR PO</center></th>
								<th width='12%'>
									<center>
										<?php echo anchor('admin/purchase_request/post','<i class="fa fa-plus" aria-hidden="true"></i> Input',"class='btn btn-primary btn-xs tooltips' data-placement='top' data-original-title='Input'");?>
									</center>
								</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
								$no=1;
								foreach ($record as $r){
									
									if($r->status_po_appr == 0){
										$status_apps = "<div class='badge badge-danger tooltips' data-placement='top' data-original-title='PO Not Approve' title='PO Not Approve'><i class='fa fa-times'></i></div>";
									}else{
										$status_apps = "<div class='badge badge-success tooltips' data-placement='top' data-original-title='PO Approve' title='PO Approve'><i class='fa fa-check'></i></div>";
									}
									
									if($r->tgl_po_appr == "0000-00-00"){
										$date_appr	= "-";
									}else{
										$date_appr	= tgl_indo($r->tgl_po_appr);
									}
									
									
									if($r->status_po_appr == "0"){
										$status	= "PENDING";
									}else if($r->status_po_appr == "1"){
										$status	= "APPROVE";
									}
									
									//$CI=&get_instance();
									//$CI->load->model('Mod_supplier');
									//$result= $CI->Mod_supplier->get_supplier_by_id($r->supplier_id)->row_array();        
							?>
									<tr>
										<td align='center'><?php echo $status_apps;?></td>
										<td align='center'><?php echo $no;?></td>
										<td align='center'><?php echo tgl_indo($r->tgl_pr);?></td>
										<td align='center'>#<?php echo $r->no_pr;?></td>
										<td align='center'><?php echo $status;?></td>
										<td align='center'><?php echo $date_appr;?></td>
										<td align='center'>
											<?php
												if($r->status_po_appr == 0){
											?>
											<a href="purchase_request/edit/<?php echo $r->no_pr;?>" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit" title="Edit" ><i class='fa fa-edit'></i></a> | 
											
											<a href="purchase_request/delete/<?php echo $r->no_pr;?>" class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete" title="Delete" onclick="return confirm('Are you sure?')" ><i class='fa fa-trash-o'></i></a> | 
											
											
											<?php
												}
											?>
											
											<a class="btn btn-xs btn-success tooltips" data-placement="top" data-original-title="Display" title="Display" target="popup" onclick="window.open('purchase_request/report_display/<?php echo $r->no_pr;?>','report_display','fullscreen=yes')"><i class='fa fa-eye'></i></a>
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
		<!-- end: DYNAMIC TABLE PANEL -->
	</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>

<script>
	$(document).ready(function() {
		$('#mytable').DataTable();
	} );
</script>