<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-lg-4">
				<h5>
					<b>View Book Details</b>
				</h5>
			</div>
			<div class="col-lg-6">
				<span class="contact-ppl-count">
					<?php echo (($contactCnt)?$contactCnt:''); ?>
				</span>
			</div>
			<div class="col-lg-2">
				<a class="btn btn-primary" href="<?php echo base_url('search/searchbooks');?>">
					Back
				</a>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-12">
				<h4><?php echo $bookdata['title']; ?></h4>
			</div>
		</div>
		<div class="row list-book-cntnr">
			<div class="img-cntnr col-lg-5">
				<?php
					if($bookdata['image']){
				?>
					<img class='backup_picture' src="<?php echo base_url('uploads/booksimg/'.$bookdata['image']) ;?>" alt="Book image" style="height:200px;width:150px;"/>
				<?php } else{ ?>
					<img class='backup_picture' src="<?php echo base_url('assets/images/no_book avalaible.jpg') ;?>" alt="Book image" style="height:200px;width:150px;"/>
				<?php
					}
				?>
			</div>
			<div class="col-lg-7 disc-area">
				<p><b>ISBN10 - </b><?php echo (($bookdata['isbn10'])?$bookdata['isbn10']:''); ?></p>
				<p><b>ISBN13 - </b><?php echo (($bookdata['isbn13'])?$bookdata['isbn13']:''); ?></p>
				<p><b>Edition - </b><?php echo (($bookdata['edition'])?$bookdata['edition']:''); ?></p>
				<p><b>Authors - </b><?php echo (($bookdata['authors'])?$bookdata['authors']:''); ?></p>
				<p><b>List price - </b><?php echo (($bookdata['price'])?'$'.$this->utilities->getFormatedPrice($bookdata['price']):''); ?></p>
				<p><b>Binding - </b><?php echo (($bookdata['binding'])?$bookdata['binding']:''); ?></p>
				<p><b>Publisher - </b><?php echo (($bookdata['publisher'])?$bookdata['publisher']:''); ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<p><b>Published - </b><?php echo (($bookdata['published'] && $bookdata['published']!='0000-00-00')?$this->utilities->showDateForSpecificTimeZone($bookdata['published'],'m-d-Y'):''); ?></p>
				<p><b>Copyright year - </b><?php echo (($bookdata['copyright_year'] && $bookdata['copyright_year']!='0000')?$bookdata['copyright_year']:''); ?></p>
				<p><b>Pages - </b><?php echo (($bookdata['pages'])?$bookdata['pages']:''); ?></p>
				<p><b>Size - </b><?php echo (($bookdata['size'])?$bookdata['size']:''); ?></p>
				<p><b>Weight - </b><?php echo (($bookdata['weight'])?$bookdata['weight']:''); ?></p>
				<p><b>Language - </b><?php echo (($bookdata['langs'])?$bookdata['langs']:''); ?></p>
				<p><b>Condition - </b><?php echo (($bookdata['conditions'])?$bookdata['conditions']:''); ?></p>
				<p><b>Description - </b><?php echo (($bookdata['discription'])?$bookdata['discription']:''); ?></p>
				<p>
				<?php
				if($bookdata['added_by'] == $this->utilities->getSessionUserData('uid')){
				?>
				<a href="<?php echo base_url('postyouradd/updatebookform/'.$bookdata['bookid']."/".$this->utilities->cleanurl($bookdata['title'])); ?>" class="btn btn-md btn-primary pull-right"> View & Update</a>
				<?php
				}else{
				?>
					<div class="panel panel-default">
						<div class="panel-body">
							<?php $attributes = array("name" => "sendtoseller","method"=>"post","class"=>"form-horizontal");
								echo form_open("users/messagetosellar/".$bookdata['bookid'], $attributes);?>
							<!--<form class="form form-vertical">-->
								<div class="control-group">
									<label>Message to seller</label>
									<div class="controls">
										<textarea class="form-control" placeholder="Type your message here..." id="message" name="message"></textarea>
										<span class="text-danger"><?php echo form_error('message'); ?></span>
									</div>
								</div>
								<div class="control-group pull-right">
									<label></label>
									<div class="controls">
										<button type="submit" class="btn btn-primary">
										Send <i class="glyphicon glyphicon-send"></i>
										</button>
									</div>
								</div>
							</form>
						</div>
						<!--/panel content-->
					</div>
				<?php
				}
				?>
				</p>
			</div>
		</div>
	</div>
</div>
</div>