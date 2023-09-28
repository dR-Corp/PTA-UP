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
Router::setRoute("/users-create", "UserController", "create");
Router::setRoute("/users-update", "UserController", "update");
Router::setRoute("/users-delete", "UserController", "delete");
Router::setRoute("/users-delete", "UserController", "delete");
Router::setRoute("/users/(.+)/([0-9]+)", "UserController", "delete", "name,id");

// SOUS PROGRAMMES
Router::setRoute("/spgrm", "SousProgController", "index");

// STRUCTURES
Router::setRoute("/structures", "StructureController", "index");

// Recuperation de donnees
Router::setRoute("/data/(.+)", "Controller", "dataSPP", 'entity');
// Ajout de données
Router::setRoute("/add/(.+)", "Controller", "add", 'entity');
// Modification de donnees
Router::setRoute("/edit/(.+)/([0-9]+)", "Controller", "edit", 'entity,id');
// Suppression de donnees
Router::setRoute("/del/(.+)/([0-9]+)", "Controller", "del", 'entity,id');
