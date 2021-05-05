<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Invoice</title>
  </head>
  <body>

    <div class="container mt-5">
      <?php if($this->session->flashdata('success')) : ?>
        <div class="alert alert-primary" role="alert">
          <?=$this->session->flashdata('success')?>
        </div>
      <?php endif; ?>

      <div class="card">

        <div class="card-header">
          Invoice
          <strong><?=$trx->transaction_code?></strong> 
          <span class="float-right"> <strong>Status:</strong> <?=$trx->transaction_status?></span>
        </div>

        <div class="card-body">
          <div class="row mb-4">
          
          <div class="col-sm-6">
            <h6 class="mb-3">From:</h6>
            <div>
              <strong>Mars Electronik</strong>
            </div>
          </div>

          <div class="col-sm-6">
            <h6 class="mb-3">To:</h6>
            <div>
              <strong><?=$trx->user_name?></strong>
            </div>

            <div><?=$trx->transaction_addres?></div>
            <div><?=$trx->user_email?></div>
            <div><?=$trx->user_phone?></div>
          </div>

        </div>

        <div class="table-responsive-sm">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="center">#</th>
                <th>Item</th>
                <th>Extra</th>
                <th class="right">Unit Cost</th>
                <th class="center">Qty</th>
                <th class="right">Total</th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr>
                <td class="center">1</td>
                <td class="left strong">Origin License</td>
                <td class="left">Extended License</td>

                <td class="right">$999,00</td>
                <td class="center">1</td>
                <td class="right">$999,00</td>
              </tr> -->

              <?php $i = 1; ?>
              <?php foreach($detail as $x) : ?>

                <tr>
                  <td><?=$i++?></td>
                  <td><?=$x->product_name?></td>
                  <td><?=$x->transaction_detail_extra?></td>
                  <td><?=rupiah($x->transaction_detail_price)?></td>
                  <td><?=rupiah($x->transaction_detail_qty)?></td>
                  <td><?=rupiah($x->transaction_detail_qty * $x->transaction_detail_price)?></td>
                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="row">
        
          <div class="col-lg-4 col-sm-5"></div>

          <div class="col-lg-4 col-sm-5 ml-auto">
            <table class="table table-clear">
              <tbody>
                <tr>
                  <td class="left">
                    <strong>Subotal</strong>
                  </td>
                  <td class="right"><?=rupiah($trx->transaction_total)?></td>
                </tr>
                <tr>
                  <td class="left">
                    <strong>Uniq Number</strong>
                  </td>
                  <td class="right"><?=rupiah($trx->transaction_uniq_number)?></td>
                </tr>
                <tr>
                  <td class="left">
                    <strong>Total</strong>
                  </td>
                  <td class="right"><?=rupiah($trx->transaction_uniq_number + $trx->transaction_total)?></td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>

        <?php if($trx->transaction_status == "menunggu") : ?>

          <div class="row mt-3">
            <div class="col-md-12">
              Transafer <?=rupiah($trx->transaction_uniq_number + $trx->transaction_total)?> To :

              <ul class="mt-3">
                <?php foreach($bank as $b) : ?>

                  <li><?=$b->bank_number." ( ".$b->bank_name." - an : ".$b->bank_user." )"?></li>

                <?php endforeach ; ?>
              </ul> 
            </div>
          </div>
          
          <div class="card-header">
            Form Confirmation
          </div>

          <div class="card-body">

            <form action="<?=base_url('cart/sendConfirmation')?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputEmail1">Img Struct Transfer</label>
                <input type="file" class="form-control" name="file_tf" required>
                <input type="hidden" class="form-control" name="confirm_code" value="<?=$trx->transaction_id?>" readonly>
                <input type="hidden" class="form-control" name="confirm_total" value="<?=$trx->transaction_total + $trx->transaction_uniq_number?>" readonly>
                <input type="hidden" class="form-control" name="confirm_user" value="<?=$trx->transaction_user?>" readonly>
                <small  class="form-text text-muted">for confirmation payment</small>
              </div>
              <button type="submit" class="btn btn-outline-success">Send Confirmation</button>
            </form>

          </div>

        <?php endif; ?>
        

      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>