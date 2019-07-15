<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<i class="clip-grid"></i>Form Edit
		</div>
		<div class="panel-body">
			<div class="tabbable panel-tabs">
				<ul class="nav nav-tabs">
				
					<li class="active"><a data-toggle="tab" href="#panel1"><i class="clip-wrench"></i> Material</a></li>
					
				</ul>
				<div class="tab-content">
				
					<div id="panel1" class="tab-pane active">
						<table class="table">
							<?php
								echo form_open_multipart('admin/material/edit');
								echo form_hidden('id', $row['material_id']);
							?>
								<tr>
									<td align='right' width='20%'>
										<label class="col-sm-12 control-label" for="name">NAMA MATERIAL :</label>
									</td>
									<td>
										<div class="col-sm-12">
											<input value="<?php echo $row['nama_material'];?>" type="text" class="form-control" id="name" placeholder="* Material Name" name="nama_material" required />
										</div>
									</td>
								</tr>
								
								<tr>
									<td align='right' width='20%'>
										<label class="col-sm-12 control-label" for="qty">QTY :</label>
									</td>
									<td>
										<div class="col-sm-12">
											
												<input value="<?php echo $row['qty'];?>" type="text" class="form-control" id="qty" placeholder="* Qty" name="qty" required readonly />
											
										</div>
									</td>
								</tr>
								
								<tr>
									<td align='right' width='20%'>
										<label class="col-sm-12 control-label" for="location">LOKASI MATERIAL :</label>
									</td>
									<td>
										<div class="col-sm-12">
											
												<input value="<?php echo $row['location'];?>" type="text" class="form-control" id="location" placeholder="* Location" name="location" required />
											
										</div>
									</td>
								</tr>
								
								<tr>
									<td align='right' width='20%'>
										<label class="col-sm-12 control-label" for="category">KATEGORI :</label>
									</td>
									<td>
										<div class="col-sm-12">
											<select name="kategori" class="form-control search-select" id="category" placeholder="* Category" required>
												<?php
													foreach ($category as $k){
														echo "<option value='$k->kategori_id' ";
														echo $k->kategori_id==$row['kategori_id']?'selected':'';
														echo ">$k->nama_kategori</option>";
													}
												?>
											</select>
										</div>
									</td>
								</tr>
								
								<tr>
									<td align='right' width='20%'>
										<label class="col-sm-12 control-label" for="quality">KUALITAS :</label>
									</td>
									<td>
										<div class="col-sm-12">
											<input value="<?php echo $row['kualitas'];?>" type="text" class="form-control" id="quality" placeholder="* Material Quality" name="kualitas" required />
										</div>
									</td>
								</tr>
								
								<tr>
									<td align='right' width='20%'>
										<label class="col-sm-12 control-label" for="description">DESKRIPSI :</label>
									</td>
									<td>
										<div class="col-sm-12">
											<textarea class="ckeditor form-control" name="keterangan" id="description" placeholder="* Material Description" required><?php echo $row['keterangan'];?></textarea>
										</div>
									</td>
								</tr>
								
								<tr>
									<td align='right' width='20%'>
										<label class="col-sm-12 control-label" for="image">GAMBAR MATERIAL :</label>
									</td>
									<td>
										<div class="col-sm-12">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="input-group">
													<div class="form-control uneditable-input">
														<i class="fa fa-file fileupload-exists"></i>
														<span class="fileupload-preview"></span>
													</div>
													<div class="input-group-btn">
														<div class="btn btn-light-grey btn-file">
															<span class="fileupload-new"><i class="fa fa-folder-open-o"></i> Select file</span>
															<span class="fileupload-exists"><i class="fa fa-folder-open-o"></i> Change</span>
															<input type="file" id="image" name="userfile" class="file-input"/>
														</div>
														<a href="#" class="btn btn-light-grey fileupload-exists" data-dismiss="fileupload">
															<i class="fa fa-times"></i> Remove
														</a>
													</div>
												</div>
											</div>
											<?php
												if(empty($row['image'])){
													echo "<img title='No Image Available' width='200' src='".base_url()."/uploads/noimage.jpg'>";
												}else{
													echo "<img title='".$row['nama_material']."' width='200' src='".base_url()."/uploads/material/".$row['image']."'>";
												}
											?>
										</div>
									</td>
								</tr>
								
								<tr>
									<td align='right' width='20%'></td>
									<td>
										<div class="col-sm-12">
											<button type="submit" name="submit" class="btn btn-success btn-sm"><i class='fa fa-save'></i> SAVE</button> | 
											<?php
												echo anchor('admin/material', "<i class='fa fa-arrow-left'></i> BACK",array('class'=>'btn btn-info btn-sm'));
											?>
										</div>
									</td>
								</tr>
							</form>
						</table>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>

<script>
	$(document).ready(function(){
		$('#mytable, #mytable2').DataTable();
	});
</script>