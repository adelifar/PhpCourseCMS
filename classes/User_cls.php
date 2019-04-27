<?php
/**
 * Created by IntelliJ IDEA.
 * User: Unity
 * Date: 4/13/2019
 * Time: 12:18 PM
 */

class User extends DB
{
    public function getAllUsers()
    {
        return $this->connect()->query("select * from users")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser($username, $password, $firstName, $lastName, $email, $role)
    {
        $cn = $this->connect();
        $username = $cn->quote($username);
        $ops=["cost"=>11];

        $password = $cn->quote( password_hash($password,PASSWORD_BCRYPT,$ops));
        $firstName = $cn->quote($firstName);
        $lastName = $cn->quote($lastName);
        $email = $cn->quote($email);
        $role = $cn->quote($role);
        $query = "insert into users (username, password,first_name,last_name,email,role) values ($username,$password,$firstName,$lastName,$email,$role)";
        $cn->query($query);
    }

    public function deleteUser($id)
    {
        $cn = $this->connect();
        $id = $cn->quote($id);
        $cn->query("delete from users where id=$id");
    }

    public function getUser($uid)
    {
        $cn = $this->connect();
        $id = $cn->quote($uid);
        return $cn->query("select * from users where id=$id")->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    public function updateUser($uid, $username, $password, $firstName, $lastName, $email, $role)
    {
        $cn = $this->connect();
        $id = $cn->quote($uid);
        $username = $cn->quote($username);
        $ops=["cost"=>11];

        $password = $cn->quote( password_hash($password,PASSWORD_BCRYPT,$ops));
        $firstName = $cn->quote($firstName);
        $lastName = $cn->quote($lastName);
        $email = $cn->quote($email);
        $role = $cn->quote($role);
        $query = "update users set username=$username, password=$password, first_name=$firstName, last_name=$lastName,email=$email,role=$role where id=$id";
        $cn->query($query);
    }

    public function getUserByUsername($username)
    {
        $cn = $this->connect();
        $username = $cn->quote($username);
        $all = $cn->query("select * from users where username=$username")->fetchAll(PDO::FETCH_ASSOC);
        if (count($all) > 0) {
            return $all[0];
        } else return null;

    }

    public function registerUser($username, $email, $password)
    {
        $cn = $this->connect();
        $username = $cn->quote($username);
        $email = $cn->quote($email);
        $password=$cn->quote($password);
        $query = "insert into users(username,password,email,role) values ($username,$password,$email,'subscriber')";
        $cn->query($query);
    }
}