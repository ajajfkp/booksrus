<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-lg-4">
				<h5>
					View Book Details
				</h5>
				<span style="font-size: 11px; color: #777;">
				<i class="glyphicon glyphicon-time" style="font-size: 11px; color: #777;"></i> Poated at 7 Mar 2017 12:30pm
				</span>
			</div>
			<div class="col-lg-6">
				<span class="contact-ppl-count">
					<?php echo (($contactCnt)?$contactCnt:''); ?>
				</span>
			</div>
			<div class="col-lg-2" style="padding-left:35px;text-align: right;">
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
					<img class='backup_picture' src="<?php echo base_url('uploads/booksimg/'.$bookdata['image']) ;?>" alt="Book image" style="width:250px;"/>
				<?php } else{ ?>
					<img class='backup_picture' src="<?php echo base_url('assets/images/no_book avalaible.jpg') ;?>" alt="Book image" style="width:250px;"/>
				<?php
					}
				?>
			</div>
			<div class="col-lg-7 disc-area bookthumb">
				<div class="caption">
					<dl>
						<dt>ISBN 10:</dt>
						<dd><?php echo (($bookdata['isbn10'])?$bookdata['isbn10']:'&nbsp;'); ?></dd>
						<dt>ISBN 13:</dt>
						<dd><?php echo (($bookdata['isbn13'])?$bookdata['isbn13']:'&nbsp;'); ?></dd>
						<dt>Author(s):</dt>
						<dd><?php echo (($bookdata['authors'])?$bookdata['authors']:'&nbsp;'); ?></dd>
						<dt>Edition:</dt>
						<dd><?php echo (($bookdata['edition'])?$bookdata['edition']:'&nbsp;'); ?></dd>
						<dt>Price:</dt>
						<dd><?php echo (($bookdata['price'])?'$'.$this->utilities->getFormatedPrice($bookdata['price']):'&nbsp;'); ?></dd>
						<dt>Binding:</dt>
						<dd><?php echo (($bookdata['binding'])?$bookdata['binding']:'&nbsp;'); ?></dd>
						<dt>Publisher:</dt>
						<dd><?php echo (($bookdata['publisher'])?$bookdata['publisher']:'&nbsp;'); ?></dd>
						<dt>Published:</dt>
						<dd><?php echo (($bookdata['published'] && $bookdata['published']!='0000-00-00')?$this->utilities->showDateForSpecificTimeZone($bookdata['published'],'m-d-Y'):'&nbsp;'); ?></dd>
						<dt>Copyright year:</dt>
						<dd><?php echo (($bookdata['copyright_year'] && $bookdata['copyright_year']!='0000')?$bookdata['copyright_year']:'&nbsp;'); ?></dd>
						<dt>Pages:</dt>
						<dd><?php echo (($bookdata['pages'])?$bookdata['pages']:'&nbsp;'); ?></dd>
						<dt>Size:</dt>
						<dd><?php echo (($bookdata['size'])?$bookdata['size']." cm":'&nbsp;'); ?></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 bookthumb">
				<div class="caption">
					<dl>
						<dt>Weight:</dt>
						<dd><?php echo (($bookdata['weight'])?$bookdata['weight']:'&nbsp;'); ?></dd>
						<dt>Language:</dt>
						<dd><?php echo (($bookdata['langs'])?$bookdata['langs']:'&nbsp;'); ?></dd>
						<dt>Condition:</dt>
						<dd><?php echo (($bookdata['conditions'])?$bookdata['conditions']:'&nbsp;'); ?></dd>
					</dl>
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
</div>