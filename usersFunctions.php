<?php
 require_once("connectToDataBase.php");
// $connect = mysqli_connect($localhost , userName , pass , $dataBasename);
// function connection(){
//     $connect = mysqli_connect("localhost" , "root" , "" , "test");
// return $connect;
// }
function insertUser($name , $email , $password){
$sql = "INSERT INTO `users` ( `name`, `password`, `email`) VALUES ('$name','$password','$email') ";
$connection= connection();// عشان نخلي نفس الاتصال مستخدم مستخدمش أكثر من اتصال ملهوش علاقة ببعضه
// mysqli_query( $connection , $sql );
$result = mysqli_query($connection, $sql);
return $result;

 mysqli_close($connection);
}
 function selectUserByEmailAndPassword($email , $password)
{
    $sql= "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password' ";
  $res=  mysqli_query(connection() , $sql );
  return mysqli_fetch_assoc($res);
//   if (mysqli_num_rows($res) > 0) {
//     echo "Tables in "."users".":<br>";
//     while ($row = mysqli_fetch_assoc($res)) {
//         echo $row['Tables_in_'."users"]."<br>";
//     }
// } else {
//     echo "No tables found.";
// }
}
?>
<?php
// echo $_POST['name']."<br>";
// echo $_POST['email']."<br>";
// echo $_POST['password']."<br>";
// $name=$_POST['name'];
// $email=$_POST['email'];
// $password=$_POST['password'];
// require();
// require_once("connectToDataBase.php");//connect
// $sql = " INSERT INTO users (name,password,email) VALUES ('$name','$password','$email') ";

// $result = mysqli_query($connect, $sql);

// if ($result) {
//     echo "<h1>Record added successfully.</h1>";
// } else {
//     echo "Error adding record: " . mysqli_error($connect);
// }

// mysqli_close($connect);

?>