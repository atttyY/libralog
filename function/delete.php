<?php
include "db_conn.php";
$uid = $_GET['uid'];
$sql = "DELETE from `libralog` WHERE uid=$uid";
$result = mysqli_query($conn, $sql);

if($result){
    header("Location: ../index.php?msg=UID: ". $uid ." is Deleted Successfully");
}
else{
    echo "Failed: " . mysqli_error($conn);
}
?>