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
        Menu Orang tua
    </div>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kader')  ?>">
            <i class="fas fa-users"></i>
            <span>Data Kader</span></a>
    </li>


    <!-- Nav Item -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kader/dataanak')  ?>">
            <i class="fas fa-seedling"></i>
            <span>Data Anak</span></a>
    </li> -->


    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kader/datakeluarga')  ?>">
            <i class="fas fa-calendar-times"></i>
            <span>Data Keluarga</span></a>
    </li>


    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kader/jadwalimunisasi')  ?>">
            <i class="fas fa-calendar-times"></i>
            <span>Jadwal Imunisasi</span></a>
    </li>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kader/jadwalposyandu')  ?>">
            <i class="fas fa-file-alt"></i>
            <span>Jadwal Posyandu</span></a>
    </li>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kader/laporan')  ?>">
            <i class="fas fa-file-alt"></i>
            <span>Laporan Bulanan</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Profile Management
    </div>

    <!-- Nav Item - My profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kader/profile') ?>">
            <i class="fas fa-user"></i>
            <span>Profile</span></a>
    </li>

    <!-- Nav Item - Edit profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kader/edit_profile') ?>">
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