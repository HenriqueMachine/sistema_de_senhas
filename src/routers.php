<?php

Flight::route('/', function(){

    $session = Flight::get('session');
    Flight::resp("Bem vindo a API ".$session->data->name."(".$session->data->id.")");

});

Flight::route('POST /usuario/cadastrar', array('UsuariosController','cadastrar'));
Flight::route('POST /login', array('UsuariosController','login'));

Flight::route('POST /senha', array('SenhaController','gerar'));

?>