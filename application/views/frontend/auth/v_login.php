	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-4 p-b-30">
          <div class="hov-img-zoom">
						<img src="<?=base_url()?>assets/images/login.jpg" alt="IMG-ABOUT">
					</div>
				</div>

				<div class="col-md-8 p-b-30">
					<form class="leave-comment" action="<?=base_url('login/login')?>" method="POST">
						<h4 class="m-text26 p-b-36 p-t-15">
							Login To Continue
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="user_email" placeholder="Email" required>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="user_pass" placeholder="Password" required>
						</div>

						<div align="center">
							<!-- Button -->
							<button type="submit" class="btn btn-info btn-lg" style="width: 100%">
								LOGIN
							</button>
						</div>

						<div class="size15 m-b-20 mt-3">
							<div class="row">
                <div class="col-6">
                  <a href="">Forget Password</a>
                </div>
                <div class="col-6" align="right">
                  <a href="<?=base_url('register')?>">Register now</a>
                </div>
              </div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</section>