<?php

// si le formulaire est soumis

use App\Models\ArticleModel;

if (!empty($_POST)) {
    $query = $_POST['query'];
    $query = strtolower($query);
    //dd($query);

    $articleModel = new ArticleModel();
    $articlesSelected = $articleModel->selectArticle($query);

    dd($articlesSelected );
}