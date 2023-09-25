<?php
/**
 * 
 * class SousProgramme
 */
class SousProgramme extends Model {

    protected $fillable = ['libelle'];

    protected $attrs = [
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
    
    public function attrs() {
        return $this->attrs;
    }

    // i'm going to manage here all the relation, in the other modals
    
}