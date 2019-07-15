	<!-- end: SPANEL CONFIGURATION MODAL FORM -->
	<div class="container">
		<!-- start: PAGE HEADER -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-header">
					<h1>Report <small>Purchase Order</small></h1>
				</div>
				<!-- end: PAGE TITLE & BREADCRUMB -->
			</div>
		</div>
		<!-- end: PAGE HEADER -->
		
		<!-- start: PAGE CONTENT -->
		<div class="invoice">
			<div class="row invoice-logo">
				<div class="col-sm-6">
					<img width="100%" src="<?php echo base_url()."uploads/".get_data_toko('logo_full');?>">
				</div>
				<div class="col-sm-6">
					<p>
						#<?php echo $no_po;?> / <?php echo $tgl_po;?> <span> <?php echo get_data_toko('nama_toko');?> </span>
					</p>
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-sm-6">
					<h4>Supplier</h4>
					<div class="well">
						<address>
						<strong><?php echo $supplier_name;?></strong>
							<br>
							Address : <?php echo $address;?>
							<br>
							Note : <?php echo $note;?>
							<br>
							<abbr title="Phone">Phone:</abbr> <?php echo $phone;?>
						</address>
						<address>
							<strong>E-mail</strong>
							<br>
							<a href="mailto:<?php echo $email;?>">
								<?php echo $email;?>
							</a>
						</address>
					</div>
				</div>
				
				<div class="col-sm-6 pull-right">
					<h4>Report Purchase Order</h4>
					<ul class="list-unstyled invoice-details">
						<li>
							<strong>PO No : </strong> #<?php echo $no_po;?>
						</li>
						<li>
							<strong>PO Date : </strong> <?php echo $tgl_po;?>
						</li>
					</ul>
				</div>
				
			</div>
			<hr/>
			<div class="row">
				<div class="col-sm-12">
					<table id="mytable" class="table table-striped table-hover">
						<thead>
							<tr>
								<th width='5%'><center>#</center></th>
								<th width='40%'><center>MATERIAL NAME</center></th>
								<th width='15%'><center>QTY</center></th>
								<th width='15%'><center>S.LOC</center></th>
								<th width='25%'><center>CATEGORY</center></th>
								<!--<th width='20%'><center>PRICE</center></th>
								<th width='25%'><center>AMOUNT</center></th>-->
							</tr>
						</thead>
						
						<tbody>
							<?php
								$no=1;
								$total="";
								foreach ($result_po_detail->result() as $r){
									
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
										/*
										<td align='right'>Rp. ".number_format($r->harga)."</td>
										<td align='right'>Rp. ".number_format($amount)."</td>
										*/
									$no++;
									$total=$amount+$total;
								}
							?>
						</tbody>
						
						
						
					</table>
				</div>
			</div>
			
		</div>
		<!-- end: PAGE CONTENT-->
	</div>