<?php
session_start();
require("connection.php");
require("input_validation.php");

//check if teacher is logged in or not //

if(isset($_SESSION['uname']) == false){
    header("location:teacherLogin.php");
    exit();
    
    }

            $loggedin_user = $_SESSION['uname'];
            $query = "SELECT * FROM teachers WHERE fname = '$loggedin_user' LIMIT 1";
            $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
            $row = mysqli_fetch_assoc($result);
            $img = $row['img'];
            
   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>ViewResult</title>

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
                                <li><a href="uploadResult.php"><button class="btn btn-success">Upload Result</button></a></li>
                                <li><a href="logout.php"><button class="btn btn-danger">Logout</button></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="container" style="padding-top:3rem; padding-bottom:1rem;" id="profile">        
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <thead><b class="lead" style="font-size:2rem">Uploaded Results</b></thead>
                           <thead>
     </thead>
                        </tr>
              <tr>
                  <th>Student Name</th>     
                  <th>1st CAT</th>
                  <th>2nd CAT</th>
                  <th>3rd CAT</th>
                  <th>Exam</th>
                  <th>Total Score</th>
                  <th>Average Score</th>
                 <th>Grade</th>
                        </tr>
                    <?php
            $loggedin_user = $_SESSION['uname']; 
            $query = "SELECT teachers.*, result.* FROM result, teachers WHERE teachers.subject = result.subject AND teachers.class = result.class AND teachers.fname = '$loggedin_user' ORDER BY result.student_name ASC";
            $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
            while($row1 = mysqli_fetch_assoc($result)){
             
                       echo'<tr>';
                        echo"<td>".$row1['student_name']."</td>";
                           echo" <td>".$row1['1st_CAT']."</td>";
                           echo" <td>".$row1['2nd_CAT']."</td>";
                           echo" <td>".$row1['3rd_CAT']."</td>";
                           echo" <td>".$row1['exam']."</td>";
                            echo"<td>".$row1['total_score']."</td>";
                           echo" <td>".$row1['average_score']."</td>";
                           echo" <td>".$row1['grade']."</td>";
                           
            }
            
            ?>        </table>
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
