<div class="row">
	<div class="col-lg-12">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#inbox" data-toggle="tab"><span class="glyphicon glyphicon-inbox">
			</span>Inbox</a></li>
			<li><a href="#sent" data-toggle="tab"><span class="glyphicon glyphicon-user"></span>
				Sent</a></li>
			<li><a href="#archive" data-toggle="tab"><span class="glyphicon glyphicon-briefcase"></span>
				Archve</a></li>
			<!--<li><a href="#settings" data-toggle="tab"><span class="glyphicon glyphicon-plus no-margin">
			</span></a></li>-->
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane fade in active" id="inbox">
				<div class="list-group">
			<?php
				if($inboxMsgs){
					foreach($inboxMsgs as $inboxMsg){
			?>
						<a href="<?php echo base_url('message/showmessages/'.$inboxMsg['transid']); ?>" class="list-group-item <?php echo (($inboxMsg['isread']>1)?"read":""); ?>">
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
									<?php echo ucfirst($inboxMsg['first_name']." ".$inboxMsg['last_name']); ?>
										<span class="pull-right"><?php echo (($inboxMsg['msgcounts']>1)?"(".$inboxMsg['msgcounts'].")":""); ?></span>
								</span>
							</div>
							<div class="col-lg-8">
							<span class=""><?php echo ((strlen($inboxMsg['subject'])>25)?substr($inboxMsg['subject'],0,25)."...":$inboxMsg['subject']); ?></span>
							<!--<span class="text-muted" style="font-size: 11px;">
							<?php echo $inboxMsg['body']; ?>
							</span>-->
							<span class="pull-right"><?php echo date('d M, H:ia',strtotime($inboxMsg['transdate'])); ?></span>
							</div>
							</div>
						</a>
			<?php
					}
				}
			?>
				</div>
			</div>
			<div class="tab-pane fade in" id="sent">
				<div class="list-group">
					<div class="list-group-item">
						<span class="text-center">This tab is empty.</span>
					</div>
				</div>
			</div>
			<div class="tab-pane fade in" id="archive">
				...
			</div>
			<div class="tab-pane fade in" id="settings">
				This tab is empty.
			</div>
		</div>
	   
	</div>
</div>
</div>
