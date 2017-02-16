<li class="left clearfix">
	<div class="row">
		<div class="col-lg-12">
			<span class="chat-img pull-left">
				<span class="view-msg-user-img pull-left">
					<?php echo substr(strtoupper($msgsnipt['first_name']),0,1).substr(strtoupper($msgsnipt['last_name']),0,1); ?>
				</span>
			</span>
			<div class="chat-body clearfix">
				<div class="header">
					<strong class="primary-font">
						<?php //echo ucfirst($msgsnipt['first_name']." ".$msgsnipt['last_name']); ?>
					</strong>
					<small class="pull-right text-muted">
						<span class="glyphicon glyphicon-time"></span>
						<?php echo date('d M, H:ia',strtotime($msgsnipt['date_added'])); ?>
					</small>
				</div>
				<p>
					<?php echo $msgsnipt['body']; ?>
				</p>
			</div>
		</div>
	</div>
</li>