<?php
include('ka_connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
     $name = $_POST['name'];
     $email = $_POST['email'];
     $message = $_POST['message'];
     $date = $_POST['date'];
$query="INSERT INTO students (name, email, message, date) VALUES ('$name', '$email', '$message', '$date')";
$result=mysqli_query($conn, $query);
}
?>

