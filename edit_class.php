<?php
session_start();
require("connection.php");
require("input_validation.php");

    //error string;
    $error = "";
//check if admin is logged  in or not //

if(isset($_SESSION['username']) == false){
    header("location:index.php");
    exit();
}
if(isset($_POST['submit'])){
    
    $sname = checker($conn,$_POST['sname']);
    $class = checker($conn,$_POST['class']);
    $cteacher = checker($conn,$_POST['cteacher']);
    
    //error handler;
    
    if(empty($sname)){
         $error .= '<div class="alert alert-danger" role="alert"> Name  of Subject is Required!
</div>';
    }
     if(empty($class)){
         $error .= '<div class="alert alert-danger" role="alert"> Class is Required!
</div>';
    }
     if(empty($cteacher)){
         $error .= '<div class="alert alert-danger" role="alert"> Class Name is Required!
</div>';
    }
    if($error != ""){
        
         $error .= '<div class="alert alert-danger" role="alert"> There were error(s)!'.$error.'
</div>';
    }else{
            $query = "UPDATE class set subjects = '$sname', class_teacher = '$cteacher', class_name = '$class' WHERE subjects = '$sname' LIMIT 1";
            $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
            $error .= '<div class="alert alert-success" role="alert"> Class Edited Successfully!
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

        <title>Admin</title>

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
                   <img src="images/logo.jpg" class="img-circle img-responsive" width="60" height="50">
                </div>

                <ul class="list-unstyled components">
                     <li class="active">
                        <a href="adminHome.php">
                            <i class="glyphicon glyphicon-home"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            Academics
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="subject.php">Subject</a></li>
                            <li><a href="view_class.php">Class</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="student.php">
                            <i class="glyphicon glyphicon-user"></i>
                            Student
                        </a>
                    </li>
                    <li>
                        <a href="teacher.php">
                            <i class="glyphicon glyphicon-education"></i>
                            Teachers
                        </a>
                    </li>
                    <li>
                        <a href="parent.php">
                            <i class="glyphicon glyphicon-send"></i>
                            Parents
                        </a>
                    </li>
                    <li>
                    <a href="newsletter.php">
                            <i class="glyphicon glyphicon-envelope"></i>
                            News Letter
                        </a>
                    </li>
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
                                 <li><a href="view_class.php"><button class="btn btn-success">View Classes</button></a></li>
                                <li><a href="logout.php"><button class="btn btn-danger">Logout</button></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

              <form method="post">
        <div class="form-group">
    <label for="exampleInputEmail1">Class Teacher</label>
    <input type="text" class="form-control" name="cteacher" aria-describedby="emailHelp" placeholder="Enter Teacher Name">
            </div>
            <div class="form-group">
    <label for="exampleInputEmail1">Subject Name</label>
    <input type="text" class="form-control" name="sname" aria-describedby="emailHelp" placeholder="Enter Subject Name">
            </div>
   <div class="form-group">
    <label for="exampleFormControlSelect1">Class</label>
    <select class="form-control" name="class">
      <option>JS1A</option>
      <option>JS1B</option>
      <option>JS1C</option>
      <option>JS1D</option>
      <option>JS1E</option>
        <option>JS2A</option>
      <option>JS2B</option>
      <option>JS2C</option>
      <option>JS2D</option>
      <option>JS2E</option>
        <option>JS3A</option>
      <option>JS3B</option>
      <option>JS3C</option>
      <option>JS3D</option>
      <option>JS3E</option>
        <option>SS1A</option>
      <option>SS1B</option>
      <option>SS1C</option>
      <option>SS1D</option>
      <option>SS1E</option>
        <option>SS2A</option>
      <option>SS2B</option>
      <option>SS2C</option>
      <option>SS2D</option>
      <option>SS2E</option>
        <option>SS3A</option>
      <option>SS3B</option>
      <option>SS3C</option>
      <option>SS3D</option>
        </select>
  </div>
            <button type="submit" class="btn btn-primary btn-lg" name="submit">Edit Class</button>
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
