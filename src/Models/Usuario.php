<?php

class Usuario {

    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        
        if (!isset(self::$instance))
            self::$instance = new Usuario();

        return self::$instance;

    }

    public function cadastrar($dados){

        Flight::db()->from('usuario')
                    ->insert($dados)
                    ->execute();

        return Flight::db()->insert_id;

    }

    public function get($ra){

        $usuario = Flight::db()->from('usuario')
                                ->where(['ra' => $ra])
                                ->one();

        return $usuario;

    }

    public function login($ra,$senha){

        $usuario = Flight::db()->from('usuario')
                                ->where(['ra' => $ra, 'senha' => $senha])
                                ->one();

        return $usuario;

    }

}

?>

