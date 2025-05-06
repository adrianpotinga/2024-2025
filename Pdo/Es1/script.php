<?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $dbname = "aeroporti";
    $nazione = $_POST["nazione"];

    try{
        $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = 'SELECT Aeroporti.nome, Aeroporti.citta FROM `Aeroporti` WHERE Aeroporti.nazione = "'.$nazione.'";';
        $result = $conn -> query($query);

        foreach ($result as $row){
            echo $row["nome"]." -> ".$row["citta"]."\n";
        }

        $conn = null;

    }catch(Exception $e){
        echo $e->getMessage();
    }
?>    