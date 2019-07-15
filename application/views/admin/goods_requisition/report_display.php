	<!-- end: SPANEL CONFIGURATION MODAL FORM -->
	<div class="container">
		<!-- start: PAGE HEADER -->
		<div class="row">
			<div class="col-sm-11">
				<div class="page-header">
					<h1>Report <small>Goods Requisition</small></h1>
				</div>
				<!-- end: PAGE TITLE & BREADCRUMB -->
			</div>
			<div class="col-sm-1">
				<div class="page-header">
					<h1><a onclick="javascript:window.print();" class="btn btn-sm btn-teal hidden-print">
						<i class="fa fa-print"></i> Print
					</a></h1>
				</div>
			</div>
		</div>
		<!-- end: PAGE HEADER -->
		
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
					<h4>Goods Requisition</h4>
					<div class="well">
						<!--<address>-->
							<strong>No Request : #<?php echo $no_request;?></strong>
							<br/>
							Tgl Request : <?php echo $tgl_request;?>
							<br/>
							Catatan Request : <?php echo $note;?>
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
					<table id="mytable" class="table table-striped table-hover">
						<thead>
							<tr>
								<th width='5%'><center>#</center></th>
								<th width='50%'><center>NAMA MATERIAL</center></th>
								<th width='5%'><center>QTY</center></th>
								<th width='5%'><center>S.LOC</center></th>
								<th width='30%'><center>KATEGORI</center></th>
								<!--<th width='25%'><center>AMOUNT</center></th>-->
							</tr>
						</thead>
						
						<tbody>
							<?php
								$no=1;
								$total="";
								foreach ($result_request_detail->result() as $r){
									
									$CI=&get_instance();
									$CI->load->model('Mod_material');
									$CI->load->model('Mod_kategori');
									$result_material	= $CI->Mod_material->get_material_by_material_id($r->material_id)->row_array();        
									$result_kategori	= $CI->Mod_kategori->get_kategori_by_kategori_id($result_material['kategori_id'])->row_array();
									
									$amount = $r->qty*$r->harga;
									
									echo "
									<input type='hidden' name='material_id".$no."' value='$r->material_id'/>
									<input type='hidden' name='qty".$no."' value='$r->qty'/>
									<tr>
										<td align='center'>".$no."</td>
										<td>".$result_material['nama_material']."</td>
										<td align='center'>".$r->qty."</td>
										<td align='center'>".$result_material['location']."</td>
										<td align='center'>".$result_kategori['nama_kategori']."</td>
									</tr>";
									$no++;
									$total=$amount+$total;
								}
							?>
						</tbody>
						
						
					</table>
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-sm-3">
					<h4 align='center'>User Request</h4>
					<div class="well">
						<br/>
						<br/>
						<br/>
					</div>
				</div>
				<div class="col-sm-3">
					<h4 align='center'>Approve</h4>
					<div class="well">
						<br/>
						<br/>
						<br/>
					</div>
				</div>
				<div class="col-sm-3">
					<h4 align='center'>Approve Warehouse</h4>
					<div class="well">
						<br/>
						<br/>
						<br/>
					</div>
				</div>
				
				<!--<div class="col-sm-3">
					<h4 align='center'>-</h4>
					<div class="well">
						<br/>
						
						<a onclick="javascript:window.print();" class="btn btn-lg btn-teal hidden-print">
							Print <i class="fa fa-print"></i>
						</a>
						<a class="btn btn-lg btn-green hidden-print">
							Submit Your Invoice <i class="fa fa-check"></i>
						</a>
					</div>
				</div>-->
				
					
			</div>
			
			
			
			
			
		</div>
		<!-- end: PAGE CONTENT-->
	</div>