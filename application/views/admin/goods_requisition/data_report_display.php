<div class="col-md-12">
	<!-- start: PAGE CONTENT -->
	<div class="invoice">
		<div class="row invoice-logo">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<img width="100%" src="<?php echo base_url()."uploads/".get_data_toko('logo_full');?>">
				<center> <?php echo get_data_toko('alamat');?> </center>
				<center> Phone. <?php echo get_data_toko('telp');?> | Fax. <?php echo get_data_toko('fax');?></center>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-sm-6">
				<h4>Report Display Goods Requisition</h4>
				<div class="well">
					<!--<address>-->
					<?php
						if($status == 0){
							$status_req	= "<div class='badge badge-danger tooltips' data-placement='top' data-original-title='Not Approve' title='Not Approve'><i class='fa fa-times'></i> Not Approve</div>";
							$status_approve	= "Not Approve";
						}else{
							$status_req = "<div class='badge badge-success tooltips' data-placement='top' data-original-title='Approve' title='Approve'><i class='fa fa-check'></i> Approve</div>";
							$status_approve	= "Approve";
						}
					?>
					<strong>User Request : <?php echo $user;?></strong>
					<br/>
					Status Request : <?php echo $status_req;?>
					<br/>
					Request Date From : <?php echo tgl_indo($date_from);?>
					<br/>
					Request Date To : <?php echo tgl_indo($date_to);?>
					<!--</address>-->
				</div>
			</div>
			<!--
			<div class="col-sm-4 pull-right">
				<h4>Payment Details:</h4>
				<ul class="list-unstyled invoice-details">
					<li>
						<strong>V.A.T Reg #:</strong> 233243444
					</li>
					<li>
						<strong>Account Name:</strong> Company Ltd
					</li>
					<li>
						<strong>SWIFT code:</strong> 1233F4343ABCDEW
					</li>
					<li>
						<strong>DATE:</strong> 01/01/2014
					</li>
					<li>
						<strong>DUE:</strong> 11/02/2014
					</li>
				</ul>
			</div>
			-->
		</div>
		<hr/>
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-full-width table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							
							<th width='5%'><center>NO</center></th>
							<th width='25%'><center>MATERIAL NAME</center></th>
							<th width='10%'><center>LOCATION</center></th>
							<th width='10%'><center>QTY</center></th>
							<th width='15%'><center>DATE REQ</center></th>
							<th width='15%'><center>CATEGORY</center></th>
							<!--<th width='15%'><center>AMOUNT</center></th>-->
							
						</tr>
					</thead>
					
					<tbody>
						<?php
							$no=1;
							$total		= "";
							foreach ($result_request_detail as $r){
								
								if($r->tgl_appr == "0000-00-00"){
									$tgl_appr = "-";
								}else{
									$tgl_appr = tgl_indo($r->tgl_appr);
								}
						?>
								<tr>
									
									<td align='center'><?php echo $no;?></td>
									<td align='right'><b>NO. REQ : </b></td>
									<td>#<?php echo $r->request_no;?></td>
									<td></td>
									<td align='center'><?php echo tgl_indo($r->tgl_request);?></td>
									<td></td>
									<!--<td></td>-->
								</tr>
								
								<?php
									$no_material	= 1;
									
									
									$CI	= &get_instance();
									$CI->load->model('Mod_goods_requisition');
									$CI->load->model('Mod_material');
									$CI->load->model('Mod_kategori');
									$result		= $CI->Mod_goods_requisition->get_request_detail_by_no_request($r->request_no)->result();
									$sub_total	= "";
									
									foreach($result as $r){
										$result_mat	= $CI->Mod_material->get_material_by_material_id($r->material_id)->row_array();
										$result_kategori	= $CI->Mod_kategori->get_kategori_by_kategori_id($result_mat['kategori_id'])->row_array();
										$amount		= $r->qty * $r->harga;
										
								?>
								
									<tr bgcolor="#FDFBC2">
										<td align="right"><?php echo $no_material;?></td>
										<td><?php echo $result_mat['nama_material'];?></td>
										<td align="center"><?php echo $r->location;?></td>
										<td align="center"><?php echo $r->qty;?></td>
										<td></td>
										<td align="center"><?php echo $result_kategori['nama_kategori'];?></td>
									</tr>
									
								<?php 
										$no_material++;
										$sub_total	= $amount+$sub_total;
										
									}
								?>
								
								<?php
								/*
								<tr bgcolor="DFDDDD">
									<td colspan='6' align='right'><b>SUBTOTAL :</b></td>
									<td align='right'><b>Rp. <?php echo number_format($sub_total);?></b></td>
								</tr>
								*/
								?>
								
						<?php
								$no++;
								$total		= $sub_total+$total;
							}
							
						?>
								<?php
								/*
								<tr>
									<td colspan='6' align='right'><b>GRAND TOTAL :</b></td>
									<td align='right'><b>Rp. <?php echo number_format($total);?></b></td>
								</tr>
								*/
								?>
					</tbody>
					
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 invoice-block">
				<a onclick="javascript:window.print();" class="btn btn-sm btn-primary hidden-print">
					<i class="fa fa-print"></i> PRINT
				</a>
				<?php echo anchor('admin/goods_requisition_report','<i class="fa fa-arrow-left"></i> BACK',"class='btn btn-info btn-sm hidden-print'");?>
				<!--<a onclick="javascript:window.print();" class="btn btn-sm btn-primary hidden-print">
					<i class="fa fa-print"></i> PRINT
				</a>
				<a class="btn btn-lg btn-green hidden-print">
					Submit Your Invoice <i class="fa fa-check"></i>
				</a>-->
			</div>
		</div>
		
	</div>
	<!-- end: PAGE CONTENT-->
</div>