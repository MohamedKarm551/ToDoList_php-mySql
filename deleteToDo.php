<?php
require_once("toDoFunctions.php");
session_start();
if(empty($_SESSION['login'])){
    header("LOCATION:login.php");
}
// require_once("toDoFunctions.php");
$res= deleteTask($_GET['id']);
if($res==true){//if we have any answer from database show the table 
    header("LOCATION:show.php");

}
else{
    echo "<h1>ERoor</h1>";
}
?>