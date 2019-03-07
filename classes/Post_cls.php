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

}