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
			
				<table class="table">
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="tgl_request">TGL REQUEST :</label>
						</td>
						<td>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="tgl_request" placeholder="* Request Date" name="tgl_request" value="<?php echo tgl_indo($request['tgl_request']);?>" required readonly />
							</div>
						</td>
					</tr>
					
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="note">CATATAN :</label>
						</td>
						<td>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="note" placeholder="* Note" name="note" value="<?php echo $request['note'];?>" required readonly />
							</div>
						</td>
					</tr>
					
				</table>
			
		</div>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-body">
			<div class='table-responsive'>
				<?php
					echo form_open('admin/goods_requisition_appr/approve');
				?>
					<input type="hidden" name="request_no" value="<?php echo $request['request_no'];?>" />
					<table class="table table-bordered table-hover table-full-width" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th width='5%'><center>#</center></th>
								<th width='50%'><center>NAMA MATERIAL</center></th>
								<th width='5%'><center>QTY</center></th>
								<th width='10%'><center>S.LOC</center></th>
								<th width='30%'><center>KATEGORI</center></th>
								<!--<th width='25%'><center>AMOUNT</center></th>-->
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
										</tr>
							<?php
									$no++;
									$total=$amount+$total;
								}
							?>
						</tbody>
						
						<tfoot>
							<tr>
								<td colspan='7' align="right">
									<div class="col-sm-12">
										<?php
											if($request['status_request'] == 0){
										?>
											<button type="submit" name="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure Approve?')"><i class='fa fa-check'></i> APPROVE</button>
										<?php
											}
										?>
										<?php echo anchor('admin/goods_requisition_appr','<i class="fa fa-arrow-left"></i> BACK',"class='btn btn-info btn-sm'");?>
									</div>
								</td>
							</tr>
						</tfoot>
						
					</table>
				</form>
			</div>
		</div>
	</div>
	<!-- end: TEXT FIELDS PANEL -->
	
</div>