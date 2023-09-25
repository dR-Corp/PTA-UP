<?php
class SousProgController extends Controller
{
    
    public function index($params) {

        $sous_programme = new SousProgramme();
        // $fillable = $sous_programme->fillable();
        // $attr = ['id', ...$fillable];

        $view = new CRUDView('crud');
        
        $view->render([
            "titrePage" => "Sous programmes",
            "attributs" => $sous_programme->attrs(),
            'class' => $sous_programme,
        ]);

    }

    public function configs($params) {

    }


}
