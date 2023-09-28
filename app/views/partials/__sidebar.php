<?php
    $nombre = new RedactionManager();
    $nbrTousRedaction = $nombre->getNbrTousRedaction();
    $nbrUrgentRedaction = $nombre->getNbrUrgentRedaction();
    $nbrValideRedaction = $nombre->getNbrValideRedaction();
    $nbrRefuseRedaction = $nombre->getNbrRefuseRedaction();
    $nbrAvalideRedaction = $nombre->getNbrAvalideRedaction();
    $nbrNonvalideRedaction = $nombre->getNbrNonValideRedaction();

    $nb = new ArticleManager();
    $nbArticle = $nb->getNbrArticle();
    $nbArticleUrgent = $nb->getNbrArticleUrgent();
    $nbArticleLibre = $nb->getNbrArticleLibre();
    $nbArticlePris = $nb->getNbrArticlePris();
    $nbArticleLaisses = $nb->getNbrArticleLaisses();
    $nbArticleLiberes = $nb->getNbrArticleLiberes();
    $nbArticleRediges = $nb->getNbrArticleRediges();
    
    if($_SESSION['profil'] == 4) {

        $nbArticleCli = $nb->getNbrArticleCli($_SESSION['idClient']);
        $nbArticleCliLibres = $nb->getNbrArticleCliLibres($_SESSION['idClient']);
        $nbArticleCliPris = $nb->getNbrArticleCliPris($_SESSION['idClient']);
        $nbArticleCliRediges = $nb->getNbrArticleCliRediges($_SESSION['idClient']);
        $nbArticleCliLiberes = $nb->getNbrArticleCliLiberes($_SESSION['idClient']);
        $nbArticleCliLaisses = $nb->getNbrArticleCliLaisses($_SESSION['idClient']);

        $nbrTousRedactionCli = $nombre->getNbrTousRedactionCli($_SESSION['idClient']);//
        $nbrValideRedactionCli = $nombre->getNbrValideRedactionCli($_SESSION['idClient']);//
        $nbrAvalideRedactionCli = $nombre->getNbrAvalideRedactionCli($_SESSION['idClient']);//
        $nbrNonvalideRedactionCli = $nombre->getNbrNonValideRedactionCli($_SESSION['idClient']);//

    }
    
    $nbman = new ContactManager();
    $nbContacts = $nbman->getNbrContact();

?>

