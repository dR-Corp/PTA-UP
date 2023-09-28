<?php
/**
 * 
 * class Annee
 */
class Annee extends Model {

    protected $fillable = ['libelle'];

    // we must get the last year as the active one
    
    public static function active() {
        // si aucune année n'est séléectionnée comme active, on choisie la dernière année
        if(false) {
            return ;
        }
        return self::last();
    }
    
}