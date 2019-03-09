<?php
/**
 * Created by IntelliJ IDEA.
 * User: Unity
 * Date: 3/4/2019
 * Time: 11:45 AM
 */

class Post extends DB
{
    public function getAllPosts(){
        return $this->connect()->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function searchPost($searchQuery){
        $connect=$this->connect();
        $searchQuery='%'.$searchQuery.'%';
        $searchQuery=$connect->quote($searchQuery);
        $query="select * from posts where title like $searchQuery or author like $searchQuery or content like $searchQuery or tags like $searchQuery";
        return $connect->query($query)->fetchAll(PDO::FETCH_ASSOC);

    }

}