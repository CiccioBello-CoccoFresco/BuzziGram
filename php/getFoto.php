<?php
include_once 'utils/dbConnection.php';
if(isset($_GET['studente']) && isset($_GET['classe'])) {
        $studente = $_GET['studente'];
        $classe = $_GET["classe"];
        $sql = 'SELECT file, frase FROM immagine WHERE studente ="'. $studente . '" and classe ="'. $classe .'"';
        $conn = openConn();
        $result = $conn->query($sql);
        closeConn($conn);
        $array = array();
        if($result->num_rows != 0){
            $row = $result->fetch_assoc();
            $pathSrc = 'data:image/jpeg;base64,'.base64_encode( $row['file'] );
            array_push($array,$pathSrc);
            array_push($array,$row['frase']);
        }else array_push($array,"norows");
        echo json_encode($array);
    }
?>