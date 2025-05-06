<?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $dbname = "aeroporti";
    $data = $_POST["data"];

    try{
        $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = 'SELECT Voli.id_volo, Voli.codice_volo, Voli.data, Voli.ora_partenza, Voli.ora_arrivo FROM Voli WHERE Voli.data = "'.$data.'";';
        $result = $conn -> query($query);

        foreach ($result as $row){
            echo $row["id_volo"]." --- ".$row["codice_volo"]." --- ".$row["data"]." --- ".$row["ora_partenza"]." --- ".$row["ora_arrivo"]."<br>";
        }

        $conn = null;

    }catch(Exception $e){
        echo $e->getMessage();
    }
?>    