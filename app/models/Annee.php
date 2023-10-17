<?php
/**
 * 
 * class Annee
 */
class Annee extends Model {

    protected $fillable = ['libelle'];

    protected static $attributs = [
        [
            'name' =>  'id',
            'lib' => '#ID',
            'type' => 'int',
            'fillable' => false,
            'primary_key' => true,
            'auto_increment' => true,
            'required' => 'required'
        ],
        [
            'name' =>  'libelle',
            'lib' => 'Libellé',
            'type' => 'string',
            'primary_key' => false,
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'text',
            'required' => 'required'
        ],
    ];
    
    public static function attributs() {
        return self::$attributs;
    }

    public function referenced() {
        if(ObjectifsSpecifique::where("sous_programme_ID","=",$this->getId()))
            return true;
        else
            return false;
    }

    // we must get the last year as the active one
    
    public static function active() {
        // si aucune année n'est séléectionnée comme active, on choisie la dernière année
        if(isset($_SESSION["selected_annee"])) {
            return self::find($_SESSION["selected_annee"]);
        }
        return self::last();
    }

    // public function delete() {

    //     $_id = $this->getId();

    //     $obj_id = ObjectifsSpecifique::find($_id);

    //     if($obj_id) {
    //         return false;
    //     }
    //     else {
    //         return parent::delete();
    //     }

    // }
    
}