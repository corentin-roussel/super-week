<?php

namespace App\Controller;

use App\Model\BookModel;

class BookController
{

    public function security(array $array):array | false
    {
        $result = [];
        foreach ($array as $key => $values)
        {
            $result["$key"] = htmlspecialchars(trim($values));

            if(!empty($values))
            {
                continue;
            }else {

                return false;
            }

        }
        return $result;
    }

    public function bookController(string $table, array $array):void {


        $values = $this->security($array);

        if($values)
        {
            $BookModel = new BookModel();
            $BookModel->addBookDb($table, $values);
        }
        else
        {
            echo "Please fill all the field";
        }
    }

    public function getAllFromBook(string $table):object {
        $BookModel = new BookModel();
        echo json_encode($BookModel->getAll($table), JSON_PRETTY_PRINT);
        die();
    }

    public function getBookById(string $table, array $array):object {
        $BookModel = new BookModel();
        echo json_encode($BookModel->getOne($table , $array), JSON_PRETTY_PRINT);
        die();
    }
}