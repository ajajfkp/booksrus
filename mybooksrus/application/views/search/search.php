</header>
<section class="well5 bg-alt">
<div class="container">
	<div class="search-container su-frm-bcgrnd">
		<div class="row">
			<div class="col-sm-12">
				<h2>Search results for "<?php echo $searchby; ?>"</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
			<?php $attributes = array("name" => "searchform","method"=>"get","class"=>"form-horizontal");
					echo form_open("search", $attributes);?>
				<div class="form-group">
					<div class="col-lg-6 col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-home"></i>
							</span>
							<select name="state" class="form-control selectpicker" onchange="getUniListByStateId(this)" >
								<?php 
									$stateOption = '<option value="">Select State</option>';
									if($listState){
										foreach($listState as $states){
											$stateOption.="<option value='". $states->id ."'" . (($states->id == $state )?'selected':'') . ">".$states->name."</option>";
										}
									}
									echo $stateOption;
								?>
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
							<select name="university" id="university" class="form-control selectpicker">
								<?php
									$stateOption = '<option value="">Select University</option>';
									if($univList){
										foreach($univList as $univ){
											$stateOption.="<option value='". $univ->id ."'" . (($univ->id == $university )?'selected':'') . ">".$univ->name."</option>";
										}
									}
									echo $stateOption;
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-12 col-md-12">
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
			<?php echo form_close(); ?>
		</div>
		</div>
		<div class="row search-paging-head">
			<div class="col-sm-12 pull-right" style="margin-top:13px;">
			<?php
				if($links){
					echo $links;
				}
			?>
			</div>
		</div>
		<div class="row">
	<?php 
		if($getBooks){
			foreach($getBooks as $bookdata){
	?>	<div class="col-sm-6 thumbnail">
			<div class="list-book-cntnr" style="min-height:325px">
				<div class="img-cntnr col-lg-4">
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
				<div class="col-lg-8 disc-area bookthumb">
					<div class="caption">
						<h3><?php echo (($bookdata['title'])?$bookdata['title']:'Title'); ?></h3>
						<span class="posted-date">
							<i class="glyphicon glyphicon-time"></i>
							<i><?php echo $this->utilities->getBookPostedDate($bookdata['bookid']); ?></i>
						</span>
						<dl>
							<dt>By:</dt>
							<dd><a href="<?php echo base_url('search?university='.$university.'&state='.$state.'&search='.$bookdata['authors'])?>"><?php echo (($bookdata['authors'])?$bookdata['authors']:''); ?></a></dd>
							<dt>ISBN 10:</dt>
							<dd><?php echo (($bookdata['isbn10'])?$bookdata['isbn10']:'&nbsp;'); ?></dd>
							<dt>ISBN 13:</dt>
							<dd><?php echo (($bookdata['isbn13'])?$bookdata['isbn13']:'&nbsp;'); ?></dd>
							<dt>Edition:</dt>
							<dd><?php echo (($bookdata['edition'])?$bookdata['edition']:'&nbsp;'); ?></dd>
							<dt>Price:</dt>
							<dd>$ <?php echo $this->utilities->getDiscountPrice($bookdata['price'],$bookdata['discount']); ?>
							<?php
							if($bookdata['discount']){
								echo ' - <span class="orig-price">$'.$this->utilities->getFormatedPrice($bookdata['price']).' ('.$bookdata['discount'].'% off)</span>';
							}
							?></dd>
						</dl>
						<a href="<?php echo base_url('postyouradd/bookdetails/'.$bookdata['bookid'].'/'.$this->utilities->cleanurl($bookdata['title'])); ?>" class="btn btn-md btn-primary">view details</a>
					</div>
				</div>
			</div>
			<!--<div class="divider"></div>-->
		</div>
	<?php 
			}
		}else{
	?>
	<h2>Book not found</h2>
	<?php
		}
	?>
		</div>
		<div class="row search-paging-head">
			<div class="col-sm-12 pull-right" style="margin-top:13px;">
			<?php
				if($links){
					echo $links;
				}
			?>
			</div>
		</div>
	</div>
</section>