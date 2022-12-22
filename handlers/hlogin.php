<?php
session_start() ;
require_once '../classes/MySql.php' ;
require_once '../classes/Admin.php' ;
if(isset($_POST['Login'])){
    $email=$_POST['email'] ;
    $passowrd=$_POST['password'] ;
    $result=new Admin() ;
     $login=$result->attempt($email,$passowrd) ;

    // echo "<pre>" ;
    // var_dump($login) ;
    if($login!==null) {
         
        $_SESSION['id']=$login['id'] ;
        $_SESSION['username']=$login['username'] ;
       
           header('location:../index.php') ;

    }else{
        echo "<h1>your email or password is wrong </h1>" ;
    }
     
 }