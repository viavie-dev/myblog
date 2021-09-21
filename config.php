<?php
// constantes de connection à la base de données
define('BDD_HOST', 'localhost');
define('BDD_NAME', 'myblog');
define('BDD_USER', 'root');
define('BDD_PASSWORD', 'root13');

define('ROOT_DIR', __DIR__);
define('PUBLIC_DIR', ROOT_DIR . '/www');
define('VIEWS_DIR', ROOT_DIR . '/views');
define('MODELS_DIR', ROOT_DIR . '/src/Models');
define('SERVICES_DIR', ROOT_DIR . '/src/functions');
define('CONTROLLERS_DIR', ROOT_DIR . '/src/Controllers');
define('CORE_DIR', ROOT_DIR . '/src/Core');


// Si on passe par le localhost, il faut ajouter tout le chemin dans les URLs
if ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1') {
    define('BASE_URL', '/ri7/my-blog/public');
}

// Si on est sur le virtual host on ne doit pas mettre le chemin
else {
    define('BASE_URL', '');
}
