<?php
    require 'db.php';
if(isset($_POST['q1']) && isset($_POST['q2'])&& isset($_POST['q3'])){
    // $Q1=$_POST['q1'];
    // $Q2=$_POST['q2'];
    // $Q3=$_POST['q3'];
    $Q = array($_POST['q1'], $_POST['q2'], $_POST['q3']);
    if(isset($_POST['submit'])){
        $username = $_SESSION['username'];
        $quer = "UPDATE users SET done=1 where username='".$username."'";
        mysqli_query($conn, $quer);
        //echo($quer);
        for ($i=0; $i < 3; $i++) { 
            if ($Q[$i] == 'a') {
                $sql = "UPDATE Questions SET OptionA=OptionA+1 where Question=".($i+1).";";
                
            }
            else if ($Q[$i] == 'b') {
                $sql = "UPDATE Questions SET OptionB=OptionB+1 where Question=".($i+1).";";
                
            }
            else if ($Q[$i] == 'c') {
                $sql = "UPDATE Questions SET OptionC  =OptionC+1 where Question=".($i+1).";";
                
            }
            mysqli_query($conn, $sql);
        }
        header("location: completed.php");
    }

}
?>