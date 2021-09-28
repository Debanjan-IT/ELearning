<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Online Academy</title>
</head>
<body>
    <div class="topnav">
        <a href="index.html">Home</a>
        <a href="studentLogin.html">Student Portal</a>
        <a class="active" href="teacherLogin.html">Teacher Portal</a>
    </div>
    <h1 class="title">E-Learning Website</h1>

<?php

    $username = $_POST["username"];
    $task = $_POST["process"];
    
    if($task == "AddSubject"){?>
        <form action="addSubject.php" method="post">
            <input type="hidden" name="username" value="<?php echo $username ?>">
            <input class="input" type="text" name="subject" placeholder="Enter Subject." required><br>
            <input class="button" type="submit" value="ADD SUBJECT">
        </form><?php
    }
    if($task == "UpdateSubject"){
        include_once('database.php');
        $sql = "SELECT * FROM subject WHERE teacher_name = '$username'";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            ?>
                <form action="updateSubject.php" method="post">
                    <input class="input" type="hidden" name="username" value="<?php echo $username ?>">
                    <input class="input" type="hidden" name="subjectid" value="<?php echo $row['subject_id'] ?>">
                    <input class="input" type="text" name="subject" value="<?php echo $row['subject_name'] ?>" placeholder="Enter Subject Name."><br>
                    <input type="submit" value="UPDATE" class="button">
                </form>
            <?php
          }
        } else {
          echo "0 Results. Add some subjects first.";
        }
    }
    if($task == "DeleteSubject"){
        include_once('database.php');
        $sql = "SELECT * FROM subject WHERE teacher_name = '$username'";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            ?>
                <form action="deleteSubject.php" method="post">
                    <input class="input" type="hidden" name="username" value="<?php echo $username ?>">
                    <input class="input" type="hidden" name="subjectid" value="<?php echo $row['subject_id'] ?>">
                    <input class="input" type="text" name="subject" value="<?php echo $row['subject_name'] ?>" placeholder="Enter Subject Name."><br>
                    <input type="submit" value="DELETE" class="button">
                </form>
            <?php
          }
        } else {
          echo "0 Results. Add some subjects first.";
        }
    }

    if($task == "ViewSubjects"){
        include_once('database.php');
        $sql = "SELECT * FROM subject WHERE teacher_name = '$username'";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            ?>
                <div>
                    <h1 style="font-family: 'Courier New', monospace;">Subject Name: <?php echo $row['subject_name']; ?></h1>
                    <h3>Professor Name: <?php echo $row['teacher_name']; ?></h3>
                </div>
            <?php
          }
        } else {
          echo "0 Results. Add some subjects first.";
        }
    }
    
    
    ?>

</body>
</html>