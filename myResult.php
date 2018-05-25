<?php
session_start();
require("connection.php");
require("input_validation.php");
//check if student is logged  in or not //
if(isset($_SESSION['uname']) == false){
    header("location:studentLogin.php");
    exit();
    
    }
        
            $loggedin_user = $_SESSION['uname'];
            $query = "SELECT * FROM student WHERE fname = '$loggedin_user' LIMIT 1";
            $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
            $row = mysqli_fetch_array($result);
            $img = $row['img'];
            

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>StudentResult</title>

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
                                <li><a href=""><button class="btn btn-success" onclick="print()">Print Result</button></a></li>
                                <li><a href="logout.php"><button class="btn btn-danger">Logout</button></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                
                <div class="container">
                <h2 class="display-5 text-center">COMMAND SECONDARY SCHOOL ABAKALIKI</h2>
                 <div class="row">
                    <div class="col-xs-3 col-md-3">
                     <img src="images/logo.jpg" class="img-circle" width="120" height="89">
                     </div>
                     <div class="col-xs-9 col-md-9">
                     <h4 class="lead">Record of Academic Performance <br/>2018/2019</h4>
                     </div>
                      </div> 
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                        <th>Name of Student</th>
                            <td><?php echo $row['fname']; ?></td>
                        </tr>
                        <tr>
                        <th>Class</th>
                            <td><?php echo $row['class']; ?></td>
                        </tr>
                        <tr>
                        <th>Term</th>
                            <td>First Term</td>
                        </tr>
                        </table>
                    <table class="table table-stipped table-hover bg-success">
                       <tr>
                       <th>Subject</th>
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
            $query = "SELECT * FROM result WHERE student_name = '$loggedin_user' ORDER BY subject ASC";
            $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
            while($row1 = mysqli_fetch_assoc($result)){
             
                       echo'<tr style="background-color:#fff;">';
                        echo"<td>".$row1['subject']."</td>";
                           echo" <td>".$row1['1st_CAT']."</td>";
                           echo" <td>".$row1['2nd_CAT']."</td>";
                           echo" <td>".$row1['3rd_CAT']."</td>";
                           echo" <td>".$row1['exam']."</td>";
                            echo"<td>".$row1['total_score']."</td>";
                           echo" <td>".$row1['average_score']."</td>";
                           echo" <td>".$row1['grade']."</td>";
                           
            }
            
            ?>
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
                 function print(){
                     window.print();
                 }
             });
         </script>
    </body>
</html>
