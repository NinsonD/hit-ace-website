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
					<?php echo $setting['contact_map_iframe']; ?>
				</div>
			</div>
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