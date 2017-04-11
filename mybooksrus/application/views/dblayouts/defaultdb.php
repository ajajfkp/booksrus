<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Collegebooksrus <?php echo $title_for_layout ?></title> 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<script>
			var base_url = "<?php echo base_url(); ?>";
		</script>
		<link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap/bootstrap-select.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap/font-awesome.min.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/dbstyle.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ui_msg/style.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/sweetalert/dist/sweetalert.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_new.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/toastr.min.css" type="text/css">
		<script src="<?php echo base_url();?>assets/js/jquery/jquery.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery/jquery-ui.js"></script>
		<script type="text/javascript">
			var base_url = '<?php echo base_url(); ?>';
			(function(){
				setInterval(
				function(){
					var uid = '<?php echo $this->utilities->getSessionUserData('uid');?>';
					$.ajax({
						type: "POST",
						url: base_url+'auth/updateuserUptime',
						data: {
							'uid':uid
						},
						success: function(msg){
							console.log(msg);
						},
						error : function(XMLHttpRequest, textStatus, errorThrown) {
							//setUiMessege('err',errorThrown);
						}
					});
				},5000);
			})();
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-63347441-2', 'auto');
			ga('send', 'pageview');
		</script>
		<?php echo $this->layouts->print_includes(); ?>
	</head>
	<body>
	
		<?php $this->load->view('dblayouts/db_main_header'); ?>
		<?php $this->load->view('dblayouts/db_left_pan'); ?>
			<?php echo $content_for_layout; ?> 
		<?php $this->load->view('dblayouts/db_right_pan'); ?>
		<?php $this->load->view('dblayouts/db_main_footer'); ?>
		
		<script src="<?php echo base_url();?>assets/js/ui_msg/jQuery.miniNoty.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/dbscript.js"></script>
		<script src="<?php echo base_url();?>assets/sweetalert/dist/sweetalert.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/toastr.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
		<script src="<?php echo base_url();?>assets/js/common.js"></script>
		<script src="<?php echo base_url();?>assets/js/chosen.jquery.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap/bootstrap-select.js"></script>
		<script><?php echo $extra_head; ?></script>
	</body> 
</html>
