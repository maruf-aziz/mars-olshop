	<?php if($page->status_banner == 'active') : ?>
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?=base_url('uploads/banner/'.$shop)?>);">
		<!-- <h2 class="l-text2 t-center">
			Women
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Women Collection 2018
		</p> -->
	</section>
	<?php endif; ?>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->

						<?php if($page->status_slidebar_1 == 'active') : ?>
						<h4 class="m-text14 p-b-7">
							<?=$page->sidebar1?>
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="<?=base_url('shop')?>" class="s-text13">
									All
								</a>
							</li>
							
							<?php foreach ($category as $c) : ?>

								<li class="p-t-4">
									<a href="<?=base_url('shop/index/'.$c->category_name)?>" class="s-text13 <?=$this->uri->segment(3) == $c->category_name ? 'active1' : null?>">
										<?=$c->category_name?>
									</a>
								</li>

							<?php endforeach ;?>
						</ul>
						<?php endif; ?>

						<!--  -->
						<?php if($page->status_sidebar2 == 'active') : ?>
						<h4 class="m-text14 p-b-32">
							<?=$page->sidebar2?>
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								<?=$page->sub_sidebar2?>
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4" onclick="filter()">
										<?=$page->btn_sub_sidebar2?>
									</button>
								</div>
								<div class="s-text3 p-t-10 p-b-10">
									Range: Rp. <span id="value-lower">610</span> - Rp. <span id="value-upper">980</span>
								</div>
							</div>
						</div>

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" id="search" name="search-product" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4" onclick="searchProduct()">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
						<?php endif; ?>

					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<?php if($page->status_sorting1 == 'active') : ?>
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-1" id="select_order" name="sorting" onchange="order()">
									<option value="">Default Sorting</option>
									<option value="<?=$page->value1?>"><?=$page->title1_sorting1?></option>
									<option value="<?=$page->value2?>"><?=$page->title2_sorting1?></option>
								</select>
							</div>
							<?php endif; ?>

							<!-- <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-1" name="sorting">
									<option>Price</option>
									<option>$0.00 - $50.00</option>
									<option>$50.00 - $100.00</option>
									<option>$100.00 - $150.00</option>
									<option>$150.00 - $200.00</option>
									<option>$200.00+</option>

								</select>
							</div> -->
						</div>

						<!-- <span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span> -->
					</div>

					<!-- Product -->
					<div class="row" id="show">
						
					</div>

					<!-- Pagination -->
					<!-- <div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div> -->
				
				</div>
			</div>
		</div>
	</section>

	<!--===============================================================================================-->
	<script type="text/javascript" src="<?=base_url()?>assets/vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 0, <?=$priceMax->product_price?> ],
	        connect: true,
	        range: {
	            'min': 0,
	            'max': <?=$priceMax->product_price?>
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });

			$(document).ready(function(){
				$('#show').load("<?=base_url('shop/show/'.$this->uri->segment(3))?>");
			});

			function order(){
				var order = $('#select_order').val();
				var category  = "<?=$this->uri->segment(3)?>";

				if(category == '') $('#show').load("<?=base_url('shop/show/0/')?>"+order);

				else $('#show').load("<?=base_url('shop/show/'.$this->uri->segment(3).'/')?>"+order);
				

				console.log(order);
			}

			function searchProduct(){
				var name = $('#search').val();

				$('#show').load("<?=base_url('shop/search/')?>"+name);
				// console.log(name);
			}

			function filter(){
				var price_low = document.getElementById('value-lower').innerHTML;
				var price_max = document.getElementById('value-upper').innerHTML;

				$('#show').load("<?=base_url('shop/filter/')?>"+price_low+"/"+price_max);

				// console.log(price);
			}
			


	</script>


