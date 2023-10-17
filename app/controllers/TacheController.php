<?php
class TacheController extends Controller
{
    
    public function index($params) {

        $view = new CRUDView('crud');
        
        $view->render([
            "titrePage" => "Tâches",
            "attributs" => Tache::attributs(),
            'entity' => Tache::class,
        ]);

    }

}