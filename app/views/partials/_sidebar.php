<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }    
?>

<!-- SIDEBAR ELEMENTS -->
<!-- 
    DASHBOARD                   => home
    ANNEES                      => annees
    SOUS PROGRAMMES             => spg
    OBJECTIF SPECIFIQUES        => objectifs
    ACTIONS                     => actions
    ACTIVITES                   => activites
    TACHES                      => taches
    VALIDER PTA                 => validations
    SUIVI DES TACHES            => suivi
    ENGAGER UNE DEPENSE         => depense

    USERS                       => users
-->


<div class="sidebar" style="background-color: #19233e;">

    <nav class="mt-2 mb-5">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item mt-1 <?php if($_GET['r'] == 'home' || $_GET['r'] == '') echo 'menu-open' ?>">
            <a href="/" class="nav-link font-weight-bold <?php  if($_GET['r'] == 'home' || $_GET['r'] == '') echo 'menu-open'  ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Tableau de bord</p>
            </a>
        </li>
        <li class="nav-item mt-1 <?php if($_GET['r'] == 'home' || $_GET['r'] == '') echo 'menu-open' ?>">
            <a href="/users" class="nav-link font-weight-bold <?php if($_SESSION['menu-open'] == "users") echo 'active' ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>Utilisateurs</p>
            </a>
        </li>
        <li class="nav-item mt-1 <?php if($_SESSION['menu-open'] == "users-profils") echo 'menu-open' ?>">
            <a href="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-open'] == "users-profils") echo 'active' ?>">
            <i class="nav-icon fas fa-address-card"></i>
            <p>Profils</p>
            </a>
        </li>

        <div class="my-1 border border-secondary ml-4"></div>

        <li class="nav-item mt-1 <?php if($_SESSION['menu-open'] == "entites") echo 'menu-open' ?>">
            <a href="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-open'] == "entites") echo 'active' ?>">
            <i class="nav-icon fas fa-school"></i>
            <p>Entites</p>
            </a>
        </li>
        <li class="nav-item mt-1 <?php if($_SESSION['menu-open'] == "filieres") echo 'menu-open' ?>">
            <a onclhref="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-open'] == "filieres") echo 'active' ?>">
            <i class="nav-icon fas fa-code-branch"></i>
            <p>Filières</p>
            </a>
        </li>
        <li class="nav-item mt-1 <?php if($_SESSION['menu-open'] == "classes") echo 'menu-open' ?>">
            <a href="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-open'] == "classes") echo 'active' ?>">
            <i class="nav-icon fas fa-briefcase"></i>
            <p>Classes</p>
            </a>
        </li>
        <li class="nav-item mt-1 <?php if($_SESSION['menu-open'] == "etudiants") echo 'menu-open' ?>">
            <a href="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-open'] == "etudiants") echo 'active' ?>">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>Etudiants</p>
            </a>
        </li>

        <div class="my-1 border border-secondary ml-4"></div>

        <li class="nav-item mt-1 <?php if($_SESSION['menu-open'] == "ues") echo 'menu-open' ?>">
            <a href="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-open'] == "ues") echo 'active' ?>">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>UE</p>
            </a>
        </li>
        <li class="nav-item mt-1 <?php if($_SESSION['menu-open'] == "ecus") echo 'menu-open' ?>">
            <a href="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-open'] == "ecus") echo 'active' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>ECU</p>
            </a>
        </li>
        <li class="nav-item mt-1 <?php if($_SESSION['menu-open'] == "evaluations") echo 'menu-open' ?>">
            <a href="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-open'] == "evaluations") echo 'active' ?>">
            <!-- <i class="nav-icon fas fa-check-square"></i> -->
            <i class="nav-icon fas fa-edit" aria-hidden="true"></i>
            <p>Evaluations</p>
            </a>
        </li>
        <li class="nav-item mt-1 <?php if($_SESSION['menu-open'] == "notes") echo 'menu-open' ?>">
            <a href="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-open'] == "notes") echo 'active' ?>">
            <i class="nav-icon fas fa-marker"></i>
            <p>Notes</p>
            </a>
        </li>
        <li class="nav-item mt-1 <?php if($_SESSION['menu-open'] == "releves-notes") echo 'menu-open' ?>">
            <a href="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-open'] == "releves-notes") echo 'active' ?>">
            <i class="nav-icon fas fa-th-list"></i>
            <p>Relevés de notes</p>
            </a>
        </li>

        <div class="my-1 border border-secondary ml-4"></div>

        <li class="nav-item mt-1 <?php if($_SESSION['menu-open'] == "reprises") echo 'menu-open' ?>">
            <a href="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-open'] == "reprises") echo 'active' ?>">
            <i class="nav-icon fas fa-redo-alt"></i>
            <p>Reprises</p>
            </a>
        </li>
        <li class="nav-item has-treeview <?php if($_SESSION['menu-open'] == "proces-verbaux") echo 'menu-open' ?>">
            <a class="nav-link font-weight-bold">
                <i class="nav-icon fas fa-book"></i>
                <p>Procès verbaux</p>
            </a>
            <ul class="nav nav-treeview">
                
            </ul>
        </li>
        <li class="nav-item has-treeview <?php if($_SESSION['menu-open'] == "deliberations") echo 'menu-open' ?>">
            <a class="nav-link font-weight-bold">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>Délibérations</p>
            </a>
            <ul class="nav nav-treeview ml-0 pl-0">
                <li class="nav-item">
                    <a href="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-active'] == "pv-corrections") echo 'active' ?>">
                    <i class="nav-icon fas fa-angle-right ml-4 <?php if($_SESSION['menu-active'] == "pv-corrections") echo 'text-blue' ?>"></i>
                    <p> PV corrections</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-active'] == "notes") echo 'active' ?>">
                    <i class="nav-icon fas fa-angle-right ml-4 <?php if($_SESSION['menu-active'] == "notes") echo 'text-blue' ?>"></i>
                    <p>Modifier notes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-active'] == "pv-decisions") echo 'active' ?>">
                    <i class="nav-icon fas fa-angle-right ml-4 <?php if($_SESSION['menu-active'] == "pv-decisions") echo 'text-blue' ?>"></i>
                    <p> PV décisions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-active'] == "decisions") echo 'active' ?>">
                    <i class="nav-icon fas fa-angle-right ml-4 <?php if($_SESSION['menu-active'] == "decisions") echo 'text-blue' ?>"></i>
                    <p> Décisions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link font-weight-bold <?php if($_SESSION['menu-active'] == "pv-final") echo 'active' ?>">
                    <i class="nav-icon fas fa-angle-right ml-4 <?php if($_SESSION['menu-active'] == "pv-final") echo 'text-blue' ?>"></i>
                    <p> PV final</p>
                    </a>
                </li>
            </ul>
        </li>

        
    </nav>
        
</div>

<script>
    $(function () {
        
    })
</script>