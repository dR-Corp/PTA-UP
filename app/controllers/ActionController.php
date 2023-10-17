<?php
class ActionController extends Controller
{
    
    public function index($params) {

        $view = new CRUDView('crud');
        
        $view->render([
            "titrePage" => "Actions",
            "attributs" => Action::attributs(),
            'entity' => Action::class,
        ]);

    }

}