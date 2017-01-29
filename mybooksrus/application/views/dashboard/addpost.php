<div class="row well">
	<fieldset>
		<div class="row">
			<div class="col-sm-12">
				<legend>Post your Ad</legend>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
			<?php $attributes = array("name" => "addpost","class"=>"form-horizontal");
						echo form_open("postyouradd/postadd", $attributes);?>
					<div class="form-group row">
						<!--<label class="col-sm-4 control-label"></label>-->
						<div class="col-sm-8"><?php echo $this->session->flashdata('msg'); ?></div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-3 control-label">ISBN10</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="isbn10" name="isbn10" placeholder="ISBN10" value="<?php echo set_value('isbn10'); ?>">
							<span class="text-danger"><?php echo form_error('isbn10'); ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-sm-3 control-label">ISBN13</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="isbn13" name="isbn13" placeholder="ISBN13" value="<?php echo set_value('isbn13'); ?>">
							<span class="text-danger"><?php echo form_error('isbn13'); ?></span>
						</div>
					</div>
					
					<div class="form-group row"> 
						<label for="website" class="col-sm-3 control-label">Title</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="name" name="name" placeholder="Title" value="<?php echo set_value('name'); ?>">
							<span class="text-danger"><?php echo form_error('name'); ?></span>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="name" class="col-sm-3 control-label">Author</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="authors" name="authors" placeholder="Author" value="<?php echo set_value('authors'); ?>">
							<span class="text-danger"><?php echo form_error('authors'); ?></span>
						</div>
					</div>
					
					<div class="form-group row"> 
						<label for="website" class="col-sm-3 control-label">Price</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="price" name="price" placeholder="Price" value="<?php echo set_value('price'); ?>">
							<span class="text-danger"><?php echo form_error('price'); ?></span>
						</div>
					</div>
					
					<div class="form-group row"> 
						<label for="full_name_id" class="col-sm-3 control-label">Condition of book</label>
						<div class="col-sm-9">
							<select placeholder="Condition" class="form-control" id="condition" name="condition">
								<option value="">Select Condition</option>
								<option value="1">New</option>
								<option value="2">Like new</option>
								<option value="3">Very good</option>
								<option value="4">Good</option>
								<option value="5">Acceptable</option>
							</select>
							<span class="text-danger"><?php echo form_error('condition'); ?></span>
						</div>
					</div>
					
					<div class="form-group row"> 
						<label for="website" class="col-sm-3 control-label">Description</label>
						<div class="col-sm-9">
						<textarea class="form-control" rows="5" id="discription" name="discription"><?php echo set_value('discription'); ?></textarea>
							<span class="text-danger"><?php echo form_error('discription'); ?></span>
						</div>
					</div>
					<div class="form-group row"> 
						<label for="website" class="col-sm-3 control-label">&nbsp;</label>
						<div class="col-sm-9">
							<div class="phpto-area">
								<span class="imgarea">
									<a href="javascript:void(0);" class="imgblock" title="Add photo">
										<span class="imgview"><div class="glyphicon glyphicon-plus"style="font-size: 3em;"></div></span>
									</a>
								</span>
								<span class="prog-comp-body">
									<span class="prog-comp-inner"></span>
								</span>
							</div>
							<input type="hidden" name="image" id="imgname" value=""/>
							<span class="text-danger"><?php echo form_error('image'); ?></span>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-4 control-label">&nbsp;</label>
						<div class="col-sm-8">
							<?php echo $this->session->flashdata('msg'); ?>
						</div>
					</div>
					<div class="form-group row"> 
						<label for="full_name_id" class="col-sm-3 control-label"></label>
						<div class="col-sm-9">
							<button type="submit" class="btn btn-md btn-primary">Post Ad</button>
						</div>
					</div>    
				<?php echo form_close(); ?>
					<form id="imageform" method="post" enctype="multipart/form-data" action="<?php echo base_url('postyouradd/uploadimages');?>" style="display:none;">
						<input type="file" name="photoimg" id="photoimg" accept="image/jpeg, image/jpg" />
					</form>
			</div>
		</div>
	<fieldset>
</div>
</div>