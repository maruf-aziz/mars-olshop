<section class="content-header">
	<div class="content-header-left">
		<h1>Add User</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/user" class="btn btn-primary btn-sm">View All</a>
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

			<?php echo form_open_multipart(base_url().'admin/user/add',array('class' => 'form-horizontal')); ?>

				<div class="box box-info">
					<div class="box-body">

						<div class="form-group <?=form_error('user_name') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">User Name <span>*</span></label>
							<div class="col-sm-4">
                <input type="text" class="form-control" name="user_name" value="<?=set_value('user_name')?>" autocomplete="off">
                <span class="help-block"><i><small><?=form_error('user_name')?></small></i></span>
							</div>
						</div>

						<div class="form-group <?=form_error('user_email') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">Email <span>*</span></label>
							<div class="col-sm-4">
                <input type="email" class="form-control" name="user_email" value="<?=set_value('user_email')?>" autocomplete="off">
                <span class="help-block"><i><small><?=form_error('user_email')?></small></i></span>
							</div>
						</div>

						<div class="form-group <?=form_error('user_addres') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">Addres <span>*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="user_addres"><?php if(isset($_POST['user_addres'])) {echo $_POST['user_addres'];} ?></textarea>
                <span class="help-block"><i><small><?=form_error('user_addres')?></small></i></span>
							</div>
						</div>

						<div class="form-group <?=form_error('user_phone') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">Phone <span>*</span></label>
							<div class="col-sm-4">
                <input type="text" class="form-control" name="user_phone" value="<?=set_value('user_phone')?>" autocomplete="off">
                <span class="help-block"><i><small><?=form_error('user_phone')?></small></i></span>
							</div>
						</div>

						<div class="form-group <?=(isset($message)) ? 'has-error' : null ?>">
							<label for="" class="col-sm-2 control-label">Images <span>(1 mb)</span></label>
							<div class="col-sm-2">
                <input type="file" class="form-control" name="user_file" value="">
                <span class="help-block"><i><small><?=(isset($message))? $message : ""; ?></small></i></span>
							</div>
						</div>
            
						<div class="form-group <?=form_error('user_pass') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">Password <span>*</span></label>
							<div class="col-sm-4">
                <input type="password" class="form-control" name="user_pass" value="" autocomplete="off">
                <span class="help-block"><i><small><?=form_error('user_pass')?></small></i></span>
							</div>
						</div>
            
						<div class="form-group <?=form_error('user_pass_conf') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">Retype Password <span>*</span></label>
							<div class="col-sm-4">
                <input type="password" class="form-control" name="user_pass_conf" value="" autocomplete="off">
                <span class="help-block"><i><small><?=form_error('user_pass_conf')?></small></i></span>
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