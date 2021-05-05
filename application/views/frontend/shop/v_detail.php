<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="index.html" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="product.html" class="s-text16">
			<?=$detail->category_name?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?=$detail->product_name?>
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="<?=base_url('uploads/product/'.$detail->product_img)?>">
							<div class="wrap-pic-w">
								<img src="<?=base_url('uploads/product/'.$detail->product_img)?>" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?=$detail->product_name?>
				</h4>

				<span class="m-text10">
					<?=$money?> <?=rupiah($detail->product_price)?>
				</span>

				<!-- <p class="s-text8 p-t-10">
					Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
				</p> -->

				<!--  -->
				<div class="p-t-33 p-b-60">
					<?php if($page->status_detail_sorting == 'active') : ?>
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							<?=$page->sorting_in_detail?>
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-1" name="size">
								<option>Choose an option</option>
								<option value="<?=$page->val_title1?>"><?=$page->title1?></option>
								<option value="<?=$page->val_title2?>"><?=$page->title2?></option>
								<option value="<?=$page->val_title3?>"><?=$page->title3?></option>
								<option value="<?=$page->val_title4?>"><?=$page->title4?></option>
							</select>
						</div>
					</div>

					<!-- <div class="flex-m flex-w">
						<div class="s-text15 w-size15 t-center">
							Color
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-1" name="color">
								<option>Choose an option</option>
								<option>Gray</option>
								<option>Red</option>
								<option>Black</option>
								<option>Blue</option>
							</select>
						</div>
					</div> -->

					<?php endif; ?>

					<div class="flex-r-m flex-w p-t-10">
						<div class="flex-m flex-w">
							<form action="<?=base_url('cart/buy')?>" method="POST">
								<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10"> 
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="1">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>

									<input type="hidden" name="id" value="<?=$detail->product_id?>" readonly>
								</div>

								<div class="">
									<!-- Button -->
									<!-- <a href="<?=base_url('cart/buy/'.$detail->product_id)?>"> -->
										<button type="submit" class="btn btn-info btn-lg">
											<?=$page->btn_name?>
										</button>
									<!-- </a> -->
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35"><?=$detail->update?></span>
					<span class="s-text8">Categories: <?=$detail->category_name?></span>
				</div>

				<!--  -->
				<?php if($page->status_detail_sidebar1 == 'active') : ?>
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						<?=$page->detail_sidebar1?>
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?=$detail->product_desc?>
						</p>
					</div>
				</div>
				<?php endif; ?>

				<?php if($page->status_detail_sidebar2 == 'active') : ?>
				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						<?=$page->detail_sidebar2?>
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>
				<?php endif; ?>
				
				<?php if($page->status_detail_sidebar3 == 'active') : ?>
				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						<?=$page->detail_sidebar3?>
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>
				<?php endif; ?>

			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<?php if($page->status_footer == 'active') : ?>
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					<?=$page->footer_title?>
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

				<?php foreach ($newProduct as $x) : ?>
						<div class="item-slick2 p-l-15 p-r-15">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="<?=base_url('uploads/product/'.$x->product_img)?>" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<a href="<?=base_url('cart/buy/'.$x->product_id)?>">
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
													Add to Cart
												</button>
											</a>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="<?=base_url('shop/detail/'.$x->product_name)?>" class="block2-name dis-block s-text3 p-b-5">
										<?=$x->product_name?>
									</a>

									<span class="block2-price m-text6 p-r-5">
										IDR <?=rupiah($x->product_price)?>
									</span>
								</div>
							</div>
						</div>
					<?php endforeach; ?>

				</div>
			</div>

		</div>
	</section>
	<?php endif; ?>

