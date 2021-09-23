<?php


// Import des classes
use App\Models\ArticleModel;
use App\Models\CategoryModel;

// si le formulaire est soumis
if (!empty($_POST)) {

// Récupération des données du formulaire
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $image = $_POST['image'];  
    $categoryId = $_POST['category'];
    $keywords = $_POST['keywords'];
    
    //dd($keywords);

    
    // insertion de l'article en BDD
    $articleModel = new ArticleModel();

    
    $articleId = $articleModel->insertArticle($title, $content, $author, $image, $categoryId);
    
    foreach($keywords as $key => $value){
        $keywordId = $value;
        //var_dump($keywordId);
        
        $articleModel->insertIntoArticleKeyword($articleId, $keywordId);
        }
    
    
// ajout d'un flash message de réussite

//  redirection vers le dashboard
    header('Location: ' . buildUrl('/'));
    exit;

}

$categoryModel = new CategoryModel();
$categories = $categoryModel->getAllCategories();

$articleModel = new ArticleModel();
$keywords = $articleModel->getKeyword();

render('create', [
    'categories' => $categories,
    'keywords' => $keywords

]);
