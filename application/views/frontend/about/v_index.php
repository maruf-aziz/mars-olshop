	<?php if($page->status_banner == 'active') : ?>
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?=base_url('uploads/banner/'.$about)?>);">
		<!-- <h2 class="l-text2 t-center">
			About
		</h2> -->
	</section>
	<?php endif; ?>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				<div class="col-md-4 p-b-30">
					<div class="hov-img-zoom">
						<!-- <img src="<?=base_url()?>assets/images/aboutus.png" alt="IMG-ABOUT"> -->
						<img src="<?=base_url('uploads/about/'.$page->img)?>" alt="IMG-ABOUT">
					</div>
				</div>

				<div class="col-md-8 p-b-30">
						<?=$page->description?>
				</div>
			</div>
		</div>
	</section>