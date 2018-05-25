<?php
session_start();
require("connection.php");
require("input_validation.php");
//check if admin is logged  in or not //

if(isset($_SESSION['uname']) == false){
    header("location:index.php");
    exit();
}
    $result = mysqli_query($conn,"SELECT * FROM teachers") or die(mysqli_error());
    $row = mysqli_fetch_array($result);
    $img = $row['img'];
    $subject = $row['subject'];
    $class = $row['class'];
//error string;
$error = "";
if(isset($_POST['submit'])){
    
    //input strings;
     $sname = checker($conn,$_POST['sname']);
     $first_cat = checker($conn,$_POST['first_cat']);
     $second_cat = checker($conn,$_POST['second_cat']);
     $third_cat = checker($conn,$_POST['third_cat']);
     $exam = checker($conn,$_POST['exam']);
     $ascore = checker($conn,$_POST['ascore']);
     $tscore = checker($conn,$_POST['tscore']);
     $grade = checker($conn,$_POST['grade']);
     //error handler;
if(empty($sname)){
    $error .= '<div class="alert alert-danger" role="alert"> Student Name is Required!
</div>';
}
if(empty($first_cat)){
    $error .= '<div class="alert alert-danger" role="alert"> 1st CAT is Required!
</div>';
}
if(empty($second_cat)){
    $error .= '<div class="alert alert-danger" role="alert"> 2nd CAT is Required!
</div>';
}
if(empty($third_cat)){
    $error .= '<div class="alert alert-danger" role="alert"> 3rd CAT is Required!
</div>';
}
if(empty($exam)){
    $error .= '<div class="alert alert-danger" role="alert"> Exam Score is Required!
</div>';
}
if(empty($ascore)){
    $error .= '<div class="alert alert-danger" role="alert"> Average is Required!
</div>';
}
if(empty($tscore)){
    $error .= '<div class="alert alert-danger" role="alert"> Total Score is Required!
</div>';
}
if(empty($grade)){
    $error .= '<div class="alert alert-danger" role="alert"> Grade is Required!
</div>';
}

if($error != ""){
    $error .= '<div class="alert alert-danger" role="alert"> Please fill all fields!'.$error.'
</div>';
}else{
        $sql = "UPDATE result SET student_name = '$sname', class = '$class', subject = '$subject', 1st_CAT = '$first_cat', 2nd_CAT = '$second_cat', 3rd_CAT = '$third_cat', exam = '$exam', average_score = '$ascore', total_score = '$tscore', grade = '$grade' LIMIT 1";
        $Rresult = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        
    $error .= '<div class="alert alert-success" role="alert"> Result Edited Successfully!
</div>';
}

     
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Edit Result</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style4.css">
        <link rel="stylesheet" href="styles2.css">
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                   <?php
                    echo "<img src='uploaded/$img.jpg' class='img-circle img-responsive' width='60' height='60' />";
                    ?>
                </div>

                <ul class="list-unstyled components">
                     <li class="active">
                        <a href="teachersProfile.php">
                            <i class="glyphicon glyphicon-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="uploadResult.php">
                            <i class="glyphicon glyphicon-education"></i>
                            Upload Result
                        </a>
                    </li>
                    <li>
                        <a href="viewResult.php">
                            <i class="glyphicon glyphicon-envelope"></i>
                            View Result
                        </a>
                    </li>
                    <li>
                        <a href="editResult.php">
                            <i class="glyphicon glyphicon-edit"></i>
                            Edit Result
                        </a>
                    </li>
                    <li>
                </ul>

                <ul class="list-unstyled CTAs">
                        <li><a href="logout.php" class="article">Logout</a></li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <span class="glyphicon glyphicon-th-list"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href=""><?php echo "<b>Welcome ".$row['uname']."!</b>"; ?> </a></li>
                                <li><a href="viewResult.php"><button class="btn btn-success">View Result</button></a></li>
                                <li><a href="logout.php"><button class="btn btn-danger">Logout</button></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
               <form method="post">
  <div class="form-row">
    <div class="form-group col-12">
      <label for="inputEmail4">Student Name</label>
      <input type="text" class="form-control" name="sname" placeholder="Student Name">
      </div>
    <div class="form-row">
        <div class="form-group col-md-2">
      <label for="inputZip">1st CAT</label>
      <input type="text" class="form-control" name="first_cat">
    </div>
        <div class="form-group col-md-2">
      <label for="inputZip">2nd CAT</label>
      <input type="text" class="form-control" name="second_cat">
    </div>

        <div class="form-group col-md-2">
      <label for="inputZip">3rd CAT</label>
      <input type="text" class="form-control" name="third_cat">
    </div>

        <div class="form-group col-md-2">
      <label for="inputZip">Exam</label>
      <input type="text" class="form-control" name="exam">
    </div>

        <div class="form-group col-md-2">
      <label for="inputZip">Average Score</label>
      <input type="text" class="form-control" name="ascore">
    </div>

        <div class="form-group col-md-1">
      <label for="inputZip">Total</label>
      <input type="text" class="form-control" name="tscore">
    </div>
        <div class="form-group col-md-1">
      <label for="inputZip">Grade</label>
      <input type="text" class="form-control" name="grade">
    </div>

  </div>
    </div>
  <button type="submit" class="btn btn-danger" name="submit">Upload Result</button>
                   <?php echo $error; ?>
</form>
                <div class="line"></div>

                <?php
                require("footer.php");
                ?>
            </div>
        </div>

        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
                 
             });
         </script>
    </body>
</html>
