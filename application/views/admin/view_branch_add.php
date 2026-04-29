<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin/login');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Associate</h1>
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

			<?php echo form_open(base_url().'admin/branch/add',array('class' => 'form-horizontal')); ?>
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Name <span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Address <span>*</span></label>
							<div class="col-sm-6">
								<textarea class="form-control" name="address" style="height:100px;"><?php if(isset($_POST['address'])){echo $_POST['address'];} ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Phone</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="phone" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];} ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-6">
								<input type="email" autocomplete="off" class="form-control" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Map Iframe</label>
							<div class="col-sm-6">
								<textarea class="form-control" name="map_iframe" style="height:100px;" placeholder="Paste Google Maps embed iframe code here"><?php if(isset($_POST['map_iframe'])){echo $_POST['map_iframe'];} ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Order By</label>
							<div class="col-sm-2">
								<input type="text" autocomplete="off" class="form-control" name="order_by" value="<?php if(isset($_POST['order_by'])){echo $_POST['order_by'];} else {echo '0';} ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>

</section>