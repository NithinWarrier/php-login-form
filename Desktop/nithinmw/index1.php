<?php
require 'db.php';
if(isset($_POST['submit'])){
if(isset($_POST['username']) && isset($_POST['password'])) {
    $errors = array();
    if(empty($_POST['username']) || empty($_POST['password'])) {
        $errors[] = "Please enter a username and password";
    } else {
        $sql = "SELECT * FROM users WHERE `username` = '" . $_POST['username']. "'";
        $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                 if ($row['password'] == $_POST['password']){
                $_SESSION['id'] = $row["id"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['password'] = $row["password"];
                // $done = $row['done'];
                if($row['post']=='0'){
                    if($row['done']=='0')
                        header('Location: user.php');
                    else
                        header('Location: completed.php');
                }
                else
                    header('Location: admin.php');
                 }
                else{
                     $errors[]="Passwords do not match";
                 }
            }
         } 
         else {
            $errors[] = "Not found.";
         }
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body style= "background-color : rgb(0,0,0,0.3">
    <nav class="navbar navbar-light nav" style="background-color: #f26311; height: 45px;">
        <a class="navbar-brand" href="#">
            <!-- <img src="L.png" width="30" height="30" class="d-inline-block align-center" alt=""> -->
            <b style="align: center;"><font size="6" weight="5">LOGIN</font></b> 
        </a>
    </nav>

    
    <!-- <?php
        if(isset($_SESSION['id'])) {
            ?>
            <p>Hello, <?php echo $_SESSION['username']?></p>
            <a href="logout.php">Logout</a>
            <?php
        } else {
    ?> -->
   
    <div class="box1">
    <?php 
        if(isset($_GET['success'])) {
            echo "<p style='text-align: center; color: white; bottom: 10px;'>Succefully registered. Please Login.</p>";
        }   
    ?>
        <div align="center">
            <form action="index1.php" method="post">
                <label for="username"> <b>Username</b></label>
                <input id="username" type="text" name="username"><br /><br />
                <label for="password"> <b>Password</b></label>
                <input id="password" type="password" name="password"><br /><br /> 
                <input class ="button" type="submit" name="submit" value="Submit">
            </form>
            <?php
        if(!empty($errors)) {
            foreach($errors as $error) {    
                ?>
                <p >
                <?php
                echo $error;
            }
        }
    ?>
    </p>
        
            <p style="color : #ffffff"><b>New user? <a href="register.php">Register</a></b></p>
        </div>
    </div>
        <?php } ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>