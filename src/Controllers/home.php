<?php

use App\Models\ArticleModel;

$articleModel = new ArticleModel();
$message='';

if(empty($_GET['query'])){
    $articles =  $articleModel->getAllArticles();

}
else {
    $query = $_GET['query'];
    $query = strtolower($query);
    //dd($query);
    $articles= $articleModel->selectArticle($query);
    //dd($articles);
    if($articles === null){
        $message = 'il y a aucun résultat correspondant à votre recherche';
        
    }
    if($articles != null){
        $keys = array_keys($articles);
        $lastKey = $keys[count($keys)-1];
        $lastKey++;
        //dd($lastKey);
        $message = 'il n\' y '.$lastKey.' résultat correspondant à votre recherche';
        //dd($message);
    }
};

//dd($message);
render('home', [
    'articles' => $articles, 
    'message' => $message

]);