<div class="sidebar" style="background-color: #19233e;">
    <!-- Sidebar user panel (optional) -->
    <div class="mb-3"></div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">

    <!-- admin _____________________________________________________________________________________________________________________________ -->
    <?php if($_SESSION['profil'] == 1): ?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="home.html" class="nav-link <?php if($_GET['r'] == 'home.html') {echo 'active';} ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Tableau de bord
                </p>
                </a>
            </li>
            <li class="nav-item has-treeview <?php if(strpos($_GET['r'], 'article') !== false) {echo 'menu-open';} ?>">
                <a href="#" class="nav-link <?php if(strpos($_GET['r'], 'article') !== false) {echo 'active';}  ?>">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                    Articles
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="ajout-article.html" class="nav-link">
                        <i class="fas fa-plus ml-4 <?php if($_GET['r'] == 'ajout-article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Ajouter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="commandes-articles.html" class="nav-link">
                        <i class="fa fa-shopping-cart ml-4 <?php if($_GET['r'] == 'commandes-articles.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Commandes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="article.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Tous<span class="badge badge-secondary right"><?= $nbArticle ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="urgents-article.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'urgents-article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Urgents<span class="badge badge-secondary right"><?= $nbArticleUrgent ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="libres-article.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'libres-article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Libres<span class="badge badge-primary right"><?= $nbArticleLibre ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pris-article.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'pris-article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Pris<span class="badge badge-info right"><?= $nbArticlePris ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="laisses-article.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'laisses-article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Laissés<span class="badge badge-warning right"><?= $nbArticleLaisses ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="liberes-article.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'liberes-article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Libérés<span class="badge badge-danger right"><?= $nbArticleLiberes ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="rediges-article.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'rediges-article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Redigés<span class="badge badge-success right"><?= $nbArticleRediges ?></span></p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview <?php if(strpos($_GET['r'], 'redactions.html') !== false) {echo 'menu-open';} ?>">
                <a href="#" class="nav-link <?php if(strpos($_GET['r'], 'redactions.html') !== false) {echo 'active';} ?>">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Rédactions
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="redactions.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'redactions.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">Tous<span class="badge badge-info right"><?= $nbrTousRedaction ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="urgent-redactions.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'urgent-redactions.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">Urgentes<span class="badge badge-info right"><?= $nbrUrgentRedaction ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="avalide-redactions.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'avalide-redactions.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">A corriger<span class="badge badge-primary right"><?= $nbrAvalideRedaction ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="nonvalide-redactions.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'nonvalide-redactions.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">Invalidées<span class="badge badge-warning right"><?= $nbrNonvalideRedaction ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="valide-redactions.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'valide-redactions.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">Validées<span class="badge badge-success right"><?= $nbrValideRedaction ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="refuse-redactions.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'refuse-redactions.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">Refusées<span class="badge badge-danger right"><?= $nbrRefuseRedaction ?></span></p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="users.html" class="nav-link <?php if($_GET['r'] == 'users.html') {echo 'active';}  else if( strpos($_GET['r'], 'detail-users.html') !== false) {echo 'active';} ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Utilisateurs
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="factures.html" class="nav-link <?php if(strpos($_GET['r'], 'factures.html') !== false || strpos($_GET['r'], 'factures-detail.html') !== false) {echo 'active';} ?>">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                    Factures
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="agences.html" class="nav-link <?php if(strpos($_GET['r'], 'agences.html') !== false || strpos($_GET['r'], 'agences-detail.html') !== false) {echo 'active';} ?>">
                <i class="nav-icon fas fa-building"></i>
                <p>
                    Agences
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="profil.html" class="nav-link <?php if($_GET['r'] == 'profil.html') {echo 'active';} ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Mon compte
                </p>
                </a>
            </li> 
            <li class="nav-item">
                <a href="contacts.html" class="nav-link  <?php if(strpos($_GET['r'], 'contact') !== false) {echo 'active';} ?>">
                <i class="nav-icon fas fa-address-book"></i>
                <p>Contacts<span class="badge badge-primary right"><?= $nbContacts ?></span></p>
                </a>
            </li>
        </ul>
    <!-- modérateur___________________________________________________________________________________________________________________________ -->
    <?php elseif($_SESSION['profil'] == 2): ?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="home.html" class="nav-link <?php if($_GET['r'] == 'home.html') {echo 'active';} ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Tableau de bord
                </p>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a href="article.html" class="nav-link <?php if($_GET['r'] == 'article.html') {echo 'active';}  else if( strpos($_GET['r'], 'detail-article.html') !== false) {echo 'active';} ?>">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                    Articles
                </p>
                </a>
            </li> -->
            <li class="nav-item has-treeview <?php if(strpos($_GET['r'], 'article') !== false) {echo 'menu-open';} ?>">
                <a href="#" class="nav-link <?php if(strpos($_GET['r'], 'article') !== false) {echo 'active';}  ?>">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                    Articles
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="ajout-article.html" class="nav-link">
                        <i class="fas fa-plus ml-4 <?php if($_GET['r'] == 'ajout-article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Ajouter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="article.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Tous<span class="badge badge-secondary right"><?= $nbArticle ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="urgents-article.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Urgents<span class="badge badge-secondary right"><?= $nbArticleUrgent ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="libres-article.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'libres-article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Libres<span class="badge badge-primary right"><?= $nbArticleLibre ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pris-article.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'pris-article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Pris<span class="badge badge-info right"><?= $nbArticlePris ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="laisses-article.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'laisses-article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Laissés<span class="badge badge-warning right"><?= $nbArticleLaisses ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="liberes-article.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'liberes-article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Libérés<span class="badge badge-danger right"><?= $nbArticleLiberes ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="rediges-article.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'rediges-article.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Redigés<span class="badge badge-success right"><?= $nbArticleRediges ?></span></p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- <li class="nav-item">
                <a href="ajout-article.html" class="nav-link <?php if($_GET['r'] == 'ajout-article.html') {echo 'active';} ?>">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                    Ajouter article
                </p>
                </a>
            </li> -->
            <li class="nav-item has-treeview <?php if(strpos($_GET['r'], 'redactions.html') !== false) {echo 'menu-open';} ?>">
                <a href="#" class="nav-link <?php if(strpos($_GET['r'], 'redactions.html') !== false) {echo 'active';} ?>">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Rédactions
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    
                    <li class="nav-item">
                        <a href="redactions.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'redactions.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">Tous<span class="badge badge-info right"><?= $nbrTousRedaction ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="urgent-redactions.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'urgent-redactions.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">Urgentes<span class="badge badge-info right"><?= $nbrUrgentRedaction ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="avalide-redactions.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'avalide-redactions.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">A corriger<span class="badge badge-primary right"><?= $nbrAvalideRedaction ?></span></p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="nonvalide-redactions.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'nonvalide-redactions.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">Invalidées<span class="badge badge-warning right"><?= $nbrNonvalideRedaction ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="valide-redactions.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'valide-redactions.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">Validées<span class="badge badge-success right"><?= $nbrValideRedaction ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="refuse-redactions.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'refuse-redactions.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">Refusées<span class="badge badge-danger right"><?= $nbrRefuseRedaction ?></span></p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- <li class="nav-item">
                <a href="validation-redactions.html" class="nav-link <?php if($_GET['r'] == 'validation-redactions.html') {echo 'active';} ?>">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Valider rédactions
                </p>
                </a>
            </li> -->
            <li class="nav-item">
                <a href="facture-mod.html" class="nav-link <?php if(strpos($_GET['r'], 'facture-mod.html') !== false || strpos($_GET['r'], 'facture-mod.html') !== false) {echo 'active';} ?>">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                    Facture
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="profil.html" class="nav-link <?php if($_GET['r'] == 'profil.html') {echo 'active';} ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Mon compte
                </p>
                </a>
            </li>
        </ul>
    <!-- redacteur________________________________________________________________________________________________________________________ -->
    <?php elseif($_SESSION['profil'] == 3): ?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="home.html" class="nav-link <?php if($_GET['r'] == 'home.html') {echo 'active';} ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Tableau de bord
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="articles-urgents.html" class="nav-link <?php if($_GET['r'] == 'articles-urgents.html') {echo 'active';} ?>">
                <i class="nav-icon fas fa-bell"></i>
                <p>
                    Articles urgents
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="redaction.html" class="nav-link <?php if($_GET['r'] == 'redaction.html') {echo 'active';} ?>">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Redactions
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="historique.html" class="nav-link <?php if($_GET['r'] == 'historique.html') {echo 'active';} ?>">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                    Historique
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="facture-red.html" class="nav-link <?php if($_GET['r'] == 'facture-red.html') {echo 'active';} ?>">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                    Facture
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="profil.html" class="nav-link <?php if($_GET['r'] == 'profil.html') {echo 'active';} ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Mon compte
                </p>
                </a>
            </li>
            <?php if(isset($_SESSION['certification']) && $_SESSION['certification'] == 1): ?>
            <li class="nav-item">
                <a class="nav-link">
                <p><span class="badge badge-success ml-1" ><i class="fas fa-user-graduate mr-1"></i>Rédacteur certifié</span></p>
                </a>
            </li>
            <?php endif; ?>
        </ul>
    <!-- client _____________________________________________________________________________________________________________________________ -->
    <?php elseif($_SESSION['profil'] == 4): ?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="home.html" class="nav-link <?php if($_GET['r'] == 'home.html') {echo 'active';} ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Tableau de bord
                </p>
                </a>
            </li>
            
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link <?php if(strpos($_GET['r'], 'article') !== false || strpos($_GET['r'], 'commandes') !== false) {echo 'active';}  ?>">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>Articles</p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="commandes.html" class="nav-link">
                            <i class="fas fa-plus ml-4 <?php if($_GET['r'] == 'commandes.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">Commandes</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="client-articles.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'client-articles.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Tous<span class="badge badge-secondary right"><?= $nbArticleCli ?></span></p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="client-articles-libres.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'client-articles-libres.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Rédaction en cours<span class="badge badge-primary right"><?= $nbArticleCliLibres ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="client-articles-rediges.html" class="nav-link">
                        <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'client-articles-rediges.html') {echo 'text-info';} ?>"></i>
                        <p class="ml-2">Redigés<span class="badge badge-success right"><?= $nbArticleCliRediges ?></span></p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link <?php if(strpos($_GET['r'], 'cli.html') !== false) {echo 'active';} ?>">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Rédactions</p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="redactions-cli.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'redactions-cli.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">Tous<span class="badge badge-info right"><?= $nbrTousRedactionCli ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="avalide-redactions-cli.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'avalide-redactions-cli.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">A valider<span class="badge badge-primary right"><?= $nbrAvalideRedactionCli ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="nonvalide-redactions-cli.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'nonvalide-redactions-cli.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">Invalidées<span class="badge badge-warning right"><?= $nbrNonvalideRedactionCli ?></span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="valide-redactions-cli.html" class="nav-link">
                            <i class="fas fa-angle-right ml-4 <?php if($_GET['r'] == 'valide-redactions-cli.html') {echo 'text-info';} ?>"></i>
                            <p class="ml-2">Validées<span class="badge badge-success right"><?= $nbrValideRedactionCli ?></span></p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="outils.html" class="nav-link <?php if(strpos($_GET['r'], 'outils.html') !== false) {echo 'active';} ?>">
                    <i class="nav-icon fas fa-tools"></i>
                    <p>Outils</p>
                </a>
            </li>
        </ul>
    <?php endif; ?>

    </nav>
    <!-- /.sidebar-menu -->
</div>