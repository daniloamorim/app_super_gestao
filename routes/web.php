<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return 'Olá, seja bem vindo ao curso!';
});
Route::get('/sobre-nos', function () {
    return 'Sobre-nós';
});
Route::get('/contato', function () {
    return 'Contato';
});
*/
/* Route::get(
    '/contato/{nome}/{categoria_id}', 
    function(
        string $nome,
        int $categoria_id = 1 //1 = informação
    ) {
    echo "Estamos aqui: $nome - $categoria_id ";
    }
    )->where('nome','[A-Za-z]+')->where('categoria_id','[0-9]+'); 
    Route::get('rota1',function(){
        echo 'Rota 1';
    })->name('site.rota1');
    Route::get('rota2',function(){
        return redirect()->route('site.rota1');
        })->name('site.rota2'); 
    //Route::redirect('/rota2', '/rota1');
        
    */

Route::get('/', 'PrincipalController@principal')->name('site.index');    

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function() {
    Route::get('/home', 'HomeController@index')
        ->name('app.home');

    Route::get('/sair', 'LoginController@sair')
        ->name('app.sair');

    Route::get('/cliente', 'ClienteController@index')
        ->name('app.cliente');

    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    Route::resource('produto', 'ProdutoController');

});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para página principal.';
});