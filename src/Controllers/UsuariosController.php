<?php
class UsuariosController {


    public static function cadastrar(){

        $body = Flight::data();

        if(!isset($body['ra']) ||
         !isset($body['nome']) ||
         !isset($body['curso']) ||
         !isset($body['senha'])){

            return Flight::mError('Dados inválidos');
        }

        $u = Usuario::getInstance()->get($body['ra']);

        if($u){
            return Flight::mError('RA já cadastrado.');
        }

        $res = Usuario::getInstance()->cadastrar($body);

        if($res){
            return Flight::resp('Usuario cadastrado com sucesso!');
        }else{
            return Flight::mError('Não foi possível cadastrar usuário.');
        }

    }

    public static function login(){

        $body = Flight::data();

        if(!isset($body['ra']) || !isset($body['senha'])){
            return Flight::mError('Dados inválidos');
         }

         $usuario = Usuario::getInstance()->login($body['ra'],$body['senha']);

         if($usuario){

            $jwt = JWTWrapper::encode([
                'expiration_sec' => LIVE_SESSION,
                'iss' => ISS,
                'userdata' => [
                    'id' => $usuario['id'],
                    'name' => $usuario['nome']
                ]
            ]);

            Flight::resp($jwt);

         }else{
            return Flight::mError('Usuário não encontrado');
         }

    }
    
}

?>
