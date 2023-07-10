<?php

        //connecting to the database
        $conn = mysqli_connect('localhost', 'chan', '', 'myshop');

        if(!$conn){
            echo 'Connection error' . mysqli_connect_error();
        }

?>