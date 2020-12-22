<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-stethoscope"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dipandu</div>
    </a>

    <!-- Sidebar Group Admin -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User Management
    </div>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin')  ?>">
            <i class="fas fa-users"></i>
            <span>User list</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/addkader')  ?>">
            <i class="fas fa-user-plus"></i>
            <span>Tambah Kader</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/addbidan')  ?>">
            <i class="fas fa-user-plus"></i>
            <span>Tambah Bidan</span></a>
    </li>

    <!-- Akhir sidebar gorup admin -->


    <!-- Heading -->
    <div class="sidebar-heading">
        Profile Management
    </div>

    <!-- Nav Item - My profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/profile'); ?>">
            <i class="fas fa-user"></i>
            <span>Profile</span></a>
    </li>

    <!-- Nav Item - Edit profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/edit_profile'); ?>">
            <i class="fas fa-user-edit"></i>
            <span>Edit Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Edit profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout')  ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>