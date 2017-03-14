 <div class="well">
	<h2><i class="glyphicon glyphicon-credit-card" style="font-size: 25px;"></i> Search Books</h2>
	<div id="custom-search-input">
	<form action="<?php echo base_url('/search/searchbooks');?>">
		<div class="input-group col-md-12">
			<input type="text" class="form-control input-lg" placeholder="Search by title, author, or ISBN" id="inputsearch" name="inputsearch" onkeyup="booksearchkeyup();" value="<?php echo (isset($inputsearch)?$inputsearch:"")?>"/>
			<span class="input-group-btn">
				<button class="btn btn-info btn-lg" type="submit" onclickx="booksearch();">
					<i class="glyphicon glyphicon-search"></i>
				</button>
			</span>
			<!--<span class="" id="innersearchdd"></span>-->
		</div>
		<p class="inner-serch-ino">What's an ISBN?
		<a href="#" data-toggle="isbnpopover" title="ISBN" data-content="The International Standard Book Number (ISBN) is a unique numeric commercial book identifier.
An ISBN is assigned to each edition and variation (except reprintings) of a book. The ISBN is 13 digits long if assigned on or after 1 January 2007, and 10 digits long if assigned before 2007. The method of assigning an ISBN is nation-based and varies from country to country, often depending on how large the publishing industry is within a country.">
          <span class="glyphicon glyphicon-info-sign"></span>
        </a>
		</p>
		</form>
	</div>	
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-lg-6">
				<h4>Search results</h4>
			</div>
			<div class="col-lg-6">
				<span id="innersearch-paging">
					<?php
						if($links){
							echo $links;
						}
					?>
				</span>
			</div>
		</div>
	</div>
	<div class="panel-body" id="innersearchres">
		<?php 
	if($booksdata){
		foreach($booksdata as $bookdata){
?>
	<div class="row list-book-cntnr">
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
					<dd><a href="<?php echo base_url('search/searchbooks?inputsearch='.$bookdata['authors'])?>"><?php echo (($bookdata['authors'])?$bookdata['authors']:''); ?></a></dd>
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
	<div class="divider"></div>
<?php 
		}
	}else{
?>
<h2>Book not found</h2>
<?php		
	}
?>
	</div>
</div>


</div>
<!--/col-->