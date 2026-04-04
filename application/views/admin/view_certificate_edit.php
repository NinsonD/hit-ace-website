<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin/login');
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Certificate</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/certificate" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php if($error): ?>
			<div class="callout callout-danger">
				<p>
				<?php echo $error; ?>
				</p>
			</div>
			<?php endif; ?>

			<?php if($success): ?>
			<div class="callout callout-success">
				<p><?php echo $success; ?></p>
			</div>
			<?php endif; ?>

			<?php echo form_open_multipart(base_url().'admin/certificate/edit/'.$certificate['id'],array('class' => 'form-horizontal')); ?>
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title <span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="title" value="<?php echo $certificate['title']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description <span>*</span></label>
							<div class="col-sm-6">
								<textarea class="form-control" name="description" style="height:100px;"><?php echo $certificate['description']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Existing Photo</label>
							<div class="col-sm-6">
								<img src="<?php echo base_url(); ?>public/uploads/<?php echo $certificate['image']; ?>" alt="" style="width:200px;">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Change Photo</label>
							<div class="col-sm-6">
								<input type="file" name="photo">(Only jpg, jpeg, gif and png are allowed)
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Order By</label>
							<div class="col-sm-2">
								<input type="text" autocomplete="off" class="form-control" name="order_by" value="<?php echo $certificate['order_by']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>

</section>