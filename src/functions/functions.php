<?php

/**
 * Génère le rendu HTML d'une page view = show post et home ; values tableau vide valeur par défaut, tableau associatif avec des clefs et des valeurs
 */
function render(string $view, array $values = [])
{
    // transformation du contenu tab asso $values en variables
    // Le nom des variables correspond aux clés du tableau, les valeurs aux valeurs
    // IL Prend les clefs et les transforme en var; ex; la clé titi devient $titi
    extract($values);

    include VIEWS_DIR . '/base.phtml';

}


/*** Construit une URL avec éventuellement des paramètres dans la chaîne de requête
 */
function buildUrl(string $route, array $params = []): string
{

    $url = BASE_URL . $route; 

    if(!empty($params)){
        $url .= '?' . http_build_query($params);
    };

      return $url;
}

