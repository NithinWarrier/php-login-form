
<?php
    require 'db.php';
    if(!isset($_SESSION['username']))
        header('location: index1.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin </title>
</head>
<body>
<nav class="navbar navbar-light nav" style="background-color: #f26311; height: 45px;">
        <a class="navbar-brand" href="#">
            <!-- <img src="L.png" width="30" height="30" class="d-inline-block align-center" alt=""> -->
            <b>ADMIN PAGE</b> 
        </a>
    </nav>
<h2><p style="color:white; text-align: center; padding: 50px;"><font size="10">RESPONSES</font><p></h2>
<div class="box2">
    <table class="table">
    <thead>
        <tr>
            <th>Question <br> Number</th>
            <th>OptionA</th>
            <th>OptionB</th>
            <th>OptionC</th>
        </tr>
    </thead>
    <?php

        $sql=("SELECT * FROM Questions");
        $table=mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($table)) {
            echo "<tr>";
            echo ("<td>".$row['Question']."</td>");
            echo ("<td>".$row['OptionA']."</td>");
            echo ("<td>".$row['OptionB']."</td>");
            echo ("<td>".$row['OptionC']."</td>");
            echo "</tr>";        
        }

    ?>
    </table>
    <p style="color : #ffffff; text-align:center;"><b><br><br> <a href="logout.php"><font size="3">LOGOUT</font></a></b></p>
</div>
</body>
</html>