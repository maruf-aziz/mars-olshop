<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?=$title?></title>

		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="icon" type="image/png" href="<?=base_url()?>assets/images/icons/favicon.png"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/ionicons.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/datepicker3.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/all.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/select2.min.css">
		<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/dataTables.bootstrap.css"> -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/jquery.fancybox.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/_all-skins.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/summernote.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/magnific-popup.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/style.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap.min.css">
		

		<script src="<?php echo base_url(); ?>assets/admin/js/jquery-2.2.4.min.js"></script>


		<style>
			.skin-blue .wrapper,
			.skin-blue .main-header .logo,
			.skin-blue .main-header .navbar,
			.skin-blue .main-sidebar,
			.content-header .content-header-right a,
			.content .form-horizontal .btn-success {
				background-color: #4172a5!important;
			}

			.content-header .content-header-right a,
			.content .form-horizontal .btn-success {
				border-color: #4172a5!important;
			}
			
			.content-header>h1,
			.content-header .content-header-left h1,
			h3 {
				color: #4172a5!important;
			}

			.box.box-info {
				border-top-color: #4172a5!important;
			}

			.nav-tabs-custom>.nav-tabs>li.active {
				border-top-color: #f4f4f4!important;
			}

			.skin-blue .sidebar a {
				color: #fff!important;
			}

			.skin-blue .sidebar-menu>li>.treeview-menu {
				margin: 0!important;
			}
			.skin-blue .sidebar-menu>li>a {
				border-left: 0!important;
			}

			.nav-tabs-custom>.nav-tabs>li {
				border-top-width: 1px!important;
			}

		</style>

	</head>

	<body class="hold-transition fixed skin-blue sidebar-mini">

		<div class="wrapper">

			<header class="main-header">

				<a href="" class="logo">
					<span class="logo-lg">Web-Denayu</span>
				</a>

				<nav class="navbar navbar-static-top">
					
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>

					<span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Admin Panel</span>

					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li>
								<a href="<?=base_url()?>" target="_blank">Visit Website</a>
							</li>

							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">

									<?php if($this->fungsi->user_login()->user_img != null): ?>
										<img src="<?=base_url('uploads/user/'.$this->fungsi->user_login()->user_img)?>" class="user-image" alt="user photo">
									
									<?php else : ?>
										<img src="<?php echo base_url(); ?>assets/admin/img/no-photo.jpg" class="user-image" alt="user photo">
									
									<?php endif; ?>
									
									<span class="hidden-xs"><?= $this->fungsi->user_login()->user_name ?></span>
								</a>
								<ul class="dropdown-menu">
									<li class="user-footer">
										<div>
											<a href="" class="btn btn-default btn-flat">Edit Profile</a>
										</div>
										<div>
											<button type="button" style="width : 100%" onclick="logoutConfirm()" class="btn btn-default btn-flat">Log out</button>
										</div>
									</li>
								</ul>
							</li>
							
						</ul>
					</div>

				</nav>
			</header>

			<aside class="main-sidebar">
				<section class="sidebar">
					<ul class="sidebar-menu">

						<li class="treeview <?=$this->uri->segment(2) == 'dashboard' ? 'active' : null;?>">
							<a href="<?php echo base_url(); ?>admin/dashboard">
								<i class="fa fa-laptop"></i> <span>Dashboard</span>
							</a>
						</li>

						<li class="treeview <?=$this->uri->segment(2) == 'setting' ? 'active' : null;?>">
							<a href="<?=base_url('admin/setting')?>">
								<i class="fa fa-cog"></i> <span>Settings</span>
							</a>
						</li>

						<li class="treeview <?=$this->uri->segment(2) == 'category' ? 'active' : null?>">
							<a href="<?=base_url('admin/category')?>">
								<i class="fa fa-navicon"></i> <span>Category Product</span>
							</a>
						</li>

						<li class="treeview <?=$this->uri->segment(2) == 'product' ? 'active' : null?>">
							<a href="<?=base_url('admin/product')?>">
								<i class="fa fa-cube"></i> <span>Product</span>
							</a>
						</li>

						<li class="treeview <?=$this->uri->segment(2) == 'slider' ? 'active' : null?>">
							<a href="<?=base_url('admin/slider')?>">
								<i class="fa fa-file-movie-o"></i> <span>Slider</span>
							</a>
						</li>

						<li class="treeview <?=$this->uri->segment(2) == 'popular' ? 'active' : null?>">
							<a href="<?=base_url('admin/popular')?>">
								<i class="fa fa-level-up"></i> <span>Popular</span>
							</a>
						</li>

						<li class="treeview <?=$this->uri->segment(2) == 'member' ? 'active' : null?>">
							<a href="<?=base_url('admin/member')?>">
								<i class="fa fa-user-o"></i> <span>Member</span>
							</a>
						</li>

						<li class="treeview <?=$this->uri->segment(2) == 'transactions' ? 'active' : null?>">
							<a href="<?=base_url('admin/transactions')?>">
								<i class="fa fa-shopping-cart"></i> <span>Transaction  
									<span class="btn btn-success btn-xs">
										<div id="show_count"></div>
									</span> 
								</span>
							</a>
						</li>

						<li class="treeview <?=$this->uri->segment(2) == 'confirm' ? 'active' : null?>">
							<a href="<?=base_url('admin/confirm')?>">
								<i class="fa fa-money"></i> <span>Confirm Transaction</span>
							</a>
						</li>

						<li class="treeview <?=$this->uri->segment(2) == 'bank' ? 'active' : null?>">
							<a href="<?=base_url('admin/bank')?>">
								<i class="fa fa-credit-card"></i> <span>Bank</span>
							</a>
						</li>

						<li class="treeview <?=$this->uri->segment(2) == 'user' ? 'active' : null?>">
							<a href="<?=base_url('admin/user')?>">
								<i class="fa fa-user-circle"></i> <span>User</span>
							</a>
						</li>

					</ul>
				</section>
			</aside>

			<div class="content-wrapper">

				<?=$contents?>

			</div>

		</div>

		
		<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/dataTables.bootstrap.min.js"></script>
		
		<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>

		<script src="<?php echo base_url(); ?>assets/admin/js/select2.full.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/jscolor.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery.inputmask.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery.inputmask.date.extensions.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery.inputmask.extensions.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/icheck.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/fastclick.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery.sparkline.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery.slimscroll.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery.fancybox.pack.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/app.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/summernote.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery.magnific-popup.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/demo.js"></script>

		<script>
			function logoutConfirm() {
				var txt;
				if (confirm("Are You Sure ? ")) {
					window.location = "<?=base_url('auth/authentication/logout')?>";
				}
			}
		</script>
		
		<script>
		

			(function($) {

				$('#show_count').load('<?=base_url('admin/transactions/count')?>');

				$(document).ready(function() {
					var auto_refresh = setInterval(
					function () {
						$('#show_count').load('<?=base_url('admin/transactions/count')?>');
					}, 10000); // refresh setiap 1000 milliseconds
				});
				
				$(document).ready(function() {
							$('#editor1').summernote({
								height: 300
							});
							$('#editor2').summernote({
								height: 300
							});
							$('#editor3').summernote({
								height: 300
							});
							$('#editor4').summernote({
								height: 300
							});
							$('#editor5').summernote({
								height: 300
							});
							$('#editor6').summernote({
								height: 300
							});
							$('.editor').summernote({
								height: 300
							});
							$('.editor_short').summernote({
								height: 150
							});
					});

					//Initialize Select2 Elements
					$(".select2").select2();

					//Datemask dd/mm/yyyy
					$("#datemask").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
					//Datemask2 mm/dd/yyyy
					$("#datemask2").inputmask("mm-dd-yyyy", {"placeholder": "mm-dd-yyyy"});
					//Money Euro
					$("[data-mask]").inputmask();

					//Date picker
					$('.datepicker').datepicker({
						autoclose: true,
						format: 'yyyy-mm-dd',
						todayBtn: 'linked',
					});
					$('#datepicker').datepicker({
						autoclose: true,
						format: 'yyyy-mm-dd',
						todayBtn: 'linked',
					});

					$('#datepicker1').datepicker({
						autoclose: true,
						format: 'yyyy-mm-dd',
						todayBtn: 'linked',
					});

					$('#datepicker2').datepicker({
						autoclose: true,
						format: 'yyyy-mm-dd',
						todayBtn: 'linked',
					});

					//iCheck for checkbox and radio inputs
					$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
						checkboxClass: 'icheckbox_minimal-blue',
						radioClass: 'iradio_minimal-blue'
					});
					//Red color scheme for iCheck
					$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
						checkboxClass: 'icheckbox_minimal-red',
						radioClass: 'iradio_minimal-red'
					});
					//Flat red color scheme for iCheck
					$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
						checkboxClass: 'icheckbox_flat-green',
						radioClass: 'iradio_flat-green'
					});


					$("#example1").DataTable();
					$('#example2').DataTable({
						"paging": true,
						"lengthChange": false,
						"searching": false,
						"ordering": true,
						"info": true,
						"autoWidth": false
					});

					var table = $('#example').DataTable( {
							lengthChange: false,
							buttons: [ 'copy', 'excel', 'pdf', 'print' ]
					} );
			
					table.buttons().container()
							.appendTo( '#example_wrapper .col-sm-6:eq(0)' );

					$('#confirm-delete').on('show.bs.modal', function(e) {
						$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
					});

			})(jQuery);

		</script>

		<script type="text/javascript">

				$(document).ready(function () {

					$("#btnAddNew").click(function () {

							var rowNumber = $("#PhotosTable tbody tr").length;

							var trNew = "";              

							var addLink = "<div class=\"upload-btn" + rowNumber + "\"><input type=\"file\" name=\"photos[]\"></div>";
								
							var deleteRow = "<a href=\"javascript:void()\" class=\"Delete btn btn-danger btn-xs\">X</a>";

							trNew = trNew + "<tr> ";

							trNew += "<td>" + addLink + "</td>";
							trNew += "<td style=\"width:28px;\">" + deleteRow + "</td>";

							trNew = trNew + " </tr>";

							$("#PhotosTable tbody").append(trNew);

					});

					$('#PhotosTable').delegate('a.Delete', 'click', function () {
							$(this).parent().parent().fadeOut('slow').remove();
							return false;
					});


				});

				selectEmailMethod = $('#selectEmailMethod').val();
						$('#selectEmailMethod').on('change',function() {
								selectEmailMethod = $('#selectEmailMethod').val();
								if ( selectEmailMethod == 'Normal' ) {
										$('#smtpContainer').hide();
								} else if ( selectEmailMethod == 'SMTP' ) {
										$('#smtpContainer').show();
								}
						});
				
		</script>

	</body>
</html>