<?php

use App\Models\ArticleModel;

$articleModel = new ArticleModel();
$articles =  $articleModel->getAllArticles();


render('home', [
    'articles' => $articles

]);
