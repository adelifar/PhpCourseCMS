<?php
ob_start();
include_once "../classes/DB.php";
include_once "../classes/Category_cls.php";
include_once "../classes/Post_cls.php";
include_once "../classes/Comment_cls.php";
include_once "../classes/User_cls.php";
include_once "../classes/Report_cls.php";
session_start();
if (!isset($_SESSION["role"]) || $_SESSION["role"]!="admin"){
    header("Location: ../");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="/cms/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/cms/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
<script src="/cms/vendor/jquery/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/classic/ckeditor.js"></script>