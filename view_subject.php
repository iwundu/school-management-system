<?php
session_start();
require("connection.php");
require("input_validation.php");
//check if admin is logged  in or not //

if(isset($_SESSION['username']) == false){
    header("location:index.php");
    exit();
}else{ 
$query = "SELECT * FROM admin WHERE username = '".$_SESSION['username']."'";
$result = mysqli_query($conn,$query) or die("unable to query");
$row = mysqli_fetch_assoc($result);
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
                            <li><a href="class.php">Class</a></li>
                            <li><a href="view_result">View Results</a></li>
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
                                <li><a href="adminHome.php">Welcome <?php echo $row['username']; ?></a></li>
                                <li><a href="add_subject.php"><button class="btn btn-success">Add Subject</button></a></li>
                                <li><a href="logout.php"><button class="btn btn-danger">Logout</button></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="container" style="padding-top:3rem; padding-bottom:1rem;" id="profile">
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <thead><b class="lead" style="font-size:2rem">Subjects</b></thead>
                            <thead>
                
          </thead>
                        </tr>
              <tr>
                  <th>ID</th>
                <th>Class Name</th>
                  <th>Subject</th>
                  <th>Teacher</th>
                  <th>Session</th>
                  <th>Operations</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM subject ORDER by class ASC";
                        $result = mysqli_query($conn,$sql);
                        $row2 = mysqli_fetch_assoc($result);
                        while($row2){
                                 echo"<tr>";
                             echo"<td>". $row2['id']."</td>";
                             echo"<td>".$row2['class']."</td>";
                          echo"<td>".$row2['name']."</td>";
                             echo"<td>".$row2['teacher']."</td>";
                            echo"<td>".$row2['session']."</td>";
                            echo' <td style="background-color:skyblue"><a href="edit_student.php"><span class="glyphicon glyphicon-edit" style="color:brown;font-size:16px;"></span></a>';
                                echo' <a href="view_class.php"><span class="glyphicon glyphicon-user" style="color:green;font-size:16px;"></span></a>';
                             echo'<a href="delete_class.php"><span class="glyphicon glyphicon-remove" style="color:red;font-size:16px;"></span></a>';
                             echo"</td>";
                       echo"</tr>";
                          
                        }
                            ?>
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
