<?php
/**
 * 
 * class Action
 */
class Action extends Model {

    protected $fillable = ['libelle', 'objectif_specifique_ID', 'poids_FP', 'poids_BN', 'annee_ID'];

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
        [
            'name' =>  'poids_FP',
            'lib' => 'Poids FP',
            'type' => 'string',
            'primary_key' => false,
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'number',
            'required' => 'required'
        ],
        [
            'name' =>  'poids_BN',
            'lib' => 'Poids BN',
            'type' => 'string',
            'primary_key' => false,
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'number',
            'required' => 'required'
        ],
        [
            'name' =>  'annee_ID',
            'lib' => 'Année',
            'type' => 'int',
            'primary_key' => false,
            'foreign_key' => true,
            'ref' => 'annees',
            'ref_lib' => 'libelle',
            'ref_class' => 'Annee',
            'auto_increment' => false,
            'fillable' => false,
            'input_type' => 'select',
            'required' => 'required',
        ],
        // [
        //     'name' =>  'sous_programme_ID',
        //     'lib' => 'Sous programme',
        //     'type' => 'int',
        //     'primary_key' => false,
        //     'ref' => 'sous_programmes',
        //     'ref_lib' => 'libelle',
        //     'ref_class' => 'SousProgramme',
        //     'auto_increment' => false,
        //     'fillable' => false,
        //     'input_type' => 'select',
        //     'required' => 'required',
        // ],
        [
            'name' =>  'objectif_specifique_ID',
            'lib' => 'Objectif spécifique',
            'type' => 'int',
            'primary_key' => false,
            'foreign_key' => true,
            'ref' => 'objectifs_specifiques',
            'ref_lib' => 'libelle',
            'ref_class' => 'ObjectifsSpecifique',
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'select',
            'required' => 'required',
        ],

    ];
    
    public static function attributs() {
        return self::$attributs;
    }

    // ALL NEEDABLE RELATION BELOW
    public function referenced() {
        if(Activite::where("action_ID","=",$this->getId()))
            return true;
        else
            return false;
    }
    
}