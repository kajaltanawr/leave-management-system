<?php
$host="localhost";
$username="root";
$password="root";
$database="leave_db";

$conn=new mysqli($host,$username,$password,$database);
if($conn->connect_error){
    die ("connection failed: ".$conn->connect_error);
}
else{
    $stmt=$conn->prepare("INSERT INTO signup(faculty_id, fullname, email, phone_number, department, role, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisss", $faculty_id, $fullname, $email, $phone_number, $department, $role, $password);
    $stmt->execute();
    echo "connection success";
    $stmt->close();
    $conn->close();

}

?>