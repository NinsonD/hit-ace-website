<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin/login');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Career Position</h1>
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

				<?php echo form_open(base_url().'admin/career/edit/'.$career['id'], array('class' => 'form-horizontal')); ?>
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Position Name <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="position_name" value="<?php echo $career['position_name']; ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Department <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="department" value="<?php echo $career['department']; ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Location <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="location" value="<?php echo $career['location']; ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Job Type <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<select name="job_type" class="form-control select2" required>
									<option value="">Select Job Type</option>
									<option value="Full-time" <?php if($career['job_type'] == 'Full-time') echo 'selected'; ?>>Full-time</option>
									<option value="Part-time" <?php if($career['job_type'] == 'Part-time') echo 'selected'; ?>>Part-time</option>
									<option value="Contract" <?php if($career['job_type'] == 'Contract') echo 'selected'; ?>>Contract</option>
									<option value="Temporary" <?php if($career['job_type'] == 'Temporary') echo 'selected'; ?>>Temporary</option>
									<option value="Internship" <?php if($career['job_type'] == 'Internship') echo 'selected'; ?>>Internship</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Experience Required <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="experience_required" value="<?php echo $career['experience_required']; ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Salary Range</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="salary_range" value="<?php echo $career['salary_range']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Number of Positions <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="number_of_positions" value="<?php echo $career['number_of_positions']; ?>" min="1" required>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Job Description <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<textarea id="editor1" name="job_description" class="form-control" style="height: 300px;" required><?php echo $career['job_description']; ?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status <span style="color: red;">*</span></label>
							<div class="col-sm-10">
								<select name="status" class="form-control select2" required>
									<option value="Active" <?php if($career['status'] == 'Active') echo 'selected'; ?>>Active</option>
									<option value="Inactive" <?php if($career['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
								</select>
							</div>
						</div>
					</div>

					<div class="box-footer">
						<button type="submit" class="btn btn-success pull-left" name="form_career_edit">Update Position</button>
						<a href="<?php echo base_url(); ?>admin/career" class="btn btn-default pull-right">Cancel</a>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>
