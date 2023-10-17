<?php
class UserController extends Controller
{
    
    public function index($params) {

        // $sous_programme = new SousProgramme();
        // $fillable = $sous_programme->fillable();
        // $attr = ['id', ...$fillable];

        $view = new CRUDView('crud');
        
        $view->render([
            "titrePage" => "Utilisateurs",
            "attributs" => User::attributs(),
            'entity' => User::class,
        ]);

    }

    public function profil($params) {

        $view = new PageView('user/profil');

        // à ce niveau on doit envoyer le user connecté
        // pour le moment on ne va envoyer que le user 0

        $view->render([
            "titrePage" => "Profil",
            "user" => (User::first()),
        ]);
    }

}
