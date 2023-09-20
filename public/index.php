<!-- <style> * { color: white; background: black; } </style> -->
<?php
    
    session_start();
    include_once('../config/autoload.php');
    MyAutoload::start();
    

    // echo '<pre>'; print_r($_GET['r']);

    if(isset($_GET['r'])) {
        $request = $_GET['r'];
        $router = new Router($request);
    }
    else {
        $request = $redirect = 'home';
        $router = new Router($request);
        $router->redirect($redirect, $request);
    }


    
    // vérifier cookies

    // vérifier sessions

    // vérification de l'authentification

    // gestion des droits d'accès
    
    
    $router->renderController();

?>