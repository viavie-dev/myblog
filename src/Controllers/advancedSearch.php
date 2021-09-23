<?php

use App\Models\ArticleModel;

$articleModel = new ArticleModel();
$articles = $articleModel->getAllArticles();
$keywords = $articleModel->getKeyword();

$categoryModel = new \App\Models\CategoryModel();
$categories = $categoryModel->getAllCategories();

if (!empty($_POST)) {
    $category = htmlspecialchars($_POST['category']);
    $author = htmlspecialchars($_POST['author']);
    $keyword =  htmlspecialchars($_POST['keyword']);

    $categories = $articleModel->search([
        'categorieId' => $category,
        'author' => $author,
    ]);

    // var_dump($_POST);
    // die;


}    

render('advancedSearch', [
    'articles' => $articles,
    'categories' => $categories,
    'keywords' => $keywords

]);