<?php

use App\Models\ArticleModel;

$articleModel = new ArticleModel();
$articles = $articleModel->getAllArticles();
$keywords = $articleModel->getKeyword();

$categoryModel = new \App\Models\CategoryModel();
$categories = $categoryModel->getAllCategories();

if (!empty($_GET)) {
    $category = htmlspecialchars($_GET['category']);
    $author = htmlspecialchars($_GET['author']);
    $keyword =  htmlspecialchars($_GET['keyword']);

    var_dump($_GET);

    
}


render('advancedSearch', [
    'articles' => $articles,
    'categories' => $categories,
    'keywords' => $keywords

]);