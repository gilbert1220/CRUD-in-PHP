<?php
    if (isset($_GET["id"])){
        $id = $_GET["id"];
        
        include('db_connect.php');

        $sql = "DELETE FROM clients WHERE id = $id";
        $conn->query($sql);
    }

    header("Location: index.php");
    exit;
?>