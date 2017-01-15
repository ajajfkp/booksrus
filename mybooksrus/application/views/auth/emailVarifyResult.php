<div class="container varify-sucs-fail-contr">
	<div class="row">
		<div class="jumbotron">
			<?php 
				if(!empty($msg_succ)){	
			?>
				<h1>SUCCESS!!!</h1> 
				<p><?php echo $msg_succ; ?></p> 
			<?php
				} elseif(!empty($msg_fail)) {
			?>
					<h1>FAIL!!!</h1> 
					<p><?php echo $msg_fail; ?></p> 
			<?php
				}
			?>
		</div>
	</div>
</div>