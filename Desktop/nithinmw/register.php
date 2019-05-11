<?php
require 'db.php';
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['adminid'])) {
    $errors = null;
    if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password2'])) {
        $errors = "All fields are required.";
    } else {
        if($_POST['password'] != $_POST['password2']) {
            $errors = "Password do not match.";
        } else {
            $sql = "SELECT * FROM users WHERE `username` = '" . $_POST['username']. "'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $errors = "User already exists.";
            } else {
                if(empty($_POST['adminid']))
                    $sql = "INSERT INTO users (username,password,post) VALUES ('".$_POST['username']."','".$_POST['password']."', '0')";
                else   
                    $sql = "INSERT INTO users (username,password,post) VALUES ('".$_POST['username']."','".$_POST['password']."', '1')";
                if (mysqli_query($conn, $sql)) {
                    header('Location: index1.php?success');
                } else {
                    echo "Error: " . $sql . "" . mysqli_error($conn);
                }
            }
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <nav class="navbar navbar-light nav" style="background-color: #f26311; height: 45px;">
        <a class="navbar-brand" href="#">
            <!-- <img src="r.png" width="30" height="30" class="d-inline-block align-center" alt=""> -->
            <b><font size="6">REGISTER</font></b> 
        </a>
    </nav>
    <!-- <?php
        if(!empty($errors)) {
            foreach($errors as $error) {
                echo $error;
            }
        }
    ?> -->
<div class="box1">
    <?php
        if(!empty($errors))
            echo "<p style='text-align: center; color: white; bottom: 10px;'>$errors</p>";

    ?>
    <div align="center">
        <form action="register.php" method="post">
            <input type="text" name="username" placeholder="Username"><br /><br />
            <input type="text" name="adminid" placeholder="Admin ID"> <br/>,<br/>
            <input type="password" name="password" placeholder="Password"><br /><br />   
            <input type="password" name="password2" placeholder="Re-enter password"><br /><br /> 
            <input class="button" type="submit" value="Register">
        </form>
        <p style="color : #ffffff"><b>Already Registered? <a href="index1.php">Login</a></b></p>

    </div>
</div>
</body>
</html>