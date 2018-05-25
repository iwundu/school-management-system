<?php
session_start();
require("connection.php");
$error = "";
//check if admin is logged  in or not //

if(isset($_SESSION['username']) == false){
    header("location:index.php");
    exit();
}else{
$query = "SELECT * FROM admin WHERE username = '".$_SESSION['username']."'";
$result = mysqli_query($conn,$query) or die("unable to query");
$row = mysqli_fetch_assoc($result);
}
if(isset($_POST['submit'])){
    
    $cat = $_POST['paymentCategory'];
    
    $target_loc = "newsletter/";
    $target_file = $_FILES['file']['name'];
    $target_dir = $_FILES['file']['tmp_name'];
    $location = $target_loc.$target_file;
    $type = $_FILES['file']['type'];
    
    //error handler //
    //$allowedExts = array("pdf","doc","docx");
        
    if(empty($cat)){
        $error .= '<div class="alert alert-danger" role="alert"> Payment Category is Required!
</div>';
    }
    //image error handler //
    if(empty($target_file)){
        $error .= '<div class="alert alert-danger" role="alert"> Please Select File!
</div>';
    }
    if($_FILES['file']['size'] > 3000000){
     $error .= '<div class="alert alert-danger" role="alert"> File Size too Big!
</div>';   
    }else
   // if(!$type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
   //  $error .= '<div class="alert alert-danger" role="alert"> Unregonized file type!
//</div>';   
   // }
    //check if there are errors in the form //
    if($error != ""){
       $error = '<div class="alert alert-danger" role="alert"> There were error(s)!'.$error.
'</div>';
    }else{
        
        move_uploaded_file($target_dir,$location) or die(mysqli_error($conn));     
        $query = "INSERT INTO newsletter(category,newsletter) VALUES('$cat','$target_file')";
        
        $result = mysqli_query($conn, $query);

        //check  if query was successful //
        
        if($result == false){
        $error = '<div class="alert alert-danger" role="alert"> Could not Upload Newsletter - Please try again later.</div>';
        
    }else{
            $error = '<div class="alert alert-success" role="alert"> Uploaded Successfuly</div>';
    }
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
                                 <li><a href="#"><?php echo "<b style='color:green';>"; echo "Welcome ".$row['username']."!"; echo "</b>"; ?></a></li>
                                <li><a href="viewNewsletter.php"><button class="btn btn-success">View News Letter</button></a></li>
                                <li><a href="logout.php"><button class="btn btn-danger">Logout</button></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

              <form method="post" enctype="multipart/form-data">
   <div class="form-group">
    <label for="exampleFormControlSelect1">Category</label>
    <select class="form-control" id="exampleFormControlSelect1" name="paymentCategory">
      <option>Officer</option>
      <option>Soldier</option>
      <option>Civilian</option>
        <option>Staff</option>
        </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">News Letter</label>
    <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
  </div>
    <button type="submit" class="btn btn-primary btn-lg" name="submit">Upload</button>
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
