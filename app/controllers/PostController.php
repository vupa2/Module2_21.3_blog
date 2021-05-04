<?php


namespace app\controllers;


use app\models\DBConnection;
use app\models\Post;
use app\models\PostDB;

class PostController
{
    public $postDB;
    
    public function __construct()
    {
        $connection = new DBConnection();
        $this->postDB = new PostDB($connection->connect());
    }
    
    public function index()
    {
        $posts = $this->postDB->getAll();
        include_once __DIR__ . '/../views/list.php';
    }
    
    public function view()
    {
        $id = $_GET['id'];
        $post = $this->postDB->getById($id);
        include_once __DIR__ . '/../views/view.php';
    }
    
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = new Post($_POST['title'], $_POST['teaser'], $_POST['content'], $_POST['created']);
            $message = $this->postDB->add($post) ? 'Post created' : 'Failed';
        }
        include_once __DIR__ . '/../views/add.php';
    }
    
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $post = $this->postDB->getById($id);
            include_once __DIR__ . '/../views/delete.php';
        } else {
            $id = $_POST['id'];
            if ($this->postDB->deleteById($id)) {
                header('Location: /');
                exit;
            }
        }
    }
    
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $post = $this->postDB->getById($id);
            include_once __DIR__ . '/../views/edit.php';
        } else {
            $id = $_POST['id'];
            $post = new Post($_POST['title'], $_POST['teaser'], $_POST['content'], $_POST['created']);
            $post->id = $id;
            $this->postDB->edit($post);
            header('Location: /');
            exit;
        }
    }
}