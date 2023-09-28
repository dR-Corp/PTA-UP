<?php
class StructureController extends Controller
{
    
    public function index($params) {

        // $sous_programme = new SousProgramme();
        // $fillable = $sous_programme->fillable();
        // $attr = ['id', ...$fillable];

        $view = new CRUDView('crud');
        
        $view->render([
            "titrePage" => "Structures",
            "attributs" => Structure::attributs(),
            'entity' => Structure::class,
        ]);

    }

}
