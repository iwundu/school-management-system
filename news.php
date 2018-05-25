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
//action when submit button is clicked;

if(isset($_POST['submit'])){

    //input strings; 
    $news_caption = checker($conn, $_POST['news_caption']);
    $news_content = checker($conn, $_POST['news_content']);
    $date = checker($conn, $_POST['date']);
    
    //error handler;
    
    if(empty($date)){
        $error .= '<div class="alert alert-danger" role="alert"> Date is Required!
</div>';
    }
    if(empty($news_caption)){
        $error .= '<div class="alert alert-danger" role="alert"> Subject Required!
</div>';
    }
    if(empty($news_content)){
        $error .= '<div class="alert alert-danger" role="alert"> News Content is Required!
</div>';
    }
    if($error != ""){
        $error .= '<div class="alert alert-danger" role="alert"> Pkease Fill All Fields!'.$error.'
</div>';
    
    }else{
        $query = "INSERT INTO news(date,news_caption,news_content) VALUES(NOW(),'$news_caption','$news_content')";
        $result = mysqli_query($conn,$query);
         $error .= '<div class="alert alert-success" role="alert">Upload Successsfully
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
                            <li><a href="class.php">Class</a></li>
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
                                 <li><a href="viewNewsletter.php"><button class="btn btn-success">View News</button></a></li>
                                <li><a href="logout.php"><button class="btn btn-danger">Logout</button></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

             <form method="post">
         <div class="form-group">
    <label for="exampleFormControlInput1">Date</label>
    <input type="date" class="form-control" name="date">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Subject</label>
    <input type="text" class="form-control" name="news_caption" placeholder="News Subject">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">News Content</label>
    <textarea class="form-control" name="news_content" placeholder="Enter News Content Here..." rows="6"></textarea>
  </div>
                 <button type="submit" class="btn btn-lg btn-success" name="submit">Upload News</button>
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
 