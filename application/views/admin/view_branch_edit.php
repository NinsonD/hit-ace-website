<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin/login');
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Associate</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/branch" class="btn btn-primary btn-sm">View All Associates</a>
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

			<?php echo form_open(base_url().'admin/branch/edit/'.$branch['id'],array('class' => 'form-horizontal')); ?>
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Name <span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="name" value="<?php echo $branch['name']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Address <span>*</span></label>
							<div class="col-sm-6">
								<textarea class="form-control" name="address" style="height:100px;"><?php echo $branch['address']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Phone</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="phone" value="<?php echo $branch['phone']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-6">
								<input type="email" autocomplete="off" class="form-control" name="email" value="<?php echo $branch['email']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Map Iframe</label>
							<div class="col-sm-6">
								<textarea class="form-control" name="map_iframe" style="height:100px;" placeholder="Paste Google Maps embed iframe code here"><?php echo $branch['map_iframe']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Order By</label>
							<div class="col-sm-2">
								<input type="text" autocomplete="off" class="form-control" name="order_by" value="<?php echo $branch['order_by']; ?>">
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