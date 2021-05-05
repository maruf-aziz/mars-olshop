<section class="content-header">
	<div class="content-header-left">
		<h1>Confirm Transactions</h1>
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
                    <th>Code Transactions</th>
                    <th>Img Transfer</th>
                    <th>Total</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach($confirm as $x) : ?>

                <tr>
                  <td><?=$i++?></td>
                  <td>
                    <a href="<?=base_url('admin/transactions/detail/'.$x->transaction_code)?>" class="btn btn-success"><?=$x->transaction_code?></a>
                  </td>
                  <td>
                    <a href="<?=base_url('uploads/confirmation/'.$x->confirm_img)?>" target="blank">
                      <img src="<?=base_url('uploads/confirmation/'.$x->confirm_img)?>" style="width : 150px;" alt="">
                    </a>
                  </td>
                  <td><?=rupiah($x->confirm_total)?></td>
                  <td><?=$x->user_name?></td>
                  <td><?=$x->dibuat?></td>
                  <td><?=$x->transaction_status?></td>
                  <td>
                    <a href="<?=base_url('admin/confirm/acc/'.$x->transaction_id)?>" class="btn btn-success">Acc</a>
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
      window.location = "<?=base_url('admin/bank/delete/')?>"+id;
    }
  }
</script>