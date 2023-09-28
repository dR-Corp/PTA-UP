<?php
class Controller
{
    public function add($params) {
        extract($params); // entity
        // echo "<pre>"; print_r($params);
        // echo "<pre>"; print_r($_POST); exit;

        if(count($_POST)) {
            echo json_encode($entity::create($_POST), JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode([
                "alert" => "error",
                "message" => "Veuillez remplir tous les champs",
            ], JSON_UNESCAPED_UNICODE);
        }


    }

    public function SPPData($params) {

        extract($params); // $entite
        
        //The model
        $model = new $entity();
        $table = $model->table();
        $primaryKey = 'id';
        $attributs = $model->attributs();

        $columns = [];
        foreach ($attributs as $attribut):
            $name = $attribut['name'];
            $columns[] = array( 'db' => $name, 'dt' => $name );
        endforeach;
        
        $sql_details = "";
        $where = "";
        $data = SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, $where);
    
        echo json_encode($data, JSON_UNESCAPED_UNICODE);

    }

    public function SPPData__($params) {
        
        // DB table to use
        $table = 'sous_programmes';
        
        // Table's primary key
        $primaryKey = 'id';

        $columns = array(
            array( 'db' => 'id', 'dt' => 'id' ),
            array( 'db' => 'libelle', 'dt' => 'libelle' ),
            // array(
            //     'db'        => 'enregistre_par',
            //     'dt'        => 'enregistre_par',
            //     'formatter' => function( $d, $row) {
            //         include('db_connect.php');
            //         $req = "SELECT * FROM users WHERE id = '$d' ";
            //         return $db->query($req)->fetch(PDO::FETCH_ASSOC)['login'];
            //     }
            // ),
            // array(
            //     'db'        => 'validation',
            //     'dt'        => 'validation2',
            //     'formatter' => function( $d, $row ) {
            //         if($d == 1) {
            //             return '<span class="badge badge-success">ACCEPTE</span>';
            //         }
            //         else {
            //             return '<span class="badge badge-warning">EN ATTENTE</span>';
            //         }
            //     }
            // ),
    
        );
        
        // SQL server connection information
        $sql_details = array(
            'user' => 'root',
            'pass' => '154826',
            'db'   => 'pta',
            'host' => 'localhost'
        );
        
        // $req = "SELECT * FROM annee ORDER BY code DESC LIMIT 1";
        // $annee_academique = $db->query($req)->fetch(PDO::FETCH_ASSOC)['code'];
        
        // $entite = $_SESSION['entite'];
        
        // $where = "annee_academique='$annee_academique' AND etablissement_sollicite = '$entite'";
        $where = "";
        $sous_programmes = SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, $where);

        echo "<pre>"; print_r($sous_programmes); 
    
        // echo json_encode($demandes, JSON_UNESCAPED_UNICODE);

    }
    
}
