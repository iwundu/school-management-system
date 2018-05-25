<?php
require("connection.php");
function registeredUsers($conn){
    $sql = "SELECT COUNT(id) from student";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_row($result);
    return $row[0];
}