
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>login </title>
</head>
<body>
    <div class="container">
    <form action="login.php" method="post">
    <div class="mb-3 col-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" placeholder="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">

    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" placeholder="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

</body>
</html>
<?php
session_start();
include "usersFunctions.php";
if(isset($_POST['email'])){
    $email=$_POST['email'];
    $password=sha1($_POST['password']);
   $res= selectUserByEmailAndPassword($email , $password);
//    print_r($res);die;
if(!empty($res)){
    $_SESSION['login'] = $res;
    header("LOCATION:show.php");
}
}
?>