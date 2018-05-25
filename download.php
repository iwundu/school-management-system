<?php
session_start();
require("connection.php");
//check if admin is logged  in or not //
$error = "";
if(isset($_SESSION['uname']) == false){
    header("location:studentLogin.php");
    exit();
}
        $loggedin_user = $_SESSION['uname'];
        $result = mysqli_query($conn,"SELECT student.* , newsletter.newsletter FROM student, newsletter WHERE fname = '$loggedin_user' and newsletter.category = student.paymentCategory LIMIT 1");
        $row = mysqli_fetch_assoc($result);
        $img = $row['img'];
        $news = $row['newsletter'];

//Download Link //

        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($news).'"');
        //header('Expires: 0');
        //header('Cache-Control: must-revalidate');
        //header('Pragma: public');
        header('Content-Length: ' .filesize($news));
        //ob_clean();
        //ob_end_flush();
        readfile($news);
        exit;

        
?>