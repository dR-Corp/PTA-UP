<style> * { color: white; background: black; } </style>
<?php
    
    session_start();
    include('../config/autoload.php');
    MyAutoload::start();
    
    include('../routes/web.php');
    // echo '<pre>'; print_r($_GET['r']); exit;

    // initialisation d'un  object
    // $structure = new Structure([
    //     "code" => "TODO",
    //     "libelle" => "Task Own Doing Own"
    // ]);

    // création d'un objet
    // $structure = Structure::create([
    //     "code" => "BO",
    //     "libelle" => "Bo dalas"
    // ]);
    // echo '<pre>'; print_r($structure);

    // retrouver un objet
    // $structure = Structure::find(117);

    // faire un update
    // $structure->update([
    //     "code" => "RU",
    //     "libelle" => "Recherche Universitaire"
    // ]);

    // echo '<pre>'; print_r($structure); exit;

    // recupérer tous les object
    // $structures = Structure::all();
    // echo '<pre>'; print_r($structures); exit;

    // faire un whereAll
    // $conditions = [
    //     ["code", "LIKE", "%UT%"],
    //     ["libelle", "LIKE", "%A%"]
    // ];
    // $structures = Structure::whereAll($conditions);

    // faire un where
    // $structures = Structure::where("code", "LIKE", "%F%");

    // echo '<pre>'; print_r($structures); exit;

    // faire un first
    // $structure = Structure::first();
    // faire un last
    $structure = Structure::last();
    echo '<pre>'; print_r($structure); exit;

    // faire un delete
    // $structure->delete();

    
?>