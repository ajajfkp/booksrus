<?php 
	if($booksdata){
		foreach($booksdata as $bookdata){
?>
	<div class="row list-book-cntnr">
		<div class="img-cntnr col-lg-4">
			<img src="<?php echo base_url('uploads/booksimg/'.$bookdata['image']) ;?>" alt="book image" width="100%"/>
		</div>
		<div class="col-lg-8 disc-area">
			<h3><?php echo (($bookdata['title'])?$bookdata['title']:'Title'); ?></h3>
			<p>By - <?php echo (($bookdata['authors'])?$bookdata['authors']:'Authors'); ?></p>
			<p>$ <?php echo $this->utilities->getDiscountPrice($bookdata['price'],$bookdata['discount']); ?>
			<?php
			if($bookdata['discount']){
				echo ' - <span class="orig-price">$'.$this->utilities->getFormatedPrice($bookdata['price']).' ('.$bookdata['discount'].'% off)</span>';
			}
			?>
			</p>
			<p><a href="<?php echo base_url('postyouradd/bookdetails/'.$bookdata['bookid'].'/'.$this->utilities->cleanurl($bookdata['title'])); ?>" class="btn btn-md btn-primary">view details</a></p>
		</div>
	</div>
	<div class="divider"></div>
<?php 
		}
	}
?>