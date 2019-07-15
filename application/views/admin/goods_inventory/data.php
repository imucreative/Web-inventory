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
								<th width='5%'><center>NO</center></th>
								<th width='15%'><center>TGL INPUT</center></th>
								<th width='15%'><center>NO PO</center></th>
								<th width='30%'><center>SUPPLIER</center></th>
								<th width='15%'>
									<center>
										<?php echo anchor('admin/goods_inventory/post','<i class="fa fa-plus" aria-hidden="true"></i> Input',"class='btn btn-primary btn-xs tooltips' data-placement='top' data-original-title='Input'");?>
									</center>
								</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
								$no=1;
								foreach ($record as $r){
									
									$CI=&get_instance();
									$CI->load->model('Mod_supplier');
									$result= $CI->Mod_supplier->get_supplier_by_id($r->supplier_id)->row_array();
							?>
									<tr>
										<td align='center'><?php echo $no;?></td>
										<td align='center'><?php echo tgl_indo($r->tgl_po);?></td>
										<td align='center'>#<?php echo $r->no_po;?></td>
										<td><?php echo $result['supplier_name'];?></td>
										<td align='center'>
											<?php
											/*
											<a href="admin/goods_inventory/unapprove/<?php echo $r->no_po;?>" class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Unapprove" title="Unapprove"><i class='fa fa-edit'></i></a> - 
											*/
											?>
											
											<a class="btn btn-xs btn-success tooltips" data-placement="top" data-original-title="Display" title="Display"  target="popup" onclick="window.open('goods_inventory/report_display/<?php echo $r->no_po;?>','report_display','fullscreen=yes')"><i class='fa fa-eye'></i> Display</a>
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