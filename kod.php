<?php
    if(isset($_POST["lowisko"]) && isset($_POST["data"]) && isset($_POST["sedzia"])) {
        $lowisko = $_POST["lowisko"];
        $data = $_POST["data"];
        $sedzia = $_POST["sedzia"];

        $conn = new mysqli("localhost","root","","wedkarstwo");

        $sql = "INSERT INTO zawody_wedkarskie VALUES (NULL, 2, $lowisko, '$data', '$sedzia');";
        $result = $conn->query($sql);

        $conn -> close();

        echo "Zawody wędkarskie zostały dodane";
    }
?>