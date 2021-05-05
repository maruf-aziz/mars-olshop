<section class="content-header">
	<div class="content-header-left">
		<h1>Settings Section</h1>
	</div>
</section>

<section class="content" style="min-height:auto;margin-bottom: -30px;">
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

		</div>
	</div>
</section>

<section class="content">

	<div class="row">
		<div class="col-md-12">
							
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_logo" data-toggle="tab">Logo</a></li>
						<li><a href="#tab_favicon" data-toggle="tab">Favicon</a></li>
						<li><a href="#tab_banner" data-toggle="tab">Banner</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane active" id="tab_logo">
							<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>

							<div class="box box-info">
								<div class="box-body">
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Existing Photo</label>
										<div class="col-sm-6" style="padding-top:6px;">
											<img src="<?=base_url('uploads/logo/'.$logo)?>" class="existing-photo" style="height:80px;">
										</div>
									</div>

									<div class="form-group">
										<label for="" class="col-sm-2 control-label">New Photo</label>
										<div class="col-sm-6" style="padding-top:6px;">
											<input type="file" name="logo">
										</div>
									</div>

									<div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_logo">Update Logo</button>
										</div>
									</div>

								</div>
							</div>

							<?php echo form_close(); ?>
						</div>
						
						<div class="tab-pane" id="tab_favicon">
							<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>

							<div class="box box-info">
								<div class="box-body">
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Existing Photo</label>
										<div class="col-sm-6" style="padding-top:6px;">
											<img src="<?=base_url('uploads/favicon/'.$favicon)?>" class="existing-photo" style="height:80px;">
										</div>
									</div>

									<div class="form-group">
										<label for="" class="col-sm-2 control-label">New Photo </label>
										<div class="col-sm-6" style="padding-top:6px;">
											<input type="file" name="favicon_logo">
											<span>resolusi : 360 x 360</span>
										</div>
									</div>

									<div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_favicon">Update</button>
										</div>
									</div>

								</div>
							</div>

							<?php echo form_close(); ?>
						</div>
						
						<div class="tab-pane" id="tab_banner">
							<div class="row">
								<div class="col-md-6">
									<table class="table table-bordered">
										<tr>
											<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
												<td style="width:50%;">
														<h4>Shop Page</h4>
														<p>
																<img src="<?=base_url('uploads/banner/'.$shop)?>" alt="" style="width: 100%;height:auto;">
														</p>                                        
												</td>
												<td style="width:50%">
														<h4>Change Banner</h4>
														Select Photo<input type="file" name="photo">
														<input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_shop">
												</td>
											<?php echo form_close(); ?>
										</tr>
										<tr>
											<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
												<td style="width:50%">
														<h4>Cart Page</h4>
														<p>
																<img src="<?=base_url('uploads/banner/'.$cart)?>" alt="" style="width: 100%;height:auto;">
														</p>                                        
												</td>
												<td style="width:50%">
														<h4>Change Banner</h4>
														Select Photo<input type="file" name="photo">
														<input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_cart">
												</td>
											<?php echo form_close(); ?>
										</tr>
										<tr>
											<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
												<td style="width:50%">
														<h4>Blog Page</h4>
														<p>
																<img src="<?=base_url('uploads/banner/'.$blog)?>" alt="" style="width: 100%;height:auto;">
														</p>                                        
												</td>
												<td style="width:50%">
														<h4>Change Banner</h4>
														Select Photo<input type="file" name="photo">
														<input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_blog">
												</td>
											<?php echo form_close(); ?>
										</tr>
									</table>
								</div>
								<div class="col-md-6">
									<table class="table table-bordered">
										<tr>
											<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
												<td style="width:50%">
														<h4>About Page</h4>
														<p>
																<img src="<?=base_url('uploads/banner/'.$about)?>" alt="" style="width: 100%;height:auto;">
														</p>                                        
												</td>
												<td style="width:50%">
														<h4>Change Banner</h4>
														Select Photo<input type="file" name="photo">
														<input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_about">
												</td>
											<?php echo form_close(); ?>
										</tr>
										<tr>
											<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
												<td style="width:50%">
														<h4>Contact Page</h4>
														<p>
																<img src="<?=base_url('uploads/banner/'.$contact)?>" alt="" style="width: 100%;height:auto;">
														</p>                                        
												</td>
												<td style="width:50%">
														<h4>Change Banner</h4>
														Select Photo<input type="file" name="photo">
														<input type="submit" class="btn btn-primary btn-xs" value="Change" style="margin-top:10px;" name="form_banner_contact">
												</td>
											<?php echo form_close(); ?>
										</tr>
									</table>
								</div>
							</div>

							<div class="row">
								<div class="col-12" style="margin : 20px;">
									<span>Reolusi Banner : 1920 x 240 </span>
								</div>
							</div>
						</div>

					</div>
				</div>			
		</div>
	</div>

</section>