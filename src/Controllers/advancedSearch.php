<?php

use App\Models\ArticleModel;

$articleModel = new ArticleModel();
$articles = $articleModel->getAllArticles();
$keywords = $articleModel->getKeyword();

$categoryModel = new \App\Models\CategoryModel();
$categories = $categoryModel->getAllCategories();
$selectedArray = [];
if (!empty($_POST)) {
    $categoryId = htmlspecialchars($_POST['category']);
    $author = htmlspecialchars($_POST['author']);
    $keywordId =  htmlspecialchars($_POST['keyword']);

    $selectedArticlesByArt = $articleModel->searchArticle([
        'categoryId' => intval($category),
        'author' => $author,     
    ]);

   
    
    $selectedArticlesByKey = $articleModel->searchKeyword([        
        'keywordId' => intval($keywordId)
    ]);  
    
    dd($selectedArticlesByArt, $selectedArticlesByKey);
}    

render('advancedSearch', [
    'articles' => $articles,
    'categories' => $categories,
    'keywords' => $keywords

]);