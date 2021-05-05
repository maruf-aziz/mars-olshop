<section class="content-header">
	<div class="content-header-left">
		<h1>View Transactions</h1>
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
          <table id="example" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Code Transaction</th>
                    <th>Status</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach($transaction as $x) : ?>

                <tr>
                  <td><?=$no++?></td>
                  <td><?=$x->dibuat?></td>
                  <td><?=$x->user_name?></td>
                  <td><?=rupiah($x->transaction_total)?></td>
                  <td>
                    <a href="<?=base_url('admin/transactions/detail/'.$x->transaction_code)?>" class="btn btn-success btn-sm"><?=$x->transaction_code?></a>
                  </td>
                  <td><?=$x->transaction_status?></td>
                  <td align="center">
                    <?php 
                      if($x->transaction_status == 'diproses'){
                        ?>
                          <form action="<?=base_url('admin/transactions/setSelesai')?>" method="POST">
                            <input type="hidden" name="id" value="<?=$x->transaction_id?>">

                            <button type="submit" class="btn btn-info btn-sm">Tandai Selesai</button>
                          </form>
                        <?php
                      }
                      else if($x->transaction_status == 'selesai'){
                        ?>
                          <form action="<?=base_url('admin/transactions/setBatal')?>" method="POST">
                            <input type="hidden" name="id" value="<?=$x->transaction_id?>">

                            <button type="submit" class="btn btn-danger btn-sm">Batalkan</button>
                          </form>
                        <?php
                      }
                      else{
                        echo "-";
                      }
                    ?>
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