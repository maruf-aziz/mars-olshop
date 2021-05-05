<section class="content-header">
	<div class="content-header-left">
		<h1>Add popular</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/popular" class="btn btn-primary btn-sm">View All</a>
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

			<?php echo form_open_multipart(base_url().'admin/popular/add',array('class' => 'form-horizontal')); ?>

				<div class="box box-info">
					<div class="box-body">

            <div class="form-group <?=form_error('popular_product') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">Product <span>*</span></label>
							<div class="col-sm-4">
                <select name="popular_product" class="form-control select2" id="popular_product">
                  <option value="">-- Select Product --</option>
                  <?php foreach ($product as $x): ?>
                    <option value="<?=$x->product_id?>" <?=(set_value('popular_product') == $x->product_id ? 'selected' : '')?> ><?=$x->product_name?></option>
                  <?php endforeach; ?>
                </select>
                <span class="help-block"><i><small><?=form_error('popular_product')?></small></i></span>
							</div>
						</div>

						<div class="form-group <?=form_error('popular_order') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">popular order <span>*</span></label>
							<div class="col-sm-4">
                <input type="number" class="form-control" name="popular_order" value="<?=set_value('popular_order')?>">
                <span class="help-block"><i><small><?=form_error('popular_order')?></small></i></span>
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