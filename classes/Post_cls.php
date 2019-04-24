<?php
/**
 * Created by IntelliJ IDEA.
 * User: Unity
 * Date: 3/4/2019
 * Time: 11:45 AM
 */

class Post extends DB
{
    public function getAllPosts()
    {
        return $this->connect()->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchPost($searchQuery)
    {
        $connect = $this->connect();
        $searchQuery = '%' . $searchQuery . '%';
        $searchQuery = $connect->quote($searchQuery);
        $query = "select * from posts where title like $searchQuery or author like $searchQuery or content like $searchQuery or tags like $searchQuery";
        return $connect->query($query)->fetchAll(PDO::FETCH_ASSOC);

    }

    public function addPost($title, $categoryId, $author, $status, $image, $tags, $content)
    {
        $cn = $this->connect();
        $qTitle = $cn->quote($title);
        $qCategoryId = $cn->quote($categoryId);
        $qAuthor = $cn->quote($author);
        $qStatus = $cn->quote($status);
        $qImage = $cn->quote($image);
        $qTags = $cn->quote($tags);
        $qContent = $cn->quote($content);
        $query = "insert into posts (title,author,category_id,status,image,tags,content,comment_count,date) values ($qTitle,$qAuthor,$qCategoryId,$qStatus,$qImage,$qTags,$qContent,0,now())";
        $cn->query($query);
    }

    public function deletePost($postId)
    {
        $cn = $this->connect();
        $qid = $cn->quote($postId);
        $query = "delete from posts where id=$qid";
        $cn->query($query);
    }

    public function getPost($id)
    {
        $cn = $this->connect();
        $query = "select * from posts where  id={$cn->quote($id)}";
        return $cn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatePost($id, $title, $categoryId, $author, $status, $image, $tags, $content)
    {
        $cn = $this->connect();
        $qId = $cn->quote($id);
        $qTitle = $cn->quote($title);
        $qCategoryId = $cn->quote($categoryId);
        $qAuthor = $cn->quote($author);
        $qStatus = $cn->quote($status);
        $qImage = $cn->quote($image);
        $qTags = $cn->quote($tags);
        $qContent = $cn->quote($content);
        $query = "update posts set title=$qTitle , category_id=$qCategoryId, author=$qAuthor, status=$qStatus , image=$qImage, tags=$qTags, content=$qContent
where  id=$qId";
        $cn->query($query);
    }

    public function getPosts($catid)
    {
        $cn=$this->connect();
        $qCatId=$cn->quote($catid);
        return $cn->query("select * from posts where category_id=$qCatId")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function changePostStatus($ar,$status){
        $joinedAr=join(",",$ar);
        $query="update posts set status='$status' where id in($joinedAr)";
        $this->connect()->query($query);
    }
    public function deleteBulkPost($ar){
        $joinedAr=join(",",$ar);
        $query="delete from posts where id in($joinedAr)";
        $this->connect()->query($query);
    }
}