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

    
    // if cat not null and author not null
    if($category != 0 || $author != '' ){

        // traitement de cat et author 

        // if cat not null and author not null and keyword not null 
        if($keyword != 0){

            // traitement de keyword
        // if cat not null and author not null and keyword null 
        }else{
            // aucun traitement de keyword exit 
        }

        // if cat null and author null 
    }else if($category == 0 || $author == '' ){

        // aucun traitement
        if($keyword != 0){
            //traitement de keyword only
        }

        }
    }



}


render('advancedSearch', [
    'articles' => $articles,
    'categories' => $categories,
    'keywords' => $keywords

]);