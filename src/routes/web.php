<?php

namespace Purpleblob\routes;

class web {

    /**
     * Configure routes
     */
    public static function configure($router) {
        //dd('Got here', $_SERVER['REQUEST_URI']);

        // Set namespace for controllers
        $router->setNamespace('\Purpleblob\museum\controller');

        $router->set404(function() {
            header('HTTP/1.1 404 Not Found');
            echo "<p>Page not found</p>";
            exit;
        });

        $router->get('/', 'mainController@index');
        //$router->get('/', function() {
        //    dd('router found');
        //});
    }

}