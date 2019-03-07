<?php
/**
 * Created by IntelliJ IDEA.
 * User: Unity
 * Date: 2/27/2019
 * Time: 12:55 PM
 */

class Category extends DB
{
    public function getAllCategories()
    {
        return $this->connect()->query("select * from categories")->fetchAll(PDO::FETCH_ASSOC);
    }
}