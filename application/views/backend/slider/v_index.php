<section class="content-header">
	<div class="content-header-left">
		<h1>View Slider</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/slider/add" class="btn btn-primary btn-sm">Add New</a>
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
        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Slider Title</th>
                    <th>Slider Body</th>
                    <th>Img</th>
                    <th>Last Update</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php $id = 1 ?>
              <?php foreach($slider as $x) : ?>
                <tr>
                  <td><?=$id++?></td>
                  <td><?=$x->slider_tittle?></td>
                  <td><?=$x->slider_body?></td>
                  <td>
                    <?php if($x->slider_banner!= null): ?>
                      <img src="<?=base_url('uploads/slider/'.$x->slider_banner)?>" style="width: 250px;" alt="slider photo">
                    <?php endif; ?>
                  </td>
                  <td><?=$x->updated_at?></td>
                  <td align="center">
                    <!-- edit -->
                    <a href="<?=base_url('admin/slider/update/'.$x->slider_id)?>" class="btn btn-success btn-xs">Update</a>

                    <!-- delete -->
                    <button type="button"  onclick="btnDelete(<?=$x->slider_id?>)" class="btn btn-danger btn-xs">Delete</button>

                  </td>
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
      window.location = "<?=base_url('admin/slider/delete/')?>"+id;
    }
  }
</script>