 <div class="jumbotron">
  <div class="container">
	<h1>Collegebooksrus</h1>
	<p class="lead"> To buy/Sell books within same univeristy </p>
	<p>
	<div class="container">
		<div class="row">
			<h2>Search Books</h2>
			<div id="custom-search-input">
				<?php $attributes = array("name" => "searchform","method"=>"get");
					echo form_open("search/index", $attributes);?>
				<div class="input-group col-md-offset-2 col-md-8">
					<input type="text" name="search" class="search-query form-control" placeholder="Search by Books name, ISBN, Author, university" id="searchInput" value="<?php echo set_value('search'); ?>"/>
					<span class="input-group-btn">
						<button class="btn btn-danger" type="submit" id="searchButton">
							<span class=" glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	</p>
	<!--<p><a class="btn btn-primary btn-lg" href="<?php echo base_url('auth/signup');?>" role="button">Sign up today &raquo;</a></p>-->
  </div>
</div>

<div class="container">
<!-- Example row of columns -->
	<div class="row">
		<div class="form-group"> 
			<label class="col-md-4 control-label"></label>
			<div class="col-md-4 selectContainer">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
					<select name="state" class="form-control selectpicker" >
					  <option value=" " >Please select your state</option>
					  <option >Colorado</option>
					</select>
				</div>
			</div>
		</div>
	</div>
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
