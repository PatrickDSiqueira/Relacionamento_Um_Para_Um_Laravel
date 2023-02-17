<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use \App\Cliente;
use \App\Endereco;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes',function (){
        $clientes = Cliente::all();
        foreach ($clientes as $c){
            echo '<p>ID: '.$c->id.'</p>';
            echo '<p>Nome: '.$c->nome.'</p>';
            echo '<p>Telefone: '.$c->telefone.'</p>';
            echo '<p>Nome: '.$c->endereco->rua.'</p>';
            echo '<p>Numero: '.$c->endereco->numero.'</p>';
            echo '<p>Bairro: '.$c->endereco->bairro.'</p>';
            echo '<p>Cidade: '.$c->endereco->cidade.'</p>';
            echo '<p>Uf: '.$c->endereco->uf.'</p>';
            echo '<p>Cep: '.$c->endereco->cep.'</p>';
            echo '<hr>';
    }
});

Route::get('/enderecos',function (){
    $enderecos = Endereco::all();
    foreach ($enderecos as $e){
        echo '<p>ID: '.$e->cliente_id.'</p>';
        echo '<p>Nome: '.$e->cliente->nome.'</p>';
        echo '<p>Telefone: '.$e->cliente->telefone.'</p>';
        echo '<p>Nome: '.$e->rua.'</p>';
        echo '<p>Numero: '.$e->numero.'</p>';
        echo '<p>Bairro: '.$e->bairro.'</p>';
        echo '<p>Cidade: '.$e->cidade.'</p>';
        echo '<p>Uf: '.$e->uf.'</p>';
        echo '<p>Cep: '.$e->cep.'</p>';
        echo '<hr>';
    }
});

Route::get('/inserir', function (){
    $c = new Cliente();
    $c->nome = 'José Almeida';
    $c->telefone = '31984305054';
    $c->save();
    $e = new Endereco();
    $e->rua = 'Das primaveras';
    $e->numero = 1569;
    $e->bairro = 'João Del Rey';
    $e->cidade = 'São Paulo';
    $e->uf = 'AL';
    $e->cep = '98748695';

    $c->endereco()->save($e);
});
