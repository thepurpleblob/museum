<?php

namespace Purpleblob\lib;

class system {

    /**
     * Check .env is complete
     * @return boolean (true if ok)
     */
    public static function checkdotenv() {
        $needs = [
            'DB_HOST',
            'DB_DATABASE',
            'DB_USERNAME',
            'DB_PASSWORD',
            'PROJECT_NAME'
        ];
        foreach ($needs as $need) {
            if (!isset($_ENV[$need])) {
                throw new \Exception('Missing dotenv setting - ' . $need);
            }
        }
    }

    /**
     * Render view
     * @param string $template
     * @param mixed $context Array or object rendering context (default: array())
     */
    public static function view($template, $context = []) {
        $project = $_ENV['PROJECT_NAME'];
        $viewpath = "/../../src/$project/view";
        $mustache = new \Mustache_Engine([
            'loader' => new \Mustache_Loader_FilesystemLoader(dirname(__FILE__) . $viewpath)
        ]);

        echo $mustache->render($template, $context);
        die;
    }

}