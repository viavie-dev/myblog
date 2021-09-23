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

    $selectedArticles = $articleModel->search([
        'categoryId' => intval($category),
        'author' => $author,
        'keywordId' => intval($keywordId)
    ]);

    //dd($selectedArticles);
    
        foreach($selectedArticles as $key =>$value){
        //dd($selectedArticles[$key]['article_id']);
        $selectedArray[]= $selectedArticles[$key]['article_id'];
      
        dd($selectedArray);

        //  if($selectedArticles[$key]['article_id'] != $selectedArray){
        //  $selectedArray = $selectedArticles[$key]['article_id'];
        //  }
        
            //dd($selectedArray);
        }

}    

render('advancedSearch', [
    'articles' => $articles,
    'categories' => $categories,
    'keywords' => $keywords

]);