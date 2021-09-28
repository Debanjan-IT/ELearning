<?php
    include_once('database.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT student_id FROM student WHERE student_username = '$username' AND student_password = '$password'";
    $result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
    if($count == 1){
        ?>
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
                <a class="active" href="studentLogin.html">Student Portal</a>
                <a href="teacherLogin.html">Teacher Portal</a>
            </div>
            <h1 class="title">E-Learning Website</h1>
            <h3>Welcome <?php echo $username ?></h3>
        <?php 
        $sql = "SELECT * FROM subject";
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
          echo "0 results";
        }
    }
?>
<a href="studentLogin.html">Log Out..</a>
</body>
</html>