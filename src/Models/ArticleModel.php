<?php
namespace App\Models;

use App\Core\Model;



class ArticleModel extends Model{


    function getAllArticles(): array
    {
        $sql = 'SELECT A.id AS articleid, title, content, author, image, createdAt, C.name AS category
                FROM Article AS A          
                INNER JOIN category AS C ON A.categoryId = C.id
                ORDER BY A.createdAt ASC';

        // Récupération des résultats

        return self::$database->fetchAllRows($sql);
    }

    function getOneArticle(int $articleId): array
    {
        // récupérer les données de l'article
        $sql = 'SELECT A.id AS articleid, title, content, author, image, createdAt, C.name AS category
            FROM article AS A          
            INNER JOIN category AS C ON A.categoryId = C.id
            WHERE A.id = ?';

        // Récupération des résultats
        return self::$database->fetchOneRow($sql, [$articleId]);
       
    }

// tipage des paramètres string = title
    function insertArticle(string $title, string $content, string $author, string $image, int $categoryId)
    {
        $sql = 'INSERT INTO article
            (title, content, author, image, categoryId, createdAt)
            VALUES (?, ?, ?, ?, ?, NOW())';

        return self::$database->insertQuery($sql, [$title, $content, $author, $image, $categoryId]);
    }
    /**
     * Update article
     */
    // DATE_FORMAT(completion, "%d/%m/%Y")
    // DATE_FORMAT("2018-09-24", "%M %d %Y")
    function updateArticle(string $title, string $content, string $author, string $image, int $categoryId, int $articleid)
    {
        $sql = 'UPDATE article 
                SET title = ?,  content = ?, author = ?, image = ?, categoryId = ?, updatedAt = NOW()
                WHERE id = ?';

        self::$database->executeQuery($sql, [$title, $content, $author, $image, $categoryId, $articleid]);
    }
    /**
     * delete an article
     */
    function deleteArticle(int $articleId)
    {
        $sql = 'DELETE  FROM article WHERE id = ?';
        self::$database->executeQuery($sql, [$articleId]);
    }

}


