<?php
class AnneeController extends Controller
{
    
    public function index($params) {

        $view = new CRUDView('crud');
        
        $view->render([
            "titrePage" => "Années",
            "attributs" => Annee::attributs(),
            'entity' => Annee::class,
        ]);

    }

}
