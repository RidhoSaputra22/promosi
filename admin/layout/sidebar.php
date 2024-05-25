<?php 
    $URL = 'index.php?page=';


    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = "";
    }
?>



<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin </div>
</a>
<!-- Nav Item - Tables -->
<li class="nav-item <?=($page == 'produk') ? "active" :"" ?>">
    <a class="nav-link" href="<?= $URL ?>produk">
        <i class="fas fa-fw fa-table"></i>
        <span>Produk</span></a>
</li>
<li class="nav-item <?=($page == 'user') ? "active" :"" ?>">
    <a class="nav-link" href="<?= $URL ?>user">
        <i class="fas fa-fw fa-table"></i>
        <span>Pengguna</span></a>
</li>
<li class="nav-item <?=($page == 'galeri') ? "active" :"" ?>">
    <a class="nav-link" href="<?= $URL ?>galeri">
        <i class="fas fa-fw fa-table"></i>
        <span>Galeri</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->