<?php
/**
 * Created by IntelliJ IDEA.
 * User: Unity
 * Date: 4/9/2019
 * Time: 10:33 AM
 */

class Comment extends DB
{
    public function getAllComments()
    {
        return $this->connect()->query("SELECT comments.*,posts.title as post_title FROM comments INNER JOIN posts on comments.post_id=posts.id ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteComment($id)
    {
        $cn = $this->connect();
        $qId = $cn->quote($id);

        $postId=$cn->query("select * from comments where id=$qId")->fetchAll(PDO::FETCH_ASSOC)[0]["post_id"];
        $cn->query("update posts set comment_count=comment_count-1 where id=$postId");
        $cn->query("delete from comments where id=$qId");
    }

    public function ChangeStatus($id)
    {
        $cn = $this->connect();
        $qId = $cn->quote($id);
        $cn->query("update comments set status=abs(status-1) where id=$qId");
    }

    public function addComment($author, $email, $content, $postId)
    {
        $cn = $this->connect();
        $author = $cn->quote($author);
        $email = $cn->quote($email);
        $content = $cn->quote($content);
        $postId = $cn->quote($postId);
        $cn->query("insert into comments (post_id,author,email,content,status,date) values ($postId,$author,$email,$content,0,now())");
        $cn->query("update posts set comment_count=comment_count+1 where id=$postId");
    }

    public function getPostComments($pid)
    {
        $cn = $this->connect();
        $qId=$cn->quote($pid);
        $query="select * from comments where status=1 and post_id=$qId order by  date desc ";
        return $cn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}