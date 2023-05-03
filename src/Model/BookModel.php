<?php

namespace App\Model;
use PDO;
class BookModel
{

    public function getConn() {
        try {
            return $conn = new PDO('mysql:host=localhost;dbname=super_week', 'root', '');
        } catch (\PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function addBookDb($title, $content, $id) {
        $req = $this->getConn()->prepare('INSERT INTO book (title, content, id_user) VALUES (:title, :content, :id_user)');
        $req->execute([
            ":title" => $title,
            ":content" => $content,
            ":id_user" => $id
        ]);
    }

    public function getAllBooks() {
        $req = $this->getConn()->prepare('SELECT * FROM book');
        $req->execute([]);

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBookById($id) {
        $req = $this->getConn()->prepare('SELECT * FROM book WHERE id=:id');
        $req->execute([
           ":id" => $id
        ]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}