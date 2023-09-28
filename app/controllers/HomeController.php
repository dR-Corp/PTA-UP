<?php
class HomeController extends Controller
{
    
    public function index($params) {

        $view = new PageView('home');
        
        $view->render([
            "titrePage" => "Tableau de bord"
        ]);
    }


}
