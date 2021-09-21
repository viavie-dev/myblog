<?php
namespace App\Core;

//require_once CORE_DIR . '/Database.php';
abstract class Model {

    /**
     * @var Database
     */

    static protected $database = null;

    public function __construct(){

        // Si la propriété statiques $database n'a pas encore été initialisée...
        if (self::$database === null) {

            // ... on l'initialise en créant un objet Database
            self::$database = new Database();
        }
    }
}