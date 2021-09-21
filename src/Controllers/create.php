<?php
namespace App\Models;

// Import des classes
use App\Models\ArticleModel;


// si le formulaire est soumis
if (!empty($_POST)) {

// Récupération des données du formulaire
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $image = $_POST['image'];  
    $categoryId = $_POST['category'];
    

// insertion de l'article en BDD
    $articleModel = new ArticleModel();
    $articleId = $articleModel->insertArticle($title, $content, $author, $image, $categoryId);
    //une fois la réponse envoyé il n' ya pas de header location possible

    
// ajout d'un flash message de réussite

//  redirection vers le dashboard
    header('Location: ' . buildUrl('/'));
    exit;

}

$categoryModel = new CategoryModel();
$categories = $categoryModel->getAllCategories();

render('create', [
    'categories' => $categories,

]);
