<?php
class ActiviteController extends Controller
{
    
    public function index($params) {

        $view = new CRUDView('crud');
        
        $view->render([
            "titrePage" => "Activités",
            "attributs" => Activite::attributs(),
            'entity' => Activite::class,
        ]);

    }

}