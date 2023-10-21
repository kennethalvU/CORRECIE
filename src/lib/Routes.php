<?php

use App\controllers\AddDepartamento;
use App\controllers\AddUsuario;
use App\controllers\BuscarDoc;
use App\controllers\Inicio;
use App\controllers\Error404;
use App\controllers\ListaDepartamentos;
use App\controllers\ListaUsuarios;
use App\controllers\Login;
use App\controllers\Perfil;
use App\controllers\SubirDoc;

$router = new \Bramus\Router\Router();

session_start();

$router->before('GET', '/.*', function () {
});

$router->set404(function () {
    if (!isset($_SESSION['usuario'])) {
        header('Location: login');
        exit;
    }
    $_SESSION['titulo'] = 'Pagina de Error 404';

    $controller = new Error404;
    $controller->render('error404/index');
});

//? Rutas de la pantalla de inicio //
$router->get('/', function () {
    if (!isset($_SESSION['usuario'])) {
        header('Location: login');
        exit;
    }
    $_SESSION['titulo'] = 'Pagina de Inicio';

    $controller = new Inicio;
    $controller->render('inicio/index');
});

$router->get('/inicio', function () {
    if (!isset($_SESSION['usuario'])) {
        header('Location: login');
        exit;
    }
    $_SESSION['titulo'] = 'Pagina de Inicio';

    $controller = new Inicio;
    //echo $controller->datosCards();
    $controller->render('inicio/index');
});

$router->get('/perfil', function () {
    if (!isset($_SESSION['usuario'])) {
        header('Location: login');
        exit;
    }
    $_SESSION['titulo'] = 'Pagina de Perfil';

    $controller = new Perfil;
    $controller->render('perfil/index');
});

$router->get('/login', function () {
    if (isset($_SESSION['usuario'])) {
        header('Location: inicio');
        exit;
    }
    $controller = new Login;
    $controller->render('login/index');
});

$router->post('/login', function () {
    $controller = new Login;
    $controller->postLogin();
});

$router->get('/buscarDoc', function () {
    if (!isset($_SESSION['usuario'])) {
        header('Location: login');
        exit;
    }
    $_SESSION['titulo'] = 'Buscar Documentos';

    $controller = new BuscarDoc;
    $controller->render('buscarDoc/index');
});

$router->post('/buscarDoc', function () {
    $controller = new BuscarDoc;
    $controller->llenarTablaDoc();
});

$router->get('/subirDoc', function () {
    if (!isset($_SESSION['usuario'])) {
        header('Location: login');
        exit;
    }
    $_SESSION['titulo'] = 'Subir Documentos';

    $controller = new SubirDoc;
    $controller->render('subirDoc/index');
});

$router->post('/subirDoc', function () {
    $controller = new SubirDoc;
    $controller->llenarSelectDepartamento();
    $controller->subirDoc();
});

$router->get('/addUsuario', function () {
    if (!isset($_SESSION['usuario'])) {
        header('Location: login');
        exit;
    }
    $_SESSION['titulo'] = 'Agregar Usuarios';

    $controller = new AddUsuario;
    $controller->render('addUsuario/index');
});

$router->get('/listaUsuarios', function () {
    if (!isset($_SESSION['usuario'])) {
        header('Location: login');
        exit;
    }
    $_SESSION['titulo'] = 'Listar Usuarios';

    $controller = new ListaUsuarios;
    $controller->render('listaUsuarios/index');
});

$router->post('/listaUsuarios', function () {
    $controller = new ListaUsuarios;
    $controller->llenarTabla();
});

$router->get('/listaDepartamentos', function () {
    if (!isset($_SESSION['usuario'])) {
        header('Location: login');
        exit;
    }
    $_SESSION['titulo'] = 'Listar Departamentos';

    $controller = new ListaDepartamentos;
    $controller->render('listaDepartamentos/index');
});

$router->get('/addDepartamento', function () {
    if (!isset($_SESSION['usuario'])) {
        header('Location: login');
        exit;
    }
    $_SESSION['titulo'] = 'Agregar Departamentos';

    $controller = new AddDepartamento;
    $controller->render('addDepartamento/index');
});

$router->get('/logout', function () {
    session_start();
    session_destroy();
    header('Location: login');
    exit;
});

$router->get('/prueba', function () {
    $controller = new ListaUsuarios;
    echo $controller->llenarTabla();
});

$router->run(function () {
});