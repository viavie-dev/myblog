<?php

use App\Models\ArticleModel;


if(!array_key_exists('articleid', $_GET) || empty($_GET['articleid']) || !ctype_digit($_GET['articleid'])){

    echo "Attention : pas de paramètre 'articleid' dans l'URL !";
    exit;
}

$articleId = $_GET['articleid'];

// create article object

$articleModel = new ArticleModel();

if (!empty($_POST)) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $image =  $_POST['image'];
    $categoryId = $_POST['category'];
    $keywords = $_POST['keywords'];

    // var_dump($_POST);
    // die;
    $articleModel->updateArticle($title, $content, $author, $image, $categoryId, $articleId);

    // delete values keywords
    $articleModel->deleteArticleKeywords($articleId );
    foreach($keywords as $key => $value){
        $keywordId = $value;
            
        $articleModel->insertIntoArticleKeyword($articleId, $keywordId);
    
    }
    // Redirection vers le dashboard admin
    header('Location: ' . buildUrl('/'));
    exit;

}

$article = $articleModel->getOneArticle($articleId);

// On récupère la liste des catégories pour afficher le liste déroulante des catégories
$categoryModel = new \App\Models\CategoryModel();
$categories = $categoryModel->getAllCategories();

$articleModel = new ArticleModel();
$keywords = $articleModel->getKeyword();

// Affichage du template
render('update', [
    'categories' => $categories,
    'article' => $article, 
    'keywords' => $keywords
]);
