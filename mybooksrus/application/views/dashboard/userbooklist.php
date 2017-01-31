<nav class="navbar navbar-default" role="navigation" style="min-height: 0;border-radius: 5px;">
	<a class="btn btn-lg btn-success" href="<?php echo base_url('postyouradd'); ?>">
		<i class="glyphicon glyphicon-plus"></i>&nbsp;Post your AD
	</a>
</nav>
<hr />

<div class="panel">
	<ul class="nav nav-tabs" id="myTab">
		<li class="active"><a href="#yourad" data-toggle="tab">Your Ad</a></li>
		<li><a href="#yourbying" data-toggle="tab">Your bying</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="yourad">
			<?php 
				if($userbooks){
					foreach($userbooks as $userbook){
			?>
				<div class="row list-book-cntnr">
					<div class="img-cntnr col-lg-4">
						<img src="<?php echo base_url('uploads/booksimg/'.$userbook['image']) ;?>" alt="book image" width="100%"/>
					</div>
					<div class="col-lg-8 disc-area">
						<h3><?php echo (($userbook['title'])?$userbook['title']:'Title'); ?></h3>
						<p>By - <?php echo (($userbook['authors'])?$userbook['authors']:'Authors'); ?></p>
						<p>ISBN 10 - <?php echo (($userbook['isbn10'])?$userbook['isbn10']:''); ?></p>
						<p>ISBN 13 - <?php echo (($userbook['isbn13'])?$userbook['isbn13']:''); ?></p>
						<p>$ <?php echo $this->utilities->getDiscountPrice($userbook['price'],$userbook['discount']); ?>
						<?php
						if($userbook['discount']){
							echo ' - <span class="orig-price">$'.$this->utilities->getFormatedPrice($userbook['price']).' ('.$userbook['discount'].'% off)</span>';
						}
						?>
						</p>
						<p><a href="<?php echo base_url('postyouradd/bookdetails/'.$userbook['bookid'].'/'.$this->utilities->cleanurl($userbook['title'])); ?>" class="btn btn-md btn-primary">view & update</a></p>
					</div>
				</div>
				<div class="divider"></div>
			<?php 
					}
				}
			?>
		</div>
		<div class="tab-pane" id="yourbying">
			<?php 
				if($userbuybooks){
					foreach($userbuybooks as $userbuybook){
			?>
				<div class="row list-book-cntnr">
					<div class="img-cntnr col-lg-4">
						<img src="<?php echo base_url('uploads/booksimg/'.$userbuybook['image']) ;?>" alt="book image" width="100%"/>
					</div>
					<div class="col-lg-8 disc-area">
						<h3><?php echo (($userbuybook['title'])?$userbuybook['title']:'Title'); ?></h3>
						<p>By - <?php echo (($userbuybook['authors'])?$userbuybook['authors']:'Authors'); ?></p>
						<p>ISBN 10 - <?php echo (($userbuybook['isbn10'])?$userbuybook['isbn10']:''); ?></p>
						<p>ISBN 13 - <?php echo (($userbuybook['isbn13'])?$userbuybook['isbn13']:''); ?></p>
						<p>$ <?php echo $this->utilities->getDiscountPrice($userbuybook['price'],$userbuybook['discount']); ?>
						<?php
						if($userbuybook['discount']){
							echo ' - <span class="orig-price">$'.$this->utilities->getFormatedPrice($userbuybook['price']).' ('.$userbuybook['discount'].'% off)</span>';
						}
						?>
						</p>
						<p><a href="<?php echo base_url('postyouradd/bookdetails/'.$userbuybook['bookid'].'/'.$this->utilities->cleanurl($userbuybook['title'])); ?>" class="btn btn-md btn-primary">view & update</a></p>
					</div>
				</div>
				<div class="divider"></div>
			<?php 
					}
				}else{
			?>
				<div class="text-center cleart10">
					No books found
				</div>
			<?php
				}
			?>
		</div>
	</div>
</div>
</div>