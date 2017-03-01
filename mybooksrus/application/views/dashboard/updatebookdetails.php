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
						echo form_open("postyouradd/updatebookdata/".$boodata['bookid'], $attributes);?>
					<div class="form-group col-sm-12">
						<?php echo $this->session->flashdata('msg'); ?>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-12 form-group">
						<label for="Title" class="control-label">Title</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Title" value="<?php echo (($boodata['title'])?$boodata['title']:""); ?>">
						<span class="text-danger"><?php echo form_error('name'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="ISBN10" class="control-label">ISBN10</label>
						<input type="text" class="form-control" id="isbn10" name="isbn10" placeholder="ISBN10" value="<?php echo (($boodata['isbn10'])?$boodata['isbn10']:""); ?>">
						<span class="text-danger"><?php echo form_error('isbn10'); ?></span>
					</div>
					<div class="col-sm-6 form-group">
						<label for="ISBN13" class="control-label">ISBN13</label>
						<input type="text" class="form-control" id="isbn13" name="isbn13" placeholder="ISBN13" value="<?php echo (($boodata['isbn13'])?$boodata['isbn13']:""); ?>">
						<span class="text-danger"><?php echo form_error('isbn13'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="Author" class="control-label">Author</label>
						<input type="text" class="form-control" id="authors" name="authors" placeholder="Author" value="<?php echo (($boodata['authors'])?$boodata['authors']:""); ?>">
						<span class="text-danger"><?php echo form_error('authors'); ?></span>
					</div>
					<div class="col-sm-6 form-group">
						<label for="Edition" class="control-label">Edition</label>
						<input type="text" class="form-control" id="edition" name="edition" placeholder="Edition" value="<?php echo (($boodata['edition'])?$boodata['edition']:""); ?>">
						<span class="text-danger"><?php echo form_error('edition'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="Price" class="control-label">Price</label>
						<input type="text" class="form-control" id="price" name="price" placeholder="Price" value="<?php echo (($boodata['price'])?$boodata['price']:""); ?>">
						<span class="text-danger"><?php echo form_error('price'); ?></span>
					</div>
					<div class="col-sm-6 form-group">
						<label for="Binding" class="control-label">Binding</label>
						<input type="text" class="form-control" id="binding" name="binding" placeholder="Binding" value="<?php echo (($boodata['binding'])?$boodata['binding']:""); ?>">
						<span class="text-danger"><?php echo form_error('binding'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="Publisher" class="control-label">Publisher</label>
						<input type="text" class="form-control" id="publisher" name="publisher" placeholder="Publisher" value="<?php echo (($boodata['publisher'])?$boodata['publisher']:""); ?>">
						<span class="text-danger"><?php echo form_error('publisher'); ?></span>
					</div>
					<div class="col-sm-6 form-group">
						<label for="Published" class="control-label">Published date</label>
						<input type="text" class="form-control" id="published" name="published" placeholder="Published" value="<?php echo (($boodata['published'] && $boodata['published'] !="0000-00-00")?$this->utilities->showDateForSpecificTimeZone($boodata['published'],'m-d-Y'):""); ?>">
						<span class="text-danger"><?php echo form_error('published'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="copyright_year" class="control-label">Copyright year</label>
						<input type="text" class="form-control" id="copyear" name="copyright_year" placeholder="Copyright year" value="<?php echo (($boodata['copyright_year'] && $boodata['copyright_year']!="0000")?$boodata['copyright_year']:""); ?>">
						<span class="text-danger"><?php echo form_error('copyear'); ?></span>
					</div>
					<div class="col-sm-6 form-group">
						<label for="full_name_id" class="control-label">Condition of book</label>
						<select placeholder="Condition" class="form-control" id="condition" name="condition">
							<option value="">Select Condition</option>
							<option value="1" <?php echo (($boodata['condition']=='1')?"selected":"")?>>New</option>
							<option value="2" <?php echo (($boodata['condition']=='2')?"selected":"")?>>Like new</option>
							<option value="3" <?php echo (($boodata['condition']=='3')?"selected":"")?>>Very good</option>
							<option value="4" <?php echo (($boodata['condition']=='4')?"selected":"")?>>Good</option>
							<option value="5" <?php echo (($boodata['condition']=='5')?"selected":"")?>>Acceptable</option>
						</select>
						<span class="text-danger"><?php echo form_error('condition'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="Size" class="control-label">Size</label>
						<input type="text" class="form-control" id="size" name="size" placeholder="Length X Width X Depth in CM" value="<?php echo (($boodata['size'])?$boodata['size']:""); ?>">
						<span class="text-danger"><?php echo form_error('size'); ?></span>
					</div>
					<div class="col-sm-6 form-group">
						<label for="Pages" class="control-label">Pages</label>
						<input type="text" class="form-control" id="pages" name="pages" placeholder="Pages" value="<?php echo (($boodata['pages'])?$boodata['pages']:""); ?>">
						<span class="text-danger"><?php echo form_error('pages'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="Weight " class="control-label">Weight</label>
						<input type="text" class="form-control" id="weight " name="weight" placeholder="pound (lb)" value="<?php echo (($boodata['weight'])?$boodata['weight']:""); ?>">
						<span class="text-danger"><?php echo form_error('weight'); ?></span>
					</div>
					<div class="col-sm-6 form-group">
						<label for="Language" class="control-label">Language</label>
						<select placeholder="Language" class="form-control" id="language" name="language">
							<option value="1" <?php echo (($boodata['language']=='1')?"language":"")?>>English</option>
						</select>
						<span class="text-danger"><?php echo form_error('language'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-6 form-group">
						<label for="Discount" class="control-label">Discount</label>
						<input type="text" class="form-control" id="discount " name="discount" placeholder="Discount %" value="<?php echo (($boodata['discount'])?$boodata['discount']:""); ?>">
						<span class="text-danger"><?php echo form_error('discount'); ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-9 form-group">
					<label for="Description" class="control-label">Description</label>
					<textarea class="form-control" rows="6" id="discription" name="discription"><?php echo $boodata['discription']; ?></textarea>
						<span class="text-danger"><?php echo form_error('discription'); ?></span>
					</div>
					<div class="col-sm-3 form-group">
					<label for="website" class="control-label">&nbsp;</label>
						<div class="phpto-area" style="padding: 0;">
							<span class="imgarea">
								<span id="img-close" class="img-close" style="top: 12px;">x</span><img class="backup_picture" src="<?php echo base_url('uploads/booksimg/'.$boodata['image']);?>" alt="<?php echo $boodata['image']; ?>" width="100%"/>
							</span>
							<span class="prog-comp-body">
								<span class="prog-comp-inner"></span>
							</span>
						</div>
						<input type="hidden" name="image" id="imgname" value="<?php echo $boodata['image']; ?>"/>
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