<?php 
$conn = new mysqli('localhost','root','','users');
if ($conn->connect_error) {
    die("connection failed:".$conn->connect_error);
}
?>;