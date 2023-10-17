<?php

    // DASHBOARD                   => home
    // ANNEES                      => annees
    // SOUS PROGRAMMES             => spgrm
    // OBJECTIF SPECIFIQUES        => objectifs
    // ACTIONS                     => actions
    // ACTIVITES                   => activites
    // TACHES                      => taches
    // VALIDER PTA                 => validations
    // SUIVI DES TACHES            => suivi
    // ENGAGER UNE DEPENSE         => depenses

    // STRUCTURES                  => structures
    // USERS                       => users
    // Profil                      => profil

// DASHBOARD
Router::setRoute("/", "HomeController", "index");
Router::setRoute("/home", "HomeController", "index");

// USERS
Router::setRoute("/users", "UserController", "index");
Router::setRoute("/profil", "UserController", "profil");

// SOUS PROGRAMMES
Router::setRoute("/spgrm", "SousProgController", "index");

// STRUCTURES
Router::setRoute("/structures", "StructureController", "index");

// ANNEES
Router::setRoute("/annees", "AnneeController", "index");

// OBJECTIFS
Router::setRoute("/objectifs", "ObjectifController", "index");

// ACTIONS
Router::setRoute("/actions", "ActionController", "index");

// ACTIVITES
Router::setRoute("/activites", "ActiviteController", "index");

// TACHES
Router::setRoute("/taches", "TacheController", "index");


// Recuperation de donnees
Router::setRoute("/data/(.+)", "Controller", "dataSPP", 'entity');
// Ajout de données
Router::setRoute("/add/(.+)", "Controller", "add", 'entity');
// Modification de donnees
Router::setRoute("/edit/(.+)/([0-9]+)", "Controller", "edit", 'entity,id');
// Suppression de donnees
Router::setRoute("/del/(.+)/([0-9]+)", "Controller", "del", 'entity,id');
// Filtre de donnees
Router::setRoute("/filter/(.+)/(.+)/([0-9]*)", "Controller", "filter", 'entity,foreign_key,filter_id');
