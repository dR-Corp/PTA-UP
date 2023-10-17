<?php
/**
 * 
 * class Validation
 */
class Validation extends Model {

    protected $fillable = ['annee_ID', 'structure_ID', 'valider'];    

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
            'name' =>  'structure_ID',
            'lib' => 'Structure',
            'type' => 'int',
            'primary_key' => false,
            'foreign_key' => true,
            'ref' => 'structures',
            'ref_lib' => 'code',
            'ref_class' => 'Structure',
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'select',
            'required' => 'required',
        ],
        [
            'name' =>  'valider',
            'lib' => 'Validé',
            'type' => 'boolean',
            'primary_key' => false,
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'checkbox',
            'required' => 'required'
        ],

    ];
    
}