<?php
class Controller
{

    
    private static function getSnakeCaseName($className) {
        $className = preg_replace('/([a-z])([A-Z])/', '$1_$2', $className."s"); // Convertir CamelCase en snake_case
        $className = strtolower($className); // Convertir en minuscules
        return $className;
    }

    public function filter($params) {
        
        extract($params); // entity, foreign_key, filter_id
        $data = [];

        $conditions = [];
        if(in_array('annee_ID', (new $entity)->fillable())) {
            $conditions[] = ["annee_ID", "=", Annee::active()->getId()];
        }
        if($filter_id) {
            $conditions[] = [$foreign_key, "=", $filter_id];
        }
        
        $data = $entity::whereAll($conditions);

        // if (!empty($conditions)) {
        //     $data = $entity::whereAll($conditions);
        // } else {
        //     $data = $entity::all();
        // }

        // if(in_array('annee_ID', (new $entity)->fillable())) {
        //     if($filter_id) {
        //         $data = $entity::whereAll([
        //             ["annee_ID", "=", Annee::active()->getId()],
        //             [$foreign_key, "=", $filter_id]
        //         ]);
        //     }
        //     else {
        //         $data = $entity::whereAll([
        //             ["annee_ID", "=", Annee::active()->getId()]
        //         ]);
        //     }
        // }
        // else {
        //     if($filter_id) {
        //         $data = $entity::whereAll([
        //             [$foreign_attr, "=", $filter_id]
        //         ]);
        //     }
        //     else {
        //         $data = $entity::all();
        //     }
        // }

        $result = [];
        foreach ($data as $element) {
            $result[] = $element->reciprocHydrate();
        }
        print_r(json_encode($result));

    }

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
        if(in_array('annee_ID', (new $entity)->fillable())) $_POST['annee_ID'] = Annee::active()->getId();
        if(count($_POST) == (new $entity)->count_fillable() && !$this->empty_field($entity)) {

            
            $res = $entity::create($_POST);

            if($res->getId()) {
                $alert = [ "alert" => "success", "message" => "Ajout effectué !" ];
            }
            else {
                $alert = [ "alert" => "error", "message" => "Une erreur est survenue !" ];
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
            $res = ($entity::find($id))->update($_POST);
            if($res->getId()) {
                $alert = [ "alert" => "success", "message" => "Modification effectuée !" ];
            }
            else {
                $alert = [ "alert" => "warning", "message" => "Une erreur est survenue !" ];
            }
        } 
        else {
            $alert = [ "alert" => "error", "message" => "Cette opération ne peut être effectuée" ];
        }
        
        echo json_encode($alert, JSON_UNESCAPED_UNICODE);

    }

    public function del($params) {
        
        extract($params); // entity

        if(is_numeric($id)) {
            $res = ($entity::find($id))->delete();
            if($res && $res->getId()) {
                $alert = [ "alert" => "success", "message" => "Suppression effectuée !" ];
            }
            else {
                $alert = [ "alert" => "warning", "message" => "Cette opération ne peut être effectuée !" ];
            }
        } 
        else {
            $alert = [ "alert" => "error", "message" => "Une erreur est survenue !" ];
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
                
        $sql_details = "";
        $whereResult = null;
        $whereAll = null;

        if(in_array('annee_ID', (new $entity)->fillable()))
            $whereAll = $entity_table.'.`annee_ID` = '.Annee::active()->getId();

        $data = SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $whereResult, $whereAll, $joined);
    
        echo json_encode($data, JSON_UNESCAPED_UNICODE);

    }
    
}
