<?php
    include_once('database.php');
    $subject = $_POST['subject'];
    $username = $_POST['username'];
    $sql = "INSERT INTO subject (subject_name, teacher_name) VALUES ('$subject','$username')";
    $sql2 = "SELECT subject_id FROM subject WHERE teacher_name = '$username' AND subject_name = '$subject'";
    $result = mysqli_query($db,$sql2);
    $count = mysqli_num_rows($result);
    if($count == 0){
        if ($db->query($sql) === TRUE) {
            echo "Subject added successfully.  ";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
            ?><a href="teacherLogin.html">try again?</a><?php
        }
    }
    else{
        echo "Subject is already added to your account. ";?><a href="teacherLogin.html">try again?</a><?php
    }
?>