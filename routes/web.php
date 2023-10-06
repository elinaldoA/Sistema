<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Auth Administrativo
Route::prefix('admin')->group(function () {
    Route::get('login', 'Sistema\Admin\Auth\LoginController@showLoginForm')->name('sistema.admin.login');
    Route::post('login', 'Sistema\Admin\Auth\LoginController@login')->name('sistema.admin.login.submit');
    Route::post('logout', 'Sistema\Admin\Auth\LoginController@logout')->name('sistema.admin.logout');

    Route::get('register', 'Sistema\Admin\Auth\RegisterController@showRegistrationForm')->name('sistema.admin.register');
    Route::post('register', 'Sistema\Admin\Auth\RegisterController@register')->name('sistema.admin.submit');

    Route::get('password/confirm', 'Sistema\Admin\Auth\ConfirmPasswordController@showConfirmForm')->name('sistema.admin.password.confirm');
    Route::post('password/confirm', 'Sistema\Admin\Auth\ConfirmPasswordController@confirm')->name('sistema.admin.confirm.submit');

    Route::get('password/reset', 'Sistema\Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('sistema.admin.password.request');
    Route::post('password/email', 'Sistema\Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('sistema.admin.password.email');

    Route::get('password/reset/{token}', 'Sistema\Admin\Auth\ResetPasswordController@showResetForm')->name('sistema.admin.password.reset');
    Route::post('password/reset', 'Sistema\Admin\Auth\ResetPasswordController@reset')->name('sistema.admin.password.update');

    Route::get('email/verify', 'Sistema\Admin\Auth\VerificationController@show')->name('sistema.admin.verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Sistema\Admin\Auth\VerificationController@verify')->name('sistema.admin.verification.verify');
    Route::post('email/resend', 'Sistema\Admin\Auth\VerificationController@resend')->name('sistema.admin.verification.resend');
});
Route::group(['prefix' => 'Sistema/Admin', 'middleware' => ['auth']], function () {
    Route::get('dashboard', 'Sistema\Admin\DashboardController@index')->name('dashboard');
    Route::get('/profile', 'Sistema\Admin\ProfileController@index')->name('profile');
    Route::put('/profile', 'Sistema\Admin\ProfileController@update')->name('profile.update');
    //Categorias
    Route::get('/cadastros/categorias/novo','Sistema\Admin\Cadastros\CategoriasController@create')->name('categoria.create');
    Route::post('/cadastros/categorias/novo','Sistema\Admin\Cadastros\CategoriasController@store')->name('categoria.store');
    Route::get('/cadastros/categorias/visualizar','Sistema\Admin\Cadastros\CategoriasController@index')->name('categorias');
    Route::get('/cadastros/categorias/{categoria}/show','Sistema\Admin\Cadastros\CategoriasController@show')->name('categoria.show');
    Route::get('/cadastros/categorias/{categoria}/editar','Sistema\Admin\Cadastros\CategoriasController@edit');
    Route::post('/cadastros/categorias/{categoria}/editar','Sistema\Admin\Cadastros\CategoriasController@update')->name('categoria.editar');
    Route::get('/cadastros/categorias/{categoria}/excluir','Sistema\Admin\Cadastros\CategoriasController@delete');
    Route::post('/cadastros/categorias/{categoria}/excluir','Sistema\Admin\Cadastros\CategoriasController@destroy')->name('categoria.excluir');
    //Clientes
    Route::get('/cadastros/clientes/novo','Sistema\Admin\Cadastros\ClientesController@create')->name('cliente.create');
    Route::post('/cadastros/clientes/novo','Sistema\Admin\Cadastros\ClientesController@store')->name('cliente.store');
    Route::get('/cadastros/clientes/visualizar','Sistema\Admin\Cadastros\ClientesController@index')->name('clientes');
    Route::get('/cadastros/clientes/{cliente}/show','Sistema\Admin\Cadastros\ClientesController@show')->name('cliente.show');
    Route::get('/cadastros/clientes/{cliente}/editar','Sistema\Admin\Cadastros\ClientesController@edit');
    Route::post('/cadastros/clientes/{cliente}/editar','Sistema\Admin\Cadastros\ClientesController@update')->name('cliente.editar');
    Route::get('/cadastros/clientes/{cliente}/excluir','Sistema\Admin\Cadastros\ClientesController@delete');
    Route::post('/cadastros/clientes/{cliente}/excluir','Sistema\Admin\Cadastros\ClientesController@destroy')->name('cliente.excluir');
    //Planos
    Route::get('/cadastros/planos/novo','Sistema\Admin\Cadastros\PlanosController@create')->name('plano.create');
    Route::post('/cadastros/planos/novo','Sistema\Admin\Cadastros\PlanosController@store')->name('plano.store');
    Route::get('/cadastros/planos/visualizar','Sistema\Admin\Cadastros\PlanosController@index')->name('planos');
    Route::get('/cadastros/planos/{plano}/show','Sistema\Admin\Cadastros\PlanosController@show')->name('plano.show');
    Route::get('/cadastros/planos/{plano}/editar','Sistema\Admin\Cadastros\PlanosController@edit');
    Route::post('/cadastros/planos/{plano}/editar','Sistema\Admin\Cadastros\PlanosController@update')->name('plano.editar');
    Route::get('/cadastros/planos/{plano}/excluir','Sistema\Admin\Cadastros\PlanosController@delete');
    Route::post('/cadastros/planos/{plano}/excluir','Sistema\Admin\Cadastros\PlanosController@destroy')->name('plano.excluir');
    //Empresas
    Route::get('/cadastros/empresas/novo','Sistema\Admin\Cadastros\EmpresasController@create')->name('empresa.create');
    Route::post('/cadastros/empresas/novo','Sistema\Admin\Cadastros\EmpresasController@store')->name('empresa.store');
    Route::get('/cadastros/empresas/visualizar','Sistema\Admin\Cadastros\EmpresasController@index')->name('empresas');
    Route::get('/cadastros/empresas/{empresa}/show','Sistema\Admin\Cadastros\EmpresasController@show')->name('empresa.show');
    Route::get('/cadastros/empresas/{empresa}/editar','Sistema\Admin\Cadastros\EmpresasController@edit');
    Route::post('/cadastros/empresas/{empresa}/editar','Sistema\Admin\Cadastros\EmpresasController@update')->name('empresa.editar');
    Route::get('/cadastros/empresas/{empresa}/excluir','Sistema\Admin\Cadastros\EmpresasController@delete');
    Route::post('/cadastros/empresas/{empresa}/excluir','Sistema\Admin\Cadastros\EmpresassController@destroy')->name('empresa.excluir');
    //Despesas
    Route::get('/financeiro/despesas/visualizar','Sistema\Admin\Financeiro\DespesasController@index')->name('despesas');
    Route::get('/financeiro/despesas/{despesa}/show','Sistema\Admin\Financeiro\DespesasController@show')->name('despesa.show');
    //Receitas
    Route::get('/financeiro/receitas/visualizar','Sistema\Admin\Financeiro\ReceitasController@index')->name('receitas');
    Route::get('/financeiro/receitas/{receita}/show','Sistema\Admin\Financeiro\ReceitasController@show')->name('receita.show');
});

//Auth Empresas
Route::prefix('empresas')->group(function () {
    Route::get('login', 'Sistema\Empresas\Auth\LoginController@showLoginForm')->name('sistema.empresa.login');
    Route::post('login', 'Sistema\Empresas\Auth\LoginController@login')->name('sistema.empresas.submit');
    Route::post('logout', 'Sistema\Empresas\Auth\LoginController@logout')->name('sistema.empresas.logout');

    Route::get('password/confirm', 'Sistema\Empresas\Auth\ConfirmPasswordController@showConfirmForm')->name('sistema.empresas.password.confirm');
    Route::post('password/confirm', 'Sistema\Empresas\Auth\ConfirmPasswordController@confirm')->name('sistema.empresas.confirm.submit');

    Route::get('password/reset', 'Sistema\Empresas\Auth\ForgotPasswordController@showLinkRequestForm')->name('sistema.empresas.password.request');
    Route::post('password/email', 'Sistema\Empresas\Auth\ForgotPasswordController@sendResetLinkEmail')->name('sistema.empresas.password.email');

    Route::get('password/reset/{token}', 'Sistema\Empresas\Auth\ResetPasswordController@showResetForm')->name('sistema.empresas.password.reset');
    Route::post('password/reset', 'Sistema\Empresas\Auth\ResetPasswordController@reset')->name('sistema.empresas.password.update');

    Route::get('email/verify', 'Sistema\Empresas\Auth\VerificationController@show')->name('sistema.empresas.verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Sistema\Empresas\Auth\VerificationController@verify')->name('sistema.empresas.verification.verify');
    Route::post('email/resend', 'Sistema\Empresas\Auth\VerificationController@resend')->name('sistema.empresas.verification.resend');
});

Route::group(['prefix' => 'Sistema/Empresa', 'middleware' => ['auth']], function () {
    Route::get('dashboard', 'Sistema\Empresas\DashboardController@index')->name('dashboard-empresa');
    Route::get('/profile', 'Sistema\Empresas\ProfileController@index')->name('profile-empresa');
    Route::put('/profile', 'Sistema\Empresas\ProfileController@update')->name('profile-empresa.update');
    //Produtos
    Route::get('/Cadastros/Produtos/novo','Sistema\Empresas\Cadastros\ProdutosController@create')->name('produto.create');
    Route::post('/Cadastros/Produtos/novo','Sistema\Empresas\Cadastros\ProdutosController@store')->name('produto.store');
    Route::get('/Cadastros/Produtos/visualizar','Sistema\Empresas\Cadastros\ProdutosController@index')->name('produtos');
    Route::get('/Cadastros/Produtos/{produto}/show','Sistema\Empresas\Cadastros\ProdutosController@show')->name('produto.show');
    Route::get('/Cadastros/Produtos/{produto}/editar','Sistema\Empresas\Cadastros\ProdutosController@edit');
    Route::post('/Cadastros/Produtos/{produto}/editar','Sistema\Empresas\Cadastros\ProdutosController@update')->name('produto.editar');
    Route::get('/Cadastros/Produtos/{produto}/excluir','Sistema\Empresas\Cadastros\ProdutosController@delete');
    Route::post('/Cadastros/Produtos/{produto}/excluir','Sistema\Empresas\Cadastros\ProdutosController@destroy')->name('produto.excluir');
});

//Auth Empresas
Route::prefix('clientes')->group(function () {
    Route::get('login', 'Sistema\clientes\Auth\LoginController@showLoginForm')->name('sistema.cliente.login');
    Route::post('login', 'Sistema\Clientes\Auth\LoginController@login')->name('sistema.clientes.submit');
    Route::post('logout', 'Sistema\Clientes\Auth\LoginController@logout')->name('sistema.clientes.logout');

    Route::get('password/confirm', 'Sistema\Clientes\Auth\ConfirmPasswordController@showConfirmForm')->name('sistema.clientes.password.confirm');
    Route::post('password/confirm', 'Sistema\Clientes\Auth\ConfirmPasswordController@confirm')->name('sistema.clientes.confirm.submit');

    Route::get('password/reset', 'Sistema\Clientes\Auth\ForgotPasswordController@showLinkRequestForm')->name('sistema.clientes.password.request');
    Route::post('password/email', 'Sistema\Clientes\Auth\ForgotPasswordController@sendResetLinkEmail')->name('sistema.clientes.password.email');

    Route::get('password/reset/{token}', 'Sistema\Clientes\Auth\ResetPasswordController@showResetForm')->name('sistema.clientes.password.reset');
    Route::post('password/reset', 'Sistema\Clientes\Auth\ResetPasswordController@reset')->name('sistema.clientes.password.update');

    Route::get('email/verify', 'Sistema\Clientes\Auth\VerificationController@show')->name('sistema.clientes.verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Sistema\Clientes\Auth\VerificationController@verify')->name('sistema.clientes.verification.verify');
    Route::post('email/resend', 'Sistema\Clientes\Auth\VerificationController@resend')->name('sistema.clientes.verification.resend');
});

Route::group(['prefix' => 'Sistema/Cliente', 'middleware' => ['auth']], function () {
    Route::get('dashboard', 'Sistema\Clientes\DashboardController@index')->name('dashboard-cliente');
    Route::get('/profile', 'Sistema\Clientes\ProfileController@index')->name('profile-cliente');
    Route::put('/profile', 'Sistema\Clientes\ProfileController@update')->name('profile-cliente.update');

    //Loja
    Route::get('/Loja', 'Sistema\Clientes\Loja\LojaController@index')->name('loja');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
