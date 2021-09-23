<?php

use App\Models\ArticleModel;

$articleModel = new ArticleModel();

if(empty($_GET['query'])){
    $articles =  $articleModel->getAllArticles();
}
else {
    $query = $_GET['query'];
    $query = strtolower($query);
    //dd($query);
    $articles= $articleModel->selectArticle($query);
    //dd($selectedArticles);

    if($selectedArticles == null){
        $message =  'il n\'existe aucun résultat à votre recherche';
    }
}

render('home', [
    'articles' => $articles, 
    'message'   => $message
]);
