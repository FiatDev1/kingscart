<?php
ob_start();
session_start();
include("inc/config.php");
include("inc/functions.php");
include("inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';

// Check if the user is logged in or not
if (!isset($_SESSION['user'])) {
	header('location: login.php');
	exit;
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Panel</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="css/all.min.css"> -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/datepicker3.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
	<!-- <link rel="stylesheet" href="css/dataTables.bootstrap.css"> -->
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<!-- <link rel="stylesheet" href="css/AdminLTE.min.css"> -->
	<link rel="stylesheet" href="css/adminlte.css">
	<link rel="stylesheet" href="css/_all-skins.min.css">
	<link rel="stylesheet" href="css/on-off-switch.css" />
	<link rel="stylesheet" href="css/summernote.css">
	<link rel="stylesheet" href="style.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-dark">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">Admin Panel</a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Top Bar ... User Inforamtion .. Login/Log out Area -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="../assets/uploads/<?php echo $_SESSION['user']['photo']; ?>" class="user-image" alt="User Image">
						<span class="hidden-xs"><?php echo $_SESSION['user']['full_name']; ?></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-footer">
							<div>
								<a href="profile-edit.php" class="btn btn-default btn-flat">Edit Profile</a>
							</div>
							<div>
								<a href="logout.php" class="btn btn-default btn-flat">Log out</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->


		<?php $cur_page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1); ?>
		<!-- Side Bar to Manage Shop Activities -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<span class="brand-text font-weight-bold mx-4">Kingscartng.com</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">

						<li class="nav-item <?php if ($cur_page == 'index.php') {
												echo 'active';
											} ?>">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fa fa-tachometer"></i>
								<p>Dashboard</p>
							</a>
						</li>

						<li class="nav-item <?php if ($cur_page == 'settings.php') {
												echo 'active';
											} ?>">
							<a href="settings.php" class="nav-link">
								<i class="nav-icon fa fa-gear"></i>
								<p>Website Settings</p>
							</a>
						</li>



						<li class="nav-item <?php if (($cur_page == 'size.php') || ($cur_page == 'size-add.php') || ($cur_page == 'size-edit.php') || ($cur_page == 'color.php') || ($cur_page == 'color-add.php') || ($cur_page == 'color-edit.php') || ($cur_page == 'country.php') || ($cur_page == 'country-add.php') || ($cur_page == 'country-edit.php') || ($cur_page == 'shipping-cost.php') || ($cur_page == 'shipping-cost-edit.php') || ($cur_page == 'top-category.php') || ($cur_page == 'top-category-add.php') || ($cur_page == 'top-category-edit.php') || ($cur_page == 'mid-category.php') || ($cur_page == 'mid-category-add.php') || ($cur_page == 'mid-category-edit.php') || ($cur_page == 'end-category.php') || ($cur_page == 'end-category-add.php') || ($cur_page == 'end-category-edit.php')) {
												echo 'active';
											} ?>">
							<a href="#" class="nav-link">
								<i class="nav-icon fa fa-cogs"></i>
								<p>
									Shop Settings
									<i class="fa fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="size.php" class="nav-link">
										<i class="fa fa-circle nav-icon"></i>
										<p>Size</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="color.php" class="nav-link">
										<i class="fa fa-circle nav-icon"></i>
										<p>Color</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="country.php" class="nav-link">
										<i class="fa fa-circle nav-icon"></i>
										<p>Country</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="shipping-cost.php" class="nav-link">
										<i class="fa fa-circle nav-icon"></i>
										<p>Shipping Cost</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="top-category.php" class="nav-link">
										<i class="fa fa-circle nav-icon"></i>
										<p>Top Level Category</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="mid-category.php" class="nav-link">
										<i class="fa fa-circle nav-icon"></i>
										<p>Mid Level Category</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="end-category.php" class="nav-link">
										<i class="fa fa-circle nav-icon"></i>
										<p>End Level Category</p>
									</a>
								</li>
							</ul>
						</li>


						<li class="nav-item  <?php if (($cur_page == 'product.php') || ($cur_page == 'product-add.php') || ($cur_page == 'product-edit.php')) {
													echo 'active';
												} ?>">
							<a href="product.php" class="nav-link">
								<i class="nav-icon fa fa-shopping-bag"></i>
								<p>Product Management</p>
							</a>
						</li>

						<li class="nav-item  <?php if (($cur_page == 'order.php')) {
													echo 'active';
												} ?>">
							<a href="order.php" class="nav-link">
								<i class="nav-icon fa fa-edit"></i>
								<p>Order Management</p>
							</a>
						</li>

						<li class="nav-item  <?php if (($cur_page == 'slider.php')) {
													echo 'active';
												} ?>">
							<a href="slider.php" class="nav-link">
								<i class="nav-icon fa fa-picture-o"></i>
								<p>Manage Sliders</p>
							</a>
						</li>
						<!-- Icons to be displayed on Shop -->

						<li class="nav-item  <?php if (($cur_page == 'service.php')) {
													echo 'active';
												} ?>">
							<a href="service.php" class="nav-link">
								<i class="nav-icon fa fa-list-ol"></i>
								<p>Services</p>
							</a>
						</li>

						<li class="nav-item  <?php if (($cur_page == 'faq.php')) {
													echo 'active';
												} ?>">
							<a href="faq.php" class="nav-link">
								<i class="nav-icon fa fa-question-circle"></i>
								<p>FAQ</p>
							</a>
						</li>

						<li class="nav-item  <?php if (($cur_page == 'customer.php') || ($cur_page == 'customer-add.php') || ($cur_page == 'customer-edit.php')) {
													echo 'active';
												} ?>">
							<a href="customer.php" class="nav-link">
								<i class="nav-icon fa fa-user-plus"></i>
								<p>Registered Customer</p>
							</a>
						</li>


						<li class="nav-item  <?php if (($cur_page == 'page.php')) {
													echo 'active';
												} ?>">
							<a href="page.php" class="nav-link">
								<i class="nav-icon fa fa-tasks"></i>
								<p>Page Settings</p>
							</a>
						</li>

						<li class="nav-item  <?php if (($cur_page == 'social-media.php')) {
													echo 'active';
												} ?>">
							<a href="social-media.php" class="nav-link">
								<i class="nav-icon fa fa-globe"></i>
								<p>Social Media</p>
							</a>
						</li>

						<li class="nav-item  <?php if (($cur_page == 'subscriber.php') || ($cur_page == 'subscriber.php')) {
													echo 'active';
												} ?>">
							<a href="subscriber.php" class="nav-link">
								<i class="nav-icon fa fa-hand-o-right"></i>
								<p>Subscriber</p>
							</a>
						</li>


					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>



		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">