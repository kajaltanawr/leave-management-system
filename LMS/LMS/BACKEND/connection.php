<?php
$faculty_id = $_POST["faculty_id"];
$fullname = $_POST["name"];
$email = $_POST["email"];
$phone_number = $_POST["phone"];
$department = $_POST["department"];
$role = $_POST["role"];
$password = $_POST["password"];
$confirm_password = $_POST["confirmpassword"];

//Database connection
$conn = new mysqli("localhost", "root", "root", "leave_db");

// Check connection
if($conn->connect_error){
    die ("connection failed: ".$conn->connect_error);
}
else{
    // $stmt=$conn->prepare("INSERT INTO signup(faculty_id, fullname, email, phone_number, department, role, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    // $stmt->bind_param("sssssss", $faculty_id, $fullname, $email, $phone_number, $department, $role, $password);
    // $stmt->execute();
    // echo "connection success";
    // $stmt->close();
    // $conn->close();

    //$sql="create table signup(faculty_id varchar(20),fullname varchar(20),email varchar(20),phone_number varchar(15),department varchar(20), role varchar(20),password varchar(20));"
    $sql = "INSERT INTO signup VALUES ('$faculty_id', '$fullname', '$email', '$phone_number', '$department', '$role', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Database Inserted successfully!!!";
    } else {
        echo "Error: " . $conn->error;
    }
    
    // Closing connection
    $conn->close();
}

?>
