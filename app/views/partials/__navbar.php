<nav class="main-header navbar navbar-expand navbar-light" style="background-color: #19233e;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

    
      <!-- Messages Dropdown Menu -->
    
      <!-- user panel -->
      <?php if(isset($_SESSION['notif']) && !empty($_SESSION['notif']) && $_SESSION["showed"] == 1): ?>
      <li class="text-warning text-bold mt-1">
        <marquee behavior="" width="100%" direction="left"><?php echo $_SESSION['notif'] ?></marquee>
      </li>
      <?php endif; ?>
      <li class="nav-item dropdown mr-2">
        <a class="user-panel d-flex" data-toggle="dropdown" href="#">
            <div class="image">
                <img src="<?php echo ASSETS;?>LTE/dist/img/avatar.png" class="brand-image img-circle elevation-3 bg-white" alt="DA">
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
          <span class="dropdown-item dropdown-header" style="background-color: #19233e;">
                <div class="d-block" href="#" style="color: white;"><?php echo isset($_SESSION) ? $_SESSION['prenom'] ." ". $_SESSION['nom'] : " "; ?></div>
          </span>
          <div class="dropdown-divider"></div>
          <a href="profil.html" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profil
          </a>
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-sliders-h mr-2"></i> Paramètres
          </a> -->
          <div class="dropdown-divider"></div>
          <a href="logout.html" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
          </a>
        </div>
      </li>
    </ul>
  </nav>