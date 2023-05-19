<?php
$con=mysqli_connect("localhost","root","","Customer_details") or die("Couldn't connect to database");
$customer_name=$_POST["customer_name"];
$address=$_POST["address"];
$mobile_number=$_POST["mobile_number"];
$email=$_POST["email"];
$contact_person=$_POST["contact_person"];
$query="INSERT INTO `Customers`(`customer_name`, `address`, `mobile_number`, `email`, `contact_person`) VALUES ('$customer_name','$address','$mobile_number','$email','$contact_person')";
$result   = mysqli_query($con, $query);
?>