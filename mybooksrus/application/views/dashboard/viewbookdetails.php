<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-lg-5">
				<h5>
					<b>View Book Details</b>
				</h5>
			</div>
			<div class="col-lg-7">
				<span class="contact-ppl-count">
					<?php echo (($contactCnt)?$contactCnt:''); ?>
				</span>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-12">
				<h4><?php echo $boodata['title']; ?></h4>
			</div>
		</div>
		<div class="row list-book-cntnr">
			<div class="img-cntnr col-lg-5">
				<img class="backup_picture" src="<?php echo base_url('uploads/booksimg/'.$boodata['image']) ;?>" alt="book image" height="200px"/>
			</div>
			<div class="col-lg-7 disc-area">
				<p><b>ISBN10 - </b><?php echo (($boodata['isbn10'])?$boodata['isbn10']:''); ?></p>
				<p><b>ISBN13 - </b><?php echo (($boodata['isbn13'])?$boodata['isbn13']:''); ?></p>
				<p><b>Edition - </b><?php echo (($boodata['edition'])?$boodata['edition']:''); ?></p>
				<p><b>Authors - </b><?php echo (($boodata['authors'])?$boodata['authors']:''); ?></p>
				<p><b>List price - </b><?php echo (($boodata['price'])?'$'.$this->utilities->getFormatedPrice($boodata['price']):''); ?></p>
				<p><b>Binding - </b><?php echo (($boodata['binding'])?$boodata['binding']:''); ?></p>
				<p><b>Publisher - </b><?php echo (($boodata['publisher'])?$boodata['publisher']:''); ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<p><b>Published - </b><?php echo (($boodata['published'] && $boodata['published']!='0000-00-00')?$this->utilities->showDateForSpecificTimeZone($boodata['published'],'m-d-Y'):''); ?></p>
				<p><b>Copyright year - </b><?php echo (($boodata['copyright_year'] && $boodata['copyright_year']!='0000')?$boodata['copyright_year']:''); ?></p>
				<p><b>Pages - </b><?php echo (($boodata['pages'])?$boodata['pages']:''); ?></p>
				<p><b>Size - </b><?php echo (($boodata['size'])?$boodata['size']:''); ?></p>
				<p><b>Weight - </b><?php echo (($boodata['weight'])?$boodata['weight']:''); ?></p>
				<p><b>Language - </b><?php echo (($boodata['langs'])?$boodata['langs']:''); ?></p>
				<p><b>Condition - </b><?php echo (($boodata['conditions'])?$boodata['conditions']:''); ?></p>
				<p><b>Description - </b><?php echo (($boodata['discription'])?$boodata['discription']:''); ?></p>
				<p>
				<?php
				if($boodata['added_by'] == $this->utilities->getSessionUserData('uid')){
				?>
				<a href="<?php echo base_url('postyouradd/updatebookform/'.$boodata['bookid']."/".$this->utilities->cleanurl($boodata['title'])); ?>" class="btn btn-md btn-primary pull-right"> View & Update</a>
				<?php
				}else{
				?>
					<div class="panel panel-default">
						<div class="panel-body">
							<?php $attributes = array("name" => "sendtoseller","method"=>"post","class"=>"form-horizontal");
								echo form_open("users/messagetosellar/".$boodata['bookid'], $attributes);?>
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