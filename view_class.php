<?php
session_start();
require("connection.php");
require("input_validation.php");
//check if admin is logged  in or not //

if(isset($_SESSION['username']) == false){
    header("location:index.php");
    exit();
} 
$search = $_POST['search'];
$error = "";
$query = checker($conn,$search);
$result = mysqli_query($conn,"SELECT * FROM class WHERE(`class_name` LIKE '%".$search."%') ORDER BY `class_name` ASC ") or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0){
     
    $row = mysqli_fetch_array($result);
    $error .= '<div class="alert alert-success" role="alert">Record Found!
</div>';
    
}
    else{
            $error .= '<div class="alert alert-danger" role="alert">No Details Found!
                </div>'; 

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
                                <li>
                                <form method="post">
                                    <input type="text" name="search" placeholder="Search...">
                                <input type="submit" value="search" class="btn btn-xs btn-success">
                                    </form>
                                </li>
                                <li><a href="add_class.php"><button class="btn btn-success">Add Class</button></a></li>
                                <li><a href="logout.php"><button class="btn btn-danger">Logout</button></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="container" style="padding-top:3rem; padding-bottom:1rem;" id="profile">
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <thead><b class="lead" style="font-size:2rem">List Students</b></thead>
                            <thead>
                
          </thead>
                        </tr>
              <tr>
                  <th>ID</th>
                <th>Class Name</th>
                  <th>Subject</th>
                  <th>Teacher</th>
                  <th>Operations</th>
                        </tr>
                         <tr>
                             <td><?php echo $row['id']; ?></td>
                             <td><?php echo $row['class_name']; ?></td>
                          <td><?php echo $row['subjects']; ?></td>
                             <td><?php echo $row['class_teacher']; ?></td> 
                             <td style="background-color:skyblue"><a href="edit_class.php"><span class="glyphicon glyphicon-edit" style="color:brown;font-size:16px;"></span></a>
                                 <a href="view_class.php"><span class="glyphicon glyphicon-user" style="color:green;font-size:16px;"></span></a>
                             <a href="delete_class.php"><span class="glyphicon glyphicon-remove" style="color:red;font-size:16px;"></span></a>
                             </td>
                        </tr>
                        </table>
                    <?php echo $error; ?>
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
