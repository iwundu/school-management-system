<?php
session_start();
require("connection.php");
require("input_validation.php");
//check if student is logged  in or not //
if(isset($_SESSION['uname']) == false){
    header("location:studentLogin.php");
    exit();
    
    }
    else{
        
            $loggedin_user = $_SESSION['uname'];
            $query = "SELECT * FROM student WHERE fname = '$loggedin_user' LIMIT 1";
            $result = mysqli_query($conn,$query) or die("unable to query");
            $row = mysqli_fetch_array($result);
            $img = $row['img'];
   
} 

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>StudentProfile</title>

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
                        <a href="studentProfile.php">
                            <i class="glyphicon glyphicon-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="myResult.php">
                            <i class="glyphicon glyphicon-education"></i>
                            View Result
                        </a>
                    </li>
                    <li>
                        <a href="Mynewsletter.php">
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
                                <li><a href=""><?php echo "<b>Welcome ".$row['uname']."!</b>"; ?> </a></li>
                                <li><a href="myResult.php"><button class="btn btn-success">View Result</button></a></li>
                                <li><a href="logout.php"><button class="btn btn-danger">Logout</button></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="container" style="padding-top:3rem; padding-bottom:1rem;" id="profile">
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <thead><b class="lead" style="font-size:2rem">Student Details</b></thead>
                            <thead>
                
          </thead>
                        </tr>
              <tr>
                  <th>Full Name</th>
                  <td><?php echo $row['fname']; ?></td>
                        </tr>
                        <tr>
                  <th>Username</th>
                            <td><?php echo $row['uname']; ?></td>
                        </tr>
                        <tr>
                  <th>Date Of Birth</th>
                            <td><?php echo $row['dob']; ?></td>
                        </tr>
                        <tr>
                  <th>Gender</th>
                            <td><?php echo $row['gender']; ?></td>
                        </tr>
                        <tr>
                  <th>Address</th>
                            <td><?php echo $row['address']; ?></td>
                        </tr>
                        <tr>
                  <th>Payment Category</th>
                            <td><?php echo $row['paymentCategory']; ?></td>
                        </tr>
                        <tr>
                  <th>Class</th>
                            <td><?php echo $row['class']; ?></td>
                        </tr>
                              <tr>
                  <th>State Of Origin</th>
                            <td><?php echo $row['state']; ?></td>
                        </tr>
                              <tr>
                  <th>Religion</th>
                            <td><?php echo $row['religion']; ?></td>
                        </tr>
                         </table>
                     </div>
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
