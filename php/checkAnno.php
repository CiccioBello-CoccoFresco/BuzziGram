<?php
    include_once 'utils/dbConnection.php';
    if(isset($_GET['as'])){
        $as = $_GET["as"];
        $studente = 1;
        $sql = 'Select c.id from classe c join frequenta f on c.id = f.classe where c.anno_scolastico ="'.$as.'" and f.studente = '.$studente; 
        $conn = openConn();
        $result = $conn->query($sql);
        closeConn($conn);
        $row = $result->fetch_assoc();
        if(isset($row['id'])) echo '1';
        else echo '0';
    }
?>