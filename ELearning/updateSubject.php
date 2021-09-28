<?php
    include_once('database.php');
    $subject = $_POST['subject'];
    $subjectid = $_POST['subjectid'];
    $username = $_POST['username'];
    $sql = "UPDATE subject SET subject_name='$subject' WHERE subject_id='$subjectid' AND teacher_name = '$username'";
    if ($db->query($sql) === TRUE) {
        echo "Subject updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
?>