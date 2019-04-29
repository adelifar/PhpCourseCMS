<?php
/**
 * Created by IntelliJ IDEA.
 * User: Unity
 * Date: 4/28/2019
 * Time: 5:56 PM
 */
//session_start();
class OnlineUser extends DB
{
    public function getOnlineUsers(){
        $sessionId=session_id();
        $time=time();
        $cn=$this->connect();
        $currentUser=$cn->query("select * from online_users where session='$sessionId'")->fetchAll(PDO::FETCH_ASSOC);
        if (count($currentUser)>0){
            //addet already
            $cn->query("update online_users set time=$time where session='$sessionId'");
        }else{
            //first time
            $cn->query("insert into online_users(session,time) values ('$sessionId',$time)");
        }
        $timeOffset=60;
        $offlineTime=$time-$timeOffset;
        return $cn->query("select count(id) as cnt from online_users where time >$offlineTime")->fetchAll(PDO::FETCH_ASSOC)[0]["cnt"];

    }
}