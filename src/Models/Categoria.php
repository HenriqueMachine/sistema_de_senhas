<?php

class Categoria {

    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        
        if (!isset(self::$instance))
            self::$instance = new Categoria();

        return self::$instance;

    }

    public function get($id){

        $categoria = Flight::db()->from('categoria')
                                ->where(['id' => $id])
                                ->one();

        return $categoria;

    }

}


?>