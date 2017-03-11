<div class="panel">
	<ul class="nav nav-tabs" id="myTab">
		<li><a href="<?php echo base_url('admindb/userlist');?>">Activ users</a></li>
		<li><a href="<?php echo base_url('admindb/inactivuserlist');?>">Inactive users</a></li>
		<li class="active"><a>Deleted users</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="deluser">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-6">
							<span class="glyphicon glyphicon-list"></span>Deleted User List
						</div>
						<!--<div class="col-lg-6">
							<form>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search" name="q">
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
									</div>
								</div>
							</form>
						</div>-->
					</div>
				</div>
				<div class="panel-body">
					<ul class="list-group">
				<?php
					if($actUserLists){
						foreach($actUserLists as $userlist){
				?>
						<li class="list-group-item">
							<div class="checkbox">
								<!--<a href="<?php echo base_url('users/viewuserdetails/'.$userlist['id'])?>">-->
									<label for="checkbox">
										<?php echo ucfirst($userlist['first_name']." ".$userlist['last_name']);?>
									</label>
								<!--</a>-->
							</div>
							<div class="pull-right action-buttons">
								<!--<a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
								<a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>-->
							</div>
						</li>
				<?php
						}
					}else{
						echo "No record found";
					}
				?>
					</ul>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-6">
							<h6>
								Total Count 
								<span class="label label-info"><?php echo $total ? $total:0; ?></span>
							</h6>
						</div>
						<div class="col-md-6">
							<?php echo $links; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>