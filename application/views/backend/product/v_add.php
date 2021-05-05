<section class="content-header">
	<div class="content-header-left">
		<h1>Add product</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/product" class="btn btn-primary btn-sm">View All</a>
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

			<?php echo form_open_multipart(base_url().'admin/product/add',array('class' => 'form-horizontal')); ?>

				<div class="box box-info">
					<div class="box-body">

						<div class="form-group <?=form_error('product_name') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">product Name <span>*</span></label>
							<div class="col-sm-6">
                <input type="text" class="form-control" name="product_name" value="<?=set_value('product_name')?>" autocomplete="off">
                <span class="help-block"><i><small><?=form_error('product_name')?></small></i></span>
							</div>
						</div>

						<div class="form-group <?=form_error('product_category') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">Category <span>*</span></label>
							<div class="col-sm-4">
                <select name="product_category" class="form-control select2" id="product_category">
                  <option value="">-- Select Category --</option>
                  <?php foreach ($category as $x): ?>
                    <option value="<?=$x->category_id?>" <?=(set_value('product_category') == $x->category_id ? 'selected' : '')?> ><?=$x->category_name?></option>
                  <?php endforeach; ?>
                </select>
                <span class="help-block"><i><small><?=form_error('product_category')?></small></i></span>
							</div>
						</div>

						<div class="form-group <?=form_error('product_desc') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">Desc <span>*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="product_desc"><?php if(isset($_POST['product_desc'])) {echo $_POST['product_desc'];} ?></textarea>
                <span class="help-block"><i><small><?=form_error('product_desc')?></small></i></span>
							</div>
						</div>

						<div class="form-group <?=form_error('product_price') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">Price <span>*</span></label>
							<div class="col-sm-4">
                <input type="text" class="form-control" name="product_price" id="field-price" value="<?=set_value('product_price')?>" autocomplete="off">
                <span class="help-block"><i><small><?=form_error('product_price')?></small></i></span>
							</div>
						</div>

						<div class="form-group <?=(isset($message)) ? 'has-error' : null ?>">
							<label for="" class="col-sm-2 control-label">Images <span>*</span></label>
							<div class="col-sm-2">
                <input type="file" class="form-control" name="product_file" value="">
                <span>
                    <small>
                      <ul>
                        <li>max size : 2mb</li>
                        <li>max resolution : 960 x 720 (recomended)</li>
                      </ul>
                    </small>
                </span>
                <span class="help-block"><i><small><?=(isset($message))? $message : ""; ?></small></i></span>
							</div>
						</div>
            
						<div class="form-group <?=form_error('product_stock') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">Stock <span>*</span></label>
							<div class="col-sm-4">
                <input type="number" class="form-control" name="product_stock" value="<?=set_value('product_stock')?>" autocomplete="off">
                <span class="help-block"><i><small><?=form_error('product_stock')?></small></i></span>
							</div>
						</div>
            
						<div class="form-group <?=form_error('product_status') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">Status <span>*</span></label>
							<div class="col-sm-4">
                <select name="product_status" class="form-control select2" id="product_status">
                  <option value="">-- Select Status --</option>
                  <option value="ready" <?=(set_value('product_status') == 'ready' ? 'selected' : '')?>>Ready</option>
                  <option value="pre order" <?=(set_value('product_status') == 'pre order' ? 'selected' : '')?>>Pre Order</option>
                  <option value="not ready" <?=(set_value('product_status') == 'not ready' ? 'selected' : '')?>>Not Ready</option>
                </select>
                <span class="help-block"><i><small><?=form_error('product_status')?></small></i></span>
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

<script>
    var rupiah = document.getElementById('field-price');
    rupiah.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split   		= number_string.split(','),
      sisa     		= split[0].length % 3,
      rupiah     		= split[0].substr(0, sisa),
      ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>