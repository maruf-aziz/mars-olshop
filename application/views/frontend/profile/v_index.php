	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">

				<div class="col-md-12 p-b-30">
					<form class="leave-comment" action="<?=base_url('profile/update/'.$profile->user_id)?>" method="POST">
						<h4 class="m-text26 p-b-36 p-t-15">
							My Profile
						</h4>

            <span class="help-block"><i><small><?=form_error('user_name')?></small></i></span>
            <div class="bo4 of-hidden size15 m-b-20">
              <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="user_name" placeholder="Nama" value="<?=$profile->user_name?>">
              <input type="hidden" name="user_id" value="<?=$profile->user_id?>" readonly>
            </div>

            <div class="row">
              <div class="col-md-6">
                <span class="help-block"><i><small><?=form_error('user_email')?></small></i></span>
                <div class="bo4 of-hidden size15 m-b-20">
                  <input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="user_email" placeholder="Email" value="<?=$profile->user_email?>">
                </div>
              </div>

              <div class="col-md-6">
                <span class="help-block"><i><small><?=form_error('user_phone')?></small></i></span>
                <div class="bo4 of-hidden size15 m-b-20">
                  <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="user_phone" placeholder="No Telp" value="<?=$profile->user_phone?>">
                </div>
              </div>
            </div>
            

            <h4 class="m-text26 p-b-36 p-t-15">
							Update Password
						</h4>

            <div class="row">
              <div class="col-md-6">
                <span class="help-block"><i><small><?=form_error('user_pass')?></small></i></span>
                <div class="bo4 of-hidden size15 m-b-20">
                  <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="user_pass" placeholder="Password">
                </div>
              </div>

              <div class="col-md-6">
                <span class="help-block"><i><small><?=form_error('konf_pass')?></small></i></span>
                <div class="bo4 of-hidden size15 m-b-20">
                  <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="konf_pass" placeholder="Konfirmasi Password">              
                </div>
              </div>
            </div>

            <!-- <h4 class="m-text26 p-b-36 p-t-15">
							Addres
						</h4>

            <div class="row">              
              <div class="col-12">

                <a href="#" class="btn btn-success btn-sm" style="margin-bottom: 10px;">Add addres</a>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th col="row">#</th>
                      <th col="row">Road / Place</th>
                      <th col="row">Sub District</th>
                      <th col="row">District</th>
                      <th col="row">Province</th>
                      <th col="row">Pos Code</th>
                      <th col="row">Action</th>
                    </tr>
                  </thead>
                  <tbody id="show_addres">
                    
                  </tbody>
                </table>
              </div>
            </div> -->

						<div align="right">
							<!-- Button -->
							<button type="submit" class="btn btn-info btn-lg">
                Simpan
							</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</section>