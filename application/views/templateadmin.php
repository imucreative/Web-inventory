<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
    <!--<![endif]-->

    <head>
        <title><?php echo get_data_toko('nama_toko');?></title>
        <link rel="shortcut icon" href="<?php echo base_url()."uploads/".get_data_toko('logo');?>" />
        
		<!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="<?php echo get_data_toko('nama_toko');?>" name="description" />
        <meta content="<?php echo get_data_toko('nama_toko');?>" name="author" />
        <!-- end: META -->
		
        <!-- start: MAIN CSS -->
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Raleway:400,100,200,300,500,600,700,800,900/" />
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/fonts/style.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/css/main.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/css/main-responsive.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/css/theme_light.css" type="text/css" id="skin_color">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/css/print.css" type="text/css" media="print"/>
        <!-- end: MAIN CSS -->
		
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/DataTables/media/css/DT_bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/select2/select2.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/datepicker/css/datepicker.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/jQuery-Tags-Input/jquery.tagsinput.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/summernote/build/summernote.css">
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-modal/css/bootstrap-modal.css" />
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		
		<script src="<?php echo base_url()?>template/admin/assets/plugins/jQuery-lib/2.0.3/jquery.min.js"></script>
    </head>

    <body class="footer-fixed">

        <!-- start: HEADER -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <!-- start: TOP NAVIGATION CONTAINER -->
            <div class="container">
                <div class="navbar-header">
                    <!-- start: RESPONSIVE MENU TOGGLER -->
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="clip-list-2"></span>
					</button>
                    <!-- end: RESPONSIVE MENU TOGGLER -->
					
                    <!-- start: LOGO -->
                    <a class="navbar-brand" href="">
                        <i class="clip-home"></i>
						<?php echo get_data_toko('nama_toko');?>
                    </a>
                    <!-- end: LOGO -->
                </div>
                <div class="navbar-tools">
                    <!-- start: TOP NAVIGATION MENU -->
                    <ul class="nav navbar-right">
                        
						
						<?php
							$jumlah_qty_min	= get_cek_qty()->num_rows();
							if($this->session->userdata('status')==1){
						?>
						
						<!-- start: MESSAGE DROPDOWN -->
						<li class="dropdown">
							<a class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#">
								<i class="clip-notification-2"></i>
								<span class="badge badge-danger"> <?php echo $jumlah_qty_min;?></span>
							</a>
							<ul class="dropdown-menu posts">
								<li>
									<span class="dropdown-menu-title"> You have <?php echo $jumlah_qty_min;?> material has reached</span>
								</li>
								<li>
									<div class="drop-down-wrapper">
										<ul>
											<?php
												foreach(get_cek_qty()->result() as $r){
													$CI=&get_instance();
													$CI->load->model('Mod_kategori');
													$result_kat	= $CI->Mod_kategori->get_kategori_by_kategori_id($r->kategori_id)->row_array();
											?>
												<li>
													<a href="<?php echo base_url();?>admin/material/edit/<?php echo $r->material_id;?>">
														<div class="clearfix">
															<div class="thread-image">
																<img width='100%' alt="<?php echo $r->nama_material;?>" src="<?php echo base_url();?>uploads/material/<?php echo $r->image;?>">
															</div>
															<div class="thread-content">
																<span class="author"><?php echo $r->nama_material;?></span>
																<span class="preview">QTY : <?php echo $r->qty;?> | S.LOC : <?php echo $r->location;?></span>
																<span class="time"> <?php echo $result_kat['nama_kategori'];?></span>
															</div>
														</div>
													</a>
												</li>
											<?php
												}
											?>
											
										</ul>
									</div>
								</li>
								<!--
								<li class="view-all">
									<a href="pages_messages.html">
										See all messages <i class="fa fa-arrow-circle-o-right"></i>
									</a>
								</li>
								-->
							</ul>
						</li>
						<!-- end: MESSAGE DROPDOWN -->
						<?php
							}
						?>
						
						
						
						
						<li>
							<?php
								echo anchor("admin/info/profil", "<i class='clip-user-4' aria-hidden='true'></i> ".strtoupper($this->session->userdata('nama_lengkap')));
							?>
                        </li>
						<li>
                            <?php
								echo anchor("auth/logout", '<i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT', ["onclick"=>"return confirm('Are you sure?')"]);
							?>
                        </li>
                    </ul>
                    <!-- end: TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- end: TOP NAVIGATION CONTAINER -->
        </div>
        <!-- end: HEADER -->
        <!-- start: MAIN CONTAINER -->
        <div class="main-container">
            <div class="navbar-content hidden-print">
                <!-- start: SIDEBAR -->
                <div class="main-navigation navbar-collapse collapse">
                    <!-- start: MAIN MENU TOGGLER BUTTON -->
					
                    <div class="navigation-toggler">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>  
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </div>
					
                    <!-- end: MAIN MENU TOGGLER BUTTON -->
                    <!-- start: MAIN NAVIGATION MENU -->
                    <ul class="main-navigation-menu">
                        <?php
							$status				= $this->session->userdata('status');
							$menu_admin_parent	= $this->db->get_where('tbl_menu_admin', array('parent'=>'0', 'status_delete'=>'0', 'status'=>$status))->result();
							foreach ($menu_admin_parent as $main){
								$submenu	= $this->db->get_where('tbl_menu_admin', array('parent' => $main->menu_id, 'status'=>$status));
								if ($submenu->num_rows() > 0){
									echo "<li>
										<a href='javascript:void(0)'>
											<i class='" . $main->icon . "'></i>
											<span class='title'> " . strtoupper($main->nama_menu) . " </span>
											<i class='icon-arrow'></i><span class='selected'></span>
										</a>
										<ul class='sub-menu'>";
									foreach ($submenu->result() as $sub) {
										echo "<li>" . anchor('admin/'.$sub->link, "<i class='" . $sub->icon . "'></i> <span class='title'>" . strtoupper($sub->nama_menu)) . "</span></li>";
									}

									echo"</ul>
										</li>";
								} else {
									echo "<li>" . anchor('admin/'.$main->link, "<i class='" . $main->icon . "'></i> <span class='title'>" . strtoupper($main->nama_menu)) . "</span></li>";
								}
							}
                        ?>
						
                    </ul>
                    <!-- end: MAIN NAVIGATION MENU -->
                </div>
                <!-- end: SIDEBAR -->
            </div>

			<!-- start: PAGE -->
			<div class="main-content">
				<div class="container">
					<!-- start: PAGE HEADER -->
					<div class="row">
						<div class="col-sm-12">
						<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="fa fa-home" aria-hidden="true"></i>
									<a href="#">Home</a>
								</li>
								<li class="active">
									<?php 
										echo strtoupper($this->uri->segment(2));
									?>
								</li>
								<!--
								<li class="search-box">
									<form class="sidebar-search">
										<div class="form-group">
											<input type="text" placeholder="Start Searching..."><button class="submit"><i class="clip-search-3"></i></button>
										</div>
									</form>
								</li>
								-->
							</ol>
							<div class="page-header">
								<h1>
									<?php 
										echo strtoupper($this->uri->segment(2));
									?>
									<small><?php echo strtoupper($this->uri->segment(3));?></small>
								</h1>
							</div>
						<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
						<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">
				
						<?php echo $contents; ?>	<!--================================================================================================-->
					
					</div>
                </div>
                <!-- end: PAGE -->
            </div>
            <!-- end: MAIN CONTAINER -->
            <!-- start: FOOTER -->
            <div class="footer clearfix">
                <div class="footer-inner">
                    <script>document.write(new Date().getFullYear())</script> &copy; <?php echo get_data_toko('nama_toko');?>.
                </div>
                <div class="footer-items">
                    <span class="go-top"><i class="clip-chevron-up"></i></span>
                </div>
            </div>
            <!-- end: FOOTER -->
			
            <!-- start: MAIN JAVASCRIPTS -->
            <!--[if lt IE 9]>
                <script src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/respond/dest/respond.min.js"></script>
                <script src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/Flot/excanvas.min.js"></script>
                <script src="http://www.cliptheme.com/preview/cliponeV2/Admin/bower_components/jquery-1.x/dist/jquery.min.js"></script>
                <![endif]-->
            <!--[if gte IE 9]><!-->

            <!-- end: MAIN JAVASCRIPTS -->
			<script src="<?php echo base_url()?>template/admin/assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/blockUI/jquery.blockUI.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/iCheck/jquery.icheck.min.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/less/less-1.5.0.min.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/js/main.js"></script>
			<!-- end: MAIN JAVASCRIPTS -->
			
			<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
			<script src="<?php echo base_url()?>template/admin/assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/autosize/jquery.autosize.min.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/select2/select2.min.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/jquery-maskmoney/jquery.maskMoney.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/js/index.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/jQuery-Tags-Input/jquery.tagsinput.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/summernote/build/summernote.min.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/ckeditor/ckeditor.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/ckeditor/adapters/jquery.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/js/form-elements.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/js/ui-elements.js"></script>
			
			<script src="<?php echo base_url()?>template/admin/assets/plugins/highcharts/highcharts.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/highcharts/modules/exporting.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/highcharts/themes/dark-green.js"></script>
			
			<script src="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/js/ui-modals.js"></script>

			<script src="<?php echo base_url()?>template/admin/assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
			<script src="<?php echo base_url()?>template/admin/assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
			<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

            <script>
                jQuery(document).ready(function() {
                    Main.init();
					FormElements.init();
                });
            </script>

    </body>

</html>
