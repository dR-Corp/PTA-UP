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

    public function configs($params) {        
        return SousProgramme::attributs();
    }

    public function SPPData($params) {
        
        // DB table to use
        $table = 'sous_programmes';
        
        // Table's primary key
        $primaryKey = 'id';

        $columns = array(
            array( 'db' => 'id', 'dt' => 'id' ),
            array( 'db' => 'libelle', 'dt' => 'libelle' )    
        );
        
        $sql_details = "";
        $where = "";
        $sous_programmes = SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, $where);
    
        echo json_encode($sous_programmes, JSON_UNESCAPED_UNICODE);

    }

}
