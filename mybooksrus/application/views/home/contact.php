</header>
<div class="contact-maps">
	<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14012.535153058392!2d77.34967065000001!3d28.595762949999997!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1483826702883" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<section id="contact" class="content-section text-center">
	<div class="contact-section">
		<div class='container'>
			<div class='row'>
				<div class='col-sm-10 col-sm-offset-1' style="margin-top:50px;">
					<h3 style="margin-bottom: 20px;">Contact Us</h3>
					<div class='well'>
						<?php //$attributes = array("name" => "contact");
						//echo form_open("index/contactus", $attributes);?>
							<div class='row'>
								<div class='col-sm-4'>
									<div class='form-group text-left'>
										<label for='name'>Name*</label>
										<input type='text' name='name' id='name' class='form-control' value="<?php echo set_value('name'); ?>" />
										<span class="text-danger"><?php echo form_error('name'); ?></span>
										<span class="text-danger" id="name_error"></span>
									</div>
									<div class='form-group text-left'>
										<label for='email'>Email*</label>
										<input type='text' name='email' id='email' class='form-control' value="<?php echo set_value('email'); ?>" />
										<span class="text-danger"><?php echo form_error('email'); ?></span>
										<span class="text-danger" id="email_error"></span>
									</div>
									<div class='form-group text-left'>
										<label for='subject'>Subject</label>
										<input type='text' name='subject' id='subject' class='form-control' value="<?php echo set_value('subject'); ?>"/>
										<span class="text-danger"><?php echo form_error('subject'); ?></span>
										<span class="text-danger" id="subject_error"></span>
									</div>
									<div class='form-group text-left'>
										<div class="g-recaptcha" data-sitekey="<?php echo RE_CAPTCHA_SITEKEY; ?>" style="transform:scale(0.90);-webkit-transform:scale(0.90);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
									</div>
								</div>
								<div class='col-sm-8'>
									<div class='form-group text-left'>
										<label for='message'>Message</label>
										<textarea class='form-control' name='message' id='message' rows='11'><?php echo set_value('message'); ?></textarea>
										<span class="text-danger"><?php echo form_error('message'); ?></span>
										<span class="text-danger" id="message_error"></span>
									</div>
									<div class="wow">
										<div class="col-sm-8">
											<div class='text-left' id="flagmsg">
												<?php echo $this->session->flashdata('msg'); ?>
											</div>
										</div>
										<div class="col-sm-4">
											<div class='text-right'>
												<button class='btn btn-primary' onclick="contactWithUs();">Send</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php //echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>