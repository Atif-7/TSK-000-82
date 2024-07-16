<?php 
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !=true) {
  header('location: login.php');
}

  require('config.php');

  $sql = "SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
  $result = $conn->query($sql);
  $user_data = $result->fetch_assoc();
  $activation = $user_data['activated'];
  $email = $user_data['email'];
  $name = $user_data['username'];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Authentication</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <div class="logo">
          <a class="navbar-brand fs-2" href="index.php" id="logo">AR Codings <i class="fa fa-code" aria-hidden="true"></i></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto text-center">
            <li class="nav-item">
              <a class="nav-link active fs-4 p-0 mx-3 text-warning"><?php echo $_SESSION['name']; ?></a>
            </li>
            <li class="nav-item">
              <a href="login.php?logout=1" class="btn btn-danger">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


<div class="container col-md-8 my-5 text-center">
  <?php 
  if ($activation == 0) {

    $message = "<form method='POST' class='text-danger alert alert-danger' role='alert'>Your account is not yet activated!  <button type='submit' class='btn btn-success' name='activate'> Activate Now </button> </form>";

    if (isset($_POST['activate'])) {
      $reset_token = bin2hex(random_bytes(16));
      $sql = "UPDATE users SET reset_token = '$reset_token' WHERE id = '".$user_data['id']."'";
      $conn->query($sql);


      // $subject = "Activation";
      // $message = "Click on this link to Activate Your Account: <a href='activate.php?token=$reset_token&email=$email'>Activate Account<a/>";

      // mail($email,$subject,$message); I commented it because in localhost we can not sent reset token with email


      $message = "<p class='text-primary alert alert-primary' role='alert'>Activation link has been sent to your email. please check your inbox and follow the link.</p>";

      // for testing of password reset, in localhost I do this 
      echo "Click on this link to Activate Your Account: <a href='activate.php?token=$reset_token&email=$email&name=$name'>Activate Account<a/>";
    }
    echo $message;
  }
  ?>
  <h1 class="text-warning"> Welcome <span class="text-danger"><?php echo $_SESSION['name']; ?></span> </h1>
  <div class="my-5">
    <p class="fs-5">This a secured page</p>
    <p>only authenticated users have access to this page</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit fugit dolores quam ea sequi nam impedit atque laborum? Reprehenderit accusamus atque debitis, doloribus corporis consequatur deserunt quidem magnam unde officiis.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit fugit dolores quam ea sequi nam impedit atque laborum? Reprehenderit accusamus atque debitis, doloribus corporis consequatur deserunt quidem magnam unde officiis.</p>

  </div>
</div>

<?php include_once('footer.php') ?>
