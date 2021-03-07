<?php

use Illuminate\Support\Facades\Route;
/* ---------------------------------------------------------------------------------------- GROUPS ----------------------------------------------------------------------------------------  */
//Criado para receber o redirecionamento quando houver middleware nas rotas
Route::get('/login', function(){
    return "Login";
})->name('login');

/* PODEMOS UTILZAR ESSA ESTRUTURA, PORÉM ELA É BEM EXTENSA OU PODEMOS USAR A SEGUNDA QUE É BEM MENOR E MAIS DIRETA
//Cria um grupo de rotas com um middleware(Filtro -> Maior segurança), porém o nome desse midd já é declarado para todos do grupo
Route::middleware(['auth'])->group(function(){
//Cria um grupo com o prefixo(Prefixo da url) das rotas do grupo já declarado
    Route::prefix("admin")->group(function(){
        //Cria um grupo com o namespace(nome da pasta onde os arquivos estão) das rotas do grupo já declarado
            Route::namespace('Admin')->group(function(){
            //Cria um grupo com o name(Pra não fica repetindo o admin. em todos os names)
                Route::name('admin.')->group(function(){
                    //Neste exempo já esta pegando o direcionamento de um controller -> Admin(Já está passando no namespace -> group)\TesteController(Nome do arquivo)@Teste(Nome da função)
                    Route::get('/dashboard', 'TesteController@Teste')->name('dashboard');
                    //Neste exempo já esta pegando o direcionamento de um controller -> Admin(Já está passando no namespace -> group)\TesteController(Nome do arquivo)@Teste(Nome da função)
                    Route::get('/financeiro', 'TesteController@Teste')->name('financeiro');
                    //Neste exempo já esta pegando o direcionamento de um controller -> Admin(Já está passando no namespace -> group)\TesteController(Nome do arquivo)@Teste(Nome da função)
                    Route::get('/produtos', 'TesteController@Teste')->name('produtos');
                    //Neste exempo já esta pegando o direcionamento de um controller -> Admin(Já está passando no namespace -> group)\TesteController(Nome do arquivo)@Teste(Nome da função)
                    Route::get('/', function(){
                        return redirect()->route('admin.dashboard');
                    })->name('home');

                });

            });

    });
    
});
*/



//Cria um grupo de groups passando tudo que for pra criar groups e seus valores.
Route:: group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'name' => 'admin.'
], function(){

    Route::get('/dashboard', 'TesteController@Teste')->name('dashboard');
        
    Route::get('/financeiro', 'TesteController@Teste')->name('financeiro');
    
    Route::get('/produtos', 'TesteController@Teste')->name('produtos');

    Route::get('/', function(){
        return redirect()->route('admin.dashboard');
    })->name('home');

});

/* ---------------------------------------------------------------------------------------- GROUPS ----------------------------------------------------------------------------------------  */







/* ---------------------------------------------------------------------------------------- VIEW ----------------------------------------------------------------------------------------  */

// O name funciona para deixar tudo mais organizado e não ter problemas em mudar o nome de uma rota pois já foi declaro um name pra ela.
Route::get('/nome-url', function(){
    return "Olá teste";
})->name('url.name');

// acessar a url diretamente.
//route('url.name');

Route::get('redirect3', function(){
    return redirect()->route('url.name');
});


//So passa esse padrão quando a view for estatica, bem simples, se ela estiver logica este método é errado

Route::view('/view','welcome');

// Route::get('/', function () {
//     return view('welcome');
// });

// Rotas pegando as views dentro de resources -> views

Route::get('/empresa', function(){
    return view('contact');
});

/* ---------------------------------------------------------------------------------------- VIEW ----------------------------------------------------------------------------------------  */







/* ---------------------------------------------------------------------------------------- URL ----------------------------------------------------------------------------------------  */

// Redirecionando pra outra rota
// Route::get('redirect1', function(){
//     return redirect('/redirect2');
// });

Route::redirect('/redirect1', '/redirect2');

Route::get('redirect2', function(){
    return "Redirecionar 2";
});

//Redirecionando pra outra rota

// Pegando flag da url e chamando na String(o nome da variavel não precisa ser igual ao da {$flag}) 

Route::get('/categorias/{flag}', function($prm1){
    return "Produtos da categoria: {$prm1}";
});


// Passando uma flag na url + outro parametro (a $flag tem que ser igual a {$flag}) 

Route::get('/categoria/{flag}/posts', function($flag){
    return "Posts da categoria: {$flag}";
});


// Passando paramentros opcionais(Coloca a interrogação pra deixar o parametro Opcional {idProduto?}) 

Route::get('/produtos/{idProduto?}', function($idProduto = ''){
    return "Produtos: {$idProduto}";
});

// Permite todos os tipos acessos de verbo http (Usar com caltela por conta dos riscos)

Route::any('/any', function(){
    return 'Any';
});

// Você define os metodos aceitos, nesse caso botei apenas GET ou POST

Route::match(['get','post'],'/match', function(){
    return 'Match';
});

// Rotas passando apenas uma String

Route::get('/contato', function(){
    return 'Contato';
});

// Rotas por post -> Explicação próximas aulas

Route::post('/register', function(){
    return '';
});

/* ---------------------------------------------------------------------------------------- URL ----------------------------------------------------------------------------------------  */