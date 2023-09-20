<nav class="main-header navbar navbar-expand navbar-light" style="background-color: #19233e;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Academic year change select -->
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" class="form-inline ml-3" id="year_change">
      <div class="input-group input-group-sm">
        <select class="form-control form-control-navbar custom-select" name="anneeAcad" id="anneeAcad">
          <option value=""></option>
          <?php foreach(Annee::all() as $annee): ?>
          <option <?php if($annee->getId() == Annee::active()->getId()) echo 'selected'?> value="<?php echo $annee->getId() ?>"><?php echo $annee->getLibelle() ?></option>
          <?php endforeach?>
        </select>
      </div>
    </form>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">    
      <!-- annee en cours -->
      <li class="nav-item dropdown">
        <a class="nav-link text-white">
            <i class="fas fa-calendar-alt"></i>
            <span class="font-weight-bold"><?= Annee::active()->getLibelle() ?></span>          
        </a>
      </li>
      <!-- user panel -->
      <li class="nav-item dropdown mr-2">
        <a class="user-panel d-flex" data-toggle="dropdown">
            <div class="image">
                <img src="<?= ASSETS ?>img/avatar.png" class="img-circle elevation-3 bg-white" alt="DA">
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
          <span class="dropdown-item dropdown-header">
                <div class="d-block font-weight-bold" style="color: #044687;">Nom Prenom</div>
          </span>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profil
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item">
            <i class="fas fa-sliders-h mr-2"></i> Paramètres
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
          </a>
        </div>
      </li>
    </ul>
  </nav>