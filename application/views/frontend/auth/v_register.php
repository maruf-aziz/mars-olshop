	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-4 p-b-30">
          <div class="hov-img-zoom">
						<img src="<?=base_url()?>assets/images/register.svg" alt="IMG-ABOUT">
					</div>
				</div>

				<div class="col-md-8 p-b-30">
					<form class="leave-comment" action="<?=base_url('register/add')?>" method="POST">
						<h4 class="m-text26 p-b-36 p-t-15">
							Create Account
						</h4>

            <span class="help-block"><i><small><?=form_error('user_name')?></small></i></span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="user_name" placeholder="Nama" value="<?=set_value('user_name')?>">
						</div>

            <span class="help-block"><i><small><?=form_error('user_email')?></small></i></span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="user_email" placeholder="Email" value="<?=set_value('user_email')?>">
						</div>

            <span class="help-block"><i><small><?=form_error('user_phone')?></small></i></span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="user_phone" placeholder="No Telp" value="<?=set_value('user_phone')?>">
						</div>

            <span class="help-block"><i><small><?=form_error('user_pass')?></small></i></span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="user_pass" placeholder="Password">
						</div>

            <span class="help-block"><i><small><?=form_error('konf_pass')?></small></i></span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="konf_pass" placeholder="Konfirmasi Password">              
						</div>

						<div align="center">
							<!-- Button -->
							<button type="submit" class="btn btn-info btn-lg" style="width: 100%">
                REGISTER
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>