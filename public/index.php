<?php
// Inclusion du fichier d'autoload de Composer
require '../vendor/autoload.php';
require '../config.php';
require SERVICES_DIR . '/functions.php';

// Détection de la route

$route = '/'; // par défaut on sera sur la page d'accueil
if (array_key_exists('route', $_GET)) {
    $route = $_GET['route'];// Sinon on récupère présente dans l'URL
}


// routing
switch ($route) {

// Page d'accueil
    case '/':
        require CONTROLLERS_DIR . '/home.php';
        break;

    
    case '/article':
        require CONTROLLERS_DIR . '/displayArticle.php';
        break;

    case '/create':
        require CONTROLLERS_DIR . '/create.php';
        break;
    
    case '/update':
    require CONTROLLERS_DIR . '/update.php';
    break;

    case '/delete':
        require CONTROLLERS_DIR . '/delete.php';
        break;

    case '/searchBar':
        require CONTROLLERS_DIR . '/searchBar.php';
        break;
}


