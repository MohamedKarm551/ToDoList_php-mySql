<?php 
require_once("toDoFunctions.php");
session_start();
// check login 
if(empty($_SESSION['login'])){
    header("LOCATION:login.php");
}
// 
$toDoRow=getToDoById($_GET['id']);

if(isset($_POST['body'])){// edit in any input  
    //if there are img update 
        if ($_FILES['img']['size']> 0) {
                // There are file uploads on the page
             //   unlink("upload/".$_POST['img']);// TO delete the last image
                $fileTemp=$_FILES['img']['tmp_name'];
                $img=$_FILES['img']['name'];
                move_uploaded_file($fileTemp,"upload/".$img);
              

            } else {// no edit on image 
                // $img=$_POST['img'] ;          
        }
        $res= updateToDo($_POST['id'] , $_POST['title'] , $_POST['body'] , $img );
        if($res==1){
         header("LOCATION:show.php");
        }
        else{
         echo "<h1>ERoooooooR</h1>";
        }
}
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
    <input type="hidden" name="id" value="<?php echo $toDoRow['id']; ?>">
    <input type="text" name="title" value="<?php echo $toDoRow['title']; ?>" >
    <textarea name="body"  ><?php echo $toDoRow['body']; ?></textarea>
<img src="upload/<?php echo $toDoRow['img']; ?>" width="100px" >
<input type="hidden" name="img" value="<?php echo $toDoRow['img']; ?>">
    <input type="file" name="img" value="<?php echo $toDoRow['img']; ?>" >
    <input type="submit" value="save">
</form>
<!-- <?php print_r( $toDoRow ); ?>  -->
</div> 
</body>
</html>