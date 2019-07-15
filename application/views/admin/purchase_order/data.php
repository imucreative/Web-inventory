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
								<th width='13%'><center>TGL INPUT</center></th>
								<th width='14%'><center>NO PO</center></th>
								<th width='20%'><center>SUPPLIER</center></th>
								<th width='13%'><center>TGL IN</center></th>
								<th width='10%'>
									<center>
										<?php echo anchor('admin/purchase_order/post','<i class="fa fa-plus" aria-hidden="true"></i> Input',"class='btn btn-primary btn-xs tooltips' data-placement='top' data-original-title='Input'");?>
									</center>
								</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
								$no=1;
								foreach ($record as $r){
									
									if($r->status_gi == 0){
										$status_apps = "<div class='badge badge-danger tooltips' data-placement='top' data-original-title='Not Goods In' title='Not Goods In'><i class='fa fa-times'></i></div>";
									}else{
										$status_apps = "<div class='badge badge-success tooltips' data-placement='top' data-original-title='Goods In' title='Goods In'><i class='fa fa-check'></i></div>";
									}
									
									if($r->tgl_gi == "0000-00-00"){
										$date_in	= "-";
									}else{
										$date_in	= tgl_indo($r->tgl_gi);
									}
									
									$CI=&get_instance();
									$CI->load->model('Mod_supplier');
									$result= $CI->Mod_supplier->get_supplier_by_id($r->supplier_id)->row_array();        
							?>
									<tr>
										<td align='center'><?php echo $status_apps;?></td>
										<td align='center'><?php echo $no;?></td>
										<td align='center'><?php echo tgl_indo($r->tgl_po);?></td>
										<td align='center'>#<?php echo $r->no_po;?></td>
										<td><?php echo $result['supplier_name'];?></td>
										<td align='center'><?php echo $date_in;?></td>
										<td align='center'>
											<?php
												if($r->status_gi == 0){
											?>
												<a href="purchase_order/edit/<?php echo $r->no_po;?>" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit" title="Edit" ><i class='fa fa-edit'></i></a> | 
												
												<a href="purchase_order/delete/<?php echo $r->no_po;?>" class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete" title="Delete" onclick="return confirm('Are you sure?')" ><i class='fa fa-trash-o'></i></a> | 
											<?php
												}
											?>
											
											<a class="btn btn-xs btn-success tooltips" data-placement="top" data-original-title="Display" title="Display" target="popup" onclick="window.open('purchase_order/report_display/<?php echo $r->no_po;?>','report_display','fullscreen=yes')"><i class='fa fa-eye'></i></a>
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