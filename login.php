<?php
  session_start();
  if (array_key_exists("logout",$_GET)) {

		session_unset();
    session_destroy();
		
	}elseif (array_key_exists('loggedin',$_SESSION)) {
		header('Location: secured_page.php');
	}

  if ($_SERVER['REQUEST_METHOD']=="POST") {
    require('config.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $error = "";
          
    if (!$email) {
      $error .= "<p>Please enter your email address</p>";
    }
    if (!$password) {
      $error .= "<p>Please enter your password<P/>";
    }
    if ($error != "") {
      $error	= "<div class='alert alert-danger' role='alert'><strong><p>There were some errors</p></strong>".$error."</div>";
        
    }else{
      $query = "SELECT * FROM `users` WHERE Email='$email'";
      $result = mysqli_query($conn,$query);

      if (mysqli_num_rows($result) == 1) {

        while ($row = mysqli_fetch_assoc($result)) {
          if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['username'];
            $_SESSION['activation'] = $row['activated'];
            $_SESSION['loggedin']=true;
            header('Location: secured_page.php');
          }else{
            $error = "<div class='alert alert-danger' role='alert'>This Password is incorrect.</div>";
          }
        }  
      }else{
        $error = "<div class='alert alert-danger' role='alert'>Incorrect email. account could not found.</div>";
      }  
    }
  }

  require_once('header.php');
?>

<div class="row justify-content-center">
  <div class="col-md-6">
      <!-- Login form-->
    <form action="login.php" id="login" class="mt-3" method="POST">
      <legend class="my-5 text-center heading2">
        Log in <span class="text-success"> <i class="fa fa-sign-in" aria-hidden="true"></i></span> 
      </legend>
      <div id="errorMsg2">
        <?php	
        if (array_key_exists("login",$_POST)) {
        echo $error;
        }
        ?>	
      </div>

      <label for="email">Email address</label>
      <input type="email" name="email" id="email2" class="form-control" ariadescribedby="emailHelp" placeholder="Provide email">

      <label for="Password">Password</label>
      <input type="password" name="password" id="password2" class="form-control" placeholder="Enter Your Password">

      <div class="my-4">
        <button type="submit" name="login" class="btn btn-success me-4">Log in</button>
        <small>yet not signup?</small>
        <a href="signup.php" class="fs-5 mx-2 text-decoration-none"> Signup Now</a>
      </div>
      <a href="forgot_password.php" class="mx-2 text-primary">Forgot Password?</a>
    </form>  
  </div>  
</div>

<?php include('footer.php'); ?>