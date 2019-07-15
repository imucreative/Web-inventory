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
				<?php 
					echo form_open("admin/goods_requisition_report/display_request_report");
				?>
					<table class="table">
					
						<tr>
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="tgl_request">TGL REQUEST :</label>
							</td>
							<td>
								<div class="col-sm-6">
									<div class="input-group">
										<input name="date_request_from" type="text" data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" placeholder="* Date From" required >
										<span class="input-group-addon"><i class="fa fa-calendar"></i> From</span>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="input-group">
										<input name="date_request_to" type="text" data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" placeholder="* Date From" required >
										<span class="input-group-addon"><i class="fa fa-calendar"></i> To</span>
									</div>
								</div>
							</td>
						</tr>
						
						<tr>
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="user_request">USER REQUEST :</label>
							</td>
							<td>
								<div class="col-sm-12">
									<select name="user_request" class="form-control search-select" id="user_request" placeholder="* User Request" required>
										<?php
											foreach ($user as $u){
												echo "<option value='$u->username'>$u->nama_lengkap</option>";
											}
										?>
									</select>
								</div>
							</td>
						</tr>
						
						<tr>
							<td align='right' width='20%'>
								<label class="col-sm-12 control-label" for="status_request">STATUS REQUEST :</label>
							</td>
							<td>
								<div class="col-sm-12">
									<label class="radio-inline">
										<input type="radio" class="square-red" value="1" name="status_request" required > Approve
									</label>
									<label class="radio-inline">
										<input type="radio" class="square-red" value="0" name="status_request" required > Not Approve
									</label>
								</div>
							</td>
						</tr>
						
						<tr>
							<td align='right' colspan='2'>
								<button type="submit" name="submit" class="btn btn-primary btn-md" onclick="return confirm('Are you sure?')" target="popup"><i class='fa fa-cogs'></i> GENERATE</button>
							</td>
						</tr>
							
					</table>
				</form>
			</div>
		</div>
	</div>
	<!-- end: DYNAMIC TABLE PANEL -->
</div>


