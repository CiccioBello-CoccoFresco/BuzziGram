<?php
include_once 'utils/dbConnection.php';
if(isset($_GET['studente']) && isset($_GET['classe'])) {
        $studente = $_GET['studente'];
        $classe = $_GET["classe"];
        $sql = 'SELECT file FROM immagine WHERE studente ="'. $studente . '" and classe ="'. $classe .'"';
        $conn = openConn();
        $result = $conn->query($sql);
        closeConn($conn);
        $array = array();
        if($result->num_rows != 0){
            $row = $result->fetch_assoc();
            echo 'data:image/jpeg;base64,'.base64_encode( $row['file'] );
        }else echo "norows";
    }
?>