<?php
//print_r($sentMsgs);die;
?>
<div class="row">
	<div class="col-lg-12">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li>
				<a href="<?php echo base_url('message');?>">
					<span class="glyphicon glyphicon-inbox"></span> Inbox
				</a>
			</li>
			<li class="active">
				<a href="">
					<span class="glyphicon glyphicon-user"></span> Sent
				</a>
			</li>
			<!--<li><a href="#archive" data-toggle="tab"><span class="glyphicon glyphicon-briefcase"></span>
				Archve</a></li>
			<li><a href="#settings" data-toggle="tab"><span class="glyphicon glyphicon-plus no-margin">
			</span></a></li>-->
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane fade in active">
				<div class="list-group">
			<?php
				if($sentMsgs){
					foreach($sentMsgs as $sentMsg){
			?>
						<a href="<?php echo base_url('message/showmessages/'.$sentMsg['transid'].'/sent'); ?>" class="list-group-item <?php echo (($sentMsg['isread']>1)?"read":""); ?>">
							<div class="row">
							<div class="col-lg-4">
								<div class="checkbox">
									<label>
										<input type="checkbox">
									</label>
								</div>
								<!--<span class="glyphicon glyphicon-star-empty"></span>-->
								<span class="name" style="min-width: 120px;
									display: inline-block;">
									<?php echo ucfirst($sentMsg['first_name']." ".$sentMsg['last_name']); ?>
										<span class="pull-right"><?php echo (($sentMsg['msgcounts']>1)?"(".$sentMsg['msgcounts'].")":""); ?></span>
								</span>
							</div>
							<div class="col-lg-8">
							<span class=""><?php echo ((strlen($sentMsg['subject'])>25)?substr($sentMsg['subject'],0,25)."...":$sentMsg['subject']); ?></span>
							<!--<span class="text-muted" style="font-size: 11px;">
							<?php echo $sentMsg['body']; ?>
							</span>-->
							<span class="pull-right"><?php echo date('d M, H:ia',strtotime($sentMsg['transdate'])); ?></span>
							</div>
							</div>
						</a>
			<?php
					}
				}
			?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
