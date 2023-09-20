<?php

/**
 * class view
 * use to call views
 */

class View extends Page {
    
    public function __construct($pageContent = null) {
        $this->pageContent = $pageContent;
    }

    public function render($params = array()) {

        extract($params); 

        $pageContent = $this->pageContent;
        
        ob_start();
        include(VIEWS.'Scripts/script.php');
        $scripts = ob_get_clean();

        ob_start();
        include(VIEWS.'partials/_head.php');
        $head = ob_get_clean();

        ob_start();
        include(VIEWS.'partials/_navbar.php');
        $navbar = ob_get_clean();

        ob_start();
        include(VIEWS.'partials/_sidebar.php');
        $sidebar = ob_get_clean();

        ob_start();
        include(VIEWS.'partials/_footer.php');
        $footer = ob_get_clean();
        
        ob_start();
        include(VIEWS.$pageContent.'.php');
        $contentPage = ob_get_clean();

        include_once(VIEWS.'templates/layout.php');

    }
    
    public function redirect($route) {
        header("Location: ".HOST.$route);
        exit;
    }

}