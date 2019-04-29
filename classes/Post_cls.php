<?php
/**
 * Created by IntelliJ IDEA.
 * User: Unity
 * Date: 3/4/2019
 * Time: 11:45 AM
 */

class Post extends DB
{
 public $query="SELECT p.id,category_id,title,concat( u.first_name,' ',u.last_name) 
as author,date,p.image,content,tags,status,view_count,(SELECT COUNT(id) 
from comments WHERE comments.post_id=p.id) as comment_count 
from posts as p
INNER JOIN users as u on u.id=p.author_id";
    public function getAllPostCount(){
        return $this->connect()->query("select count(id) as cnt from posts")->fetchAll(PDO::FETCH_ASSOC)[0]["cnt"];
    }
    public function getAllPosts()
    {

        return $this->connect()->query($this->query)->fetchAll(PDO::FETCH_ASSOC);
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
        $query = "insert into posts (title,author_id,category_id,status,image,tags,content,comment_count,date) values ($qTitle,$qAuthor,$qCategoryId,$qStatus,$qImage,$qTags,$qContent,0,now())";
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

        $query = "$this->query where  p.id={$cn->quote($id)}";
        return $cn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatePost($id, $title, $categoryId, $status, $image, $tags, $content)
    {
        $cn = $this->connect();
        $qId = $cn->quote($id);
        $qTitle = $cn->quote($title);
        $qCategoryId = $cn->quote($categoryId);

        $qStatus = $cn->quote($status);
        $qImage = $cn->quote($image);
        $qTags = $cn->quote($tags);
        $qContent = $cn->quote($content);
        $query = "update posts set title=$qTitle , category_id=$qCategoryId, status=$qStatus , image=$qImage, tags=$qTags, content=$qContent
where  id=$qId";
        $cn->query($query);
    }

    public function getPosts($catid)
    {
        $cn=$this->connect();
        $qCatId=$cn->quote($catid);
        return $cn->query("select * from posts where status='published' and category_id=$qCatId")->fetchAll(PDO::FETCH_ASSOC);
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
    public function getPostsByAuthor($author){
        $cn=$this->connect();
        $author=$cn->quote($author);
        return $cn->query("select * from posts where status='published' and author=$author")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function incrementView($pid)
    {
        $cn=$this->connect();
        $pid=$cn->quote($pid);
        $query="update posts set view_count=view_count+1 where id=$pid";
        $cn->query($query);
    }

    public function getAllPostsByPage($pageLength, $page)
    {
        //1 0..5
        //2 5..10
        //3 10..15

        $pageLimit=$page*$pageLength-$pageLength;
        return $this->connect()->query("$this->query limit $pageLimit,$pageLength")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCatPostCount($catid)
    {
        $cn=$this->connect();
        $qCatId=$cn->quote($catid);
        return $cn->query("select count(id) as cnt from posts where status='published' and category_id=$qCatId")->fetchAll(PDO::FETCH_ASSOC)[0]["cnt"];
    }

    public function getCategoryPostsByPage($catid, $pageLength, $page)
    {

        $pageLimit=$page*$pageLength-$pageLength;
        $cn=$this->connect();
        $qCatId=$cn->quote($catid);
        return $cn->query("$this->query  where status='published' and category_id=$qCatId  limit $pageLimit,$pageLength")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAuthorPostCount($author)
    {
        $cn=$this->connect();
        $author=$cn->quote($author);
        return $cn->query("select count(id) as cnt from posts where status='published' and author=$author")->fetchAll(PDO::FETCH_ASSOC)[0]["cnt"];
    }

    public function getAuthorPostsByPage($author, $pageLength, $page)
    {
        $pageLimit=$page*$pageLength-$pageLength;
        $cn=$this->connect();
        $author=$cn->quote($author);
        return $cn->query("$this->query   where status='published' and concat( u.first_name,' ',u.last_name)=$author  limit $pageLimit,$pageLength")->fetchAll(PDO::FETCH_ASSOC);
    }
}