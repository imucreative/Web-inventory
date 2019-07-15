<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>Form Input
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-expand" href="#"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="panel-body">
			<table class="table">
				<?php
					echo form_open('admin/goods_inventory/search_po');
					echo $count;
				?>
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="search">CARI PO :</label>
						</td>
						<td>
							<div class="col-sm-12">
								<div class="input-group">
									<input type="text" class="form-control" id="search" placeholder="*" name="no_po" value="<?php echo $no_po;?>" required />
									<span class="input-group-btn">
										<button type="submit" class="btn btn-primary">
											<i class="fa fa-search"></i> Search
										</button>
									</span>
								</div>
							</div>
						</td>
					</tr>
				</form>
			</table>
		</div>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-body">
			<table class="table">
				
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="supplier_name">NAMA SUPPLIER :</label>
						</td>
						<td>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="supplier_name" placeholder="*" name="supplier_name" value="<?php echo $supplier_name;?>" required readonly />
							</div>
						</td>
					</tr>
					
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="address">ALAMAT :</label>
						</td>
						<td>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="address" placeholder="*" name="address" value="<?php echo $address;?>" required readonly />
							</div>
						</td>
					</tr>
					
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="phone">TELEPHONE :</label>
						</td>
						<td>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="phone" placeholder="*" name="phone" value="<?php echo $phone;?>" required readonly />
							</div>
						</td>
					</tr>
					
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="email">EMAIL :</label>
						</td>
						<td>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="email" placeholder="*" name="email" value="<?php echo $email;?>" required readonly />
							</div>
						</td>
					</tr>
					
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="note">CATATAN :</label>
						</td>
						<td>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="note" placeholder="*" name="note" value="<?php echo $note;?>" note readonly />
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
					echo form_open('admin/goods_inventory/post');
				?>
					<table class="table table-bordered table-hover table-full-width" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th width='5%'><center>#</center></th>
								<th width='50%'><center>NAMA MATERIAL</center></th>
								<th width='10%'><center>QTY</center></th>
								<th width='15%'><center>S.LOC</center></th>
								<th width='20%'><center>KATEGORI</center></th>
								<!--<th width='25%'><center>AMOUNT</center></th>-->
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
									$amount				= $r->qty*$r->harga;
									
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
										//<td align='right'>Rp. ".number_format($r->harga)."</td>
										//<td align='right'>Rp. ".number_format($amount)."</td>
									$no++;
									$total=$amount+$total;
								}
							?>
						</tbody>
						
						<tfoot>
							<?php /*<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td align="center"><b>TOTAL</b></td>
								<td align="right"><b>Rp. <?php echo number_format($total);?></b></td>
							</tr>
							*/?>
							<tr>
								<td colspan='5' align="right">
									<input type="hidden" class="form-control" name="no_po" value="<?php echo $no_po;?>"/>
									<?php
										if(($supplier_name != "")&&($no_po != "")){
									?>
										<button type="submit" name="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure?')"><i class='fa fa-save'></i> SAVE</button>
									<?php
										}
									?>
									<a href="../../admin/goods_inventory" class="btn btn-info btn-sm"><i class='fa fa-arrow-left'></i> BACK</a>
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