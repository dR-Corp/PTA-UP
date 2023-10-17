<?php
/**
 * 
 * class Tache
 */
class Tache extends Model {

    protected $fillable = [
        'libelle', 
        'activite_ID', 
        'poids_FP', 
        'poids_BN', 
        'annee_ID',
        'structure_responsable', // en gros structure_id
        'structure_associee',
        'mode_execution',
        'indicateurs', 
        'imputation_budget', 
        'montant_FP', 
        'montant_BN', 
        'periode', 
        'observation',
        'realiser',
        'montant_engage',
    ]; 

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
        [
            'name' =>  'activite_ID',
            'lib' => 'Activite',
            'type' => 'int',
            'primary_key' => false,
            'foreign_key' => true,
            'ref' => 'activites',
            'ref_lib' => 'libelle',
            'ref_class' => 'Activite',
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'select',
            'required' => 'required',
        ],
        [
            'name' =>  'structure_responsable',
            'lib' => 'Structure responsable',
            'type' => 'int',
            'primary_key' => false,
            'foreign_key' => true,
            'ref' => 'structures',
            'ref_lib' => 'libelle',
            'ref_class' => 'Structure',
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'select',
            'required' => 'required',
        ],
        [
            'name' =>  'structure_associee',
            'lib' => 'Structure associée',
            'type' => 'string',
            'primary_key' => false,
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'text',
            'required' => 'required'
        ],
        [
            'name' =>  'mode_execution',
            'lib' => 'Mode d\'exécution',
            'type' => 'string',
            'primary_key' => false,
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'text',
            'required' => 'required'
        ],
        [
            'name' =>  'indicateurs',
            'lib' => 'Indicateur',
            'type' => 'string',
            'primary_key' => false,
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'text',
            'required' => 'required'
        ],
        [
            'name' =>  'imputation_budget',
            'lib' => 'Imputation budget',
            'type' => 'string',
            'primary_key' => false,
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'number',
            'required' => 'required'
        ],
        [
            'name' =>  'montant_FP',
            'lib' => 'Montant FP',
            'type' => 'string',
            'primary_key' => false,
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'number',
            'required' => 'required'
        ],
        [
            'name' =>  'montant_BN',
            'lib' => 'Montant BN',
            'type' => 'string',
            'primary_key' => false,
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'number',
            'required' => 'required'
        ],
        [
            'name' =>  'periode',
            'lib' => 'Période',
            'type' => 'string',
            'primary_key' => false,
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'number',
            'required' => 'required'
        ],
        [
            'name' =>  'observation',
            'lib' => 'Observation',
            'type' => 'string',
            'primary_key' => false,
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'text',
            'required' => 'required'
        ],

    ];

    // '',
    // 'realiser',
    // 'montant_engage',
    
    public static function attributs() {
        return self::$attributs;
    }

    // ALL NEEDABLE RELATION BELOW

    
}