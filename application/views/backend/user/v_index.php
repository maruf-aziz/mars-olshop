<section class="content-header">
	<div class="content-header-left">
		<h1>View User</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/user/add" class="btn btn-primary btn-sm">Add New</a>
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
                    <th>Pass</th>
                    <th>Addres</th>
                    <th>Phone</th>
                    <th>Img</th>
                    <th>Last Login</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php $id = 1 ?>
              <?php foreach($user as $x) : ?>
                <tr>
                  <td><?=$id++?></td>
                  <td><?=$x->user_name?></td>
                  <td><?=$x->user_email?></td>
                  <td><a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#change_password<?=$x->user_id?>">Change Password</a></td>
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
                  <td align="center">
                    <!-- edit -->
                    <a href="<?=base_url('admin/user/update/'.$x->user_id)?>" class="btn btn-success btn-xs">Update</a>

                    <!-- delete -->
                    <button type="button"  onclick="btnDelete(<?=$x->user_id?>)" class="btn btn-danger btn-xs">Delete</button>

                  </td>

                  <div class="modal fade" id="change_password<?=$x->user_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Change Password - <?=$x->user_email?></h4>
                            </div>
                            <form action="<?=base_url('admin/user/update_pass/'.$x->user_id)?>" method="POST">
                              <div class="modal-body">
                                <div class="form-group">
                                      <label for="">New Password</label>
                                      <input type="password" name="password" class="form-control">
                                </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Change</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              </div>
                            </form>
                            
                        </div>
                    </div>
                  </div>
                  
                </tr>
                
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

    </div>
  </div>
</section>



<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<script>
  function btnDelete(id) {
    if (confirm("Are You Sure Delete This Data ? ")) {
      window.location = "<?=base_url('admin/user/delete/')?>"+id;
    }
  }
</script>