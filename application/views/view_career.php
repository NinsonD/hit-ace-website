<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_contact']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1>Career Opportunities</h1>
		</div>
	</div>
</div>

<div class="career-listing-area ptb-60">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="headline">
					<div class="headline-shadow">
						<h2>Join Our Team</h2>
						<p>Explore exciting career opportunities and grow with us</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row" style="margin-top: 30px; margin-bottom: 30px;">
			<div class="col-md-12">
				<form method="get" action="<?php echo base_url(); ?>career" class="career-search-form">
					<div class="input-group">
						<input type="text" name="search" class="form-control" placeholder="Search by position, department or location..." value="<?php echo isset($search) ? $search : ''; ?>">
						<span class="input-group-btn">
							<button class="btn btn-success" type="submit">Search</button>
						</span>
					</div>
				</form>
			</div>
		</div>

		<?php if(!empty($career)): ?>
		<div class="row">
			<?php foreach($career as $job): ?>
			<div class="col-md-6 col-sm-12" style="margin-bottom: 20px;">
				<div class="career-item" style="border: 1px solid #ddd; padding: 20px; border-radius: 5px; height: 100%; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
					<h4 style="color: #4172a5; margin-bottom: 10px;"><?php echo $job['position_name']; ?></h4>
					<div style="margin-bottom: 15px; color: #666;">
						<p style="margin: 5px 0;"><i class="fa fa-briefcase"></i> <strong>Department:</strong> <?php echo $job['department']; ?></p>
						<p style="margin: 5px 0;"><i class="fa fa-map-marker"></i> <strong>Location:</strong> <?php echo $job['location']; ?></p>
						<p style="margin: 5px 0;"><i class="fa fa-clock-o"></i> <strong>Type:</strong> <?php echo $job['job_type']; ?></p>
						<p style="margin: 5px 0;"><i class="fa fa-graduation-cap"></i> <strong>Experience:</strong> <?php echo $job['experience_required']; ?></p>
						<?php if(!empty($job['salary_range'])): ?>
						<p style="margin: 5px 0;"><i class="fa fa-money"></i> <strong>Salary:</strong> <?php echo $job['salary_range']; ?></p>
						<?php endif; ?>
						<p style="margin: 5px 0;"><i class="fa fa-users"></i> <strong>Positions:</strong> <?php echo $job['number_of_positions']; ?></p>
					</div>
					<a href="<?php echo base_url(); ?>career/view/<?php echo $job['id']; ?>" class="btn btn-primary">View Details & Apply</a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php else: ?>
		<div class="row">
			<div class="col-md-12">
				<div style="text-align: center; color: #666; padding: 60px 0; background-color: #f9f9f9; border-radius: 5px;">
					<h3>No Positions Available</h3>
					<p>Currently, there are no open positions available. Please check back soon!</p>
					<?php if(!empty($search)): ?>
					<a href="<?php echo base_url(); ?>career" class="btn btn-default" style="margin-top: 20px;">View All Positions</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>
