<?php
    if(isset($_POST["lowisko"]) && isset($_POST["data"]) && isset($_POST["sedzia"])) {
        $lowisko = $_POST["lowisko"];
        $data = $_POST["data"];
        $sedzia = $_POST["sedzia"];

        // Połączenie z bazą danych
        $conn = new mysqli("localhost", "root", "", "wedkarstwo");

        // Sprawdzenie, czy połączenie powiodło się
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Przygotowanie zapytania SQL
        $stmt = $conn->prepare("INSERT INTO zawody_wedkarskie (id, id_organizatora, lowisko, data, sedzia) VALUES (NULL, 2, ?, ?, ?)");
        $stmt->bind_param("iss", $lowisko, $data, $sedzia); // 's' dla stringów, 'i' dla integerów

        // Wykonanie zapytania
        if ($stmt->execute()) {
            echo "Zawody wędkarskie zostały dodane";
        } else {
            echo "Błąd: " . $stmt->error;
        }

        // Zamykanie połączenia
        $stmt->close();
        $conn->close();
    }
?>
