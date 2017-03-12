<div class="panel">
	<ul class="nav nav-tabs" id="myTab">
		<li class="active">
			<a>Activ Schools</a>
		</li>
		<li>
			<a href="<?php echo base_url('admindb/univapproved');?>">Schools required approval </a>
		</li>
		<li>
			<a href="<?php echo base_url('admindb/inactiveUniv');?>">
				Inactive schools
			</a>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="activeuser">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-6">
							<span class="glyphicon glyphicon-list"></span>Activ Schools List
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
				<div class="panel-bodys">
					<ul class="list-group">
				<?php
					if($actSchoolLists){
						foreach($actSchoolLists as $schoolList){
				?>
						<li class="list-group-item">
							<div class="checkbox">
								<!--<a href="<?php echo base_url('users/viewuserdetails/'.$userlist['id'])?>">-->
									<label for="checkbox">
										<?php echo ucfirst($schoolList['name']);?>
									</label>
								<!--</a>-->
									<a href="http://<?php echo $schoolList['website']; ?>" target="_blank"><?php echo $schoolList['website']; ?></a>
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
						echo "<li class='text-center'>No record found</li>";
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