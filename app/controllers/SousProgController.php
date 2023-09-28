<?php
class SousProgController extends Controller
{
    
    public function index($params) {

        // $sous_programme = new SousProgramme();
        // $fillable = $sous_programme->fillable();
        // $attr = ['id', ...$fillable];

        $view = new CRUDView('crud');
        
        $view->render([
            "titrePage" => "Sous programmes",
            "attributs" => SousProgramme::attributs(),
            'entity' => SousProgramme::class,
        ]);

    }

}
