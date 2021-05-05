	<?php if($page->status_banner == 'active') : ?>
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?=base_url('uploads/banner/'.$cart)?>);">
		<!-- <h2 class="l-text2 t-center">
			Cart
		</h2> -->
	</section>
	<?php endif; ?>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<form action="<?=base_url('cart/update')?>" method="POST" id="cart">

				<div class="container-table-cart pos-relative">
					<div>
						<table class="table table-responsive table-hover table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th><?=$page->table_title1?></th>
									<th><?=$page->table_title2?></th>
									<th><?=$page->table_title3?></th>
									<th>Tambahan</th>
									<th><?=$page->table_title4?></th>

									<?php if($display != 'block') : ?>
										<th>#</th>
									<?php endif; ?>
								</tr>
							</thead>

							<tbody id="show">
							<?php if(isset($_SESSION['id_member'])) : ?>
								<?php foreach($items as $x) : ?>

								<tr class="table-row">
									<td>
										<div class="cart-img-product b-rad-4 o-f-hidden">
											<img src="<?=base_url('uploads/product/'.$x['img'])?>" alt="IMG-PRODUCT">
										</div>
									</td>
									<td>
										<?=$x['name']?>
										<input type="hidden" name="id[]" value="<?=$x['id']?>" readonly>
									</td>
									<td>
										<?=$money.' '.rupiah($x['price'])?>
									</td>
									<td>
										
											<?php if($display != 'block') : ?>
												<div class="flex-w bo5 of-hidden w-size17">
													<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
														<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
													</button>

													<input class="size8 m-text18 t-center num-product" type="number" name="qty[]" value="<?=$x['qty']?>" <?=($display == 'none' ? '' : 'readonly' )?> >

													<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
														<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
													</button>
												</div>
											<?php else : ?>
												<?=$x['qty']?>
											<?php endif; ?>
											
									</td>
									<td>
										<textarea class="form-control" cols="20" rows="2" name="desc[]" <?=($display == 'none' ? '' : 'readonly' )?> ><?=$x['desc']?></textarea>
									</td>
									<td><?=$money.' '.rupiah($x['price'] * $x['qty'])?></td>

									<?php if($display != 'block') : ?>
										<td>
											<a href="<?=base_url('cart/remove/'.$x['id'])?>" class="btn btn-danger btn-sm">Delete</a>
										</td>
									<?php endif; ?>

								</tr>

								<?php endforeach; ?>
							<?php endif; ?>
							</tbody>				

						</table>
					</div>
				</div>

				<div class="row">	
					<div class="col-6">
						<?php if($page->status_text1 == 'active') : ?>
						<div class="size10 trans-0-4 m-t-10 m-b-10">
							<!-- Button -->
							<a href="<?=base_url('shop')?>" class="btn btn-info btn-lg">
								<?=$page->btn_name1?>
							</a>
						</div>
					<?php endif; ?>
					</div>
					<div class="col-6" align="right">
					<?php if($page->status_btn2 == 'active' and $display != 'block') : ?>
						<div class="size10 trans-0-4 m-t-10 m-b-10">
							<!-- Button -->
							<button type="button" class="btn btn-success btn-lg" onclick="finishShop()">
								<?=$page->btn_name2?>
							</button>
						</div>
					<?php endif; ?>
					</div>
				</div>

			</form>

			<!-- Total -->
			<form action="<?=base_url('cart/checkout')?>" method="post" id="gotoInvoice" style="display : <?=$display?>;">
				<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
					<h5 class="m-text20 p-b-24">
						<?=$page->footer_title?>
					</h5>

					<!--  -->
					<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
						<span class="s-text18 w-size19 w-full-sm">
							<?=$page->title2?>:
						</span>

						<div class="w-size20 w-full-sm">
						
							<div class="size13 bo4 m-b-22">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="road" id="road" placeholder="jalan / tempat" required>
							</div>

							<div class="size13 bo4 m-b-22">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="subdistrict" id="subdistrict" placeholder="kecamatan" required>
							</div>

							<div class="size13 bo4 m-b-22">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="disctrict" id="disctrict" placeholder="kota / kabupaten" required>
							</div>

							<div class="size13 bo4 m-b-22">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="province" id="province" placeholder="provinsi" required>
							</div>

						</div>
					</div>

					<!--  -->
					<div class="flex-w flex-sb-m p-t-26 p-b-30">
						<span class="m-text22 w-size19 w-full-sm">
							<?=$page->title3?>:
						</span>

						<span class="m-text21 w-size20 w-full-sm">
							<?=$money.' '.rupiah($total)?>
						</span>
					</div>

					<div class="size15 trans-0-4" align="center">
						<!-- Button -->
						<button type="button" class="btn btn-success btn-lg" onclick="send()">
							<?=$page->btn_name3?>
						</button>
					</div>
				</div>
			</form>

		</div>
	</section>

	<!-- <script>
		$(document).ready(function(){
			$('#show').load("<?=base_url('cart/show')?>");
		});
	</script> -->

	<script>
		function send(){
			var tanggal 					= $('#tanggal').val();
			var road 							= $('#road').val();
			var subdistrict 			= $('#subdistrict').val();
			var disctrict 				= $('#disctrict').val();
			var province 					= $('#province').val();

			if(tanggal == '' || road == '' || subdistrict == '' || disctrict == '' || province == ''){
				// alert('Harap Melengkapi Data !!!');
				swal('Harap Melengkapi Data !!!');

				if(tanggal == '') $('#tanggal').focus();

				else if(road == '') $('#road').focus();

				else if(subdistrict == '') $('#subdistrict').focus();

				else if(disctrict == '') $('#disctrict').focus();

				else if(province == '') $('#province').focus();
			}

			else{
				// var yakin = confirm("Apakah Anda Sudah Yakin ?");

        // if (yakin) {
				// 		// window.location = "https://www.petanikode.com";
				// 		$("#gotoInvoice").submit();
				// }
				swal({
				// title: 'Selamat !!!',
					text: 'Apakah Anda Sudah Yakin ?',
					icon: 'warning',
					buttons : true,
					closeOnClickOutside: false,
				})
				.then((confirmPayment) => {
					if(confirmPayment){
						$("#gotoInvoice").submit();
					}
				});
			}

			
		}

		function finishShop(){
			swal({
				// title: 'Selamat !!!',
				text: 'Yakin Melanjutkan Ke Pembayaran ?',
				icon: 'warning',
				buttons : true,
				closeOnClickOutside: false,
			})
			.then((confirm) => {
				if(confirm){
					$("#cart").submit();
				}
			});
		}
	</script>


