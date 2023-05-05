<?php
session_start();
// echo "<pre>";
// var_dump($_SESSION);die;
$id= $_SESSION['toDoRow']['id'];
$title= $_SESSION['toDoRow']['title'];
$body= $_SESSION['toDoRow']['body'];
$img= $_SESSION['toDoRow']['img'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
<link rel="stylesheet" href="styleEditToDo.css">
    <title>Edit and Update</title>
</head>
<body>
<div class="container">
<form action="editTodo.php" method="post" enctype="multipart/form-data" class="row" style="
    gap: 10px;">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="text" name="title" value="<?php echo $title; ?>" >
    <textarea name="body"  ><?php echo $body; ?></textarea>
<img src="upload/<?php echo $img; ?>" width="100px" >
<input type="hidden" name="imgHidden" value="<?php echo $img; ?>">
    <input type="file" name="img" >
    <input type="submit" value="save">
</form>
<!-- <?php print_r( $toDoRow ); ?>  -->
<?php  $_SESSION['check']=0;  ?> 
</div> 
</body>
</html>