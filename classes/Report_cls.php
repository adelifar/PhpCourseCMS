<?php
/**
 * Created by IntelliJ IDEA.
 * User: Unity
 * Date: 4/23/2019
 * Time: 2:49 PM
 */

class Report extends DB
{
    function getPostCount()
    {
        $query="select count(id) as cnt from posts";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
    }
    function getUserCount()
    {
        $query="select count(id) as cnt from users";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
    }
    function getCommentCount()
    {
        $query="select count(id) as cnt from comments";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
    }
    function getCategoryCount()
    {
        $query="select count(id) as cnt from categories";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
    }

    public function getActivePostCount()
    {
        $query="select count(id) as cnt from posts where status='published'";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
    }

    public function getDraftPostCount()
    {
        $query="select count(id) as cnt from posts where status='draft'";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
    }

    public function getAdminUserCount()
    {
        $query="select count(id) as cnt from users where role='admin'";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
    }

    public function getSubscriberCount()
    {
        $query="select count(id) as cnt from users where role='subscriber'";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
    }

    public function getApprovedCommentCount()
    {
        $query="select count(id) as cnt from comments where status=1";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
    }
}