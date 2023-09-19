@php
    $user = auth()->user();
@endphp
 
 
 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3"><img src="{{ asset('images/logo.png') }}" class="logo" alt="HBWW International"></div>
    </a>

    @if ($user->userlevel === 'Admin')

    <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link" href="/superadmin">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Super Admin</span>
            </a>
        </li>
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
     <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


     <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw"></i>
            <span>Earnings</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Compensation:</h6>
                <a class="collapse-item" href="earnings">Monthly Earnings</a>
                <a class="collapse-item" href="soontopublish.html">Rebates</a>
                <a class="collapse-item" href="soontopublish.html">Direct Earnings</a>
                <a class="collapse-item" href="soontopublish.html">Total Earnings</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw"></i>
            <span>Products</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Categories:</h6>
                @if ($user->userlevel === 'Admin')
                 <a class="collapse-item" href="/products/addnew">Add New</a>
                @endif
                <a class="collapse-item" href="/products/all">All Products</a>
                <a class="collapse-item" href="/products/beautypro">Beauty Products</a>
                <a class="collapse-item" href="/products/foodcup">Food Supplements</a>
                <a class="collapse-item" href="/products/homecare">Home Care Products</a>
                <a class="collapse-item" href="/products/cosmetics">Cosmetics and Scent</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading">
        Shop
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/products">
            <i class="fas fa-fw"></i>
            <span>Starter Kit</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="soontopublish.html">
            <i class="fas fa-fw"></i>
            <span>My Cart</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading">
        Unilevel
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="List.html">
            <i class="fas fa-fw"></i>
            <span>List</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->