<?php
    include_once('database.php');
    $subject = $_POST['subject'];
    $subjectid = $_POST['subjectid'];
    $username = $_POST['username'];
    $sql = "DELETE FROM subject WHERE subject_id='$subjectid'";
    if ($db->query($sql) === TRUE) {
        echo "Subject deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
?>