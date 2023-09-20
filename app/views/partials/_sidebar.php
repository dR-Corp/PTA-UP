<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }    
?>

<!-- SIDEBAR ELEMENTS -->
<!-- 
    DASHBOARD                   => home
    ANNEES                      => annees
    SOUS PROGRAMMES             => spgrm
    OBJECTIF SPECIFIQUES        => objectifs
    ACTIONS                     => actions
    ACTIVITES                   => activites
    TACHES                      => taches
    VALIDER PTA                 => validations
    SUIVI DES TACHES            => suivi
    ENGAGER UNE DEPENSE         => depense

    STRUCTURES                  => structures
    USERS                       => users
    Profil                      => profil
-->


<div class="sidebar" style="background-color: #19233e;">

    <nav class="mt-2 mb-5">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item mt-1 <?php if($request == '/home' || $request == '/') echo 'menu-open' ?>">
            <a href="/home" class="nav-link font-weight-bold <?php  if($request == '/home' || $request == '/') echo 'active'  ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Tableau de bord</p>
            </a>
        </li>

        <div class="my-1 border border-secondary ml-4"></div>

        <li class="nav-item mt-1 <?php if($request == '/annees') echo 'menu-open' ?>">
            <a href="/annees" class="nav-link font-weight-bold <?php if($request == '/annees') echo 'active' ?>">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>Années</p>
            </a>
        </li>
        
        <li class="nav-item mt-1 <?php if($request == '/objectifs') echo 'menu-open' ?>">
            <a href="/objectifs" class="nav-link font-weight-bold <?php if($request == '/objectifs') echo 'active' ?>">
                <i class="nav-icon fas fa-bullseye"></i>
                <p>Objectifs spécifiques</p>
            </a>
        </li>
        
        <li class="nav-item mt-1 <?php if($request == '/actions') echo 'menu-open' ?>">
            <a href="/actions" class="nav-link font-weight-bold <?php if($request == '/actions') echo 'active' ?>">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>Actions</p>
            </a>
        </li>
        
        <li class="nav-item mt-1 <?php if($request == '/activites') echo 'menu-open' ?>">
            <a href="/activites" class="nav-link font-weight-bold <?php if($request == '/activites') echo 'active' ?>">
                <i class="nav-icon fas fa-bars"></i>
                <p>Activités</p>
            </a>
        </li>
        
        <li class="nav-item mt-1 <?php if($request == '/taches') echo 'menu-open' ?>">
            <a href="/taches" class="nav-link font-weight-bold <?php if($request == '/taches') echo 'active' ?>">
                <i class="nav-icon fas fa-list"></i>
                <p>Tâches</p>
            </a>
        </li>

        <div class="my-1 border border-secondary ml-4"></div>
        
        <li class="nav-item mt-1 <?php if($request == '/validations') echo 'menu-open' ?>">
            <a href="/validations" class="nav-link font-weight-bold <?php if($request == '/validations') echo 'active' ?>">
                <i class="nav-icon fas fa-calendar-check"></i>
                <p>Valider pda</p>
            </a>
        </li>

        <li class="nav-item mt-1 <?php if($request == '/suivi') echo 'menu-open' ?>">
            <a href="/suivi" class="nav-link font-weight-bold <?php if($request == '/suivi') echo 'active' ?>">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>Suivi des tâches</p>
            </a>
        </li>

        <li class="nav-item mt-1 <?php if($request == '/depense') echo 'menu-open' ?>">
            <a href="/depense" class="nav-link font-weight-bold <?php if($request == '/depense') echo 'active' ?>">
                <i class="nav-icon fas fa-money-bill"></i>
                <p>Engager une dépense</p>
            </a>
        </li>

        <div class="my-1 border border-secondary ml-4"></div>
        
        <li class="nav-item mt-1 <?php if($request == '/spgrm') echo 'menu-open' ?>">
            <a href="/spgrm" class="nav-link font-weight-bold <?php if($request == '/spgrm') echo 'active' ?>">
                <i class="nav-icon fas fa-sitemap"></i>
                <p>Sous programmes</p>
            </a>
        </li>

        <li class="nav-item mt-1 <?php if($request == '/structures') echo 'menu-open' ?>">
            <a href="/structures" class="nav-link font-weight-bold <?php if($request == '/structures') echo 'active' ?>">
                <i class="nav-icon fas fa-building"></i>
                <p>Structures</p>
            </a>
        </li>

        <li class="nav-item mt-1 <?php if($request == '/users') echo 'menu-open' ?>">
            <a href="/users" class="nav-link font-weight-bold <?php if($request == '/users') echo 'active' ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>Utilisateurs</p>
            </a>
        </li>
        
        <li class="nav-item mt-1 <?php if($request == '/profil') echo 'menu-open' ?>">
            <a href="/profil" class="nav-link font-weight-bold <?php if($request == '/profil') echo 'active' ?>">
                <i class="nav-icon fas fa-address-card"></i>
                <p>Profils</p>
            </a>
        </li>       

        <div class="my-1 border border-secondary ml-4"></div>

        <!-- <li class="nav-item has-treeview <?php if($_SESSION['menu-open'] == "deliberations") echo 'menu-open' ?>">
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
        </li> -->
        
    </nav>
        
</div>

<script>
    $(function () {
        
    })
</script>