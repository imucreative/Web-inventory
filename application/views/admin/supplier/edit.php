<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>Form Edit
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-expand" href="#"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="panel-body">
			<table class="table">
				<?php
					echo form_open_multipart('admin/supplier/edit');
					echo form_hidden('supplier_id', $row['supplier_id']);
				?>
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="name">SUPPLIER NAME :</label>
						</td>
						<td>
							<div class="col-sm-12">
								<input type="text" value="<?php echo $row['supplier_name']?>" class="form-control" id="name" placeholder="* Supplier" name="supplier_name" required />
							</div>
						</td>
					</tr>
					
					
					
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="address">ADDRESS :</label>
						</td>
						<td>
							<div class="col-sm-12">
								<input type="text" value="<?php echo $row['address']?>" class="form-control" id="address" placeholder="* Address" name="address" required />
							</div>
						</td>
					</tr>
					
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="phone">PHONE :</label>
						</td>
						<td>
							<div class="col-sm-12">
								<input type="text" value="<?php echo $row['phone']?>" class="form-control" id="phone" placeholder="* Phone" name="phone" required />
							</div>
						</td>
					</tr>
					
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="email">EMAIL :</label>
						</td>
						<td>
							<div class="col-sm-12">
								<input type="text" value="<?php echo $row['email']?>" class="form-control" id="email" placeholder="* Email" name="email" required />
							</div>
						</td>
					</tr>
					
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="note">NOTE :</label>
						</td>
						<td>
							<div class="col-sm-12">
								<input type="text" value="<?php echo $row['note']?>" class="form-control" id="note" placeholder="* Note" name="note" required />
							</div>
						</td>
					</tr>
					
					
					
					<tr>
						<td align='right' width='20%'>
							<label class="col-sm-12 control-label" for="form-field-2">IMAGE :</label>
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
												<input type="file" id="form-field-2" name="userfile" class="file-input" />
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
										echo "<img title='".$row['supplier_name']."' width='200' src='".base_url()."/uploads/supplier/".$row['image']."'>";
									}
								?>
								
							</div>
						</td>
					</tr>
					
					<tr>
						<td align='right' width='20%'></td>
						<td>
							<div class="col-sm-12">
								<button type="submit" name="submit" class="btn btn-success btn-sm"><i class='fa fa-save'></i> SAVE</button>
								<?php
									echo anchor('admin/supplier', "<i class='fa fa-arrow-left'></i> BACK",array('class'=>'btn btn-info btn-sm'));
								?>
							</div>
						</td>
					</tr>
				</form>
			</table>
		</div>
	</div>
	<!-- end: TEXT FIELDS PANEL -->
</div>