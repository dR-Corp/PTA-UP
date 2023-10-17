<?php
class ObjectifController extends Controller
{
    
    public function index($params) {

        $view = new CRUDView('crud');
        
        $view->render([
            "titrePage" => "Objectifs spécifiques",
            "attributs" => ObjectifsSpecifique::attributs(),
            'entity' => ObjectifsSpecifique::class,
        ]);

    }

}