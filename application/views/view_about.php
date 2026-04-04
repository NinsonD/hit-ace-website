<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_about']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1><?php echo $page['about_heading']; ?></h1>
		</div>
	</div>
</div>

<div class="container pt_40 pb_40">
	<div class="row">
		
		<?php if($page['about_photo']!=""): ?>
		<div class="col-md-12">
			<img src="<?php echo base_url(); ?>public/uploads/<?php echo $page['about_photo']; ?>" alt=""><br>
		</div>
		<?php endif; ?>

		<div class="col-md-12">
			<h3><?php echo $page['about_heading']; ?></h3>
			<p>
				<?php echo $page['about_content']; ?>
			</p>
		</div>
	</div>
</div>


<div class="mission-area bg-area pt-30 pb-60">
	<div class="container">
		<div class="row">
				
    
		    <div class="col-md-6 col-sm-6">
				<div class="about-mission">
					<div class="mission-icon">
						<i class="fa fa-star"></i>
					</div>
					<h3><?php echo $page['mission_heading']; ?></h3>
					<p>
						<?php echo $page['mission_content']; ?>
					</p>
				</div>
			</div>
	
	
    
		    <div class="col-md-6 col-sm-6">
				<div class="about-mission">
					<div class="mission-icon">
						<i class="fa fa-heart"></i>
					</div>
					<h3><?php echo $page['vision_heading']; ?></h3>
					<p>
						<?php echo $page['vision_content']; ?>
					</p>
				</div>
			</div>
	
	
		</div>
	</div>
</div>

<div class="certificate-area pt-60 pb-60">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title text-center">
					<h2>Our Certificates</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach($certificates as $certificate): ?>
			<div class="col-md-4 col-sm-6">
				<div class="certificate-item">
					<div class="certificate-photo">
						<img src="<?php echo base_url(); ?>public/uploads/<?php echo $certificate['image']; ?>" alt="<?php echo $certificate['title']; ?>">
					</div>
					<div class="certificate-text">
						<h4><?php echo $certificate['title']; ?></h4>
						<p><?php echo $certificate['description']; ?></p>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>