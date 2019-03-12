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

    public function deleteCategory($catId)
    {
        $connection = $this->connect();
        $qId = $connection->quote($catId);
        $connection->query("delete from categories where id=$qId");
    }

    public function addCategory($name, $description)
    {
        $cnn = $this->connect();
        $qName = $cnn->quote($name);
        $qDescription = $cnn->quote($description);
        $cnn->query("insert into categories (name, description)values ($qName,$qDescription)");
    }

    public function getCategory($id)
    {
        $cnn = $this->connect();
        $qId = $cnn->quote($id);
        return $cnn->query("select * from categories where id=$qId")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateCategory($updateId, $updateName, $updateDescription)
    {
        $cnn=$this->connect();
        $qId=$cnn->quote($updateId);
        $qName=$cnn->quote($updateName);
        $qDescription=$cnn->quote($updateDescription);
        $cnn->query("update categories set name=$qName , description=$qDescription where id=$qId");
    }
}