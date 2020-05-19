<?php
    include_once '../utils/dbConnection.php';
    if(isset($_GET['as'])){
        $as = $_GET["as"];

        $sql = 'SELECT anno, sezione FROM classe WHERE anno_scolastico ="'. $as . '"';
        $conn = openConn();
        $result = $conn->query($sql);
        closeConn($conn);
        // output data of each row
        $array = array();

        while($row = $result->fetch_assoc()) {
            array_push($array,$row);

        }

        echo json_encode($array);
    }
    
?>