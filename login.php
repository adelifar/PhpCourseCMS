<?php
session_start();
include_once "classes/DB.php";
include_once "classes/User_cls.php";
if (isset($_POST["loginSubmit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $userObj = new User();
    $user = $userObj->getUserByUsername($username);
    if (count($user) > 0 && ($user[0]["username"] === $username && $user[0]["password"] === $password)) {
        $_SESSION["username"]=$username;
        $_SESSION["role"]=$user[0]["role"];
        $_SESSION["firstName"]=$user[0]["first_name"];
        $_SESSION["lastName"]=$user[0]["last_name"];
        //last name
        //role
        header("Location: admin");
    } else {
        header("Location: index.php");
    }

}
if (isset($_GET["logout"])){
    unset( $_SESSION["role"]);
    unset($_SESSION["username"]);
    header("Location: index.php");
}

?>