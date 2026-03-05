<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin/login');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Career Position</h1>
	</div>
</section>

<section class="content" style="min-height:auto;margin-bottom: -30px;">
	<div class="row">
		<div class="col-md-12">
			<?php if($error): ?>
			<div class="callout callout-danger">
			<p><?php echo $error; ?></p>
			</div>
			<?php endif; ?>

			<?php if($success): ?>
			<div class="callout callout-success">
			<p><?php echo $success; ?></p>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Position Information</h3>
				</div>

				<?php echo form_open(base_url().'admin/career/add', array('class' => 'form-horizontal')); ?>
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Position Name <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="position_name" placeholder="e.g. Software Developer" required>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Department <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="department" placeholder="e.g. IT, HR, Sales" required>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Location <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="location" placeholder="e.g. Dubai, UAE" required>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Job Type <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<select name="job_type" class="form-control select2" required>
									<option value="">Select Job Type</option>
									<option value="Full-time">Full-time</option>
									<option value="Part-time">Part-time</option>
									<option value="Contract">Contract</option>
									<option value="Temporary">Temporary</option>
									<option value="Internship">Internship</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Experience Required <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="experience_required" placeholder="e.g. 2-3 years" required>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Salary Range</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="salary_range" placeholder="e.g. 5,000AED - 7,000AED">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Number of Positions <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="number_of_positions" value="1" min="1" required>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Job Description <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<textarea id="editor1" name="job_description" class="form-control" style="height: 300px;" required></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<select name="status" class="form-control select2" required>
									<option value="Active">Active</option>
									<option value="Inactive">Inactive</option>
								</select>
							</div>
						</div>
					</div>

					<div class="box-footer">
						<button type="submit" class="btn btn-success pull-left" name="form_career">Add Position</button>
						<a href="<?php echo base_url(); ?>admin/career" class="btn btn-default pull-right">Cancel</a>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>
