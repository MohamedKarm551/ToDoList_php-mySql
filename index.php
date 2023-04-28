<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>test register</title>
</head>
<body>
    <div class="container ">
    <form action="index.php" method="post" class="row">
    <div class="mb-3 col-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3 col-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="text" class="form-form" name="name">
    <label class="form-text" for="exampleCheck1">name</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

</body>
</html>
<?php

include "usersFunctions.php";
if(isset( $_POST['name'])){
  // $name= htmlspecialchars( $_POST['name'] );
    $name=  $_POST['name'] ;
    $email= $_POST['email'];
    $password= sha1( $_POST['password'] );
  $res=  insertUser($name , $email , $password);

  if($res == 1){

   header("LOCATION:login.php");
  }
  else {
    echo "error";
  }
}

?>



<?php
// $help_num = 4;
// $nums = [2, 4, 5, 6, 10];

// Output
// "2 + 10 = 12"
// "4 + 6 = 10"
// "5 + 5 = 10"
// "6 + 4 = 10"
// "10 + 2 = 12"
// $end = count( $nums) - 1; 
// foreach( $nums as $item =>$i){
// // echo $item;// 0 1 2 3 4 
// // echo $i;// 2 4 5 6 10
 
// $sum = " $nums[$item]"."+"."$nums[$end] <br>" ;
// echo $sum; 
// $end=$end -1 ;
// }
// ==========================

?>