<section class="content-header">
	<div class="content-header-left">
		<h1>View Detail Transactions</h1>
	</div>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">

      <div class="box box-info">

        <div class="box-body">
          <div class="col-md-3 form-group">
            <label for="" class="control-label">Code Transaction</label>
            <input type="text" class="form-control" value="<?=$detail->transaction_code?>" readonly>
          </div>
          <div class="col-md-3 form-group">
            <label for="" class="control-label">User</label>
            <input type="text" class="form-control" value="<?=$detail->user_name?>" readonly>
          </div>
          <div class="col-md-3 form-group">
            <label for="" class="control-label">Phone</label>
            <input type="text" class="form-control" value="<?=$detail->user_phone?>" readonly>
          </div>
          <div class="col-md-3 form-group">
            <label for="" class="control-label">Email</label>
            <!-- <input type="text" class="form-control" value="<?=$detail->user_email?>" readonly> -->
            <a href="mailto:<?=$detail->user_email?>">
              <input type="text" style="cursor:pointer" class="form-control" value="<?=$detail->user_email?>" readonly>
            </a>
          </div>
        </div>

        <div class="box-body">
          <div class="col-md-3 form-group">
            <label for="" class="control-label">Date</label>
            <input type="text" class="form-control" value="<?=$detail->dibuat?>" readonly>
          </div>
          <div class="col-md-3 form-group">
            <label for="" class="control-label">Total</label>
            <input type="text" class="form-control" value="<?=rupiah($detail->transaction_total)?>" readonly>
          </div>
          <div class="col-md-3 form-group">
            <label for="" class="control-label">Status</label>
            <input type="text" class="form-control" value="<?=$detail->transaction_status?>" readonly>
          </div>
        </div>

        <div class="box-body">
          <div class="col-md-12 form-group">
            <label for="" class="control-label">Addres</label>
            <input type="text" class="form-control" value="<?=$detail->transaction_addres?>" readonly>
          </div>
        </div>
        
        <div class="box-body table-responsive">

          <button type="button" onclick="javascript:history.back()" class="btn btn-warning btn-sm" style="margin-bottom : 20px;">Back</button>

          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Extra</th>
                </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach($data_detail as $x) : ?>
                
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$x->product_name?></td>
                  <td><?=rupiah($x->transaction_detail_qty)?></td>
                  <td><?=rupiah($x->transaction_detail_price)?></td>
                  <td><?=rupiah($x->transaction_detail_subtotal)?></td>
                  <td><?=$x->transaction_detail_extra?></td>
                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

    </div>
  </div>
</section>