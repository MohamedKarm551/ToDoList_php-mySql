<?php
//$localhost= "localhost";
//define('userName', 'root');
//define('pass', '');
// $userName="root";
// $pass="";
// عشان لما أستخدم الصقحة دي مضمنة حوا صفحة تانية الأسماء متختلفش وتعمل اوفررايد على بعض
//$dataBasename="test";
 //$connect = mysqli_connect($localhost , userName , pass , $dataBasename);
// echo "<pre>";
// print_r($connect);
function connection(){
    $connect = mysqli_connect("localhost" , "root" , "" , "test");
return $connect;
}
?>