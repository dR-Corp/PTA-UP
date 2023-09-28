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
Router::setRoute("/users", "UsersController", "index");
Router::setRoute("/users-create", "UsersController", "create");
Router::setRoute("/users-update", "UsersController", "update");
Router::setRoute("/users-delete", "UsersController", "delete");
Router::setRoute("/users-delete", "UsersController", "delete");
Router::setRoute("/users/(.+)/([0-9]+)", "UsersController", "delete", "name,id");

// SOUS PROGRAMMES
Router::setRoute("/spgrm", "SousProgController", "index");
Router::setRoute("/spgrm-configs", "SousProgController", "configs");
Router::setRoute("/spgrm-spp-data", "SousProgController", "SPPData");

// Recuperation de donnees
Router::setRoute("/data/(.+)", "Controller", "SPPData", 'entity');
// Ajout de données
Router::setRoute("/add/(.+)", "Controller", "add", 'entity');