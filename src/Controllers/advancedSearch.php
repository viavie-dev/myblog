<?php

use App\Models\ArticleModel;

$articleModel = new ArticleModel();
$articles = $articleModel->getAllArticles();
$keywords = $articleModel->getKeyword();

$categoryModel = new \App\Models\CategoryModel();
$categories = $categoryModel->getAllCategories();

if (!empty($_POST)) {
    $categoryId = htmlspecialchars($_POST['category']);
    $author = htmlspecialchars($_POST['author']);
    $keywordId =  htmlspecialchars($_POST['keyword']);

    $selectedArticles = $articleModel->search([
        'categoryId' => intval($category),
        'author' => $author,
        'keywordId' => intval($keywordId)
    ]);

    dd($selectedArticles);
    


}    

render('advancedSearch', [
    'articles' => $articles,
    'categories' => $categories,
    'keywords' => $keywords

]);