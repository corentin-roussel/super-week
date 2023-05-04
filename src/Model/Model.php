<?php

namespace App\Model;

abstract class Model
{
    abstract protected function getConn();

    abstract protected function getAllFromTable(?string $table);

    abstract protected function getOneFieldWhere(?string $table, ?array $array);

}