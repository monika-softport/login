<?php
require("session.php");
require("constant.php");
require("helper.php");

//redirect to template page if the user is logged in
if(logged_in()){
    header( "Location: http://localhost/mvclesson/view/login/dashboard.php" ); die;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to ABC</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?=APP_URL?>/resources/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=APP_URL?>/resources/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=APP_URL?>/resources/plugins/iCheck/square/blue.css">
</head>
