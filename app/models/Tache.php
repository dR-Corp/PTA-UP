<?php
/**
 * 
 * class Tache
 */
class Tache extends Model {

    protected $fillable = [
        'libelle', 
        'activite_id', 
        'indicateurs', 
        'imputation_budget', 
        'montant_fp', 
        'montant_bn', 
        'periode', 
        'poids_fp', 
        'poids_bn', 
        'structure_responsable', // en gros structure_id
        'structure_associee',
        'observation',
        'realiser',
        'montant_engage',
        'annee_id'
    ];    
    
}