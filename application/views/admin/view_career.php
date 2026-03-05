<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin/login');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Career Management</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/career/add" class="btn btn-success pull-right"> Add New Position</a>
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
				<div class="box-body">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">ID</th>
								<th width="20%">Position</th>
								<th width="15%">Department</th>
								<th width="15%">Location</th>
								<th width="10%">Openings</th>
								<th width="10%">Status</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($career)): ?>
								<?php foreach($career as $job): ?>
								<tr>
									<td><?php echo $job['id']; ?></td>
									<td><?php echo $job['position_name']; ?></td>
									<td><?php echo $job['department']; ?></td>
									<td><?php echo $job['location']; ?></td>
									<td><?php echo $job['number_of_positions']; ?></td>
									<td><span class="label label-<?php echo ($job['status'] == 'Active') ? 'success' : 'danger'; ?>"><?php echo $job['status']; ?></span></td>
									<td>
										<a href="<?php echo base_url(); ?>admin/career/edit/<?php echo $job['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<a href="<?php echo base_url(); ?>admin/career/delete/<?php echo $job['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this position?');"><i class="fa fa-trash"></i> Delete</a>
									</td>
								</tr>
								<?php endforeach; ?>
							<?php else: ?>
								<tr>
									<td colspan="7" style="text-align: center; padding: 20px;">No career positions found.</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
