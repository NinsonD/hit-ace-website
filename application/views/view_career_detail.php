<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_contact']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1><?php echo $career['position_name']; ?></h1>
		</div>
	</div>
</div>

<div class="career-detail-area pt-30 pb-60">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="career-detail-content">
					<h2><?php echo $career['position_name']; ?></h2>
					
					<div class="career-meta" style="margin: 20px 0; padding: 15px; background-color: #f5f5f5; border-radius: 5px;">
						<p><strong>Department:</strong> <?php echo $career['department']; ?></p>
						<p><strong>Location:</strong> <?php echo $career['location']; ?></p>
						<p><strong>Job Type:</strong> <?php echo $career['job_type']; ?></p>
						<p><strong>Experience Required:</strong> <?php echo $career['experience_required']; ?></p>
						<?php if(!empty($career['salary_range'])): ?>
						<p><strong>Salary Range:</strong> <?php echo $career['salary_range']; ?></p>
						<?php endif; ?>
						<p><strong>Number of Positions:</strong> <?php echo $career['number_of_positions']; ?></p>
					</div>

					<h3>Job Description</h3>
					<div class="job-description">
						<?php echo nl2br($career['job_description']); ?>
					</div>

					<div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd;">
						<a href="<?php echo base_url(); ?>contact" class="btn btn-success">Apply Now</a>
						<a href="javascript:history.back()" class="btn btn-default" style="margin-left: 10px;">Back to Careers</a>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="sidebar">
					<div class="widget" style="border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; border-radius: 5px;">
						<h4>Apply for this position</h4>
						<p>To apply for this position, please contact us using the form on our contact page or send your CV to our HR department.</p>
						<a href="<?php echo base_url(); ?>contact" class="btn btn-success btn-block" style="margin-top: 15px;">Send Application</a>
					</div>

					<div class="widget" style="border: 1px solid #ddd; padding: 20px; border-radius: 5px;">
						<h4>More Opportunities</h4>
						<p><a href="<?php echo base_url(); ?>career">View all open positions</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
