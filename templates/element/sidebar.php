<?php

?>
<!-- Brand Logo -->
<a href="/" class="brand-link">
  <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light">Negozio</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/users/dashboard" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p><?= __('Dashboard') ?></p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        <?= __('Gestione utenti') ?>
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/companies/company-profile?company_id=<?=$company_id?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?= __('La mia compagnia') ?></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/users/admin-all-users-list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?= __('Tutti gli utenti') ?></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/users/admin-all-employees-list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?= __('Tutti i dipendenti') ?></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/companies/admin-all-companies-list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?= __('Tutti gli aziende') ?></p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        <?= __('Gestione prodotti') ?>
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/products/admin-all-products-list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?= __('Tutti i prodotti') ?></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/categories/admin-all-categories-list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?= __('Tutte le categorie') ?></p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="/users/logout" class="nav-link">
                    <i class="fas fa-sign-out nav-icon"></i>
                    <p><?= __('Esci') ?></p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
