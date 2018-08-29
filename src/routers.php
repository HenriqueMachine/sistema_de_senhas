<?php

Flight::route('/', function(){

    $session = Flight::get('session');
    Flight::resp("Bem vindo a API ".$session->data->name."(".$session->data->id.")");
    
});

Flight::route('/adm/login', function(){

    $body = Flight::data();

    $data['nome'] = "";
    $data['error'] = false;
    if(isset($body['email'])){
        if($body['email'] != 'rafaelbarbosatec@gmail.com'){
            $data['error'] = true;
        }else{
            Flight::redirect('/adm');
        }
    }

    Flight::render('login', $data);

});

Flight::route('/adm', function(){

    $data['dashboard'] = "active";
    $data['usuarios'] = "";
    $data['usuarios_1'] = "";
    $data['usuarios_2'] = "";
    $data['categorias'] = "";
    $data['categorias_1'] = "";
    $data['categorias_2'] = "";
    $data['atendentes'] = "";
    $data['atendentes_1'] = "";
    $data['atendentes_2'] = "";

    Flight::render('sidebar', $data, 'sidebar');

    Flight::render('dashboard', []);

});

Flight::route('/adm/usuarios/listar', function(){

    $data['dashboard'] = "";
    $data['usuarios'] = "active";
    $data['usuarios_1'] = "active";
    $data['usuarios_2'] = "";
    $data['categorias'] = "";
    $data['categorias_1'] = "";
    $data['categorias_2'] = "";
    $data['atendentes'] = "";
    $data['atendentes_1'] = "";
    $data['atendentes_2'] = "";

    Flight::render('sidebar', $data, 'sidebar');

    Flight::render('dashboard', []);

});

Flight::route('/adm/usuarios/cadastrar', function(){

    $data['dashboard'] = "";
    $data['usuarios'] = "active";
    $data['usuarios_1'] = "";
    $data['usuarios_2'] = "active";
    $data['categorias'] = "";
    $data['categorias_1'] = "";
    $data['categorias_2'] = "";
    $data['atendentes'] = "";
    $data['atendentes_1'] = "";
    $data['atendentes_2'] = "";

    Flight::render('sidebar', $data, 'sidebar');

    Flight::render('dashboard', []);

});



Flight::route('POST /usuario/cadastrar', array('UsuariosController','cadastrar'));
Flight::route('POST /login', array('UsuariosController','login'));

Flight::route('POST /senha', array('SenhaController','gerar'));

?>