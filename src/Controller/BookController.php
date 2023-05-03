<?php

namespace App\Controller;

use App\Model\BookModel;

class BookController
{
    public function bookController($title,$content, $id) {
        $title = htmlspecialchars(trim($title));
        $content = htmlspecialchars(trim($content));

        if(!empty($title) && !empty($content))
        {
            $BookModel = new BookModel();

            $BookModel->addBookDb($title, $content, $id);
        }

    }

    public function getAllBook() {
        $BookModel = new BookModel();
        echo json_encode($BookModel->getAllBooks(), JSON_PRETTY_PRINT);
        die();
    }

    public function getBookById($id) {
        $BookModel = new BookModel();
        echo json_encode($BookModel->getBookById($id), JSON_PRETTY_PRINT);
        die();
    }
}