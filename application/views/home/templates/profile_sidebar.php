<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3"><?= $this->session->userdata('nama') ?></div>
	</a>


	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		setting
	</div>

	<!-- Nav Item - Charts -->
	<li class="nav-item <?php if ($this->uri->segment(2) == "profile") echo "active" ?>">
		<a class="nav-link " href="<?= base_url('home/profile') ?>">
			<i class="fas fa-fw fa-user"></i>
			<span>Profile</span></a>
	</li>

	<!-- Nav Item - Tables -->
	<li class="nav-item <?php if ($this->uri->segment(2) == "history") echo "active" ?>">
		<a class="nav-link" href="<?= base_url('home/history') ?>">
			<i class="fas fa-fw fa-history"></i>
			<span>History</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
