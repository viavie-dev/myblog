<?php

namespace App\Models;

$articleModel = new ArticleModel();
$articles =  $articleModel->getAllArticles();


render('home', [
    'articles' => $articles

]);
