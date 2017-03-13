<div class="btn-group btn-group-justified">
	<a href="<?php echo base_url('admindb/userlist'); ?>" class="btn btn-primary col-sm-3">
		<i class="glyphicon glyphicon-user"></i>
		<br> Registerd Users
		<br> <span class="badge badge-info"><?php echo $this->utilities->getTotalUsers(1); ?></span>
	</a>
	<a href="<?php echo base_url('admindb/schoolList'); ?>" class="btn btn-primary col-sm-3">
	<i class="glyphicon glyphicon-home"></i>
	<br> School List <span class="badge badge-info"><?php echo $this->utilities->getSchoolCount('totlaapr'); ?></span>
	<br> New <span class="badge badge-info"><?php echo $this->utilities->getSchoolCount('totlnotaapr'); ?></span>
	</a>
	<a href="#" class="btn btn-primary col-sm-3">
	<i class="glyphicon glyphicon-map-marker"></i>
	<br> Visitors
	<br> <span class="badge badge-info">4</span>
	</a>
</div>
<hr />
<!--tabs-->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>New Requests</h4>
	</div>
	<div class="panel-body">
		No record.
	</div>
</div>
</div>
<!--/col-->