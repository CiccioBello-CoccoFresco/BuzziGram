<?php
    include_once 'utils/dbConnection.php';
    if(isset($_GET['as'])){
        $as = $_GET["as"];
        $studente = 2;//da prendere da session
        $sql = 'SELECT frase from immagine i right join frequenta f on i.classe = f.classe and i.studente = f.studente join classe c on f.classe = c.id where f.studente = '.$studente.' and c.anno_scolastico ="'.$as.'"'; 
        $conn = openConn();
        $result = $conn->query($sql);
        closeConn($conn);
        $row = $result->fetch_assoc();
        if(isset($row['frase'])) echo '1';
        else echo '0';
    }
?>