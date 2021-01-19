<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
 <!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Hotel Reservation</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo URL; ?>public/assets2/img/brand/favicon1.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo URL; ?>public/assets2/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?php echo URL; ?>public/assets2/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
   <!-- Page plugins -->
   <link rel="stylesheet" href="<?php echo URL; ?>public/assets2/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="<?php echo URL; ?>public/assets2/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
   <link rel="stylesheet" href="<?php echo URL; ?>public/assets2/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">


  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo URL; ?>public/assets2/css/argon.css?v=1.1.0" type="text/css">
  
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="../../pages/dashboards/dashboard.html">
          <img src="<?php echo URL; ?>public/assets2/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">



            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL; ?>dashboards">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Dashboards</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL; ?>chambre">
                <i class="ni ni-building text-orange"></i>
                <span class="nav-link-text">Room Management</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL; ?>category">
                <i class="ni ni-atom text-green"></i>
                <span class="nav-link-text">Category Management</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL; ?>image">
                <i class="ni ni-image text-red"></i>
                <span class="nav-link-text">Image Management</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL; ?>ville">
                <i class="ni ni-world-2 text-green"></i>
                <span class="nav-link-text">City Management</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL; ?>hotel">
                <i class="ni ni-istanbul text-red"></i>
                <span class="nav-link-text">Hotel Management</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL; ?>promotion">
                <i class="ni ni-khalil text-green"></i>
                <span class="nav-link-text">Discount Management</span>
              </a>
            </li>

          </ul>

        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>


          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?php echo URL; ?>public/assets2/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">Admin</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>

                <div class="dropdown-divider"></div>
                <a href="<?php echo URL; ?>login/logout" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
