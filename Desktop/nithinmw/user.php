<?php
    require 'db.php';
    if(!isset($_SESSION['username']))
        header('location: index1.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Survey Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-light nav" style="background-color: #f26311; height: 45px;">
        <a class="navbar-brand" href="#">
            <img src="L.png" width="30" height="30" class="d-inline-block align-center" alt="">
            <b>LOGGED IN</b> 
        </a>
    </nav>
    
    <div class="box1" style="text-align: center;">
    <form action='submit.php' method='post'>
        <div style="display: inline-block; text-align: left;">
            <p style="color :white;">Q1. Lorem Ipsum1</p>
            <input type="radio" name="q1" value="a"><font style="color: white">A</font><br>
            <input type="radio" name="q1" value="b"><font style="color: white">B</font><br>
            <input type="radio" name="q1" value="c"><font style="color: white">C</font><br>
        </div>
        <br>
        <div style="display: inline-block; text-align: left;">
            <p style="color :white;">Q2. Lorem Ipsum2</p>
            <input type="radio" name="q2" value="a"><font style="color: white">A</font><br>
            <input type="radio" name="q2" value="b"><font style="color: white">B</font><br>
            <input type="radio" name="q2" value="c"><font style="color: white">C</font><br>
        </div>
        <br>
        <div style="display: inline-block; text-align: left;">
            <p style="color :white;">Q3. Lorem Ipsum3</p>
            <input type="radio" name="q3" value="a"><font style="color: white">A</font><br>
            <input type="radio" name="q3" value="b"><font style="color: white">B</font><br>
            <input type="radio" name="q3" value="c"><font style="color: white">C</font><br>
        </div>
        <br><br><input class ="button" type="submit" name="submit" value="Submit">
        </form>
    </div>

</body>
</html>

