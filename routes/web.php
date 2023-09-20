<?php

/*

    DASHBOARD                   => home

    ANNEES                      => annees
    SOUS PROGRAMMES             => spg
    OBJECTIF SPECIFIQUES        => objectifs
    ACTIONS                     => actions
    ACTIVITES                   => activites
    TACHES                      => taches
    VALIDER PTA                 => validations
    SUIVI DES TACHES            => suivi
    ENGAGER UNE DEPENSE         => depense

    USERS                       => users

*/

// DASHBOARD
Router::setRoute("/", "HomeController", "index");
Router::setRoute("/home", "HomeController", "index");

// USERS
Router::setRoute("/users", "UsersController", "index");
Router::setRoute("/users-create", "UsersController", "create");
Router::setRoute("/users-update", "UsersController", "update");
Router::setRoute("/users-delete", "UsersController", "delete");
Router::setRoute("/users-delete", "UsersController", "delete");
Router::setRoute("/user-([0-9]+)", "UsersController", "delete", "id");