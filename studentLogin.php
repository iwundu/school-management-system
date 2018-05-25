<?php
session_start();
require("header.php");
require("connection.php");
require("input_validation.php");

$error = "";

//actions when submit button is clicked //

if(isset($_POST['submit'])){
    
    //input strings //
    
    $uname = checker($conn,$_POST['uname']);
    $pwd = checker($conn,$_POST['password']);
    
    //Sql section //

    $query = "SELECT * FROM `student` WHERE uname = '$uname' AND password = '$pwd' LIMIT 1 ";
    $result = mysqli_query($conn, $query) or die("unable to query");
    $num =  mysqli_num_rows($result);
    
    //check if username and password exist in database //
    
    if($num ==1){
        $row = mysqli_fetch_array($result);
        //session_register['uname'];
        $_SESSION['uname'] = $row['fname'];
        header("location:studentProfile.php");
    }else{
        $error .= '<div class="alert alert-danger" role="alert"> Username and Password  Combination Incorrect
</div>';
    }
    
}
?>

<div class="courses_banner">
  	<div class="container">
  		<h3>STUDENT PORTAL</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">Home</a></li>
                <li class="current-page">Portal</li>
            </ul>
        </div>
  	</div>
  </div>
<div class="clearfix"></div>
<div class="container">
<form class="form-container" method="post">
  <div class="form-group form_container" align="center">
      <h2 class="font-weight-bold text-center text-success">WELCOME BACK!</h2>
    <input type="text" class="form-control form-control-lg" aria-describedby="emailHelp" name="uname" placeholder="Enter Username">
  </div>
  <div class="form-group form_container" align="center">
    <input type="password"  name="password" class="form-control form-control-lg" placeholder="Password">
  </div>
    <div class="form_container" align="center">
  <input type="submit" name="submit" class="btn btn-outline-success" value="LOGIN">
        <?php echo $error; ?>
    </div>
</form>
</div>
<hr>
<div class="clearfix"></div>
<?php
require("footer.php");
?>