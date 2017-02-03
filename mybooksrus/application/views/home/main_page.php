 <div class="jumbotron">
  <div class="container">
	<h1>Collegebooksrus</h1>
	<p class="lead"> To buy/Sell books within same univeristy </p>
	<p>
	<div class="container">
		<div class="row">
			<?php $attributes = array("name" => "searchform","method"=>"get","class"=>"form-horizontal");
					echo form_open("search", $attributes);?>
				<div class="form-group">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="glyphicon glyphicon-home"></i>
									</span>
									<select name="university" id="university" class="form-control selectpicker">
										<option value="">Select University</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
									<select name="state" class="form-control selectpicker" onchange="getUniListByStateId(this)" >
									    <?php 
											$stateOption = '<option value="">Select State</option>';
											$listState = $this->utilities->getAllState('','3926');
											if($listState){
												foreach($listState as $state){
													$stateOption.="<option value='". $state->id ."'" . set_select('state', $state->id) . ">".$state->name."</option>";
												}
												echo $stateOption;
											}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="row" style="margin:0 0;">
							<div class="input-group">
								<input type="text" name="search" class="search-query form-control" placeholder="Search by Books name, ISBN, Author, university" id="searchInput" value="<?php echo set_value('search'); ?>" style="height:60px;"/>
								<span class="input-group-btn">
									<button class="btn btn-danger" type="submit" id="searchButton" style="height:60px;width:60px;">
										<span class=" glyphicon glyphicon-search"></span>
									</button>
								</span>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
	</p>
	<!--<p><a class="btn btn-primary btn-lg" href="<?php echo base_url('auth/signup');?>" role="button">Sign up today &raquo;</a></p>-->
  </div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-4">
		  <h2>Heading</h2>
		  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
		  <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
		</div>
		<div class="col-md-4">
		  <h2>Heading</h2>
		  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
		  <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
		</div>
		<div class="col-md-4">
		  <h2>Heading</h2>
		  <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
		  <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
		</div>
	</div>

<hr>
