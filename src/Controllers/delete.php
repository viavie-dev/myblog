<?php

use App\Models\ArticleModel;

if(!array_key_exists('articleid', $_GET) || empty($_GET['articleid']) || !ctype_digit($_GET['articleid'])){

    echo "Attention : pas de paramètre 'articleid' dans l'URL !";
    exit;
}

// récupérer le paramètre postid dans la chaîne de requête (URL)
$articleId = $_GET['articleid'];

// Création d'un objet PostModel
$articleModel = new ArticleModel();

if (!empty($_POST)) {


        $title = $_POST['title'];

        $categoryId = $_POST['category'];
        
        $articleModel->deleteArticle($articleId);

    
// Redirection vers le dashboard admin
    header('Location: ' . buildUrl('/'));
    exit;
}

// Récupération de l'article
$article = $articleModel->getOneArticle($articleId);

// On récupère la liste des catégories pour afficher le liste déroulante des catégories
$categoryModel = new \App\Models\CategoryModel();
$categories = $categoryModel->getAllCategories();

// Affichage du template
render('delete', [
    'categories' => $categories,
    'article' => $article
]);

