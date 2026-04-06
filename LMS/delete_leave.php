<?php
include 'db.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM leaves WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Leave record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No ID specified for deletion.";
}
?>