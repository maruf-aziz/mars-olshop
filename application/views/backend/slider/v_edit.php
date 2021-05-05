<section class="content-header">
	<div class="content-header-left">
		<h1>Update Slider</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/slider" class="btn btn-primary btn-sm">View All</a>
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

			<?php echo form_open_multipart(base_url().'admin/slider/update/'.$slider->slider_id,array('class' => 'form-horizontal')); ?>

				<div class="box box-info">
					<div class="box-body">

            <div class="form-group <?=form_error('slider_tittle') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">Title <span>*</span></label>
							<div class="col-sm-4">
                <input type="text" class="form-control" name="slider_tittle" value="<?=$slider->slider_tittle?>" autocomplete="off">
                <span class="help-block"><i><small><?=form_error('slider_tittle')?></small></i></span>
							</div>
						</div>

						<div class="form-group <?=form_error('slider_body') ? 'has-error' : null?>">
							<label for="" class="col-sm-2 control-label">Body <span>*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="slider_body"><?=$slider->slider_body?></textarea>
                <span class="help-block"><i><small><?=form_error('slider_body')?></small></i></span>
							</div>
						</div>

						<div class="form-group <?=(isset($message)) ? 'has-error' : null ?>">
							<label for="" class="col-sm-2 control-label">Change Banner</label>
							<div class="col-sm-2">
                <input type="file" class="form-control" name="slider_banner" value="">
                <span>
                    <small>
                      <ul>
                        <li>max size : 2mb</li>
                        <li>max resolution : 1920 x 570 (recomended)</li>
                      </ul>
                    </small>
                </span>
                <span class="help-block"><i><small><?=(isset($message))? $message : ""; ?></small></i></span>
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