<div class="row well">
	<fieldset>
		<div class="row">
			<div class="col-sm-12">
				<legend>Update book</legend>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
			<?php $attributes = array("name" => "addpost","class"=>"");
						echo form_open("postyouradd/updatebookdata/".$bookdata['bookid'], $attributes);?>
					<div class="form-group col-sm-12">
						<?php echo $this->session->flashdata('msg'); ?>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-12 form-group">
						<label for="Title" class="control-label">Title</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Title" value="<?php echo (($bookdata['title'])?$bookdata['title']:""); ?>">
						<span class="text-danger"><?php echo form_error('name'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="ISBN10" class="control-label">ISBN10</label>
						<input type="text" class="form-control" id="isbn10" name="isbn10" placeholder="ISBN10" value="<?php echo (($bookdata['isbn10'])?$bookdata['isbn10']:""); ?>">
						<span class="text-danger"><?php echo form_error('isbn10'); ?></span>
					</div>
					<div class="col-sm-6 form-group">
						<label for="ISBN13" class="control-label">ISBN13</label>
						<input type="text" class="form-control" id="isbn13" name="isbn13" placeholder="ISBN13" value="<?php echo (($bookdata['isbn13'])?$bookdata['isbn13']:""); ?>">
						<span class="text-danger"><?php echo form_error('isbn13'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="Author" class="control-label">Author</label>
						<input type="text" class="form-control" id="authors" name="authors" placeholder="Author" value="<?php echo (($bookdata['authors'])?$bookdata['authors']:""); ?>">
						<span class="text-danger"><?php echo form_error('authors'); ?></span>
					</div>
					<div class="col-sm-6 form-group">
						<label for="Edition" class="control-label">Edition</label>
						<input type="text" class="form-control" id="edition" name="edition" placeholder="Edition" value="<?php echo (($bookdata['edition'])?$bookdata['edition']:""); ?>">
						<span class="text-danger"><?php echo form_error('edition'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="Price" class="control-label">Price</label>
						<input type="text" class="form-control" id="price" name="price" placeholder="Price" value="<?php echo (($bookdata['price'])?$bookdata['price']:""); ?>">
						<span class="text-danger"><?php echo form_error('price'); ?></span>
					</div>
					<div class="col-sm-6 form-group">
						<label for="Binding" class="control-label">Binding</label>
						<input type="text" class="form-control" id="binding" name="binding" placeholder="Binding" value="<?php echo (($bookdata['binding'])?$bookdata['binding']:""); ?>">
						<span class="text-danger"><?php echo form_error('binding'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="Publisher" class="control-label">Publisher</label>
						<input type="text" class="form-control" id="publisher" name="publisher" placeholder="Publisher" value="<?php echo (($bookdata['publisher'])?$bookdata['publisher']:""); ?>">
						<span class="text-danger"><?php echo form_error('publisher'); ?></span>
					</div>
					<div class="col-sm-6 form-group">
						<label for="Published" class="control-label">Published date</label>
						<input type="text" class="form-control" id="published" name="published" placeholder="Published" value="<?php echo (($bookdata['published'] && $bookdata['published'] !="0000-00-00")?$this->utilities->showDateForSpecificTimeZone($bookdata['published'],'m-d-Y'):""); ?>">
						<span class="text-danger"><?php echo form_error('published'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="copyright_year" class="control-label">Copyright year</label>
						<input type="text" class="form-control" id="copyear" name="copyright_year" placeholder="Copyright year" value="<?php echo (($bookdata['copyright_year'] && $bookdata['copyright_year']!="0000")?$bookdata['copyright_year']:""); ?>">
						<span class="text-danger"><?php echo form_error('copyear'); ?></span>
					</div>
					<div class="col-sm-6 form-group">
						<label for="full_name_id" class="control-label">Condition of book</label>
						<select placeholder="Condition" class="form-control" id="condition" name="condition">
							<option value="">Select Condition</option>
							<option value="1" <?php echo (($bookdata['condition']=='1')?"selected":"")?>>New</option>
							<option value="2" <?php echo (($bookdata['condition']=='2')?"selected":"")?>>Like new</option>
							<option value="3" <?php echo (($bookdata['condition']=='3')?"selected":"")?>>Very good</option>
							<option value="4" <?php echo (($bookdata['condition']=='4')?"selected":"")?>>Good</option>
							<option value="5" <?php echo (($bookdata['condition']=='5')?"selected":"")?>>Acceptable</option>
						</select>
						<span class="text-danger"><?php echo form_error('condition'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="Size" class="control-label">Size</label>
						<input type="text" class="form-control" id="size" name="size" placeholder="Length X Width X Depth in CM" value="<?php echo (($bookdata['size'])?$bookdata['size']:""); ?>">
						<span class="text-danger"><?php echo form_error('size'); ?></span>
					</div>
					<div class="col-sm-6 form-group">
						<label for="Pages" class="control-label">Pages</label>
						<input type="text" class="form-control" id="pages" name="pages" placeholder="Pages" value="<?php echo (($bookdata['pages'])?$bookdata['pages']:""); ?>">
						<span class="text-danger"><?php echo form_error('pages'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="Weight " class="control-label">Weight</label>
						<input type="text" class="form-control" id="weight " name="weight" placeholder="pound (lb)" value="<?php echo (($bookdata['weight'])?$bookdata['weight']:""); ?>">
						<span class="text-danger"><?php echo form_error('weight'); ?></span>
					</div>
					<div class="col-sm-6 form-group">
						<label for="Language" class="control-label">Language</label>
						<select placeholder="Language" class="form-control" id="language" name="language">
							<option value="1" <?php echo (($bookdata['language']=='1')?"language":"")?>>English</option>
						</select>
						<span class="text-danger"><?php echo form_error('language'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="Discount" class="control-label">Discount</label>
						<input type="text" class="form-control" id="discount " name="discount" placeholder="Discount %" value="<?php echo (($bookdata['discount'])?$bookdata['discount']:""); ?>">
						<span class="text-danger"><?php echo form_error('discount'); ?></span>
					</div>
					<div class="col-sm-6 form-group">
						<label for="Status" class="control-label">Status</label>
						<select placeholder="Status" class="form-control" id="active_status" name="active_status">
							<option value="1" <?php echo (($bookdata['status']=='1')?"selected":"")?>>Active</option>
							<option value="0" <?php echo (($bookdata['status']=='0')?"selected":"")?>>Inactive</option>
							<option value="2" <?php echo (($bookdata['status']=='2')?"selected":"")?>>Delete</option>
						</select>
						<span class="text-danger"><?php echo form_error('active_status'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-9 form-group">
					<label for="Description" class="control-label">Description</label>
					<textarea class="form-control" rows="6" id="discription" name="discription"><?php echo $bookdata['discription']; ?></textarea>
						<span class="text-danger"><?php echo form_error('discription'); ?></span>
					</div>
					<div class="col-sm-3 form-group">
					<label for="website" class="control-label">&nbsp;</label>
						<div class="phpto-area" style="padding: 0;">
							<span class="imgarea">
								<span id="img-close" class="img-close" style="top: 12px;">x</span>
								<?php
									if($bookdata['image']){
								?>
									<img class='backup_picture' src="<?php echo base_url('uploads/booksimg/'.$bookdata['image']) ;?>" alt="Book image" width="100%"/>
								<?php } else{ ?>
									<img class='backup_picture' src="<?php echo base_url('assets/images/no_book avalaible.jpg') ;?>" alt="Book image" width="100%"/>
								<?php
									}
								?>
							</span>
							<span class="prog-comp-body">
								<span class="prog-comp-inner"></span>
							</span>
						</div>
						<input type="hidden" name="image" id="imgname" value="<?php echo $bookdata['image']; ?>"/>
						<span class="text-danger"><?php echo form_error('image'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-12 form-group">
					<label class="control-label">&nbsp;</label>
						<?php echo $this->session->flashdata('msg'); ?>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-12 form-group">
						<label for="full_name_id" class="control-label"></label>
						<a href="<?php echo base_url('postyouradd/bookdetails/'.$bookdata['bookid']."/".$this->utilities->cleanurl($bookdata['title'])); ?>" class="btn btn-md btn-primary pull-left">Cansle</a>
						<button type="submit" class="btn btn-md btn-primary pull-right">Update</button>
					</div>
					<div class="clearfix"></div>
				<?php echo form_close(); ?>
					<form id="imageform" method="post" enctype="multipart/form-data" action="<?php echo base_url('postyouradd/uploadimages');?>" style="display:none;">
						<input type="file" name="photoimg" id="photoimgupload" accept="image/jpeg, image/jpg" />
					</form>
			</div>
		</div>
	<fieldset>
</div>
</div>