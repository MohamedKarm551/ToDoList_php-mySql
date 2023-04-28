<?php 
require_once("toDoFunctions.php");
session_start();
if(empty($_SESSION['login'])){
    header("LOCATION:login.php");
}

$res= doneTask($_GET['id']);
if($res==1){
    header("LOCATION:show.php");

}