<nav class="navbar navbar-default" role="navigation" style="min-height: 0;border-radius: 5px;">
	<a class="btn btn-lg btn-success" href="<?php echo base_url('postyouradd')?>">
		<i class="glyphicon glyphicon-plus"></i>&nbsp;Add your post
	</a>
</nav>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>New Requests</h4>
	</div>
	<div class="panel-body">
		No record.
	</div>
</div>
<hr style="visibility: hidden;">
<div class="btn-group btn-group-justified" style="visibility: hidden;">
	<a href="#" class="btn btn-primary col-sm-3">
	<i class="glyphicon glyphicon-plus"></i>
	<br> Service
	</a>
	<a href="#" class="btn btn-primary col-sm-3">
	<i class="glyphicon glyphicon-cog"></i>
	<br> Tools
	</a>
	<a href="#" class="btn btn-primary col-sm-3">
	<i class="glyphicon glyphicon-question-sign"></i>
	<br> Help
	</a>
</div>
<hr style="visibility: hidden;"/>
<!--tabs-->
<div class="panel" style="visibility: hidden;">
	<ul class="nav nav-tabs" id="myTab">
		<li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
		<li><a href="#messages" data-toggle="tab">Messages</a></li>
		<li><a href="#settings" data-toggle="tab">Settings</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active well" id="profile">
			<h4><i class="glyphicon glyphicon-user"></i></h4>
			Lorem profile dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
			<p>Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis nisi.</p>
		</div>
		<div class="tab-pane well" id="messages">
			<h4><i class="glyphicon glyphicon-comment"></i></h4>
			Message ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
			<p>Quisque mauris augu.</p>
		</div>
		<div class="tab-pane well" id="settings">
			<h4><i class="glyphicon glyphicon-cog"></i></h4>
			Lorem settings dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
			<p>Quisque mauris augue, molestie.</p>
		</div>
	</div>
</div>
<!--/tabs-->
</div>
<!--/col-->