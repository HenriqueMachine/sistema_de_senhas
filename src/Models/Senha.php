<?php

class Senha {

    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        
        if (!isset(self::$instance))
            self::$instance = new Senha();

        return self::$instance;

    }

    public function gerar($categoria, $id_usuario){

        $now = Date('Y-m-d');

        $count = Flight::db()->from('senhas')
                            ->where(['data_criacao >' => $now,'id_categoria' =>$categoria['id']])
                            ->count();

        $now = Date('Y-m-d H:i:s');
        
        $complemento = str_pad(($count+1), 3, '0', STR_PAD_LEFT);
        $senha['senha'] = $categoria['sigla'].''.$complemento;
        $senha['id_categoria'] = $categoria['id'];
        $senha['id_usuario'] = $id_usuario;
        $senha['status'] = 'AGUARDANDO';
        $senha['data_criacao'] = $now;

        Flight::db()->from('senhas')
                    ->insert($senha)
                    ->execute();

        $res = Flight::db()->insert_id;

        if($res){
            return $senha['senha'];
        }else{
            return;
        }

    }

    public function chamar($id_senha){

        $now = Date('Y-m-d H:i:s');

        $senha['status'] = 'CHAMADO';
        $senha['data_chamado'] = $now;

        Flight::db()->from('senhas')
                    ->where('id',$id_senha)
                    ->update($senha)
                    ->execute();

        return Flight::db()->affected_rows;

    }

    public function senhasChamadas(){

        $senhas = Flight::db()->from('senhas')
                    ->join('usuario',array('senhas.id_usuario' => 'usuario.id'))
                    ->where(['status' => 'CHAMADO'])
                    ->many();

        return $senhas;
    }

    public function senhasAguardando(){

        $senhas = Flight::db()->from('senhas')
                    ->join('usuario',array('senhas.id_usuario' => 'usuario.id'))
                    ->where(['status' => 'AGUARDANDO'])
                    ->many();

        return $senhas;
    }

}

?>