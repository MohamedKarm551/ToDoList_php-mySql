<?php
// check login 
session_start();
if(empty($_SESSION['login'])){
    header("LOCATION:login.php");
}
// check login 

require_once("toDoFunctions.php");
$list_of_toDo= showToDo($_SESSION['login']['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>SHOW</title>
</head>
<body>
    <!-- <?php // echo '$_SESSION['.'login'.']'.'; is '; // echo "<pre>";// print_r( $_SESSION['login']);?>
     -->
       <!-- echo "{$_SESSION['login']['name']}"; -->
 
<div class="container">
<?php 
      echo "<h2 style='display:inline-block;'>HELLO: {$_SESSION['login']['name']}</h2>";
      ?>
      <button type="button" class="btn btn-danger"><a href="logOut.php" style="
    text-decoration: none;
    color: #000;
    font-weight: bold;">logOut</a></button>
    <br>
 <?php echo date("Y/m/d")." ||  "; echo date("h:i:s");?>   
 <br>
<table class="table table-dark table-striped">
<tr>
    <td class="table-dark">#</td>
    <td class="table-dark">title</td>
    <td class="table-dark">body</td>
    <td class="table-dark">img</td>
    <td class="table-dark">done</td>
    <td class="table-dark">edit</td>
    <td class="table-dark">delete</td>
</tr>
<?php foreach( $list_of_toDo as $todo): ?>
    <tr>
        <td class="table-dark"><?php echo $todo['id']  ?></td>
        <td class="table-dark"><?php echo $todo['title']  ?></td>
        <td class="table-dark"><?php echo $todo['body']  ?></td>
        <td class="table-dark"><img src="upload/<?php echo $todo['img']  ?>" width="100px" height="100px" alt=""></td>
        <input type="hidden" name="img" value="<?php echo $todo['img']; ?>">
        <?php if ($todo['done']==1):?>
        <td class="table-dark">
             <a class ="btn btn-success" href="doneToDo.php?id=<?=$todo['id']?>">done</a>
        </td>
        <?php else: ?>
    
        <td class="table-dark">
             <a class ="btn btn-light" href="doneToDo.php?id=<?=$todo['id']?>">done</a>
        </td>
        <?php endif ; ?>

        <td class="table-dark"> <a href="editToDo.php?id=<?=$todo['id']?>" class="btn btn-info">edit </a></td>
        <td class="table-dark"><a href="deleteToDo.php?id=<?=$todo['id']?>" class ="btn btn-danger">delete</a></td>
    </tr>
<?php endforeach ; ?>
</table>
<a class ="btn btn-success" href="addToDo.php">ADD task</a>
</div>
</body>
</html>