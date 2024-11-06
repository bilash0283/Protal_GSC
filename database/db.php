<?php
    $db = mysqli_connect('localhost', 'root', '', 'gsc');
    if(!$db){
        echo "Databas connection Error!";
    }else{
        echo "db";
    }
?>

<!-- college-details.php?name=uk -->