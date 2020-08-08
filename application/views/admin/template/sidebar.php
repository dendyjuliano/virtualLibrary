<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<?php if ($this->session->userdata('role_id') == 1) : ?>
			<div class="sidebar-brand-text mx-3">Admin</div>
		<?php else : ?>
			<div class="sidebar-brand-text mx-3">Publisher</div>
		<?php endif; ?>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?php if ($this->uri->segment(2) == "dashboard") echo "active" ?>">
		<a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		setting
	</div>

	<!-- Nav Item - Charts -->
	<li class="nav-item <?php if ($this->uri->segment(2) == "book") echo "active" ?>">
		<a class="nav-link" href="<?= base_url('admin/book') ?>">
			<i class="fas fa-fw fa-book"></i>
			<span>Book</span></a>
	</li>

	<!-- Nav Item - Tables -->
	<li class="nav-item <?php if ($this->uri->segment(2) == "category") echo "active" ?>">
		<a class="nav-link" href="<?= base_url('admin/category') ?>">
			<i class="fas fa-fw fa-list"></i>
			<span>Category</span></a>
	</li>
	<!-- Nav Item - Tables -->
	<li class="nav-item <?php if ($this->uri->segment(2) == "transaction") echo "active" ?>">
		<a class="nav-link" href="<?= base_url('admin/transaction') ?>">
			<i class="fas fa-fw fa-coins"></i>
			<span>Transaction</span></a>
	</li>
	<!-- Nav Item - Tables -->
	<li class="nav-item <?php if ($this->uri->segment(2) == "invoice") echo "active" ?>">
		<a class="nav-link" href="<?= base_url('admin/invoice') ?>">
			<i class="fas fa-fw fa-copy"></i>
			<span>Invoice</span></a>
	</li>
	<!-- Nav Item - Tables -->
	<li class="nav-item <?php if ($this->uri->segment(2) == "user") echo "active" ?>">
		<a class="nav-link" href="<?= base_url('admin/user') ?>">
			<i class="fas fa-fw fa-user"></i>
			<span>User</span></a>
	</li>
	<!-- Nav Item - Tables -->
	<li class="nav-item <?php if ($this->uri->segment(2) == "role") echo "active" ?>">
		<a class="nav-link" href="<?= base_url('admin/role') ?>">
			<i class="fas fa-fw fa-users"></i>
			<span>User Role</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
