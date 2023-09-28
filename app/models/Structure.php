<?php
/**
 * 
 * class Structure
 */
class Structure extends Model {

    protected $fillable = ['code', 'libelle'];

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
            'name' =>  'code',
            'lib' => 'Code',
            'type' => 'string',
            'primary_key' => false,
            'auto_increment' => false,
            'fillable' => true,
            'input_type' => 'text',
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
    
}