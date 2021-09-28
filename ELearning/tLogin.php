<?php
    include_once('database.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT teacher_id FROM teacher WHERE teacher_username = '$username' AND teacher_password = '$password'";
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
                    <a href="studentLogin.html">Student Portal</a>
                    <a class="active" href="teacherLogin.html">Teacher Portal</a>
                </div>
                <h1 class="title">E-Learning Website</h1>
                <h3>Welcome <?php echo $username ?></h3>
                <form action="proceed.php" method="post">
                    <input type="hidden" name="username" value="<?php echo $username ?>">
                    <select class="input" name="process">
                        <option value="AddSubject">ADD NEW SUBJECT</option>
                        <option value="UpdateSubject">UPDATE SUBJECT</option>
                        <option value="DeleteSubject">DELETE SUBJECT</option>
                        <option value="ViewSubjects">VIEW SUBJECTES</option>
                    </select><br>
                    <input class="button" type="submit" value="PROCEED">
                </form>
        <?php
    }
?>