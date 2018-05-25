<?php
require("header.php");
require("connection.php");
require("input_validation.php");

$error = "";

//action when submit button is clicked //

if(isset($_POST['submit'])){
 
    //input strings //
    $email = checker($conn,$_POST['email']);
    $subject = checker($conn,$_POST['subject']);
    $msg = checker($conn,$_POST['message']);
    $header = "info@cssa.com";
    
    $validEmail = filter_var($email,FILTER_VALIDATE_EMAIL);
    $validEmail = filter_var($email,FILTER_SANITIZE_EMAIL);
    
    //error handling //
    
    if(empty($email)){
        $error .= '<div class="alert alert-danger" role="alert"> Email is Required!
</div>';
    }elseif($validEmail == false){
        $error .= '<div class="alert alert-danger" role="alert"> Email is Invalid!
</div>';
    }
    if(empty($subject)){
        $error .= '<div class="alert alert-danger" role="alert"> Subject is Required!
</div>';
    }
    if(empty($msg)){
        $error .= '<div class="alert alert-danger" role="alert"> Message is Required!
</div>';
    }
    if($error >0){
        $error .= '<div class="alert alert-danger" role="alert"> There were error(s) in your form!'.$error.
'</div>';
    }else{
        mail($email,$subject,$msg,$header);
        $error .= '<div class="alert alert-success" role="alert"> Message Sent! We Will Get Back To You ASAP!
</div>';
    }

}

?>
<div class="courses_banner">
  	<div class="container">
  		<h3>How To Find Us</h3>
  		        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">Home</a></li>
                <li class="current-page">Contact Us</li>
            </ul>
        </div>
  	</div>
  </div>
<div class="clearfix"></div>
<div class="container padding">
<form method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control w-75 p-3 form-control-sm" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
  </div>
<form method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Subject</label>
    <input type="text" class="form-control w-75 p-3 form-control-sm" id="exampleFormControlInput1" name="subject" placeholder="Subject">
  </div>
  
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control w-75 p-3 form-control-sm" id="exampleFormControlTextarea1" rows="6" name="message" placeholder="Message..."></textarea>
  </div>
    <button type="submit" class="btn btn-success btn-lg" name="submit">Contact Us</button>
    <?php echo $error ; ?>
</form>
    </div>
<div class="clearfix padding"></div>
<?php
require("footer.php");
?>