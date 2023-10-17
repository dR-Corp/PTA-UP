<?php
    
    session_start();
    include_once('../config/autoload.php');
    MyAutoload::start();
    

    // echo '<pre>'; print_r($_GET['r']);

    if(isset($_GET['r'])) {
        $request = "/".$_GET['r'];
        $router = new Router($request);
    }
    else {
        $request = $redirect = '/home';
        $router = new Router($request);
        $router->redirect($redirect, $request);
    }

    // on va definir à ce niveau une variable de session, qui va contenir l'année selected
    // ainsi à l'appel de la function active qui se trouve dans la Classe annee elle fera le reste du boulou
    // on aura à set, cette valeur grâce à une requete AJAX

    
    
    // vérifier cookies

    // vérifier sessions

    // vérification de l'authentification

    // gestion des droits d'accès
    
    
    $router->renderController();

?>