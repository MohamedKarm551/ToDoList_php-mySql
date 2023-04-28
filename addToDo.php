<?php
require_once("toDoFunctions.php");

session_start();
if(empty($_SESSION['login'])){
    header("LOCATION:login.php");
}
if(isset($_POST['title'])){
    $title=$_POST['title'];
    $body=$_POST['body'];
    $filetmp=$_FILES['img']['tmp_name'];
    $img=$_FILES['img']['name'];
    move_uploaded_file($filetmp,"upload/".$img);
    $user_id=$_SESSION['login']['id'];
    $res=addToDo($title , $body , $img,$user_id );
    header("LOCATION:show.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="addToDo.css">
    <title>ADD TO DO </title>
</head>
<body>
<div class="container">

    <form action="addTodo.php" method="post" enctype="multipart/form-data" class="row" style="gap: 10px;">
    <h2>add new task</h2>
        <input type="text" name="title" placeholder="title" >
        <textarea name="body" cols="10" rows="10" placeholder="description"></textarea>
        <input type="file" name="img" >
        <input type="submit" value="save">
    </form>
</div> 
</body>
</html>