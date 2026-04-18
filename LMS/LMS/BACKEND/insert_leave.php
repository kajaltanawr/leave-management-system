

<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $faculty_name = $conn->real_escape_string($_POST['faculty_name']);
    $leave_type = $conn->real_escape_string($_POST['leave_type']);
    $start_date = $conn->real_escape_string($_POST['start_date']);
    $end_date = $conn->real_escape_string($_POST['end_date']);
    $status = $conn->real_escape_string($_POST['status']);
    $sql = "INSERT INTO leave_details (leave_type) 
            VALUES ('$leave_type')";
    if ($conn->query($sql) === TRUE) {
        echo "New leave record inserted successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!-- Simple HTML form to insert leave -->
<form method="post" action="">
    Faculty Name: <input type="text" name="faculty_name" required><br>
    Leave Type: <input type="text" name="leave_type" required><br>
    Start Date: <input type="date" name="start_date" required><br>
    End Date: <input type="date" name="end_date" required><br>
    Status: <input type="text" name="status" required><br>
    <input type="submit" value="Add Leave">
</form>