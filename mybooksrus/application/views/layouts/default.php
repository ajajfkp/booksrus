<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Collegebooksrus <?php echo $title_for_layout ?></title> 
		<script>
			var base_url = "<?php echo base_url(); ?>";
		</script>
		<link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap/bootstrap-select.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap/font-awesome.min.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ui_msg/style.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/sweetalert/dist/sweetalert.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_new.css" type="text/css">
		<script src="<?php echo base_url();?>assets/js/jquery/jquery.js"></script>
		<script type="text/javascript">
			var base_url = '<?php echo base_url(); ?>'
		</script>
		<?php echo $this->layouts->print_includes(); ?>		
	</head>
	
	<body>
		<?php $this->load->view('layouts/main_header'); ?>
		<?php //$this->load->view('layouts/left_side'); ?>
			<?php echo $content_for_layout; ?> 
		<?php //$this->load->view('layouts/right_side'); ?>
		<?php $this->load->view('layouts/main_footer'); ?>
		
		<script src="<?php echo base_url();?>assets/js/ui_msg/jQuery.miniNoty.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/dbscript.js"></script>
		<script src="<?php echo base_url();?>assets/sweetalert/dist/sweetalert.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/toastr.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
		<script src="<?php echo base_url();?>assets/js/common.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap/bootstrap-select.js"></script>
		<script><?php echo $extra_head; ?></script>
	</body> 
</html>
