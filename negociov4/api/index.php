<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as DB;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

// Instantiate app
$app = AppFactory::create();
$app->setBasePath("/sistemaescolarv4/api/index.php");

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

// Add route callbacks
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('Hello World');
    return $response;
});

//Funcion de autentificación de usuario
$app->post('\login\{usuario}', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);

    $users = DB::table('usuarios')
    ->leftJoin('perfiles', 'usuarios.perfiles_idperfil', '=', 'perfiles.idperfil')
    ->where('usuarios.usuario', $_POST['usuario'])
    ->first();

    if ($users->contraseña == $_POST['contraseña']){
        header("Location:guarderia.php");
    }
    else {
        header("Location:fallo.html");
    }

    $response->getBody()->write(json_decode($msg));
    return $response;
});

//Funcion para registrar usuarios
$app->post('\nuevosusuarios', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);

    DB::table('usuarios')->insert([
        'usuario' => $_POST['usuario'],
        'contraseña' => $_POST['contraseña'],
    ]);

    header("Location:guarderia.php");

    $response->getBody()->write(json_decode($msg));
    return $response;
});

//Funcion para rellenar formulario
$app->post('\solicitud', function (Request $request, Response $response, array $args) {

    $data = json_decode($request->getBody()->getContents(), false);

    DB::table('solicitud')->insert([
        'tutor' => $_POST['tutor'],
        'pais' => $_POST['pais'],
        'nombreniño' => $_POST['nombreniño'],
        'correo' => $_POST['correo'],
        'numero' => $_POST['numero'],
    ]);

    header("Location:guarderia.php");

    $response->getBody()->write(json_decode($msg));
    return $response;
});

// Run application
$app->run();