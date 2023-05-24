<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$con = mysqli_connect("localhost", "root", "", "Customer_details") or die("Couldn't connect to the database");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST["customer_id"];
    $customer_name = $_POST["customer_name"];
    $address = $_POST["address"];
    $mobile_number = $_POST["mobile_number"];
    $email = $_POST["email"];
    $contact_person = $_POST["contact_person"];

    $query = "UPDATE Customers SET customer_name = '$customer_name', address = '$address', mobile_number = '$mobile_number', email = '$email', contact_person = '$contact_person' WHERE customer_id = '$customer_id'";

    if (mysqli_query($con, $query)) {
        echo "Update successful";
    } else {
        echo "Update failed";
    }
}
?>