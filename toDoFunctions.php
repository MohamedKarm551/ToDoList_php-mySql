<?php
require_once("connectToDataBase.php");
// =============================
function addToDo($title , $body , $img , $user_id){
    $connection= connection();// عشان نخلي نفس الاتصال مستخدم مستخدمش أكثر من اتصال ملهوش علاقة ببعضه
    mysqli_query($connection, "INSERT INTO `todos` (`title` , `body` , `img` ,`user_id`) VALUES ('$title','$body','$img' , '$user_id' ) " );
    return mysqli_affected_rows($connection);

}
// =============================

function showToDo($user_id){
        $connection= connection();// عشان نخلي نفس الاتصال مستخدم مستخدمش أكثر من اتصال ملهوش علاقة ببعضه
        $res = mysqli_query($connection, "SELECT * FROM `todos` WHERE `user_id` = '$user_id' " );
        return mysqli_fetch_all($res,MYSQLI_ASSOC);
}
// =============================

function doneTask($id){//this task is done ot not yet 
    $connection= connection();// عشان نخلي نفس الاتصال مستخدم مستخدمش أكثر من اتصال ملهوش علاقة ببعضه
    $res = mysqli_query($connection, "SELECT * FROM `todos` WHERE `id` = '$id' " );
    $toDoRow=mysqli_fetch_assoc($res);
    if($toDoRow['done']==1){
        $res = mysqli_query($connection, "UPDATE  `todos` SET  `done`= 0 WHERE `id` = '$id'  " );
    }
    else{
        $res = mysqli_query($connection, "UPDATE  `todos` SET  `done`= 1 WHERE `id` = '$id'  " );
    }
    return mysqli_affected_rows($connection);
}
// =============================

function deleteTask($id){
    $connection= connection();// عشان نخلي نفس الاتصال مستخدم مستخدمش أكثر من اتصال ملهوش علاقة ببعضه
    $res = mysqli_query($connection, "DELETE  FROM `todos` WHERE `id` = '$id' " );
     $toDoRow=mysqli_affected_rows($connection);//هل الاتصال ده عمل تأثير في الداتا بيز
    return $toDoRow;// true or false
}

// =============================
function getToDoById($id){
    $connection= connection();// عشان نخلي نفس الاتصال مستخدم مستخدمش أكثر من اتصال ملهوش علاقة ببعضه
    $res = mysqli_query($connection, "SELECT *  FROM `todos` WHERE `id` = '$id' " );
    $toDoRow=mysqli_fetch_assoc($res);//one row only  
    return $toDoRow;
}
function updateToDo($id , $title , $body , $img ){
    $connection= connection();// عشان نخلي نفس الاتصال مستخدم مستخدمش أكثر من اتصال ملهوش علاقة ببعضه
    $res = mysqli_query($connection, "UPDATE `todos` SET `title`='$title' , `body` = '$body' , `img` = '$img' WHERE  `id` = '$id' " );
    return mysqli_affected_rows($connection);// لو الاتصال ده أثر في قاعدة البيانات بتاعتي 
}


?>