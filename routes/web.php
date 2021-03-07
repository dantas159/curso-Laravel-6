<?php

use Illuminate\Support\Facades\Route;

// Permite todos os tipos acessos de verbo http (Usar com caltela por conta dos riscos).
Route::any('/any', function(){
    return 'Any';
});

// Você define os metodos aceitos, nesse caso botei apenas GET ou POST.
Route::match(['get','post'],'/match', function(){
    return 'Match';
});

Route::get('/', function () {
    return view('welcome');
});

// Rotas passando apenas uma String 
Route::get('/contato', function(){
    return 'Contato';
});

// Rotas pegando as views dentro de resources -> views
Route::get('/empresa', function(){
    return view('contact');
});

// Rotas por post -> Explicação próximas aulas
Route::post('/register', function(){
    return '';
});