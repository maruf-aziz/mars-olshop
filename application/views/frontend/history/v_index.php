	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
        <h4 class="m-text26 p-b-36 p-t-15">
          History Order
        </h4>

				<div class="col-md-12">
          <table class="table table-responsive table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Date</th>
                <th>Total</th>
                <th>Invoice</th>
                <th>Date Of Use</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $i= 1; ?>
              <?php foreach($transaction as $x) : ?>
                
                <tr>
                  <td><?=$i++?></td>
                  <td><?=$x->dibuat?></td>
                  <td><?=rupiah($x->transaction_total)?></td>
                  <td><a href="<?=base_url('cart/invoice/'.$x->transaction_code)?>" class="btn btn-outline-success btn-sm"><?=$x->transaction_code?></a></td>
                  <td><?=$x->transaction_usage?></td>
                  <td>
                    <?php 
                      if($x->transaction_status == 'diproses'){
                        ?>
                          <button type="button" class="btn btn-info btn-sm">Diproses</button>
                        <?php
                      }
                      else if($x->transaction_status == 'selesai'){
                        ?>
                          <button type="button" class="btn btn-success btn-sm">Selesai</button>
                        <?php
                      }
                      else{
                        ?>
                          <button type="button" class="btn btn-warning btn-sm">Menunggu</button>
                        <?php
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