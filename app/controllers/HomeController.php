<?php
class HomeController extends Controller
{
    
    public function index($params) {

        $view = new View('home');
        $view->render(array());
    }


}