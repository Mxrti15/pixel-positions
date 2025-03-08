<?php

// Se importan los controladores necesarios para las rutas que se definieron en el archivo.
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;

// Se importa la fachada Route para definir las rutas de la aplicación.
use Illuminate\Support\Facades\Route;

// Ruta principal que llama al método 'index' del controlador JobController.
Route::get('/', [JobController::class, 'index']);

// Ruta para mostrar el formulario de creación de un trabajo, solo accesible si el usuario está autenticado.
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');

// Ruta para almacenar un nuevo trabajo, solo accesible si el usuario está autenticado.
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');

// Ruta para realizar búsquedas, llama al controlador SearchController.
Route::get('/search', SearchController::class);

// Ruta para mostrar trabajos filtrados por una etiqueta, pasando el nombre de la etiqueta como parámetro.
Route::get('/tags/{tag:name}', TagController::class);

// Grupo de rutas que solo pueden ser accedidas por usuarios no autenticados (guest).
Route::middleware('guest')->group(function () {
    // Ruta para mostrar el formulario de registro de usuario.
    Route::get('/register', [RegisteredUserController::class, 'create']);
    
    // Ruta para almacenar un nuevo usuario registrado.
    Route::post('/register', [RegisteredUserController::class, 'store']);
    
    // Ruta para mostrar el formulario de inicio de sesión.
    Route::get('/login', [SessionController::class, 'create']);
    
    // Ruta para iniciar sesión de un usuario.
    Route::post('/login', [SessionController::class, 'store']);
});

// Ruta para cerrar la sesión del usuario autenticado, solo accesible si el usuario está autenticado.
Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');
