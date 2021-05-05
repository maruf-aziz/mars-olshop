<section class="content-header">
	<div class="content-header-left">
		<h1>Setting Pages</h1>
	</div>
</section>

<section class="content" style="min-height:auto;margin-bottom: -30px;">
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

		</div>
	</div>
</section>

<section class="content">

	<div class="row">
		<div class="col-md-12">
							
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_home" data-toggle="tab">Home</a></li>
						<li><a href="#tab_shop" data-toggle="tab">Shop</a></li>
						<li><a href="#tab_detail" data-toggle="tab">Detail Product</a></li>
						<li><a href="#tab_cart" data-toggle="tab">Cart</a></li>
						<li><a href="#tab_about" data-toggle="tab">About</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane active" id="tab_home">
							<?php echo form_open_multipart(base_url().'admin/page/update',array('class' => 'form-horizontal')); ?>

							<div class="box box-info">
								<div class="box-body">

                  <h3 class="sec_title">Slider</h3>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Status Slider </label>
                    <div class="col-sm-6" style="padding-top:6px;">
                      <input type="radio" class="form-check-input" name="status_slider" value="active" <?=($page->status_slider == 'active' ? 'checked' : '')?> > Active
                      <input type="radio" class="form-check-input" name="status_slider" value="no" <?=($page->status_slider == 'no' ? 'checked' : '')?> > No
                    </div>
                  </div>

                  <h3 class="sec_title">Product Popular</h3>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Title 1</label>
										<div class="col-sm-6" style="padding-top:6px;">
                      <input type="text" class="form-control" name="title_1" value="<?=$page->title_1?>">
										</div>
									</div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Status Title 1 </label>
                    <div class="col-sm-6" style="padding-top:6px;">
                      <input type="radio" class="form-check-input" name="status_title_1" value="active" <?=($page->status_title_1 == 'active' ? 'checked' : '')?> > Active
                      <input type="radio" class="form-check-input" name="status_title_1" value="no" <?=($page->status_title_1 == 'no' ? 'checked' : '')?> > No
                    </div>
                  </div>

                  <h3 class="sec_title">Product New</h3>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Title 2</label>
										<div class="col-sm-6" style="padding-top:6px;">
                      <input type="text" class="form-control" name="title_2" value="<?=$page->title_2?>">
										</div>
									</div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Status Title 2 </label>
                    <div class="col-sm-6" style="padding-top:6px;">
                      <input type="radio" class="form-check-input" name="status_title_2" value="active" <?=($page->status_title_2 == 'active' ? 'checked' : '')?> > Active
                      <input type="radio" class="form-check-input" name="status_title_2" value="no" <?=($page->status_title_2 == 'no' ? 'checked' : '')?> > No
                    </div>
                  </div>

                  <h3 class="sec_title">Information</h3>
                  <div class="form-group">
										<label for="" class="col-sm-2 control-label">Info 1</label>
										<div class="col-sm-6" style="padding-top:6px;">
                      <input type="text" class="form-control" name="info_1" value="<?=$page->info_1?>">
										</div>
									</div>

                  <div class="form-group">
										<label for="" class="col-sm-2 control-label">Info 2</label>
										<div class="col-sm-6" style="padding-top:6px;">
                      <input type="text" class="form-control" name="info_2" value="<?=$page->info_2?>">
										</div>
									</div>

                  <div class="form-group">
										<label for="" class="col-sm-2 control-label">Info 3</label>
										<div class="col-sm-6" style="padding-top:6px;">
                      <input type="text" class="form-control" name="info_3" value="<?=$page->info_3?>">
										</div>
									</div>

									<div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_home">Update</button>
										</div>
									</div>

								</div>
							</div>

							<?php echo form_close(); ?>
						</div>

            <div class="tab-pane" id="tab_shop">
              <?php echo form_open_multipart(base_url().'admin/page/update',array('class' => 'form-horizontal')); ?>

                <div class="box box-info">
                  <div class="box-body">

                    <h3 class="sec_title">Banner</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Status banner </label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="radio" class="form-check-input" name="status_banner" value="active" <?=($shop->status_banner == 'active' ? 'checked' : '')?> > Active
                        <input type="radio" class="form-check-input" name="status_banner" value="no" <?=($shop->status_banner == 'no' ? 'checked' : '')?> > No
                      </div>
                    </div>

                    <h3 class="sec_title">Sidebar</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Title Sidebar 1</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="sidebar1" value="<?=$shop->sidebar1?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Status Sidebar 1 </label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="radio" class="form-check-input" name="status_slidebar_1" value="active" <?=($shop->status_slidebar_1 == 'active' ? 'checked' : '')?> > Active
                        <input type="radio" class="form-check-input" name="status_slidebar_1" value="no" <?=($shop->status_slidebar_1 == 'no' ? 'checked' : '')?> > No
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Title Sidebar 2</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="sidebar2" value="<?=$shop->sidebar2?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Sub Sidebar 2</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="sub_sidebar2" value="<?=$shop->sub_sidebar2?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Button Sub Sidebar 2</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="btn_sub_sidebar2" value="<?=$shop->btn_sub_sidebar2?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Status Sidebar 2 </label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="radio" class="form-check-input" name="status_sidebar2" value="active" <?=($shop->status_sidebar2 == 'active' ? 'checked' : '')?> > Active
                        <input type="radio" class="form-check-input" name="status_sidebar2" value="no" <?=($shop->status_sidebar2 == 'no' ? 'checked' : '')?> > No
                      </div>
                    </div>

                    <h3 class="sec_title">Sorting</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Sorting 1</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="sorting1" value="<?=$shop->sorting1?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Title 1 Sorting 1</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="title1_sorting1" value="<?=$shop->title1_sorting1?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Value 1</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="value1" value="<?=$shop->value1?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Title 2 Sorting 1</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="title2_sorting1" value="<?=$shop->title2_sorting1?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Value 2</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="value2" value="<?=$shop->value2?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Status Sorting 1 </label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="radio" class="form-check-input" name="status_sorting1" value="active" <?=($shop->status_sorting1 == 'active' ? 'checked' : '')?> > Active
                        <input type="radio" class="form-check-input" name="status_sorting1" value="no" <?=($shop->status_sorting1 == 'no' ? 'checked' : '')?> > No
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label"></label>
                      <div class="col-sm-6">
                        <button type="submit" class="btn btn-success pull-left" name="form_shop">Update</button>
                      </div>
                    </div>

                  </div>
                </div>

              <?php echo form_close(); ?>
            </div>

            <div class="tab-pane" id="tab_detail">
              <?php echo form_open_multipart(base_url().'admin/page/update',array('class' => 'form-horizontal')); ?>

                <div class="box box-info">
                  <div class="box-body">

                    <h3 class="sec_title">Sorting Detail</h3>                   

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Sorting 1</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="sorting_in_detail" value="<?=$shop->sorting_in_detail?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Title 1</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="title1" value="<?=$shop->title1?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Value 1</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="val_title1" value="<?=$shop->val_title1?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Title 2</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="title2" value="<?=$shop->title2?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Value 2</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="val_title2" value="<?=$shop->val_title2?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Title 3</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="title3" value="<?=$shop->title3?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Value 3</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="val_title3" value="<?=$shop->val_title3?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Title 4</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="title4" value="<?=$shop->title4?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Value 4</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="val_title4" value="<?=$shop->val_title4?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Status Sorting 1 </label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="radio" class="form-check-input" name="status_detail_sorting" value="active" <?=($shop->status_detail_sorting == 'active' ? 'checked' : '')?> > Active
                        <input type="radio" class="form-check-input" name="status_detail_sorting" value="no" <?=($shop->status_detail_sorting == 'no' ? 'checked' : '')?> > No
                      </div>
                    </div>

                    <h3 class="sec_title">Sidebar</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Sidebar 1</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="detail_sidebar1" value="<?=$shop->detail_sidebar1?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Status Sidebar 1 </label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="radio" class="form-check-input" name="status_detail_sidebar1" value="active" <?=($shop->status_detail_sidebar1 == 'active' ? 'checked' : '')?> > Active
                        <input type="radio" class="form-check-input" name="status_detail_sidebar1" value="no" <?=($shop->status_detail_sidebar1 == 'no' ? 'checked' : '')?> > No
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Sidebar 2</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="detail_sidebar2" value="<?=$shop->detail_sidebar2?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Status Sidebar 2 </label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="radio" class="form-check-input" name="status_detail_sidebar2" value="active" <?=($shop->status_detail_sidebar2 == 'active' ? 'checked' : '')?> > Active
                        <input type="radio" class="form-check-input" name="status_detail_sidebar2" value="no" <?=($shop->status_detail_sidebar2 == 'no' ? 'checked' : '')?> > No
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Sidebar 3</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="detail_sidebar3" value="<?=$shop->detail_sidebar3?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Status Sidebar 3 </label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="radio" class="form-check-input" name="status_detail_sidebar3" value="active" <?=($shop->status_detail_sidebar3 == 'active' ? 'checked' : '')?> > Active
                        <input type="radio" class="form-check-input" name="status_detail_sidebar3" value="no" <?=($shop->status_detail_sidebar3 == 'no' ? 'checked' : '')?> > No
                      </div>
                    </div>
                    

                    <h3 class="sec_title">Button Name</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Btn Name</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="btn_name" value="<?=$shop->btn_name?>">
                      </div>
                    </div>

                    <h3 class="sec_title">Footer</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Title</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="footer_title" value="<?=$shop->footer_title?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Status Footer </label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="radio" class="form-check-input" name="status_footer" value="active" <?=($shop->status_footer == 'active' ? 'checked' : '')?> > Active
                        <input type="radio" class="form-check-input" name="status_footer" value="no" <?=($shop->status_footer == 'no' ? 'checked' : '')?> > No
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label"></label>
                      <div class="col-sm-6">
                        <button type="submit" class="btn btn-success pull-left" name="form_detail">Update</button>
                      </div>
                    </div>

                  </div>
                </div>

              <?php echo form_close(); ?>
            </div>

            <div class="tab-pane" id="tab_cart">
              <?php echo form_open_multipart(base_url().'admin/page/update',array('class' => 'form-horizontal')); ?>

                <div class="box box-info">
                  <div class="box-body">

                    <h3 class="sec_title">Banner</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Status banner </label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="radio" class="form-check-input" name="status_banner" value="active" <?=($cart->status_banner == 'active' ? 'checked' : '')?> > Active
                        <input type="radio" class="form-check-input" name="status_banner" value="no" <?=($cart->status_banner == 'no' ? 'checked' : '')?> > No
                      </div>
                    </div>

                    <h3 class="sec_title">Table</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Header 1</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="table_title1" value="<?=$cart->table_title1?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Header 2</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="table_title2" value="<?=$cart->table_title2?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Header 3</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="table_title3" value="<?=$cart->table_title3?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Header 4</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="table_title4" value="<?=$cart->table_title4?>">
                      </div>
                    </div>

                    <h3 class="sec_title">Button</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Button Left</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="btn_name1" value="<?=$cart->btn_name1?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Status Button Left </label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="radio" class="form-check-input" name="status_text1" value="active" <?=($cart->status_text1 == 'active' ? 'checked' : '')?> > Active
                        <input type="radio" class="form-check-input" name="status_text1" value="no" <?=($cart->status_text1 == 'no' ? 'checked' : '')?> > No
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Button Right</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="btn_name2" value="<?=$cart->btn_name2?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Status Button Right </label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="radio" class="form-check-input" name="status_btn2" value="active" <?=($cart->status_btn2 == 'active' ? 'checked' : '')?> > Active
                        <input type="radio" class="form-check-input" name="status_btn2" value="no" <?=($cart->status_btn2 == 'no' ? 'checked' : '')?> > No
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Button Footer</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="btn_name3" value="<?=$cart->btn_name3?>">
                      </div>
                    </div>

                    <h3 class="sec_title">Footer</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Title</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="footer_title" value="<?=$cart->footer_title?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Heading 1</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="title1" value="<?=$cart->title1?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Heading 2</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="title2" value="<?=$cart->title2?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Heading 3</label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="text" class="form-control" name="title3" value="<?=$cart->title3?>">
                      </div>
                    </div>                    

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label"></label>
                      <div class="col-sm-6">
                        <button type="submit" class="btn btn-success pull-left" name="form_cart">Update</button>
                      </div>
                    </div>

                  </div>
                </div>

              <?php echo form_close(); ?>
            </div>

            <div class="tab-pane" id="tab_about">
              <?php echo form_open_multipart(base_url().'admin/page/update',array('class' => 'form-horizontal')); ?>

                <div class="box box-info">
                  <div class="box-body">

                    <h3 class="sec_title">Banner</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Status banner </label>
                      <div class="col-sm-6" style="padding-top:6px;">
                        <input type="radio" class="form-check-input" name="status_banner" value="active" <?=($about->status_banner == 'active' ? 'checked' : '')?> > Active
                        <input type="radio" class="form-check-input" name="status_banner" value="no" <?=($about->status_banner == 'no' ? 'checked' : '')?> > No
                      </div>
                    </div>

                    <h3 class="sec_title">Body</h3>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Images</label>
                      <div class="col-sm-2" style="padding-top:6px;">
                        <input type="file" class="form-control" name="img" >
                        <ul>
                          <li>Max 2 mb</li>
                        </ul>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Desc</label>
                      <div class="col-sm-8" style="padding-top:6px;">
                        <textarea class="form-control editor" name="description"><?=$about->description?></textarea>
                      </div>
                    </div> 

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label"></label>
                      <div class="col-sm-6">
                        <button type="submit" class="btn btn-success pull-left" name="form_about">Update</button>
                      </div>
                    </div>

                  </div>
                </div>

              <?php echo form_close(); ?>
            </div>
            
					</div>
				</div>			
		</div>
	</div>

</section>