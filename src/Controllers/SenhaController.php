<?php

class SenhaController {

    public static function gerar(){

        $session = Flight::get("session");
        $body = Flight::data();

        if(!isset($body['categoria'])){
            return Flight::mError('Dados inválidos');
        }

        $categoria = Categoria::getInstance()->get($body['categoria']);

        $senha = Senha::getInstance()->gerar($categoria, $session->data->id);

        if($senha){
            return Flight::resp($senha);
        }else{
            return Flight::mError('Não foi possível gerar senha');
        }
    }
}

?>