<section class="content-header">
	<div class="content-header-left">
		<h1>View Member</h1>
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

      <div class="box box-info">
        <img src="" alt="">
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Addres</th>
                    <th>Phone</th>
                    <th>Img</th>
                    <th>Last Login</th>
                    <th>Last Update</th>
                </tr>
            </thead>
            <tbody>
              <?php $id = 1 ?>
              <?php foreach($user as $x) : ?>
                <tr>
                  <td><?=$id++?></td>
                  <td><?=$x->user_name?></td>
                  <td><?=$x->user_email?></td>
                  <td><?=$x->user_addres?></td>
                  <td><?=$x->user_phone?></td>
                  <td>
                    <?php if($x->user_img != null): ?>
                      <img src="<?=base_url('uploads/user/'.$x->user_img)?>" style="width: 50px; border-radius : 100%;" alt="user photo">
                    <?php else: ?>
                      <img src="<?php echo base_url(); ?>assets/admin/img/no-photo.jpg" class="user-image" style="width: 50px; border-radius : 100%;" alt="user photo">
                    <?php endif; ?>
                  </td>
                  <td><?=$x->user_last_login?></td>
                  <td><?=$x->updated_at?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

    </div>
  </div>
</section>
