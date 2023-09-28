<?php
class Controller
{

    public function empty_field($entity) {
        $empty_field = false;
        foreach ($entity::attributs() as $attribut) {
            if($attribut['fillable'] && empty($_POST[$attribut['name']])) {
                $empty_field = true;
                $_POST[$attribut['name']] = htmlspecialchars($_POST[$attribut['name']]);
            }
        }
        return $empty_field;
    }

    public function add($params) {

        extract($params); // entity

        if(count($_POST) == (new $entity)->count_fillable() && !$this->empty_field($entity)) {
            $res = $entity::create($_POST);
            if($res->getId()) {
                $alert = [ "alert" => "success", "message" => "Ajout effectué !" ];
            }
            else {
                $alert = [ "alert" => "danger", "message" => "Une erreur est survenue !" ];
            }
        } 
        else {
            $alert = [ "alert" => "warning", "message" => "Veuillez remplir tous les champs !" ];
        }

        echo json_encode($alert, JSON_UNESCAPED_UNICODE);

    }

    public function edit($params) {
        
        extract($params); // entity

        if(is_numeric($id)) {
            if(count($_POST) == (new $entity)->count_fillable() && !$this->empty_field($entity)) {
                $res = ($entity::find($id))->update($_POST);
                if($res->getId()) {
                    $alert = [ "alert" => "success", "message" => "Modification effectuée !" ];
                }
                else {
                    $alert = [ "alert" => "danger", "message" => "Une erreur est survenue !" ];
                }
            } 
            else {
                $alert = [ "alert" => "warning", "message" => "Veuillez remplir tous les champs !" ];
            }
        } 
        else {
            $alert = [ "alert" => "warning", "message" => "Cette opération ne peut être effectuée" ];
        }
        
        echo json_encode($alert, JSON_UNESCAPED_UNICODE);

    }

    public function del($params) {
        
        extract($params); // entity

        if(is_numeric($id)) {
            $res = ($entity::find($id))->delete();
            if($res->getId()) {
                $alert = [ "alert" => "success", "message" => "Suppression effectuée !" ];
            }
            else {
                $alert = [ "alert" => "danger", "message" => "Une erreur est survenue !" ];
            }
        } 
        else {
            $alert = [ "alert" => "warning", "message" => "Cette opération ne peut être effectuée" ];
        }
        
        echo json_encode($alert, JSON_UNESCAPED_UNICODE);

    }

    public function dataSPP($params) {

        extract($params); // $entite
        
        //The model
        $model = new $entity();
        $entity_table = $model->table();
        // $primaryKey = 'id'; 
        $primaryKey = $entity_table.'.`id`';
        $attributs = $model->attributs();
        $joined = [];
        $table = '`'.$entity_table.'`';
        
        // $table = '`redaction`, `article`';

        $columns = [];
        foreach ($attributs as $attribut):
            if(!$attribut['fillable'] || ($attribut['fillable'] && $attribut['input_type'] != 'password')) {
                $name = $attribut['name'];
                $columns[] = array( 'db' => $entity_table.'.`'.$name.'`', 'dt' => $name );
                if(isset($attribut['foreign_key']) && $attribut['foreign_key']) {
                    $ref = $attribut['ref'];
                    $ref_lib = $attribut['ref_lib'];
                    // on indique qu'il y aura jointure si ce n'était pas encore le cas
                    if(!isset($joined['join'])) $joined['join'] = true; 
                    // a chaque fois on ajoute dans $table, la table qui sera impliquée dans la jointure
                    $table .= ', `'.$ref.'`';
                    // on va définir maintenant les conditions de jointures
                    if(!isset($joined['relation_and']) && !isset($joined['relation'])) {
                        $joined['relation_and'] = $entity_table.'.`'.$name.'` = '.$ref.'.`id` AND ';
                        $joined['relation'] = $entity_table.'.`'.$name.'` = '.$ref.'.`id` ';
                    }
                    else {
                        $joined['relation_and'] .= $entity_table.'.`'.$name.'` = '.$ref.'.`id` AND ';
                        $joined['relation'] .= 'AND '.$entity_table.'.`'.$name.'` = '.$ref.'.`id` ';
                    }
                    $columns[] = array( 'db' => $ref.'.`'.$ref_lib.'`', 'dt' => $ref.'_'.$ref_lib );
                }
            }
        endforeach;
        
        // echo "<pre>"; print_r($columns); exit;
        // echo "<pre>"; print_r($joined); exit;
        
        $sql_details = "";
        $whereResult = null;
        $whereAll = null;

        $data = SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $whereResult, $whereAll, $joined);
    
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
