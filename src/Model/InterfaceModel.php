<?php

namespace App\Model;

interface InterfaceModel
{
    public function getConn():\PDO | null;

    public function insertInto(string $table, array $array):void;

    public function getAll(string $table):array | false;

    public function getOne(string $table , array $array):array | false;
}