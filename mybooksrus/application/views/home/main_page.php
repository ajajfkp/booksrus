<div class="jumbotron">
		<div class="container">
		<p><h1>WELCOME</h1></p>
		<p><h1>TO</h1></p>
		<p><h1>COLLEGEBOOKS'R'US</h1></p>
		<p class="lead">BUY TEXT BOOKS FROM AND SELL TO STUDENTS FROM YOUR SCHOOL</p>
			<p>
				<div class="container">
					<div class="row">
						<form action="<?php echo base_url('search'); ?>" name="searchform" method="get" class="form-horizontal" accept-charset="utf-8">
							<div class="form-group">
								<div class="col-lg-8 col-lg-offset-2">
									<div class="row">
										<div class="col-lg-6 col-md-6" style="margin-bottom:10px;">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
												<select name="state" class="form-control selectpicker"  onchange="javascript:getUniListByStateId(this,0);" >
													<option value="">Select State</option>
													<option value='3926'>Colorado</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-home"></i>
												</span>
												<select name="university" id="university" class="form-control selectpicker">
													<option value="">Select School</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-8 col-lg-offset-2">
									<div class="row" style="margin:0 0;">
										<div class="input-group">
											<input type="text" name="search" class="search-query form-control" placeholder="Search by Books name, ISBN, Author, university" id="searchInput" value="" style="height:60px;z-index:0;"/>
											<span class="input-group-btn">
												<button class="btn btn-danger" type="submit" id="searchButton" style="height:60px;width:60px;z-index:0;">
													<span class=" glyphicon glyphicon-search"></span>
												</button>
											</span>
										</div>
									</div>
								</div>
							</div>
						</form>		
					</div>
				</div>
			</p>
		</div>
	</div>
</header>
<main>
	<section class="well6 bg-alt">
		<div class="container center767">
			<h2 class="text-center">Featured Books</h2>
			<div class="row">
			<?php
				$bookDetails = $this->utilities->getFeaturedBooks();
				if($bookDetails){
					foreach($bookDetails as $bookDetail){
			?>
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="2s">
					<div class="thumbnail">
					
						<a href="#">
						<?php
							if($bookDetail['image']){
						?>
							<img class='backup_picture' src="<?php echo base_url('uploads/booksimg/'.$bookDetail['image']) ;?>" alt="Book image" style="height:200px;width:150px;"/>
						<?php } else{ ?>
							<img class='backup_picture' src="<?php echo base_url('assets/images/no_book avalaible.jpg') ;?>" alt="Book image" style="height:200px;width:150px;"/>
						<?php
							}
						?>
						</a>
						<div class="caption">
							<h5><?php echo ((strlen($bookDetail['name'])>20)?substr($bookDetail['name'],0,20)."...":$bookDetail['name']);?></h5>
							<span class="posted-date">
							<i class="glyphicon glyphicon-time"></i>
							<i><?php echo $this->utilities->getBookPostedDate($bookDetail['id']); ?></i>
							</span>
							<dl>
								<dt>ISBN 10:</dt>
								<dd><?php echo (($bookDetail['isbn10'])?$bookDetail['isbn10'] : '&nbsp;'); ?></dd>
								<dt>ISBN 13:</dt>
								<dd><?php echo (($bookDetail['isbn13'])?$bookDetail['isbn13'] : '&nbsp;'); ?></dd>
								<dt>Author(s):</dt>
								<dd><?php echo (($bookDetail['authors'])?((strlen($bookDetail['authors'])>25)?substr($bookDetail['authors'],0,20)."...":$bookDetail['authors']) : '&nbsp;'); ?></dd>
								<dt>Edition:</dt>
								<dd><?php echo (($bookDetail['edition'])?((strlen($bookDetail['edition'])>25)?substr($bookDetail['edition'],0,20)."...":$bookDetail['edition']) : '&nbsp;'); ?></dd>
								<!--<dt>Price:</dt>
								<dd><?php echo "$ ".(($bookDetail['price'])?$bookDetail['price'] : '&nbsp;'); ?></dd>-->
							</dl>
							<a href="<?php echo base_url('postyouradd/bookdetails/'.$bookDetail['id'].'/'.$this->utilities->cleanurl($bookDetail['title'])); ?>" class="btn btn-md btn-primary">view details</a>
						</div>
					</div>
				</div>
				<?php
					}
				}
				?>
			</div>
		</div>
	</section>
	<!--<section class="parallax">
		<div class="parallax_image" style="background-color: inherit; height: 500px; transform: translate3d(0px, -0.0310345px, 0px);">
		</div>
		<div class="parallax_cnt">
			<div class="container">
				<h2 class="text-center txt-clr1">About Us</h2>
				<ul class="row index-list">
					<li class="col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-clr1">
							<a href="#">Incididunt ut labore et dolore</a>
						</h5>
						<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
							laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
							voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet
							conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
							aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
						ex.</p>
					</li>
					<li class="col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-clr1"><a href="#">Incididunt ut labore et dolore</a></h5>
						<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
							laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
							voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet
							conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
							aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
							ex.
						</p>
					</li>
					<li class="col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-clr1"><a href="#">Incididunt ut labore et dolore</a></h5>
							<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
							laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
							voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet
							conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
							aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
							ex.</p>
					</li>
				</ul>
			</div>
		</div>
	</section>-->
</main>	