<div class="row">
	<div class="col-lg-12">
		<ul class="nav nav-tabs">
			<li class="<?php echo $typeInbox; ?>">
				<a href="<?php echo base_url('message');?>">
					<span class="glyphicon glyphicon-inbox"></span>Inbox
				</a>
			</li>
			<li class="<?php echo $typeSent; ?>">
				<a href="<?php echo base_url('message/sent');?>">
					<span class="glyphicon glyphicon-user"></span>Sent
				</a>
			</li>
			<li>
				<a href="" >
					<span class="glyphicon glyphicon-briefcase"></span>Archive
				</a>
			</li>
		</ul>
		<div class="panel-body chat-container">
			<ul class="chat">
				<li class="left clearfix">
					<a href="javascript:window.history.go(-1);">
						<span class="glyphicon glyphicon-chevron-left"></span> Back
					</a>
					<a class="pull-right">
						<span class="glyphicon glyphicon-trash" onclick="deletemessage(<?php echo $transId; ?>,'<?php echo $type; ?>')"></span>
					</a>
				</li>
				<li class="left clearfix">
					<span class="chat-img pull-left">
						<img src="<?php echo base_url('uploads/booksimg/'.$transdetail['image']); ?>" alt="User Avatar" class="" width="75%"/>
					</span>
					<div class="chat-body clearfix">
						<div class="header">
							<strong class="primary-font"><?php echo ucfirst($transdetail['first_name']." ".$transdetail['last_name']); ?></strong>
						</div>
						<p>
							<?php echo $transdetail['name']; ?>
						</p>
					</div>
				</li>
				<?php
					if($chats){
						foreach($chats as $chat){
							if($chat['userId']!=$this->utilities->getSessionUserData('uid')){
				?>
				<li class="right clearfix">
				<div class="row">
					<div class="col-lg-12">
					<span class="chat-img pull-right">
						<span class="view-msg-user-img pull-right">
							<?php echo substr(strtoupper($chat['first_name']),0,1).substr(strtoupper($chat['last_name']),0,1); ?>
						</span>
					</span>
					<div class="chat-body clearfix">
						<div class="header">
							<small class=" text-muted">
								<span class="glyphicon glyphicon-time"></span>
								<?php echo date('d M, H:ia',strtotime($chat['date_added'])); ?>
							</small>
							<strong class="pull-right primary-font">
								<?php //echo ucfirst($chat['first_name']." ".$chat['last_name']); ?>
							</strong>
						</div>
						<p class="pull-right">
							<?php echo $chat['body']; ?>
						</p>
					</div>
					</div>
					</div>
				</li>
				<?php
							}else{
				
				?>
				<li class="left clearfix">
					<div class="row">
						<div class="col-lg-12">
							<span class="chat-img pull-left">
								<span class="view-msg-user-img pull-left">
									<?php echo substr(strtoupper($chat['first_name']),0,1).substr(strtoupper($chat['last_name']),0,1); ?>
								</span>
							</span>
							<div class="chat-body clearfix">
								<div class="header">
									<strong class="primary-font">
										<?php //echo ucfirst($chat['first_name']." ".$chat['last_name']); ?>
									</strong>
									<small class="pull-right text-muted">
										<span class="glyphicon glyphicon-time"></span>
										<?php echo date('d M, H:ia',strtotime($chat['date_added'])); ?>
									</small>
								</div>
								<p>
									<?php echo $chat['body']; ?>
								</p>
							</div>
						</div>
					</div>
				</li>
				<?php
							}
						}
					}
				?>
			</ul>
		</div>
		<div class="panel-footer">
			<div class="input-group">
				<input id="reply-message" type="text" class="form-control input-sm" placeholder="Type your message here..." />
				<span class="input-group-btn">
					<button class="btn btn-warning btn-sm" id="btn-chat"><span class="glyphicon glyphicon-send"></span> Send</button>
					<input type="hidden" name="transId" id="transId" value="<?php echo $chat['transId']; ?>" />
				</span>
			</div>
				<span class="text-danger" id="reply-message_error"></span>
		</div>
	</div>
</div>
</div>
