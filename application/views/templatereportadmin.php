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
		<link rel="stylesheet" href="<?php echo base_url()?>template/admin/assets/plugins/DataTables/media/css/DT_bootstrap.css" />
        <!-- end: MAIN CSS -->
		
		<script src="<?php echo base_url()?>template/admin/assets/plugins/jQuery-lib/2.0.3/jquery.min.js"></script>
    </head>

    <body>
		<?php echo $contents; ?>	<!--================================================================================================-->

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
		
		<script src="<?php echo base_url()?>template/admin/assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url()?>template/admin/assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
			});
		</script>

    </body>

</html>