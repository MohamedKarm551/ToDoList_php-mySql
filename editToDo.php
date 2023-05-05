<?php 
require_once("toDoFunctions.php");
session_start();
// check login 
if(empty($_SESSION['login'])){
    header("LOCATION:login.php");
}
// 

if($_SESSION['check']== 1){
    $toDoRow=getToDoById($_GET['id']);
    if($toDoRow){
        $_SESSION['toDoRow']=$toDoRow;
    header("LOCATION:update.php");
    
    }
}

if(isset($_POST['body'])){// edit in any input  
    //if there are img update 
        if ($_FILES['img']['size']> 0) {
                // There are file uploads on the page
             //   unlink("upload/".$_POST['img']);// TO delete the last image
                $fileTemp=$_FILES['img']['tmp_name'];
                $img=$_FILES['img']['name'];
                move_uploaded_file($fileTemp,"upload/".$img);

              

            } else {// no edit on image 
                // echo "<pre>" ; var_dump($_POST); die;
                $img=$_POST['imgHidden'] ; 
        }
        $res= updateToDo($_POST['id'] , $_POST['title'] , $_POST['body'] , $img );
        if($res == true){ 
         header("LOCATION:show.php");
        }
        else{
         echo "<h1>ERoooooooR</h1>";
        }
}
?>

