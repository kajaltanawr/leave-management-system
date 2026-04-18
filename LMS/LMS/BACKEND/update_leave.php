<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $employee_name = $conn->real_escape_string($_POST['employee_name']);
    $leave_type = $conn->real_escape_string($_POST['leave_type']);
    $start_date = $conn->real_escape_string($_POST['start_date']);
    $end_date = $conn->real_escape_string($_POST['end_date']);
    $status = $conn->real_escape_string($_POST['status']);

    $sql = "UPDATE leaves SET 
            employee_name='$employee_name', 
            leave_type='$leave_type', 
            start_date='$start_date', 
            end_date='$end_date', 
            status='$status' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Leave record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// To fetch existing data for editing (optional)
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM leaves WHERE id=$id");
    $leave = $result->fetch_assoc();
}
?>

<!-- Simple HTML form to update leave -->
<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo isset($leave['id']) ? $leave['id'] : ''; ?>">
    Employee Name: <input type="text" name="employee_name" value="<?php echo isset($leave['employee_name']) ? $leave['employee_name'] : ''; ?>" required><br>
    Leave Type: <input type="text" name="leave_type" value="<?php echo isset($leave['leave_type']) ? $leave['leave_type'] : ''; ?>" required><br>
    Start Date: <input type="date" name="start_date" value="<?php echo isset($leave['start_date']) ? $leave['start_date'] : ''; ?>" required><br>
    End Date: <input type="date" name="end_date" value="<?php echo isset($leave['end_date']) ? $leave['end_date'] : ''; ?>" required><br>
    Status: <input type="text" name="status" value="<?php echo isset($leave['status']) ? $leave['status'] : ''; ?>" required><br>
    <input type="submit" value="Update Leave">
</form>