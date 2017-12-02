<?php

namespace App;

use App\Controllers\HomeController;
use Exception;

// classe principal da aplicação responvel por: define variaveies globais, inicia a contrução da Home, e trata de URL amigaveis
class App
{
    private $controller;
    private $controllerFile;
    private $action;
    private $params;
    public  $controllerName;

    public function __construct()
    {
        /*
         * Constantes do sistema "define variaveies globais"
         */
        define('APP_HOST'       , $_SERVER['HTTP_HOST'] . "/easy_to_learn/questao07");
        define('PATH'           , realpath('./'));
        define('TITLE'          , "CRUD - Easy To Learn");
        define('DB_HOST'        , "localhost");
        define('DB_USER'        , "root");
        define('DB_PASSWORD'    , "");
        define('DB_NAME'        , "easy_to_learn_q07");
        define('DB_DRIVER'      , "mysql");

        $this->url();
    }

    //inicia a contrução da Home
    public function run()
    {
        if ($this->controller) {
            $this->controllerName = ucwords($this->controller) . 'Controller';
            $this->controllerName = preg_replace('/[^a-zA-Z]/i', '', $this->controllerName);
        } else {
            $this->controllerName = "HomeController";
        }

        $this->controllerFile   = $this->controllerName . '.php';
        $this->action           = preg_replace('/[^a-zA-Z]/i', '', $this->action);

        if (!$this->controller) {
            $this->controller = new HomeController($this);
            $this->controller->index();
        }

        if (!file_exists(PATH . '/App/Controllers/' . $this->controllerFile)) {
            throw new Exception("Página não encontrada.", 404);
        }

        $nomeClasse     = "\\App\\Controllers\\" . $this->controllerName;
        $objetoController = new $nomeClasse($this);

        if (!class_exists($nomeClasse)) {
            throw new Exception("Erro na aplicação", 500);
        }
        
        if (method_exists($objetoController, $this->action)) {
            $objetoController->{$this->action}($this->params);
            return;
        } else if (!$this->action && method_exists($objetoController, 'index')) {
            $objetoController->index($this->params);
            return;
        } else {
            throw new Exception("Nosso suporte já esta verificando desculpe!", 500);
        }
        throw new Exception("Página não encontrada.", 404);
    }

    //URL Amigaveis
    public function url () {

        if ( isset( $_GET['url'] ) ) {

            $path = $_GET['url'];
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL); 

            $path = explode('/', $path);

            $this->controller  = $this->verificaArray( $path, 0 );
            $this->action      = $this->verificaArray( $path, 1 );

            if ( $this->verificaArray( $path, 2 ) ) {
                unset( $path[0] );
                unset( $path[1] );
                $this->params = array_values( $path );
            }
        }
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    private function verificaArray ( $array, $key ) {
        if ( isset( $array[ $key ] ) && !empty( $array[ $key ] ) ) {
            return $array[ $key ];
        }
        return null;
    }
}