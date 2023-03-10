<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\agendamentosController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\enviromentsController;
use App\Http\Controllers\equipmentsController;
use App\Http\Controllers\forgotPasswordController;
use App\Http\Controllers\managementsController;
use App\Http\Controllers\resetPasswordController;
use App\Http\Controllers\teachersController;
use App\Http\Controllers\userControl;
use App\Http\Controllers\siteController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/* AUTENTICAÇÃO */
Route::get('/', [userControl::class, 'login'])->name("login.page");
Route::post('/', [userControl::class, 'auth'])->name("auth.user");
Route::get('/logout', [userControl::class, 'logout'])->name("auth.log");

/* VERIFICAÇÃO DE EMAIL */
Route::view('/verified-email', 'layouts.emails.verification')->middleware('auth')->name('verification.notice');
Route::post('/verified-email', [userControl::class, 'sendEmailVerification'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/verified-email/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/agendar');
})->middleware(['auth', 'signed'])->name('verification.verify');

/* REDEFINIÇÃO DE SENHA */
Route::get('/forgot-password', [forgotPasswordController::class, 'index'])->name('forgot-password');
Route::post('/forgot-password/send', [forgotPasswordController::class, 'sendEmail'])->name('forgot-password.link');
Route::view('/change-password', 'passwords.changePassword')->name('change-password');

Route::get('/change-password/{token}', function ($token) {
    return view('passwords.changePassword', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::post('/change-password', [resetPasswordController::class, 'resetPassword'])->middleware('guest')->name('password.update');

/* MIDDLEWARE DE AUTENTICAÇÃO */
Route::middleware(['auth', 'verified'])->group(function () {

        Route::get('agendar', [siteController::class, 'agendar'])->name('Home');
        Route::post('agendar/enviar', [siteController::class, 'store']);
        Route::get('agendar/show', [siteController::class, 'show']);

        // GRUPO DE ROTAS AGENDAMENTOS  
        Route::prefix('agendamentos')->group(function(){
            Route::get('/', [agendamentosController::class, 'view'])->name('agendamentos.view');
            Route::patch('/{id}/update', [agendamentosController::class, 'update'])->name('agendamentos.update');
            Route::delete('/{id}', [agendamentosController::class, 'destroy'])->name('agendamentos.destroy');   
        });

    Route::get('ocorrencia', [ContactController::class, 'index']);
    Route::post('ocorrencia/send', [ContactController::class, 'send'])->name('send.mail.ocorrencia');

    /* GRUPO DE ROTAS COORDENAÇÃO */
    Route::prefix('coordenacao')->group(function () {

        Route::get('/', [siteController::class, 'coordenacao']);

        /* CRUD PROFESSORES */
        Route::prefix('teachers')->group(function () {
            Route::get('/', [teachersController::class, 'index'])->name('teachers.index');
            Route::post('/store', [teachersController::class, 'store'])->name('teachers.store');
            Route::patch('/{id}/update/', [teachersController::class, 'update'])->name('teachers.update');
            Route::delete('/{id}', [teachersController::class, 'destroy'])->name('teachers.destroy');
        });

        /* CRUD COORDENAÇÃO */
        Route::prefix('managements')->group(function () {
            Route::get('/', [managementsController::class, 'index'])->name('managements.index');
            Route::post('/store', [managementsController::class, 'store'])->name('managements.store');
            Route::patch('/{id}/update/', [managementsController::class, 'update'])->name('managements.update');
            Route::delete('/{id}', [managementsController::class, 'destroy'])->name('managements.destroy');
        });

        /* CRUD AMBIENTES */
        Route::prefix('enviroments')->group(function () {
            Route::get('/', [enviromentsController::class, 'index'])->name('enviroments.index');
            Route::post('/store', [enviromentsController::class, 'store'])->name('enviroments.store');
            Route::patch('/{id}/update/', [enviromentsController::class, 'update'])->name('enviroments.update');
            Route::delete('/{id}', [enviromentsController::class, 'destroy'])->name('enviroments.destroy');
        });

        /* CRUD EQUIPAMENTOS */
        Route::prefix('equipments')->group(function () {
            Route::get('/', [equipmentsController::class, 'index'])->name('equipments.index');
            Route::post('/store', [equipmentsController::class, 'store'])->name('equipments.store');
            Route::patch('/{id}/update/', [equipmentsController::class, 'update'])->name('equipments.update');
            Route::delete('/{id}', [equipmentsController::class, 'destroy'])->name('equipments.destroy');
        });
    });
});
