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
								<th width='15%'><center>NO REQUEST</center></th>
								<th width='15%'><center>TGL INPUT</center></th>
								<th width='30%'><center>NOTE</center></th>
								<th width='15%'><center>TGL APPROVE</center></th>
								<th width='15%'><center>
									<?php echo anchor('admin/goods_requisition/post','<i class="fa fa-plus"></i> Input',"class='btn btn-primary btn-xs'");?>
								</center></th>
							</tr>
						</thead>
						
						<tbody>
							<?php
								$no=1;
								foreach ($record as $r){
									if($r->status_request == 0){
										$status_apps = "<div class='badge badge-danger tooltips' data-placement='top' data-original-title='Not Approve' title='Not Approve'><i class='fa fa-times'></i></div>";
									}else{
										$status_apps = "<div class='badge badge-success tooltips' data-placement='top' data-original-title='Approve' title='Approve'><i class='fa fa-check'></i></div>";
									}
									
									if($r->tgl_appr == "0000-00-00"){
										$tgl_appr = "-";
									}else{
										$tgl_appr = tgl_indo($r->tgl_appr);
									}
							?>
									<tr>
										<td align='center'><?php echo $status_apps;?></td>
										<td align='center'><?php echo $no;?></td>
										<td align='center'>#<?php echo $r->request_no;?></td>
										<td align='center'><?php echo tgl_indo($r->tgl_request);?></td>
										<td ><?php echo $r->note;?></td>
										<td align='center'><?php echo $tgl_appr;?></td>
										<td align='center'>
											<?php
												if($r->status_request == 0){
											?>
											<a href="goods_requisition/edit/<?php echo $r->request_no;?>" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit" title="Edit" ><i class='fa fa-edit'></i></a> | 
											
											<a href="goods_requisition/delete/<?php echo $r->request_no;?>" class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete" title="Delete" onclick="return confirm('Are you sure?')" ><i class='fa fa-trash-o'></i></a> | 
											<?php
												}
											?>
											<a class="btn btn-xs btn-success tooltips" data-placement="top" data-original-title="Display" title="Display"  target="popup" onclick="window.open('goods_requisition/report_display/<?php echo $r->request_no;?>','name','fullscreen=yes')"><i class='fa fa-eye'></i></a>
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