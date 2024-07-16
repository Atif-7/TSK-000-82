<?php

require('config.php');

$token = $_GET['token'];
$email = $_GET['email'];
$name = $_GET['name'];

$sql = "SELECT * FROM users WHERE reset_token = '$token' AND email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if ($row['activated'] == 1) {
        $message = '<div class="container text-center my-5 col-md-6">
        <h2 class="text-primary">Dear'. $name. '</h2> 
        <p class="my-2 fs-5">Your Account is already activated</p>
        </div>';
    }else{

        $sql = "UPDATE users SET activated = '1' WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result) {
            $message = '<div class="container text-center my-5 col-md-6">
            <h2 class="text-primary">Congrats!'. $name. '</h2> 
            <p class="my-2 fs-5">Your Account has been activated sucessfully!</p>
            </div>';

            header("refresh:4,url='secured_page.php'");
        }else{
            $message = '<div class="container text-center my-5 col-md-6">
            <h2 class="text-primary">Congrats!'. $name. '</h2> 
            <p class="my-2 fs-5">something wents wrong. try again later</p>
            </div>';
        }
    }
}
$conn->close();

require('header.php');

echo $message;

require('footer.php')
?>;