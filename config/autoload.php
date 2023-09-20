<?php
/*** configuration *****/
ini_set('display_errors','on');
error_reporting(E_ALL);

class MyAutoload {
    
    public static function start() {

        spl_autoload_register(array(__CLASS__, 'autoload'));

        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        // define('HOST', 'http://'.$host.'/PTA/');
        // define('ROOT', $root.'/PTA/');
        define('HOST', 'http://'.$host);
        define('ROOT', $root);

        define('CONTROLLERS', ROOT.'../app/controllers/');
        define('VIEWS', ROOT.'../app/views/');
        define('MODELS', ROOT.'../app/models/');
        define('CORE', ROOT.'../core/');
        define('ROUTES', ROOT.'../routes/');
        define('STORAGE', ROOT.'../public/storage/');

        define('ASSETS', HOST.'//assets/');
        define('STORAGES', HOST.'//storage/');
    }

    public static function autoload($class) {

        if(file_exists(MODELS.$class.'.php')) {
            include_once(MODELS.$class.'.php');
        }
        else if(file_exists(CONTROLLERS.$class.'.php')) {
            include_once(CONTROLLERS.$class.'.php');
        }
        else if(file_exists(ROUTES.$class.'.php')) {
            include_once(ROUTES.$class.'.php');
        }
        else if(file_exists(CORE.$class.'.php')) {
            include_once(CORE.$class.'.php');
        }

        // require_once 'vendor/autoload.php';
        include_once('../routes/web.php');
        include_once('../routes/api.php');
    }

    public static function sql_details() {
        return array ( 'user' => 'root', 'pass' => '', 'db'   => 'pta', 'host' => '127.0.0.1' );
        // return array ( 'user' => 'feedredcom_feedred', 'pass' => '147feedred159', 'db'   => 'feedredcom_feedred', 'host' => '212.95.51.72' );
    }

    public static function dbconnect() {
        return new PDO("mysql:host=localhost;dbname=pta;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        // return new PDO("mysql:host=212.95.51.72;dbname=feedredcom_feedred;charset=utf8", "feedredcom_feedred", "147feedred159", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    }
    
}