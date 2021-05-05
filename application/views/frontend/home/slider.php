        <div id="demo" class="carousel slide" data-ride="carousel">

					<?php
						$i = 0;
						$j = 0;
					?>

					<!-- Indicators -->
					<ul class="carousel-indicators">
						<?php foreach($slider as $x) : ?>
							<li data-target="#demo" data-slide-to="<?=$i++?>" class="<?=($i == 0 ? 'active' : '')?>"></li>
						<?php endforeach; ?>
					</ul>
					
					<!-- The slideshow -->
					<div class="carousel-inner">

						<?php foreach($slider as $x) : ?>
							<div class="carousel-item <?=($j++ == 0 ? 'active' : '')?>">
								<img src="<?=base_url('uploads/slider/'.$x->slider_banner)?>" alt="img" width="100%" height="100%">
							</div>
						<?php endforeach; ?>

					</div>
				</div>