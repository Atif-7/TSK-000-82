<?php

    session_start();
    if (array_key_exists('loggedin',$_SESSION)) {
        header('Location: secured_page.php');
    }
    $name = $_GET['name'];
    if (isset($_POST['reset_now'])) {
        require_once('config.php');
        $reset_token = $_GET['token'];
        $email = $_GET['email'];
        $new_pass = $_POST['new_password'];
        $hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM users WHERE email = '$email' AND reset_token = '$reset_token'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $sql = "UPDATE users SET password = '$hashed_password' WHERE email = '$email'";
            $result = $conn->query($sql);
            
            if ($result) {                
                $error = "<p class='text-success alert alert-success' role='alert'>Your Password has been changed Successfully!</p>";

                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['username'];
                $_SESSION['loggedin']=true;

                header("refresh:4,url='secured_page.php'");

            }else{
                echo "<script>alert('invalid token or email');</script>";
            }
        }

    }
?>

<?php require_once('header.php');?>

<div class="row justify-content-center">
    <div class="col-md-6">

        <form method="post" id="signup">
            <legend class="my-4 text-center">
            Set New Password - <span class="text-primary"><?php echo $name; ?></span> 
            </legend>
            <div id="errorMsg">
                <?php	
                if (array_key_exists("reset_now",$_POST)) {
                echo $error;
                }
                ?>	
            </div>
        
            <label for="Password">New Password</label>
            <input type="password" name="new_password" id="password" class="form-control my-3" placeholder="Enter Your Password">
            
            <div class="my-3">
            <button type="submit" name="reset_now" id="submit" class="btn btn-success me-4">Reset</button>
            </div>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>