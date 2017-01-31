 <div class="well">
	<h2><i class="glyphicon glyphicon-credit-card" style="font-size: 25px;"></i> Search Books</h2>
	<div id="custom-search-input">
	<form action="<?php echo base_url('/search/searchbooks');?>">
		<div class="input-group col-md-12">
			<input type="text" class="form-control input-lg" placeholder="Search by title, author, or ISBN" id="inputsearch" name="inputsearch" onkeyup="booksearchkeyup();" value="<?php echo (isset($inputsearch)?$inputsearch:"")?>"/>
			<span class="input-group-btn">
				<button class="btn btn-info btn-lg" type="submit" onclick="booksearch();">
					<i class="glyphicon glyphicon-search"></i>
				</button>
			</span>
			<!--<span class="" id="innersearchdd"></span>-->
		</div>
		<p class="inner-serch-ino">What's an ISBN?
		<a href="#">
          <span class="glyphicon glyphicon-info-sign"></span>
        </a>
		</p>
		</form>
	</div>	
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Search results</h4>
	</div>
	<div class="panel-body" id="innersearchres">
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
			<p>ISBN 10 - <?php echo (($bookdata['isbn10'])?$bookdata['isbn10']:''); ?></p>
			<p>ISBN 13 - <?php echo (($bookdata['isbn13'])?$bookdata['isbn13']:''); ?></p>
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
	</div>
</div>


</div>
<!--/col-->