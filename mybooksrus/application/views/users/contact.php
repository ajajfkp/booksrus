<div class="row">
    <div class="col-md-12 well">
      <form class="form-horizontal" role="form">
        <fieldset>
          <!-- Form Name -->
		<legend>Address Details</legend>
		<!-- Text input-->
		<div class="form-group">
			<label class="col-sm-4 control-label" for="address_one">Address Line One</label>
			<div class="col-sm-8">
				<input type="text" placeholder="Address Line 1" class="form-control">
			</div>
		</div>
		<!-- Text input-->
		<div class="form-group">
			<label class="col-sm-4 control-label" for="address_two">Address Line Two</label>
			<div class="col-sm-8">
				<input type="text" placeholder="Address Line 2" class="form-control">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-4 control-label" for="textinput">Postcode</label>
			<div class="col-sm-8">
			  <input type="text" placeholder="Post Code" class="form-control">
			</div>
		</div>
		
          <!-- Text input-->
		<div class="form-group">
			<label class="col-sm-4 control-label" for="city">City</label>
			<div class="col-sm-8">
				<select placeholder="City" class="form-control">
					<option value=""></option>
				</select>
			</div>
		</div>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-sm-4 control-label" for="textinput">State</label>
			<div class="col-sm-8">
				<select placeholder="State" class="form-control">
					<option value=""></option>
				</select>
			</div>
		</div>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-sm-4 control-label" for="textinput">Country</label>
			<div class="col-sm-8">
			<select placeholder="Country" class="form-control" id="country">
				<?php 
				$option = '';//'<option value="">Select Country</option>';
					$listCountery = $this->utilities->getAllCountry();
					if($listCountery){
						foreach($listCountery as $countrie){
							$option.="<option value='". $countrie->id ."'>".$countrie->name."</option>";
						}
						echo $option;
					}
				?>
			</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="pull-right">
					<button type="submit" class="btn btn-default">Cancel</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>

        </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
</div>