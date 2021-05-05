<section class="content-header">
	<div class="content-header-left">
		<h1>Add Category</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/category" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php
			if($this->session->flashdata('error')) {
				?>
				<div class="callout callout-danger">
					<p><?php echo $this->session->flashdata('error'); ?></p>
				</div>
				<?php
			}
			if($this->session->flashdata('success')) {
				?>
				<div class="callout callout-success">
					<p><?php echo $this->session->flashdata('success'); ?></p>
				</div>
				<?php
			}
			?>

			<?php echo form_open_multipart(base_url().'admin/category/add',array('class' => 'form-horizontal')); ?>

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group <?=form_error('category_name') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">Category Name <span>*</span></label>
							<div class="col-sm-4">
                <input type="text" class="form-control" name="category_name" value="<?=set_value('category_name')?>">
                <span class="help-block"><i><small><?=form_error('category_name')?></small></i></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="addData">Submit</button>
							</div>
						</div>
					</div>
				</div>

			<?php echo form_close(); ?>


		</div>
	</div>

</section>