<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_contact']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1><?php echo $page['contact_heading']; ?></h1>
		</div>
	</div>
</div>

<div class="contact-area pt-30 pb-60">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h4><?php echo CONTACT_US_PAGE_FORM_HEADING_TEXT; ?></h4>
				<div class="contact-form">
					<?php
					if(!empty($error))
					{
						echo '<div class="error">';
						echo $error;
						echo '</div>';
					} 
					if(!empty($success))
					{
						echo '<div class="success">';
						echo $success;
						echo '</div>';
					}
					?>
					<?php echo form_open_multipart(base_url().'contact'); ?>
						<div class="form-group">
							<label for=""><?php echo NAME; ?></label>
							<?php
								$data = array(
									'type'         => 'text',
									'name'         => 'visitor_name',
									'class'        => 'form-control',
									'autocomplete' => 'off'
								);
								echo form_input($data);
							?>
						</div>
						<div class="form-group">
							<label for=""><?php echo EMAIL_ADDRESS; ?></label>
							<?php
								$data = array(
									'type'         => 'email',
									'name'         => 'visitor_email',
									'class'        => 'form-control',
									'autocomplete' => 'off'
								);
								echo form_input($data);
							?>
						</div>
						<div class="form-group">
							<label for=""><?php echo PHONE; ?></label>
							<?php
								$data = array(
									'type'         => 'text',
									'name'         => 'visitor_phone',
									'class'        => 'form-control',
									'autocomplete' => 'off'
								);
								echo form_input($data);
							?>
						</div>
						<div class="form-group">
							<label for=""><?php echo MESSAGE; ?></label>
							<?php
								$data = array(
							        'name'  => 'visitor_comment',
							        'class' => 'form-control'
								);
								echo form_textarea($data);
							?>
						</div>
						<div class="form-group">
							<label for="">Attachment (Optional)</label>
							<input type="file" name="attachment" class="form-control" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.txt">
							<small class="form-text text-muted">Allowed formats: PDF, DOC, DOCX, JPG, JPEG, PNG, TXT. Max size: 5MB</small>
						</div>
						<?php
							$data = array(
								'name'    => 'form_contact',
								'class'   => 'btn btn-success',
								'type'    => 'submit',
								'content' => SEND_MESSAGE
							);
							echo form_button($data);
						?>
					<?php echo form_close(); ?>
				</div>						
			</div>
			<div class="col-md-6">
				<h4><?php echo FIND_US_ON_MAP; ?></h4>
				<div class="map-area">
					<div class="company-info-box" style="background-color: #f8f9fa; padding: 15px; margin-bottom: 15px; border-left: 4px solid #007bff; border-radius: 4px;">
						<h5 style="margin-top: 0; color: #333;">HITACE OPERATION AND MAINTENANCE SERVICES FOR OIL AND GAS INDUSTRY FACILITIES LLC</h5>
						<p style="margin: 8px 0; color: #555;">
							<strong><i class="fa fa-map-marker"></i> Address:</strong> 15th Floor, Dar Al Salam Building, Liwa Street, Corniche, Abu Dhabi - U.A.E.
						</p>
						<p style="margin: 8px 0; color: #555;">
							<strong><i class="fa fa-phone"></i> Tel.:</strong> +97126660049
						</p>
					</div>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3604.381185902399!2d55.96957487604924!3d25.392047977586074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ef5c770885add6f%3A0x6f590dfc93424acc!2sHIT%20ACE%20MULTI%20FAB%20INDUSTRIES!5e0!3m2!1sen!2sae!4v1775283062850!5m2!1sen!2sae" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Associates Section -->
<div class="branches-area pt-60 pb-60">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title text-center">
					<h2>Our Associates</h2>
					<p>Find us at our convenient locations</p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach($branches as $branch): ?>
			<div class="col-md-4 col-sm-6">
				<div class="branch-item">
					<div class="branch-info">
						<h4><?php echo $branch['name']; ?></h4>
						<div class="branch-details">
							<p><i class="fa fa-map-marker"></i> <?php echo $branch['address']; ?></p>
							<?php if(!empty($branch['phone'])): ?>
							<p><i class="fa fa-phone"></i> <?php echo $branch['phone']; ?></p>
							<?php endif; ?>
							<?php if(!empty($branch['email'])): ?>
							<p><i class="fa fa-envelope"></i> <?php echo $branch['email']; ?></p>
							<?php endif; ?>
						</div>
					</div>
					<?php if(!empty($branch['map_iframe'])): ?>
					<div class="branch-map">
						<?php echo $branch['map_iframe']; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<!-- Career Section -->
<div class="career-section ptb-60" style="background-color: #f9f9f9;">
	<div class="container">
		<div class="row mb-30">
			<div class="col-md-12">
				<div class="headline">
					<div class="headline-shadow">
						<h2>Career Opportunities</h2>
						<p>Join Our Team and Grow Your Career With Us</p>
					</div>
				</div>
			</div>
		</div>

		<?php if(!empty($career)): ?>
		<div class="row">
			<?php foreach($career as $job): ?>
			<div class="col-md-6 col-sm-12" style="margin-bottom: 20px;">
				<div class="career-item" style="border: 1px solid #ddd; padding: 20px; border-radius: 5px; height: 100%;">
					<h4 style="color: #4172a5; margin-bottom: 10px;"><?php echo $job['position_name']; ?></h4>
					<div style="margin-bottom: 10px;">
						<p><strong>Department:</strong> <?php echo $job['department']; ?></p>
						<p><strong>Location:</strong> <?php echo $job['location']; ?></p>
						<p><strong>Job Type:</strong> <?php echo $job['job_type']; ?></p>
						<p><strong>Experience Required:</strong> <?php echo $job['experience_required']; ?></p>
						<?php if(!empty($job['salary_range'])): ?>
						<p><strong>Salary:</strong> <?php echo $job['salary_range']; ?></p>
						<?php endif; ?>
						<p><strong>Openings:</strong> <?php echo $job['number_of_positions']; ?></p>
					</div>
					<a href="<?php echo base_url(); ?>career/view/<?php echo $job['id']; ?>" class="btn btn-primary" style="margin-top: 10px;">View Details</a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php else: ?>
		<div class="row">
			<div class="col-md-12">
				<p style="text-align: center; color: #666; padding: 40px 0;">Currently, there are no open positions available. Please check back soon!</p>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>