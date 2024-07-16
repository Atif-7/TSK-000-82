<?php
  session_start();
  if (array_key_exists('loggedin',$_SESSION)) {
  header('Location: secured_page.php');
  }

if (isset($_POST['send_token'])) {
  require('config.php');
  $email = $_POST['email'];
  $error = "";
          
  if (!$email) {
    $error .= "<p class='text-danger alert alert-danger' role='alert'>Please enter your email address</p>";
  }else{
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $user_data = $result->fetch_assoc();
      $name = $user_data['username'];
      $reset_token = bin2hex(random_bytes(16));

      $sql = "UPDATE users SET reset_token = '$reset_token' WHERE id = '".$user_data['id']."'";
      $conn->query($sql);
      
      $subject = "Password Reset";
      $message = "Click on this link to reset your password: <a href='localhost/tsk-000-82/reset_password.php?token=$reset_token&email=$email'>Reset Password<a/>";

      // mail($email,$subject,$message); I commented it because in localhost we can not sent reset token with email

      // for testing of password reset, in localhost I do this 
      echo "Click on this link to reset your password: <a href='reset_password.php?token=$reset_token&email=$email&name=$name'>Reset Password<a/>";

      $error .= "<p class='text-success alert alert-success' role='alert'>link has been sent to your email address. Please check your email inbox now</p>";

    }else{
      $error = "<p class='text-danger alert alert-danger' role='alert'>this email address contains no account found</p>";
    }
  }
}

require('header.php');
?>

<div class="row justify-content-center">
  <div class="col-md-6">
      <!-- Login form-->
    <form id="login" class="mt-3" method="POST">
      <legend class="my-5 text-center">
        Reset Password
      </legend>
      <div id="errorMsg2">
        <?php	
        if (isset($_POST['send_token'])) {
        echo $error;
        }
        ?>	
      </div>

      <label for="email"> Your Email Address:</label>
      <input type="email" name="email" id="email2" class="form-control my-3" ariadescribedby="emailHelp" placeholder="Provide email">

      <div class="my-4 text-center">
        <button type="submit" name="send_token" class="btn btn-success mb-3">Get Email</button><br>
        <a href="login.php" class="text-decoration-none text-primary fw-bold fs-5 text-center">Login</a>
      </div>
      
    </form>
  </div>  
</div>

<?php include('footer.php'); ?>