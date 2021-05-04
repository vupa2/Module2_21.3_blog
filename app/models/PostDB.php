<?php


namespace app\models;


use PDO;

class PostDB
{
    public $connection;
    
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    
    public function getAll()
    {
        $sql = "SELECT * FROM my_mvc.posts";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $posts = [];
        foreach ($result as $row) {
            $post = new Post($row['title'], $row['teaser'], $row['content'], $row['created']);
            $post->id = $row['id'];
            $posts[] = $post;
        }
        return $posts;
    }
    
    public function getById($id)
    {
        $sql = "SELECT * FROM my_mvc.posts WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $post = new Post($row['title'], $row['teaser'], $row['content'], $row['created']);
        $post->id = $row['id'];
        return $post;
    }
    
    public function add($post)
    {
        $sql = "INSERT INTO my_mvc.posts(title, teaser, content, created) VALUES (?, ?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $post->title);
        $statement->bindValue(2, $post->teaser);
        $statement->bindValue(3, $post->content);
        $statement->bindValue(4, $post->created);
        return $statement->execute();
    }
    
    public function deleteById($id)
    {
        $sql = "DELETE FROM my_mvc.posts WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $id);
        return $statement->execute();
    }
    
    public function edit(Post $post)
    {
        $sql = "UPDATE my_mvc.posts SET title = ?, teaser = ?, content = ?, created = ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $post->title);
        $statement->bindValue(2, $post->teaser);
        $statement->bindValue(3, $post->content);
        $statement->bindValue(4, $post->created);
        $statement->bindValue(5, $post->id);
        return $statement->execute();
    }
}