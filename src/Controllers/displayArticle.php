<?php
////////////////////////////////////////
// Inclusion des dépendances si besoin
namespace App\Models;


if(!array_key_exists('articleid', $_GET) || empty($_GET['articleid']) || !ctype_digit($_GET['articleid'])){

echo "Attention : pas de paramètre 'articleid' dans l'URL !";

exit;
}
// récupérer le paramètre postid dans la chaîne de requête (URL)
$articleId = $_GET['articleid'];

$articleModel = new ArticleModel();
$article = $articleModel->getOneArticle($articleId);


render('displayArticle', [
'article' => $article,

]);

