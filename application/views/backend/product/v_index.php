<section class="content-header">
	<div class="content-header-left">
		<h1>View product</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/product/add" class="btn btn-primary btn-sm">Add New</a>
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
                    <th>product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Desc</th>
                    <th>Img</th>
                    <th>Status</th>
                    <th>Last Update</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php $id = 1 ?>
              <?php foreach($product as $x) : ?>
                <tr>
                  <td><?=$id++?></td>
                  <td><?=$x->product_name?></td>
                  <td><?=$x->category_name?></td>
                  <td>Rp. <?=rupiah($x->product_price)?></td>
                  <td><?=$x->product_stock?></td>
                  <td>
                    <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?=$x->product_id?>">Show Description</a>
                  </td>
                  <td>
                    <?php if($x->product_img != null): ?>
                      <img src="<?=base_url('uploads/product/'.$x->product_img)?>" style="width: 100px; float: left" alt="product photo">
                    <?php else: ?>
                      <img src="<?php echo base_url(); ?>assets/admin/img/no-photo.jpg" class="product-image" style="width: 100px; border-radius : 100%;" alt="product photo">
                    <?php endif; ?>                   
                    
                  </td>
                  <td><?=$x->product_status?></td>
                  <td><?=$x->update?></td>
                  <td align="center">
                    <!-- edit -->
                    <a href="<?=base_url('admin/product/update/'.$x->product_id)?>" class="btn btn-success btn-xs">Update</a>

                    <!-- delete -->
                    <button type="button"  onclick="btnDelete(<?=$x->product_id?>)" class="btn btn-danger btn-xs">Delete</button>

                  </td>

                  <!-- modal show desc -->
                  <div class="modal fade" id="myModal<?=$x->product_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog modal-xs" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel">View Description</h4>
                              </div>
                              <div class="modal-body">
                                  <p style="text-align : justify;">
                                    <?=$x->product_desc?>
                                  </p>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
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
      window.location = "<?=base_url('admin/product/delete/')?>"+id;
    }
  }
</script>